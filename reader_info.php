<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

$sql="select name from reader_card where reader_id={$userid}";
$res=mysqli_query($dbc,$sql);
$result=mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>慈善管理系统 || 用户信息</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body{
            width: 100%;
            overflow: hidden;
            background: url("img/tree.jpg") no-repeat;
            background-size:cover;
            color: antiquewhite;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="#">慈善管理系统||用户</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
            <li class="active"><a href="reader_index.php">主页</a></li>
                <li><a href="admin_gift_add.php">礼物捐赠</a></li>
                <li><a href="admin_gift.php">礼物记录</a></li>
                <li><a href="reader_info.php">个人信息</a></li>
                <li><a href="reader_repass.php">密码修改</a></li>
                <li><a href="index.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
    <?php



    $sqla="select * from reader_info where reader_id={$userid} ;";

    $resa=mysqli_query($dbc,$sqla);
    $resulta=mysqli_fetch_array($resa);
    ?>
<div class="col-xs-5 col-md-offset-4" style="position: relative;top: 55%">
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 style="text-align: center" class="panel-title">我的信息</h3>
    </div>
    <div class="panel-body">
        <a href="#" class="list-group-item"><?php echo "<p>用户号:{$resulta['reader_id']}</p><br/>"; ?></a>
        <a href="#" class="list-group-item"><?php  echo "<p>姓名:{$resulta['name']}</p><br/>";  ?></a>
        <a href="#" class="list-group-item"><?php    echo "<p>性别:{$resulta['sex']}</p><br/>"; ?></a>
        <a href="#" class="list-group-item"><?php echo "<p>生日:{$resulta['birth']}</p><br/>";  ?></a>
        <a href="#" class="list-group-item"><?php     echo "<p>居住地:{$resulta['address']}</p><br/>";  ?></a>
        <a href="#" class="list-group-item"><?php    echo "<p>电话:{$resulta['telcode']}</p><br/>"; ?></a>
    </div>
</div>
</div>


</body>
</html>