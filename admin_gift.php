<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>慈善管理系统 || 个人捐赠礼物记录</title>
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
                <li><a href="admin_gift_add.php">礼物捐赠</a></li>
                <li><a href="admin_gift.php">礼物记录</a></li>
                <li><a href="reader_info.php">个人信息</a></li>
                <li><a href="reader_repass.php">密码修改</a></li>
                <li><a href="index.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<h1 style="text-align: center"><strong>个人捐赠记录管理</strong></h1>
<form  id="query" action="admin_gift.php" method="POST">
    <div id="query">
        <label ><input  name="readerquery" type="text" placeholder="请输入捐赠者姓名或捐赠者ID" class="form-control"></label>
        <input type="submit" value="查询" class="btn btn-default">
    </div>
</form>

<!--mysql功能实现操作-->
<div class="col-xs-2 col-md-offset-5" style="position: relative;top: 15%">
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 style="text-align: center" class="panel-title"><strong>Query功能操作</strong></h3>
    </div>
    <div class="panel-body">
    <h5 style="text-align: center"><a style='color: #AA0000;font-size: larger' href="admin_match_gift.php"><strong>*匹配礼物*</strong></a></h5>
        <?php echo "<a style='color: #AA0000;font-size: larger' href='reader_info_edit.php'><strong></strong></a>"; ?>
    </div>
</div>
</div>

<table  width='100%' class="table table-hover">
    <tr>
        <th>ID</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Date</th>
        <th>Charity ID</th>
        <th>Amount</th>
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
        echo "<td>{$row['date']}</td>";
        echo "<td>{$row['charity_id']}</td>";
        echo "<td>{$row['amount']}</td>";
        echo "<td><a href='donor_gift_edit.php?id={$row['donorid']}'>修改</a></td>";
        echo "</tr>";
    };
    ?>
</table>
</body>
</html>