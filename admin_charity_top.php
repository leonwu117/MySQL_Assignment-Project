<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>慈善管理系统 || 慈善机构顶级捐赠者</title>
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
<h1 style="text-align: center"><strong>慈善机构的顶级捐赠者</strong></h1>
<form  id="query" action="admin_charity_top.php" method="POST">
    <div id="query">
        <label ><input  name="readerquery" type="text" placeholder="请输入ID或名字以查询" class="form-control"></label>
        <input type="submit" value="查询" class="btn btn-default">
    </div>
</form>

<table  width='100%' class="table table-hover">
    <tr>
        <th>Charity ID</th>
        <th>Charity Name</th>
        <th>Donor Last Name</th>
        <th>Donor First Name</th>
        <th>Total Amount</th>
    </tr>
    <?php



    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $gjc = $_POST["readerquery"];

        $sql="select charity.id charity_id,charity.name charity_name,donor.lastname lastname,donor.firstname firstname, SUM(gift.amount) as amount
        from charity as charity 
        join gift as gift on gift.charity_id=charity.id 
        join donor as donor on gift.donorid=donor.id  
        where (charity.id like '%{$gjc}%' or charity.name like '%{$gjc}%' or donor.lastname like '%{$gjc}%' or donor.firstname like '%{$gjc}%')
        group by gift.donorid order by amount desc " ;
        
        //var_dump( $sql);
        /*
        $sql="select charity_id,charity_name,lastname,firstname, SUM(gift.amount) as amount
        from donor as donor join gift as gift on gift.donorid=donor.id where (charity_id like '%{$gjc}%' or charity_name like '%{$gjc}%') 
        group by gift.donorid order by amount desc ;";
        */ 
    }
    else{
        $sql="select charity.id charity_id,charity.name charity_name,donor.lastname lastname,donor.firstname firstname, SUM(gift.amount) as amount
        from charity as charity 
        join gift as gift on gift.charity_id=charity.id 
        join donor as donor on gift.donorid=donor.id
        group by gift.donorid order by amount desc";
        //$sql="select charity_id,charity_name,lastname,firstname, SUM(gift.amount) as amount
        //from donor as donor join gift as gift on gift.donorid=donor.id group by gift.donorid order by amount desc";
    }


    $res=mysqli_query($dbc,$sql);
    foreach ($res as $row){
        echo "<tr>";
        echo "<td>{$row['charity_id']}</td>";
        echo "<td>{$row['charity_name']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['amount']}</td>";
        echo "</tr>";
    };
    ?>
</table>
</body>
</html>