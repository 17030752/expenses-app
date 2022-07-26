<?php 
namespace d17030752\ExpensesApp\models;
require_once 'src/models/Database.php';
require_once 'src/models/Category.php';
use d17030752\ExpensesApp\models\Database;
use d17030752\ExpensesApp\models\Category;
use PDO;
class Expense extends Database{
    private Category $category;
    private string $date;
    public function __construct(private string $title,private int $category_id,private float $expense){
parent::__construct();
    }
    public function save(){
        $query = $this->connect()->prepare("INSERT INTO expenses (title,category_id,expense,date)VALUES(:title,:category_id,:expense,NOW())");
        $query->execute(['title' => $this->title,'category_id'=>$this->category_id,'expense'=>$this->expense]);
    }
    public static function getAll()
    {
        $db = new Database();
        $query = $db->connect()->query("SELECT *FROM expenses");
        $expenses=[];
        while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
            # code...
            $category = Expense::createFromArray($r);
            array_push($expenses,$category);
        } return $expenses;
    }
    public static function createFromArray($arr)
    {
        $expense = new Expense($arr['title'],$arr['category_id'],$arr['expense']);
        $expense->setDate($arr['date']);
        $expense->setCategory(Category::get($arr['category_id']));
        return $expense;
    }
    public static function getTotal(array $expenses){
        $total =0;
        foreach ($expenses as $expense) {
            # code...
            $total + $expense->getExpense();
        }return $total;
    }
    public function setDate($value){
        $this->date =$value;
    }
    public function setCategory(Category $value){
        $this->category = $value;
    }
    public function getExpense(){
        return $this->expense;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getCategory(){
        return $this->category;
    }

}
?>