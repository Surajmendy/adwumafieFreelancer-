<?php
session_start();

 $_SESSION['email']= null;
 $_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;

echo "<script>window.location='../user/login/'</script>";
