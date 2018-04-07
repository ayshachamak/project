<?php

include_once '../config.php';
include_once '../Database.php';

class UserModel{
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
    
    public function getUserByUserId($userId){
        $query = "SELECT * FROM user WHERE username = '".  mysqli_real_escape_string($this->db->link, $userId)."'";
        return $this->db->select($query);
    }
}