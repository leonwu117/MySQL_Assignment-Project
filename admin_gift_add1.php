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
<h1 style="text-align: center"><strong>捐赠礼物</strong></h1>
<h3 style="text-align: center"><strong>捐赠者ID:<?php echo $donorid?></strong></h3><br/>
<h3 style="text-align: center"><strong>捐赠者姓名:<?php echo $resultb['donorlastname']?><?php echo $resultb['donorfirstname']?></strong></h3><br/>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_gift_add1.php?id=<?php echo $donorid; ?>" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">Date</span><input name="ndate" value="<?php echo $resultb['date'] ;?>" type="text" placeholder="请输入Date" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Charity ID</span><input name="ncid" value="<?php echo $resultb['charity_id'] ;?>" type="text" placeholder="请输入Charity ID" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Amount</span><input name="namount" value="<?php echo $resultb['amount'] ;?>" type="text" placeholder="请输入Amount" class="form-control"></div><br/>
            <input type="submit" value="捐赠" class="btn btn-default">
            <input type="reset" value="重置" class="btn btn-default">
        </div>
    </form>
</div>

<?php
$nlname=$resultb['donorlastname'];
$nfname=$resultb['donorfirstname'];
$ndate=$resultb['date'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $donid=$_GET['id'];

    //$nnid = $_POST["nid"];
    //$nlnam= $_POST["nlname"];
    //$nfnam= $_POST["nfname"];
    $nadd = $_POST["ndate"];
    $ncid= $_POST["ncid"];
    $namount= $_POST["namount"];



    $delid=$_GET['id'];
    $sqla="select count(*) a from donor where id={$delid};";
    $resa=mysqli_query($dbc,$sqla);
    $resulta=mysqli_fetch_array($resa);

    
    if($resulta['a']==1) {
        $sqla="update gift set date='{$nadd}', charity_id={$ncid} where donorid=$donid;";
        //var_dump( $sqla);
        $resa=mysqli_query($dbc,$sqla);
        $sqlb="insert into gift VALUES ($donorid ,{$ncid},'{$nlname}','{$nfname}','{$ndate}',$namount)";
        $resb=mysqli_query($dbc,$sqlb);
        //var_dump( $sqlb);
        // $sqlc="update gift set donorid='{$nnid}',donorlastname='{$nlnam}' ,donorfirstname='{$nfnam}'where donorid=$donid;";
        // $resc=mysqli_query($dbc,$sqlc);
    
        if ($resa==1&&$resb==1) {
            echo "<script>alert('捐赠成功！')</script>";
            echo "<script>window.location.href='admin_gift_add.php'</script>";
        }
        else {
            echo "捐赠失败！";
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
