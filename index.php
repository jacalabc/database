<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學生管理系統</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>學生管理系統</h1>
    <?php
    $dsn="mysql:host=localhost;charset=utf8;dbname=school";
    $pdo=new PDO($dsn,'root','');

    $sql="SELECT * FROM `students` limit 5";

    $rows=$pdo->query($sql)->fetchALL(PDO::FETCH_ASSOC);

    echo "<pre>";
    print_r($rows);
    echo "</pre>";
    ?>
</body>
</html>