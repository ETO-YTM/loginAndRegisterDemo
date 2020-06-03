<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    if (!isset($_COOKIE['user_id']))
        echo '<script>alert("请登录！！！");window.location.href="index.php";</script>';
    else {
        setcookie('user_id', "", time() - 1);
        echo "<script>alert('$_COOKIE[user_id],请重新登录！！');window.location.href='index.php';</script>";
    }
    exit(0);
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>登陆成功！！！</title>
</head>

<body background="天线宝宝.jpg">
<?php
echo "<h1>欢迎回来！！" . $_SESSION['user_id'] . "</h1><hr>";
echo "<h6>登录1小时有效<br><a href='logout.php'>退出登录..</a></h6>";
?>

</body>

</html>
