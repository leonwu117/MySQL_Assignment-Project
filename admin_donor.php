<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>慈善管理系统 || 捐赠者管理</title>
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
<h1 style="text-align: center"><strong>全部捐赠者</strong></h1>
<form  id="query" action="admin_donor.php" method="POST">
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
    <h5 style="text-align: center"><a style='color: #AA0000;font-size: larger' href="admin_donor_category.php"><strong>*按'请求'类别列出捐赠者*</strong></a></h5>
    <h5 style="text-align: center"><a style='color: #AA0000;font-size: larger' href="admin_donor_fre.php"><strong>*捐赠者捐赠频率*</strong></a></h5>

        <?php echo "<a style='color: #AA0000;font-size: larger' href='reader_info_edit.php'><strong></strong></a>"; ?>
    </div>
</div>
</div>

<table  width='100%' class="table table-hover">
    <tr>
        <th>ID</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
        <th>Telephone</th>
        <th>查看</th>
        <th>操作</th>
        <th>操作</th>
    </tr>
    <?php



    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $gjc = $_POST["readerquery"];

        $sql="select * from donor  where (lastname like '%{$gjc}%' or id like '%{$gjc}%' or firstname like '%{$gjc}%') ;";

    }
    else{
        $sql="select * from donor";
    }


    $res=mysqli_query($dbc,$sql);
    foreach ($res as $row){
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['address']}</td>";
        echo "<td>{$row['city']}</td>";
        echo "<td>{$row['state']}</td>";
        echo "<td>{$row['zip']}</td>";
        echo "<td>{$row['telephone']}</td>";
        echo "<td><a href='admin_person_gift.php?id={$row['id']}'>记录</a></td>";
        echo "<td><a href='admin_reader_edit.php?id={$row['id']}'>修改</a></td>";
        echo "<td><a href='admin_donor_del.php?id={$row['id']}'>删除</a></td>";
        echo "</tr>";
    };
    ?>
</table>
</body>
</html>