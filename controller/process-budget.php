<?php 

include '../config.php';
include '../Database.php';

session_start();
$db = new Database();
var_dump($_POST);

if(isset($_SESSION) && isset($_SESSION['user_id'])){
    $userId = $_SESSION['user_id'];
    $budget_month = $_POST['month'];
    $categoryList = $_POST['category'];
    $amountList = $_POST['amount'];
    
    $currentYear = date("Y");
    $datetime = new DateTime();
    $budget_date_object = $datetime->createFromFormat('Y-m-d', $currentYear.'-'.$budget_month.'-01');
    $budget_date = $budget_date_object->format('Y-m-d');
    
    $query = "INSERT INTO budget (id, user_id, category_id, amount, budget_month) VALUES ";
    $count = 0;
    $flag = $insert = $multipleValue = false;
    foreach ($categoryList as $category) {
        $amount = $amountList[$count];
        if ($category && $amount && $budget_date) {
            if ($multipleValue) {
                $query .= ", ";
            }
            $query .= " (NULL, $userId, " . mysqli_real_escape_string($db->link, $category) . ", "
                    . mysqli_real_escape_string($db->link, $amount) . ", '"
                    . mysqli_real_escape_string($db->link, $budget_date)
                    . "')";
            $flag = $multipleValue = true;
        }
        $count++;
    }
    if ($flag) {
        $insert = $db->insert($query);
    }
    if ($insert) {
        header('Location: ../budget-planning.php?success=1');
    } else {
        header('Location: ../budget-planning.php?error=1');
    }
}else{
    header('Location: sign_in.php');
    exit();
}
        