<?php

include_once  '../config.php';
 include_once '../Database.php';
 include_once '../model/WalletModel.php';

session_start();
$db = new Database();

if (isset($_SESSION) && isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $recordType = $_POST['recordType'];
    $month = $_POST['month'];

    $walletModel = new WalletModel();
    $resource = $walletModel->getMonthlyBudgetRecord($month);
    while($obj = mysqli_fetch_assoc($resource)){
        echo "<pre>";
        var_dump($obj);    
    }
    die;
    if ($insert) {
//        if (calculateIfExpenditureExceeded($category, $budget_month)) {
//            header('Location: my-wallet.php?alert=1');
//        } else {
//            header('Location: my-wallet.php');
//        }
        header('Location: ../expenditure.php?success=1');
    } else {
        header('Location: ../expenditure.php?error=1');
    }
} else {
    die('in here');
    header('Location: ../sign_in.php');
    exit();
}

function calculateIfExpenditureExceeded($category_id, $budget_month) {
    $month = date("m", strtotime($budget_month));
    $query = "SELECT sum(amount) as $total_expense FROM expenditures WHERE category_id = $category_id AND MONTH($budget_month) = $month";
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
