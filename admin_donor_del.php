<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

</body>
</html>
<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');


$delid=$_GET['id'];
$sqla="select count(*) a from donor where id={$delid};";

$resa=mysqli_query($dbc,$sqla);
var_dump($sqla);
$resulta=mysqli_fetch_array($resa);

if($resulta['a']==1) {
    $sqla = "delete from donor where id={$delid} ;";
    $resa = mysqli_query($dbc, $sqla);

    if ($resa == 1 ) {
        echo "<script>alert('删除成功！')</script>";
        echo "<script>window.location.href='admin_donor.php'</script>";
    }
    else {
        echo "删除失败！";
        echo "<script>window.location.href='admin_donor.php'</script>";
    }
}
else {
    echo "<script>alert('信息不匹配请联系管理员，不能删除！')</script>";
    echo "<script>window.location.href='admin_donor.php'</script>";
}

?>
