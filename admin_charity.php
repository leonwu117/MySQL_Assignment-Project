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

<h1 style="text-align: center"><strong>全部机构</strong></h1>
<form  id="query" action="admin_charity.php" method="POST">
    <div id="query">
        <label ><input  name="charityquery" type="text" placeholder="请输入机构ID或名字以查询" class="form-control"></label>
        <input type="submit" value="查询" ul class="btn btn-default">
    </div>
</form>
<!--mysql功能实现操作-->
<div class="col-xs-2 col-md-offset-5" style="position: relative;top: 15%">
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 style="text-align: center" class="panel-title"><strong>Query功能操作</strong></h3>
    </div>
    <div class="panel-body">
    <h5 style="text-align: center"><a style='color: #AA0000;font-size: larger' href="admin_charity_pro_ex.php"><strong>*按项目费用排序*</strong></a></h5>
    <h5 style="text-align: center"><a style='color: #AA0000;font-size: larger' href="admin_charity_top.php"><strong>*慈善机构的顶级捐赠者*</strong></a></h5>

        <?php echo "<a style='color: #AA0000;font-size: larger' href='reader_info_edit.php'><strong></strong></a>"; ?>
    </div>
</div>
</div>

<table  width='100%' class="table table-hover">
    <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Category ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
        <th>Telephone</th>
        <th>2005 Revenue</th>
        <th>Program</th>
        <th>Admin</th>
        <th>Fundraising</th>
        <th>操作</th>
        <th>操作</th>
    </tr>
    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$gjc = $_POST["charityquery"];

    
    $sql="select * from charity where ( name like '%{$gjc}%' or id like '%{$gjc}%');";
}
else{
    $sql="select * from charity ;";
}


$res=mysqli_query($dbc,$sql);
foreach ($res as $row){
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['category']}</td>";
    echo "<td>{$row['categoryid']}</td>";
    echo "<td>{$row['name']}</td>";
    echo "<td>{$row['address']}</td>";
    echo "<td>{$row['city']}</td>";
    echo "<td>{$row['state']}</td>";
    echo "<td>{$row['zip']}</td>";
    echo "<td>{$row['telephone']}</td>";
    echo "<td>{$row['2005revenue']}</td>";
    echo "<td>{$row['program']}</td>";
    echo "<td>{$row['admin']}</td>";
    echo "<td>{$row['fundraising']}</td>";

    //操作
    echo "<td><a href='admin_charity_edit.php?id={$row['id']}'>修改</a></td>";
    echo "<td><a href='admin_charity_del.php?id={$row['id']}'>删除</a></td>";
    echo "</tr>";
};
?>
</table>
</body>
</html>