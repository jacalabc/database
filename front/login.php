
<h1>教師登入</h1>
<?php
session_start();

if(isset($_GET['error'])){
    echo "帳號或密碼錯誤";
    echo "登入嘗試".$_SESSION['login_try']."次";
}
?>
<form action="./api/chk_user.php" method="post">
    <div>帳號:<input type="text" name="acc" id=""></div>
    <div>密碼:<input type="password" name="pw" id=""></div>
    <div><input type="submit" value="登入" name="" id=""></div>
</form>
