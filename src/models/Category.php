<?php

namespace d17030752\ExpensesApp\models;
require_once 'src/models/Database.php';
use d17030752\ExpensesApp\models\Database;
use PDO;

class Category extends Database
{
    private string $id;
    public function __construct(private string $name)
    {
        parent::__construct();
    }
    public function save()
    {
        $query = $this->connect()->prepare("INSERT INTO categories (name)VALUES(:name)");
        $query->execute(['name' => $this->name]);
    }
    public static function getAll()
    {
        $db = new Database();
        $query = $db->connect()->query("SELECT *FROM categories");
        $categories=[];
        while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
            # code...
            $category = Category::createFromArray($r);
            array_push($categories,$category);
        } return $categories;
    }
    public static function get($id){
        $db = new Database();
        $query =$db->connect()->prepare("SELECT  * FROM categories WHERE id =:id");
        $query->execute(['id'=>$id]);
        $category = Category::createFromArray($query->fetch(PDO::FETCH_ASSOC));
        return $category;
    }
    public static function existsOnDB($name){
$db = new Database();
$query=$db->connect()->prepare("SELECT * FROM categories WHERE name =:name");
$query->execute(['name'=>$name]);
return $query->rowCount() > 0;
    }
    public static function createFromArray($arr)
    {
        $category = new Category($arr['name']);
        $category->setId($arr['id']);
        return $category;
    }
    public function setId($value)
    {
        $this->id = $value;
    }
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
}
