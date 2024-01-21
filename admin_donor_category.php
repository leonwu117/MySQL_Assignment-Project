<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>慈善管理系统 || 类别列出捐赠者</title>
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
                <li><a href="admin_donor.php">返回</a></li>
            </ul>
        </div>
    </div>
</nav>
<h1 style="text-align: center"><strong>按'请求'类别列出捐赠者</strong></h1>
<form  id="query" action="admin_donor_category.php" method="POST">
    <div id="query">
        <label ><input  name="readerquery" type="text" placeholder="类别查询:Animals 或者 Environment" class="form-control"></label>
        <input type="submit" value="查询" class="btn btn-default">
    </div>
</form>

<table  width='100%' class="table table-hover">
    <tr>
        <th>Category</th>
        <th>Donor Last Name</th>
        <th>Donor First Name</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
        <th>Telephone</th>
    </tr>
    <?php



    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $gjc = $_POST["readerquery"];

        $sql="select * from donor  where (category like '%{$gjc}%') ;";

    }
    else{
        $sql="select * from donor";
    }


    $res=mysqli_query($dbc,$sql);
    foreach ($res as $row){
        echo "<tr>";
        echo "<td>{$row['category']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['address']}</td>";
        echo "<td>{$row['city']}</td>";
        echo "<td>{$row['state']}</td>";
        echo "<td>{$row['zip']}</td>";
        echo "<td>{$row['telephone']}</td>";
        echo "</tr>";
    };
    ?>
</table>
</body>
</html>