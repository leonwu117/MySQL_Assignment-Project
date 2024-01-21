<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');
$donorid=$_GET['id'];

$sqlb="select * from donor where id={$donorid}";
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
    <title>慈善管理系统 || 捐赠者信息修改</title>
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

<h1 style="text-align: center"><strong>捐赠者信息修改</strong></h1>
<h3 style="text-align: center"><strong>现在修改的捐赠者ID:<?php echo $resultb['id']; ?></strong></h3>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_reader_edit.php?id=<?php echo $donorid; ?>" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">Last Name</span><input name="nlname" value="<?php echo $resultb['lastname'] ;?>" type="text" placeholder="请输入修改的Last Name" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">First Name</span><input name="nfname" value="<?php echo $resultb['firstname'] ;?>" type="text" placeholder="请输入修改的First Name" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Address</span><input name="naddre" value="<?php echo $resultb['address'] ;?>" type="text" placeholder="请输入修改的Address" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">City</span><input name="ncity" value="<?php echo $resultb['city'] ;?>" type="text" placeholder="请输入修改的City" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">State</span><input name="nsta" value="<?php echo $resultb['state'] ;?>" type="text" placeholder="请输入修改的State" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Zip</span><input name="nzip" value="<?php echo $resultb['zip'] ;?>" type="text" placeholder="请输入修改的Zip" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Telephone</span><input name="ntel" value="<?php echo $resultb['telephone'] ;?>" type="text" placeholder="请输入修改的telephone number" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Charity Name</span><input name="dcn" value="<?php echo $resultb['charity_name'] ;?>" type="text" placeholder="请输入Charity Name" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Charity ID</span><input name="dci" value="<?php echo $resultb['charity_id'] ;?>" type="text" placeholder="请输入Charity Name" class="form-control"></div><br/>
            <input type="submit" value="确认" class="btn btn-default">
            <input type="reset" value="重置" class="btn btn-default">
        </div>
    </form>
</div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nlnam= $_POST["nlname"];
    $nfnam= $_POST["nfname"];
    $nadd = $_POST["naddre"];
    $nci= $_POST["ncity"];
    $nsta= $_POST["nsta"];
    $nzip = $_POST["nzip"];
    $ntel= $_POST["ntel"];
    $ntna = $_POST["dcn"];
    $ntid = $_POST["dci"];


    $sqla="update donor set lastname='{$nlnam}',firstname='{$nfnam}',
    address='{$nadd}',city='{$nci}',state='{$nsta}',zip='{$nzip}',telephone='{$ntel}' ,charity_name='{$ntna}',charity_id={$ntid} where id=$donorid;";
    //var_dump( $sqla);
    $resa=mysqli_query($dbc,$sqla);
    $sqlc="update gift set donorlastname='{$nlnam}' ,donorfirstname='{$nfnam}'where donorid=$donorid;";
    $resc=mysqli_query($dbc,$sqlc);

    if($resa==1&&$resc==1)
    {

        echo "<script>alert('修改成功！')</script>";
        echo "<script>window.location.href='admin_donor.php'</script>";

    }
    else
    {
        echo "<script>alert('修改失败！请重新输入！');</script>";

    }

}


?>
</body>
</html>
