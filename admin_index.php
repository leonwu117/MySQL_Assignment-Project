<?php
    //session_start();
    header("content-type:text/html;charset=utf-8");
    //连接数据库
    $link = mysqli_connect("localhost", "root", "", "bjiu");
    if (!$link) {
        die("连接失败: " . mysqli_connect_error());
    }
    //接收表名
    $tablename = "ord_detail";
    //查看属性名
    $_sql = "DESC $tablename";
    $_result = mysqli_query($link, $_sql);
    $_num = mysqli_num_rows($_result);

    $arr[0] = '12';
    $type[0] = '12';

    //获取属性名
    for ($i = 0; $i < $_num; $i++) {
        $row = $_result->fetch_assoc();
        $arr[$i] = $row["Field"];
        $type[$i] = $row["Type"];
    }

    $_arr[0] = '12';
    for ($i = 0; $i < $_num; $i++) {
        $_arr[$i] = $_POST[$arr[$i]];
    }

    $rowname = '12';

    if (strpos($type[0], 'char') !== false) {
        $rowname = "'" . $_arr[0] . "'";
    } else if (strpos($type[0], 'int') !== false) {
        $rowname = (int)$_arr[0];
    } else if (strpos($type[0], 'decimal') !== false) {
        $rowname = (float)$_arr[0];
    } else if (strpos($type[0], 'datetime') !== false) {
        $rowname = "'" . $_arr[0] . "'";
    }

    //添加数据
    $_sql = "insert into $tablename ($arr[0]) values ($rowname)";
    $result = mysqli_query($link, $_sql);

    if ($result) {
        for ($i = 1; $i < $_num; $i++) {
            if (strpos($type[$i], 'char') !== false) {
                $_sql = "update $tablename set $arr[$i] = '$_arr[$i]' where $arr[0]=$rowname ";
                $_result = mysqli_query($link, $_sql);
            } else if (strpos($type[$i], 'int') !== false) {
                $temp = (int)$_arr[$i];
                $_sql = "update $tablename set $arr[$i] = $temp where $arr[0]=$rowname ";
                $_result = mysqli_query($link, $_sql);
            } else if (strpos($type[$i], 'decimal') !== false) {
                $temp = (float)$_arr[$i];
                $_sql = "update $tablename set $arr[$i] = $temp where $arr[0]=$rowname ";
                $_result = mysqli_query($link, $_sql);
            } else if (strpos($type[$i], 'datetime') !== false) {
                $_sql = "update $tablename set $arr[$i] = '$_arr[$i]' where $arr[0]=$rowname ";
                $_result = mysqli_query($link, $_sql);
            }
        }
    }

    mysqli_close($link); //关闭数据库
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加完成</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column;
        }

        h3 {
            color: #333;
        }

        form {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            margin: 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
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
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">捐赠机构管理<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="admin_charity.php">全部捐赠机构</a></li>
                            <li><a href="admin_charity_add.php">新增捐赠机构</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">捐赠者管理<b class="caret"></b></a>
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

    <?php
    if ($result) {
        echo '<h3>购买成功</h3>';
        echo '<form action="check2.php" method="post">
            <button type="submit" name="tablename" value="' . $tablename . '">返回</button>
            </form>';
    } else {
        echo '<h3>购买失败</h3>';
        echo '<form action="check2.php" method="post">
            <button type="submit" name="tablename" value="' . $tablename . '">返回</button>
            </form>';
    }
    ?>
</body>
</html>
