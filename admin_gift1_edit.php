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
    <title>慈善管理系统 || 捐赠者捐赠信息修改</title>
</head>
<body>
<h1 style="text-align: center"><strong>捐赠者捐赠信息修改</strong></h1>
<h3 style="text-align: center"><strong>捐赠者ID:<?php echo $donorid?></strong></h3><br/>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_gift1_edit.php?id=<?php echo $donorid; ?>" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">Donor ID</span><input name="nid" value="<?php echo $resultb['donorid'] ;?>" type="text" placeholder="请输入修改的Donor ID" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Donor Last Name</span><input name="nlname" value="<?php echo $resultb['donorlastname'] ;?>" type="text" placeholder="请输入修改的Donor Last Name" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Donor First Name</span><input name="nfname" value="<?php echo $resultb['donorfirstname'] ;?>" type="text" placeholder="请输入修改的Donor First Name" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Date</span><input name="ndate" value="<?php echo $resultb['date'] ;?>" type="text" placeholder="请输入修改的Date" class="form-control"></div><br/>
            <input type="submit" value="确认" class="btn btn-default">
            <input type="reset" value="重置" class="btn btn-default">
        </div>
    </form>
</div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $donid=$_GET['id'];

    $nnid = $_POST["nid"];
    $nlnam= $_POST["nlname"];
    $nfnam= $_POST["nfname"];
    $nadd = $_POST["ndate"];



    $delid=$_GET['id'];
    $sqla="select count(*) a from donor where id={$delid};";
    
    $resa=mysqli_query($dbc,$sqla);
    $resulta=mysqli_fetch_array($resa);
    
    if($resulta['a']==1) {
        $sqla="update gift set donorid={$nnid},donorlastname='{$nlnam}',donorfirstname='{$nfnam}',
        date='{$nadd}' where donorid=$donid;";
        var_dump( $sqla);
        $resa=mysqli_query($dbc,$sqla);

        // $sqlc="update gift set donorid='{$nnid}',donorlastname='{$nlnam}' ,donorfirstname='{$nfnam}'where donorid=$donid;";
        // $resc=mysqli_query($dbc,$sqlc);
    
        if ($resa == 1 ) {
            echo "<script>alert('用户更新成功！')</script>";
            echo "<script>window.location.href='admin_gift_add.php'</script>";
        }
        else {
            echo "删除失败！";
            echo "<script>window.location.href='admin_gift_add.php'</script>";
        }
    }
    else {
        echo "<script>alert('信息不匹配请联系管理员，不能更新！')</script>";
        echo "<script>window.location.href='admin_gift_add.php'</script>";
    }

}


?>
</body>
</html>
