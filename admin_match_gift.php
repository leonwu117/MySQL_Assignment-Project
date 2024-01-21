<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>慈善管理系统 || 匹配礼物</title>
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
                <li><a href="admin_gift.php">返回</a></li>
            </ul>
        </div>
    </div>
</nav>
<h1 style="text-align: center"><strong>匹配礼物</strong></h1>
<form  id="query" action="admin_match_gift.php" method="POST">
    <div id="query">
        <label ><input  name="readerquery" type="text" placeholder="请输入捐赠者姓名或捐赠者ID" class="form-control"></label>
        <input type="submit" value="查询" class="btn btn-default">
    </div>
</form>

<table  width='100%' class="table table-hover">
    <tr>
        <th>Charity Name</th>
        <th>Date</th>
        <th>Amount</th>
        <th>Matched amount</th>
        <th>Total Donation</th>
    </tr>
    <?php



    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $gjc = $_POST["readerquery"];

        $sql="select charity.name cname,gift.date date,gift.amount amount , AVG(gift.amount) avg_amount,SUM(gift.amount) sum_amount
        from charity as charity 
        join gift as gift on gift.charity_id=charity.id 
        join donor as donor on gift.donorid=donor.id  
        where (charity.id like '%{$gjc}%' or charity.name like '%{$gjc}%' or donor.lastname like '%{$gjc}%' or donor.firstname like '%{$gjc}%')
        group by gift.donorid order by amount desc " ;

    }
    else{
        $sql="select charity.name cname,gift.date date,gift.amount amount ,AVG(gift.amount) avg_amount,SUM(gift.amount) sum_amount
        from charity as charity 
        join gift as gift on gift.charity_id=charity.id 
        join donor as donor on gift.donorid=donor.id  
        group by gift.donorid order by amount desc " ;
    }


    $res=mysqli_query($dbc,$sql);
    foreach ($res as $row){
        echo "<tr>";
        echo "<td>{$row['cname']}</td>";
        echo "<td>{$row['date']}</td>";
        echo "<td>{$row['amount']}</td>";
        echo "<td>{$row['avg_amount']}</td>";
        echo "<td>{$row['sum_amount']}</td>";
        
        echo "</tr>";
    };
    ?>
</table>
</body>
</html>