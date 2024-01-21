<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$donorid=$_GET['id'];

$sqlb="select * from gift where donorid={$donorid}";
$resb=mysqli_query($dbc,$sqlb);
$resultb=mysqli_fetch_array($resb);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>慈善管理系统 || 捐赠者记录查看</title>
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
            <li><a href="admin_donor.php">返回</a></li>
            </ul>
        </div>
    </div>
</nav>
<h1 style="text-align: center"><strong>捐赠者记录查看</strong></h1><br/>
<h3 style="text-align: center"><strong>现在查看的捐赠者ID:<?php echo $donorid; ?></strong></h3>
<div style="padding: 10px 500px 10px;">
</form>
<table  width='100%' class="table table-hover">
    <tr>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Date</th>
        <th>Amount</th>
    </tr>
</div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $gjc = $_POST["readerquery"];

    $sql="select * from gift  where (name like '%{$gjc}%' or id like '%{$gjc}%') ;";

}
else{
    $sql="select * from gift where  donorid={$donorid}";
}


$res=mysqli_query($dbc,$sql);
foreach ($res as $row){
    echo "<tr>";
    echo "<td>{$row['donorlastname']}</td>";
    echo "<td>{$row['donorfirstname']}</td>";
    echo "<td>{$row['date']}</td>";
    echo "<td>{$row['amount']}</td>";
    //echo "<td><a href='admin_gift1_edit.php?id={$row['donorid']}'>修改</a></td>";
    //echo "<td><a href='admin_report_del.php?id={$row['donorid']}'>删除</a></td>";
    echo "</tr>";
};

?>
</body>
</html>
