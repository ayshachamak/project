<?php

include_once  '../config.php';
include_once '../Database.php';
include_once '../model/UserModel.php';

session_start();

if (isset($_SESSION) && isset($_SESSION['user_id'])) {
    //header("Location: ../index.php");
}
$userId = $_POST['username'];
$password = sha1($_POST['password']);

$userModel = new UserModel();
$resource = $userModel->getUserByUserId($userId);
if ($resource) {
    $obj = mysqli_fetch_assoc($resource);
//    var_dump($obj);    var_dump($password);die;
    if ($password == $obj["password"]) {
        $_SESSION['user_id'] = $obj['id'];
        header('Location: ../index.php');
    } else {
        header('Location: ../sign_in.php');
    }
} else {
    header('Location: ../sign_in.php');
}
            