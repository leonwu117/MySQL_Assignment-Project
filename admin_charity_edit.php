<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$xgid=$_GET['id'];

$sqlb="select * from charity where id={$xgid}";
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
    <title>慈善管理系统 || 机构信息修改</title>
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

<h1 style="text-align: center"><strong>机构信息修改</strong></h1>
<h3 style="text-align: center"><strong>现在修改的机构ID:<?php echo $resultb['id']; ?></strong></h3>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_charity_edit.php?id=<?php echo $xgid; ?>"  method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
    <div id="login">
        <div class="input-group"><span  class="input-group-addon">Category</span><input value="<?php echo $resultb['category']; ?>" name="ncategory" type="text" placeholder="请输入修改的category" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">Category id</span><input value="<?php echo $resultb['categoryid']; ?>" name="ncategoryid" type="text" placeholder="请输入修改的category id" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">Name</span><input value="<?php echo $resultb['name']; ?>" name="name" type="text" placeholder="请输入修改的name" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">Address</span><input  value="<?php echo $resultb['address']; ?>" name="naddress" type="text" placeholder="请输入新的address" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">City</span><input value="<?php echo $resultb['city']; ?>" name="ncity" type="text" placeholder="请输入修改的city" class="form-control"></div><br/>
        <div class="input-group"><span class="input-group-addon">State</span><input value="<?php echo $resultb['state']; ?>" name="nstate" type="text" placeholder="请输入修改的state" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">Zip</span><input value="<?php echo $resultb['zip']; ?>" name="nzip" type="text" placeholder="请输入修改的zip" class="form-control"></div><br/>
        <div class="input-group"><span class="input-group-addon">Telephone</span><input  value="<?php echo $resultb['telephone']; ?>" name="ntelephone" type="text" placeholder="请输入修改的telephone number" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">2005 Revenue</span><input value="<?php echo $resultb['2005revenue']; ?>" name="n2005" type="text" placeholder="请输入修改的2005 revenue" class="form-control"></div><br/>
        <div class="input-group"><span class="input-group-addon">Program</span><input value="<?php echo $resultb['program']; ?>" name="nprogram" type="text" placeholder="请输入修改的program" class="form-control"></div><br/>
        <div class="input-group"><span class="input-group-addon">Admin</span><input value="<?php echo $resultb['admin']; ?>" name="nadmin" type="text" placeholder="请输入修改的admin" class="form-control"></div><br/>
        <div class="input-group"><span class="input-group-addon">Fundraising</span><input value="<?php echo $resultb['fundraising']; ?>" name="nfundraising" type="text" placeholder="请输入修改的fundrasing" class="form-control"></div><br/>
        <label><input type="submit" value="确认" class="btn btn-default"></label>
        <label><input type="reset" value="重置" class="btn btn-default"></label>
    </div>
    </form>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $boid=$_POST["ncategory"];
    $ncate = $_POST["ncategory"];
    $ncateid = $_POST["ncategoryid"];
    $nname = $_POST["name"];
    $naddre = $_POST["naddress"];
    $nci = $_POST["ncity"];
    $nsta = $_POST["nstate"];
    $nzi = $_POST["nzip"];
    $ntel = $_POST["ntelephone"];
    $n200= $_POST["n2005"];
    $npro = $_POST["nprogram"];
    $nad= $_POST["nadmin"];
    $nfun= $_POST["nfundraising"];



    $sqla="update charity set category='{$ncate}',categoryid='{$ncateid}',
name='{$nname}',address='{$naddre}',city='{$nci}',state='{$nsta}',zip='{$nzi}',
telephone='{$ntel}',2005revenue={$n200},program={$npro},admin={$nad},fundraising={$nfun} where id=$xgid;";
var_dump($sqla);
    $resa=mysqli_query($dbc,$sqla);


    if($resa==1)
    {

        echo "<script>alert('修改成功！')</script>";
        echo "<script>window.location.href='admin_charity.php'</script>";

    }
    else
    {
        echo "<script>alert('修改失败！请重新输入！');</script>";

    }

}


?>
</body>
</html>
