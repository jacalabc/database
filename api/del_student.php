<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root','');

// echo $_GET['id'];
$student=$pdo->query("SELECT * FROM `students` WHERE `id` = '{$_GET['id']}'")
             ->fetch(PDO::FETCH_ASSOC);
$sql_class="DELETE FROM `class_student` WHERE `school_num='{$student['school_num']}'";             
$sql="DELETE FROM `students` WHERE `id`='{$_GET['id']}'";

echo $sql_class;
echo "<br>";
echo $sql_student;
echo "</br>";
//$pdo->query($sql);
$res_class=$pdo->exec($sql_class);
$res_student=$pdo->exec($sql_student);
echo $res_class;
echo "<br>";
echo $res_student;
echo "刪除成功";

header("location:../index.php");
?>