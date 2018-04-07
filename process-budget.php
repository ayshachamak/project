<?php 

include 'config.php';
include 'Database.php';
?>

<?php

$db = new Database();
   
if(isset($_SESSION) && isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $category = mysql_real_escape_string($_POST['category']);
    $amount = mysql_real_escape_string($_POST['amount']);
    $budget_month = mysql_real_escape_string($_POST['budget_month']);
    
    $query = "INSERT INTO budget (id, user_id, category_id, amount, budget_month) VALUES (NULL, $user_id, $category, $amount, $budget_month)";
    $insert = $db->insert($query);
    if($insert){
        header('Location: budget.php');
    }else{
        header('Location: budget.php?error=1');
    }
}else{
    header('Location: sign_in.php');
    exit();
}
        