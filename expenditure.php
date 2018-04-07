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
    $budget_month = mysql_real_escape_string($_POST['expenditure_date']);
    
    $query = "INSERT INTO expenditure (id, user_id, category_id, amount, expenditure_date) VALUES (NULL, $user_id, $category, $amount, $expenditure_date)";
    $insert = $db->insert($query);
    if($insert){
        if(calculateIfExpenditureExceeded($category, $budget_month)){
            header('Location: my-wallet.php?alert=1');            
        }else{
            header('Location: my-wallet.php');        
        }
    }
    }else{
        header('Location: sign_in.php');
        exit();
    }
}   
    function calculateIfExpenditureExceeded($category_id, $budget_month){
        $month = date("m", strtotime($budget_month));
        $query = "SELECT sum(amount) as $total_expense FROM expenditure WHERE category_id = $category_id AND MONTH($budget_month) = $month";
        $select = $db->select($query);
        $total_expense = $total_budget = 0;
        if($select){
            $result = mysql_fetch_assoc($select);
            $total_expense = $result['$total_expense'];
        }
        $query = "SELECT amount FROM budget WHERE category_id = $category_id AND MONTH($budget_month) = $month";
        $select = $db->select($query);
        if($select){
            $result = mysql_fetch_assoc($select);
            $total_budget = $result['amount'];
        }
        if($total_expense > $total_budget){
            return true;
        }
        return false;
    }