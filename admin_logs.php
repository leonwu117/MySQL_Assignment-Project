<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>慈善管理系统 || 捐赠机构管理</title>
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
        <a class="navbar-brand" href="#">慈善管理系统</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
            <li class="active"><a href="admin_index.php">主页</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">捐赠机构管理<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                    <li><a href="admin_charity.php">全部捐赠机构</a></li>
                        <li><a href="admin_charity_add.php">新增捐赠机构</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">捐赠者管理<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_donor.php">全部捐赠者</a></li>
                        <li><a href="admin_donor_add.php">新增捐赠者</a></li>
                    </ul>
                </li>
                <li><a href="admin_logs.php">操作日志管理</a></li>
                <li><a href="admin_repass.php">密码修改</a></li>
                <li><a href="index.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<h1 style="text-align: center"><strong>日志操作查看</strong></h1>
<form  id="query" action="admin_logs.php" method="POST">
    <div id="query">
        <label ><input  name="charityquery" type="text" placeholder="请输入ID查询日志" class="form-control"></label>
        <input type="submit" value="查询" class="btn btn-default">
    </div>
</form>

<table  width='100%' class="table table-hover">
    <tr>
        <th>数据库用户登录名</th>
        <th>时间</th>
        <th>主键ID</th>
        <th>详细操作日志</th>
    </tr>
    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$gjc = $_POST["charityquery"];

    
    $sql="select * from logs where (  id like '%{$gjc}%');";
}
else{
    $sql="select * from logs order by date desc;";
}


$res=mysqli_query($dbc,$sql);
foreach ($res as $row){
    echo "<tr>";
    echo "<td>$username</td>";
    echo "<td>{$row['date']}</td>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['test']}</td>";
    echo "</tr>";
};
?>
</table>
</body>
</html>