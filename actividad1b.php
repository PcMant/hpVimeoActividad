<!DOCTYPE html>
<html lang="es">
<head><title>Vimeo</title></head>
<style type="text/css">
    
</style>
<body>
<?php
use Vimeo\Vimeo;

require 'vendor/autoload.php';
if (empty($_REQUEST['keywords'])) {
    // Formulario para palabras clave y resultados a mostrar
    echo "
<form method='GET'>
<h3>Palabras clave: </h3>
<input type='search' name='keywords'>
<input type='submit' value='Buscar'/>
</form>";
} else {
    $client = new Vimeo(
        "5d40028e26b293cd7b21d7d8adfea2f3a4709ad3",
        "sRQ1ZtilWCK086ez78jofiJhzRkG0vEkSuVYkUW1TcOG9RNxTqzapAQJ1djCmIJwy2DYn/BduqKQJpt8lsxPFtHR37QXUOrd3oBdlwBL93EG2j5cBDLwF9FymxmF4Shr",
        "3ba1b06e112b8030da90c9860d6dcc75"
    );
    $response = $client->request(
        '/videos',
        array('page'=> 1, 'per_page'=> 10, 'query' => $_REQUEST['keywords']),
        'GET'
    );
    
    $i = 1;
    foreach ($response['body']['data'] as $video) {
        echo "<h3><a href='".$video['link']."'>".$video['name'].
        "</a> </h3>";
        echo "<p class='detalles'><div><img src='{$video['pictures']['base_link']}' width='300' /></div> <p>{$video['description']}</p> </p> <hr/>";
    }
}
?>
</body></html>