<p align="center">
  <a href='https://mariocuetoj.com/'>
    <img src="https://mariocuetoj.com/wp-content/uploads/2022/01/Logo-Mario-Cueto-Azul.svg" width="100" />
  </a>
</p>
<br />

## Description
**MContigo - Post Citation and Checker** es un plugin desarrollado para una prueba de admisión para la empresa **MContigo.** Este plugin cuenta con funcionalidades como agregar citas de autores a los posts y usar shortcodes para mostrarlas en cualquier zona de la página web, y verificar que los enlaces de dichas citas de los posts hayan sido correctamente agregadas.

## Documentation
1. Descarga el plugin.
2. En WordPress, ve a la sección Plugins > Add new > Upload plugin y selecciona el plugin que es un archivo .zip
3. Activa el plugin.
4. Al añadir un nuevo post, verás un campo personalizado llamado "Citation" donde podrás escribir todas las citas que tenga un autor.
5. Para mostrar cualquier grupo de citas de un autor en cualquier zona de la página web, debes usar el siguiente shorcode **[mc-citation post_id="id"]**
donde el **id** variará según el autor del grupo de citas que se desea mostrar.
6. En la columna izquierda en el panel de Wordpress podrás ver una pestaña llamada "Post Checker" que contiene 3 columnas que mencionan detalles sobre enlaces erróneos dentro de la página web que son:
    - URL - La dirección del enlace detectado
      - Test 1
    - Estado - El error que se haya detectado en el contenido
    - Origen - El artículo donde se localizó el problema
