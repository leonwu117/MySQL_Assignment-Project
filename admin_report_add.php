<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>慈善管理系统 || 新增捐赠记录</title>
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
                <li><a href="admin_gift_add.php">返回</a></li>
            </ul>
        </div>
    </div>
</nav>
<h1 style="text-align: center"><strong>新增捐赠记录</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_report_add.php" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">ID</span><input name="nid" type="text" placeholder="请输入ID号" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Last Name</span><input name="dlname" type="text" placeholder="请输入Last name" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">First Name</span><input name="dfname" type="text" placeholder="请输入First name" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Date</span><input name="ddate" type="text" placeholder="请输入Date" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Amount</span><input name="damount" type="text" placeholder="请输入Amount" class="form-control"></div><br/>
            <input type="submit" value="添加" class="btn btn-default">
            <input type="reset" value="重置" class="btn btn-default">
        </div>
    </form>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nnid = $_POST["nid"];
    $nlname= $_POST["dlname"];
    $nfname = $_POST["dfname"];
    $ndate= $_POST["ddate"];
    $namount= $_POST["damount"];


    $sqla="insert into gift VALUES ($nnid ,'{$nlname}','{$nfname}','{$ndate}',$namount)";
    //var_dump( $sqla);
    //$sqlb="insert into donor VALUES ($nnid ,'{$nlname}','{$nfname}')";
     $resa=mysqli_query($dbc,$sqla);
    // $resb=mysqli_query($dbc,$sqlb);


    if($resa==1)
    {

        echo "<script>alert('$nnid 号的新捐赠记录添加成功！')</script>";
        echo "<script>window.location.href='admin_donor.php'</script>";

    }
    else
    {
        echo "<script>alert('添加失败！请重新输入！');</script>";

    }

}


?>
</body>
</html>
