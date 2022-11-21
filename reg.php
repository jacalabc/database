<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>教師註冊</title>
    <style>
        h1{
            text-align: center;
        }
        div{
            text-align: center;
        }
    </style>
</head>
<body>
<h1>教師註冊</h1>
<form action="./api/reg_user.php" method="post">
    <div><lable for="">帳號 : <input type="text" name="acc"></lable></div>
    <div><lable for="">密碼 : <input type="password" name="pw"></lable></div>
    <div><lable for="">信箱 : <input type="text" name="email"></lable></div>
    <div><lable for="">姓名 : <input type="text" name="name"></lable></div>
    <div>
        <lable for=""><input type="submit" value="註冊"></lable>
        <lable for=""><input type="reset" value="重製"></lable>
    </div>
</form>
</body>
</html>