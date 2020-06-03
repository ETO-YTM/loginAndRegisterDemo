<html>
<head>
    <meta charset="UTF-8">
    <title>注册新用户</title>
    <style>
        .error {
            color: #FF0000
        }
    </style>
</head>

<body>
<h1>
    注册页面
</h1>
<hr>

<?php
$isPass = false;
$usrNameErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usrName = $_POST["userName"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $isPass = isPass($usrName, $password, $password2);
}

if ($isPass) {
    $db = new mysqli("127.0.0.1", "root", "123456", "myfirstphpproj");
    $sqlSearch = "select username from userInfo where username= '$usrName';";
    if (mysqli_num_rows($db->query($sqlSearch))) {
        echo "<script>alert('用户名已被注册！');history.go(-1);</script>";
    } else {
        $sqlInsert = "insert into userInfo (username,password) values('$usrName','$password');";
        $resInsert = $db->query($sqlInsert);
        if ($resInsert) {
            echo '<h3>注册成功！</h3>';
            echo '<p>您的用户名：' . $usrName . '</p>';
            echo '<p>您的密码：' . $password . '</p>';
            echo '<br><form action="index.php"><input type="submit" value="去登录"></form>';
        } else {
            echo "<script>alert('系统繁忙！');</script>";
        }
    }
} else {
    echo <<<EOF
        <form action="" method="post">
            注册账号：<input type="text" name="userName"><span class="error">$usrNameErr</span><br>
            注册密码：<input type="password" name="password"><span class="error">$passwordErr</span><br>
            确认密码：<input type="password" name="password2"><span class="error">$passwordErr</span><br>
            <input type="submit" value="确认注册">
        </form>
EOF;
}
function isPass($account, $password, $password2)
{
    global $usrNameErr, $passwordErr;
    ($isPass1 = preg_match("/^[a-zA-Z]+$/", $account)) ?: $usrNameErr = "只允许字母！（大小写都行）你的输入：" . $account;
    ($isPass2 = preg_match("/^[a-zA-Z0-9]{8,}$/", $password)) ?: $passwordErr = "至少8位！";
    ($isPass3 = ($password == $password2)) ?: $passwordErr = $passwordErr . "两次密码不匹配！！";
    return ($isPass1 && $isPass2 && $isPass3);
}

?>
</body>
</html>