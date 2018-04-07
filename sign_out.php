<?php
session_start();

if(!isset($_SESSION['id']))
{session_destroy();
 header("Location:./index.php");
}
else if(isset($_SESSION['id'])!="")
{session_destroy();
 header("Location:./index.php");
}

if(isset($_GET['logout']))
{
 session_destroy();
 unset($_SESSION['id']);
 unset($_SESSION['email']);
 header("Location:./index.php");
}
?>