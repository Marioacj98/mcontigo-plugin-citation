<?php

if (is_admin()) {
    new post_checker_wp_list_table();
    $urls = [];
}

class post_checker_wp_list_table {
    
    public function __construct() {
        add_action( 'admin_menu', array($this, 'add_menu_post_checker' ));
    }

    public function add_menu_post_checker() {
        add_menu_page( 'Post Checker', 'Post Checker', 'manage_options', 'post-checker.php', array($this, 'post_checker_list_table_page'), 'dashicons-code-standards' );
    }

    public function post_checker_list_table_page() {
        $postCheckerListTable = new Post_Checker_List_Table();
        $postCheckerListTable->prepare_items();
        ?>
            <div class="wrap">
                <h2>Post Checker</h2>
                <?php $postCheckerListTable->display();?>
            </div>
        <?php
    }
}

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Post_Checker_List_Table extends WP_List_Table {

    public function prepare_items() {
        $columns = $this->get_columns();
        $hidden = $this->get_hidden_columns();
        $sortable = $this->get_sortable_columns(); 

        $data = $this->table_data();
        usort( $data, array( &$this, 'sort_data' ) );

        $perPage = 20;
        $currentPage = $this->get_pagenum();
        $totalItems = count($data);

        $this->set_pagination_args( array(
            'total_items' => $totalItems,
            'per_page'    => $perPage
        ) );

        $data = array_slice($data,(($currentPage-1)*$perPage),$perPage);

        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = $data;
    }

    public function get_columns() {
        $columns = array(
            'url'     => 'URL',
            'status'  => 'Status',
            'source'  => 'Source'
        );

        return $columns;
    }

    public function get_hidden_columns() {
        return array();
    }

    public function get_sortable_columns() {
        return array('status' => array('status', false));
    }

    private function table_data() {
        $data = array();
        
        $posts = get_posts();
        foreach ($posts as $post) {
            $urls = wp_extract_urls( $post->post_content);
            foreach ($urls as $url) {
                $status = '';
                if (wp_http_validate_url($url)) {
                    if (substr($url, 0, 5) == 'https' || substr($url, 0, 4) == 'http') {
                        if (substr($url, 0, 5) == 'https') {
                            $response = wp_remote_get( $url );
                            if ($response['response']['code'] > 399) {
                                $status = $response['response']['code'].' '.$response['response']['message'];
                            }
                        } else {
                            $status = 'Insecure link';
                        }
                    } else {
                        $status = 'Protocol not specified';
                    }
                } else {
                    $status = 'Malformed link';
                }
                if ( $status != '' ) {
                    $data[] = array(
                        'url'          => '<a href="'.$url.'">'.$url.'</a>',
                        'status'       => '<strong style="color: #FF8C00; font-weight: 600">'.$status.'</strong>',
                        'source'       => '<a style="font-weight: 600" href="'.esc_url( get_edit_post_link($post->ID) ).'">'.$post->post_title.'</a>'
                        );
                    
                }
            }
            
        }

        return $data;
    }

    public function column_default( $item, $column_name ) {
        switch( $column_name ) {
            case 'url':
            case 'status':
            case 'source':
                return $item[ $column_name ];

            default:
                return print_r( $item, true ) ;
        }
    }

    private function sort_data( $a, $b ) {

        $orderby = 'status';
        $order = 'asc';

        if(!empty($_GET['orderby']))
        {
            $orderby = $_GET['orderby'];
        }

        if(!empty($_GET['order']))
        {
            $order = $_GET['order'];
        }

        $result = strcmp( $a[$orderby], $b[$orderby] );

        if($order === 'asc')
        {
            return $result;
        }

        return -$result;
    }

}
    
?>