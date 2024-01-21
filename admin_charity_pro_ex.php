<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>慈善管理系统 || 捐赠机构项目费用排序</title>
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
                <li><a href="admin_charity.php">返回</a></li>
            </ul>
        </div>
    </div>
</nav>
<h1 style="text-align: center"><strong>根据项目费用从最高到最低排列慈善机构</strong></h1>
<form  id="query" action="admin_charity_pro_ex.php" method="POST">
    <div id="query">
        <label ><input  name="charityquery" type="text" placeholder="请输入名字以查询" class="form-control"></label>
        <input type="submit" value="查询" class="btn btn-default">
    </div>
</form>

<table  width='100%' class="table table-hover">
    <tr>
        <th>Program</th>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
        <th>Telephone</th>
        <th>2005 Revenue</th>
        <th>Admin</th>
        <th>Fundraising</th>
    </tr>
    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$gjc = $_POST["charityquery"];

    
    $sql="select * from charity where ( name like '%{$gjc}%' or id like '%{$gjc}%') ;";
}
else{
    $sql="select * from charity order by program desc ;";
}


$res=mysqli_query($dbc,$sql);
foreach ($res as $row){
    echo "<tr>";
    echo "<td>{$row['program']}</td>";
    echo "<td>{$row['name']}</td>";
    echo "<td>{$row['address']}</td>";
    echo "<td>{$row['city']}</td>";
    echo "<td>{$row['state']}</td>";
    echo "<td>{$row['zip']}</td>";
    echo "<td>{$row['telephone']}</td>";
    echo "<td>{$row['2005revenue']}</td>";
    echo "<td>{$row['admin']}</td>";
    echo "<td>{$row['fundraising']}</td>";
    echo "</tr>";
};
?>
</table>
</body>
</html>