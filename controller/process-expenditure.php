<?php

include '../config.php';
include '../Database.php';

session_start();
$db = new Database();

if (isset($_SESSION) && isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $categoryList = $_POST['category'];
    $amountList = $_POST['amount'];
    $expenditureDateList = $_POST['date'];

    $query = "INSERT INTO expenditures (id, user_id, category_id, amount, expenditure_date) VALUES ";
    $count = 0;
    $flag = $insert = $multipleValue = false;
    foreach ($categoryList as $category) {
        $amount = $amountList[$count];
        $date = $expenditureDateList[$count];
        if ($category && $amount && $date) {
            if ($multipleValue) {
                $query .= ", ";
            }
            $query .= " (NULL, $userId, " . mysqli_real_escape_string($db->link, $category) . ", "
                    . mysqli_real_escape_string($db->link, $amount) . ", '"
                    . mysqli_real_escape_string($db->link, $date)
                    . "')";
            $flag = $multipleValue = true;
        }
        $count++;
    }
//    var_dump($query);die;
    if ($flag) {
        $insert = $db->insert($query);
    }
    if ($insert) {
        header('Location: ../expenditure.php?success=1');
    } else {
        header('Location: ../expenditure.php?error=1');
    }
} else {
    die('in here');
    header('Location: ../sign_in.php');
    exit();
}
