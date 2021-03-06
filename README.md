<p align="center">
  <a href='https://mariocuetoj.com/'>
    <img src="https://mariocuetoj.com/wp-content/uploads/2022/01/Logo-Mario-Cueto-Azul.svg" width="100" />
  </a>
</p>
<br />

## Description
**MContigo - Post Citation and URL Checker** is a plugin developed for an admission test for the company **MContigo.** This plugin has functionalities such as adding author citations to posts and using shortcodes to display them in any area of the web page, and verifying that the links to those post citations have been correctly added.

## Documentation
1. Download the plugin.
2. In WordPress, go to Plugins > Add new > Upload plugin and select the plugin which is a .zip file.
3. Activate the plugin.
4. When you add a new post, you will see a custom field called "Citation" where you can write all the citations that an author has.
5. To display any Citation from an author in any area of the web page, you must use the following shortcode **[mc-citation post_id="id"]** where the **id** will change according to the post id of the author of the Citation you want to display.
6. In the left column in the WordPress panel you will see a tab called "Post Checker" which contains 3 columns mentioning details about bad links within the web page which are:
    - URL - The address of the detected link
      - The URL detected as a bad link will be displayed in this column. 
    - Status - The error that has been detected in the content.
      - This column will show the error that has been detected, which can be divided into 4:
        - Insecure link ( href=”http://...” )
        - Protocol not specified ( href=”google.com” o href=”//google.com” )
        - Malformed link ( href=” https://...” o href=”https://google.com/Url” que no funciona )
        - Link returning incorrect Status Code ( 40X, 50X ). 
    - Source - The item where the problem was located.
      - This column will show the name of the post containing the incorrect link.
7. Enjoy :)

## About the code...
1. With this function, we add a new custom field for all posts called "Citation" which will be a Wysiwyg editor, and link it to a function we will call "citation_custom_html_code_editor".
<p align="center">
    <img src="https://mariocuetoj.com/mcontigo/wp-content/uploads/2022/07/add-custom-field-citation.png" width="600" />
</p>

2. With this function, we get the value of whatever the user has typed in the Wysiwyg editor and display it again each time the editor is reloaded.
<p align="center">
    <img src="https://mariocuetoj.com/mcontigo/wp-content/uploads/2022/07/get-custom-field-citation.png" width="600" />
</p>

3. With this function, we save the value obtained with the previous GET function.
<p align="center">
    <img src="https://mariocuetoj.com/mcontigo/wp-content/uploads/2022/07/save-custom-field-citation.png" width="600" />
</p>

4. With this function, we make a shortcode so that we can display the value of the "Citation" field of a particular author anywhere on the page with the help of the id of the corresponding post.
<p align="center">
    <img src="https://mariocuetoj.com/mcontigo/wp-content/uploads/2022/07/shortcode-custom-field-citation.png" width="600" />
</p>