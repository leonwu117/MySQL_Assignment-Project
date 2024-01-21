<?php
session_start();
if(isset($_SESSION['userid']))
{
    unset($_SESSION['userid']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>慈善管理系统 || 请登陆</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<!--登录框-->
<!--h1 style="text-align: center"><strong>慈善管理系统</strong></h1-->
<!--div style="padding: 180px 550px 10px;text-align: center"-->
<div class="form-wrapper">
    <form  action="login_check.php" method="POST" class="bs-example bs-example-form" role="form">
        <h3>慈善管理系统登录</h3>
            <div class="form-item">
		        <input type="text" name="account" required="required" placeholder="用户名或管理员" autofocus required></input>
            </div>

            <div class="form-item">
		        <input type="password" name="pass" required="required" placeholder="Password" required></input>
            </div>

            <div class="button-panel">
		        <input type="submit" class="button" title="登陆" name="login" value="登陆"></input>
                <input type="reset"  class="button" title="重置" name="reset" value="重置"></input>
            </div>
    </form>
</div>
</body>
</html>