<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>慈善管理系统 || 捐赠礼物</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body{
            width: 100%;
            height:auto;

        }
        #query{
            text-align: center;
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

                <li class="dropdown">
                    <a href="admin_gift_add.php" class="dropdown-toggle" data-toggle="dropdown">礼物捐赠<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_report_add.php">新增个人捐赠记录</a></li>
                    </ul>
                </li>
                <li><a href="admin_gift.php">礼物记录</a></li>
                <li><a href="reader_info.php">个人信息</a></li>
                <li><a href="reader_repass.php">密码修改</a></li>
                <li><a href="index.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<h1 style="text-align: center"><strong>个人礼物捐赠和金额</strong></h1>
<form  id="query" action="admin_gift.php" method="POST">
    <div id="query">
        <label ><input  name="readerquery" type="text" placeholder="请输入捐赠者姓名或捐赠者ID" class="form-control"></label>
        <input type="submit" value="查询" class="btn btn-default">
    </div>
</form>
<table  width='100%' class="table table-hover">
    <tr>
        <th>ID</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Amount</th>
        <th>操作</th>
        <th>操作</th>
        <th>操作</th>
    </tr>
    <?php



    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $gjc = $_POST["readerquery"];

        $sql="select * from gift  where (name like '%{$gjc}%' or id like '%{$gjc}%') ;";

    }
    else{
        $sql="select * from gift";
    }


    $res=mysqli_query($dbc,$sql);
    foreach ($res as $row){
        echo "<tr>";
        echo "<td>{$row['donorid']}</td>";
        echo "<td>{$row['donorlastname']}</td>";
        echo "<td>{$row['donorfirstname']}</td>";
        echo "<td>{$row['amount']}</td>";
        echo "<td><a href='admin_gift_add1.php?id={$row['donorid']}'>捐赠</a></td>";
        echo "<td><a href='admin_gift1_edit.php?id={$row['donorid']}'>修改</a></td>";
        echo "<td><a href='admin_reader_del.php?id={$row['donorid']}'>删除</a></td>";
        echo "</tr>";
    };
    ?>
</table>
</body>
</html>