<header>
    <nav>
        <?php
        $local=str_replace(['/','.php'],'',$_SERVER['PHP_SELF']);
        switch($local){
                case "index":
                    echo "<a href='index.php?do=reg'>教師註冊</a>";
                    echo "<a href='index.php?do=login'>教師登入</a>";
                break;
                case "admin_center":
                    echo "<a href='admin_center.php?do=add'>新增學生</a>";
                    //<!-- <a href="?do=add">新增學生</a> -->
                    echo "<a href='admin_center.php?do=logout'>教師登出</a>";
                break;
            }
        ?>
    </nav>
</header>