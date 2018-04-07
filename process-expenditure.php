<?php

include 'config.php';
include 'Database.php';
?>
<?php
session_start();
$db = new Database();

//var_dump($_SESSION);
//var_dump($_POST);
//die('here');

if (isset($_SESSION) && isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $categoryList = $_POST['category'];
    $amountList = $_POST['amount'];
    $expenditureDateList = $_POST['date'];

    $query = "INSERT INTO expenditure (id, user_id, category_id, amount, expenditure_date) VALUES ";
    $count = 0;
    foreach ($categoryList as $category){
        if($count){
            $query .= ", ";
        }
        $query .= " (NULL, $userId, ".mysqli_real_escape_string($db->link,$categoryList[$count]).", "
                .mysqli_real_escape_string($db->link, $amountList[$count]).", "
                .mysqli_real_escape_string($db->link, $expenditureDateList[$count])
                .")";
        $count++;
    }
    var_dump($query);die('here');
    $insert = $db->insert($query);
    
    if ($insert) {
        if (calculateIfExpenditureExceeded($category, $budget_month)) {
            header('Location: my-wallet.php?alert=1');
        } else {
            header('Location: my-wallet.php');
        }
    }else{
        header('Location: my-wallet.php');
    }
} else {
    header('Location: sign_in.php');
    exit();
}

function calculateIfExpenditureExceeded($category_id, $budget_month) {
    $month = date("m", strtotime($budget_month));
    $query = "SELECT sum(amount) as $total_expense FROM expenditure WHERE category_id = $category_id AND MONTH($budget_month) = $month";
    $select = $db->select($query);
    $total_expense = $total_budget = 0;
    if ($select) {
        $result = mysql_fetch_assoc($select);
        $total_expense = $result['$total_expense'];
    }
    $query = "SELECT amount FROM budget WHERE category_id = $category_id AND MONTH($budget_month) = $month";
    $select = $db->select($query);
    if ($select) {
        $result = mysql_fetch_assoc($select);
        $total_budget = $result['amount'];
    }
    if ($total_expense > $total_budget) {
        return true;
    }
    return false;
}
