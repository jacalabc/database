<?php
include "../database/base.php";

$acc=trim(strip_tags($_POST['acc']));
$pw=trim($_POST['pw']);
$name=trim($_POST['name']);
$email=trim($_POST['email']);
$last_login=null;

$sql="INSERT INTO`users` (`acc`,`pw`,`email`,`name`,`last_login`)
      VALUES('$acc','$pw','$email','$name','$last_login')";
echo "acc=>".$acc;
echo "<br>";
echo "pw=>".$pw;
echo "<br>";
echo "email=>".$email;
echo "<br>";
echo "name=>".$name;
echo "<br>";
$pdo->exec($sql);
header("location:../login.php");
?>