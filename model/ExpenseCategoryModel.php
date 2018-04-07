<?php

include 'config.php';
include 'Database.php';

class ExpenseCategoryModel{
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
    
    public function getAllCategory(){
        $query = "SELECT * FROM expense_category";
        return $this->db->select($query);
    }
}