<?php

use d17030752\ExpensesApp\models\Category;

require_once 'src/models/Category.php';
if (isset($_POST['name'])) {
    # code...
    $name = $_POST['name'];
    if (!Category::existsOnDB($name)) {
        # code...
        $category = new Category($name);
        $category->save();
    }
}
$categories = Category::getAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="src/resources/main.css">
</head>

<body> 
    <?php require 'src/resources/navbar.php'; ?>
    <div class="container">
        <form action="" method="POST">
            <input type="text" name="name" id="" placeholder="name of category.....">
            <input type="submit" value="create category">
        </form>
        <div class="categories">
            <?php
            foreach ($categories as $category) {
                echo "<div class='category'>{$category->getName()}</div>";
            }
            ?>
        </div>

    </div>
</body>

</html>