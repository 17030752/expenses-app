<?php 
use d17030752\ExpensesApp\models\Category;
use d17030752\ExpensesApp\models\Expense;
require_once 'src/models/Category.php';
require_once 'src/models/Expense.php';

if (isset($_POST['title'])&&isset($_POST['expense'])&&isset($_POST['category_id'])) {
    $title =$_POST['title'];
    $expense =$_POST['expense'];
    $category_id = $_POST['category_id'];
    $expense = new Expense($title , $category_id ,$expense);
    $expense->save();
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
<?php require 'src/resources/navbar.php';?>
    <div class="container">
        <form action="" method="POST">
            <input type="text" name="title" id="" placeholder="name of category.....">
            <input type="number" name="expense" id="" placeholder="30.0">
            <select name="category_id" id="">
                <?php foreach ($categories as $category) {
                    # code...
                    echo "<option value='{$category->getId()}'>{$category->getName()}</option>";
                }?>
            </select>
            <input type="submit" value="create category"></form>
            <!-- <div class="categories">
                <?php 
                foreach($categories as $category){
                    echo "<div class='category'>{$category->getName()}</div>";
                }
                ?>
            </div>
     -->
        </div>
</body>
</html>