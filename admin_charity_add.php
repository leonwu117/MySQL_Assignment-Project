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
    <title>慈善管理系统 || 新增捐赠者</title>
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
<h1 style="text-align: center"><strong>新增捐赠机构</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_charity_add.php" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">ID</span><input name="nid" type="text" placeholder="请输入ID" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Category</span><input name="dcate" type="text" placeholder="请输入Category" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Category ID</span><input name="dcateid" type="text" placeholder="请输入Category ID" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Name</span><input name="dname" type="text" placeholder="请输入Name" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Address</span><input name="dadre" type="text" placeholder="请输入Address" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">City</span><input name="dcity" type="text" placeholder="请输入City" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">State</span><input name="dstate" type="text" placeholder="请输入State" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Zip</span><input name="dzip" type="text" placeholder="请输入Zip" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Telephone</span><input name="dtelephone" type="text" placeholder="请输入Telephone number" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">2005 Revenue</span><input name="d2005" type="text" placeholder="请输入2005 Revenue" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Program</span><input name="dpro" type="text" placeholder="请输入Program" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Admin</span><input name="dadm" type="text" placeholder="请输入Admin" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Fundraising</span><input name="dfun" type="text" placeholder="请输入Fundraising" class="form-control"></div><br/>
            <input type="submit" value="添加" class="btn btn-default">
            <input type="reset" value="重置" class="btn btn-default">
        </div>
    </form>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nnid = $_POST["nid"];
    $ncate= $_POST["dcate"];
    $ncateid= $_POST["dcateid"];
    $nname= $_POST["dname"];
    $nadre= $_POST["dadre"];
    $ncity= $_POST["dcity"];
    $nstate = $_POST["dstate"];
    $nzip = $_POST["dzip"];
    $ntelephone = $_POST["dtelephone"];
    $n2005 = $_POST["d2005"];
    $npro = $_POST["dpro"];
    $nadm= $_POST["dadm"];
    $nfun= $_POST["dfun"];


    $sqla="insert into charity VALUES ($nnid ,'{$ncate}',{$ncateid},'{$nname}',
    '{$nadre}','{$ncity}','{$nstate}',{$nzip},'{$ntelephone}',
    {$n2005},{$npro},{$nadm},{$nfun})";
    var_dump( $sqla);
    //$sqlb="insert into reader_card (reader_id,name) VALUES($nnid ,'{$nnam}');";
    $resa=mysqli_query($dbc,$sqla);
    //$resb=mysqli_query($dbc,$sqlb);


    if($resa==1)
    {

        echo "<script>alert('新捐赠机构添加成功！')</script>";
        echo "<script>window.location.href='admin_charity.php'</script>";

    }
    else
    {
        echo "<script>alert('添加失败！请重新输入！');</script>";

    }

}


?>
</body>
</html>
