<?php 
if (isset($_GET['view'])) {
    # code...
    $view =$_GET['view'];
    require "src/{$view}.php";
} else {
    # code...
    require "src/home.php";
}

?>