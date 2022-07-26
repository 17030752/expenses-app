<?php use d17030752\ExpensesApp\models\Expense;
require_once 'src/models/Expense.php';
$expenses =Expense::getAll();
$total =Expense::getTotal($expenses);
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
    <h1>Home</h1>
    <div>Total: $<?php echo $total;?></div>
    <div class="expenses">
        <?php 
                 foreach ($expenses as $expense) {
        ?>
        <div class='expense'>
            <div><?php echo $expense->getTitle();?></div>
            <div><?php echo $expense->getCategory()->getName();?></div>
            <div><?php echo $expense->getExpense();?></div>
        </div>
    <?php }
    ?>
    </div>
    </div>
    
</body>
</html>