<?php
		error_reporting(0);
		session_start();
		if ($_COOKIE["auth"] != "admin_in") {header("location:"."./");}
			include("includes/connect.php");
			include("includes/data.php");
			?>
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="author" content="@housamz">

				<meta name="description" content="Mass Admin Panel">
				<title>Library Admin Panel</title>
				<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-h21C2fcDk/eFsW9sC9h0dhokq5pDinLNklTKoxIZRUn3+hvmgQSffLLQ4G4l2eEr" crossorigin="anonymous">

				<!-- Custom CSS -->
				<link rel="stylesheet" href="includes/style.css">
				<link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />

				<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
				<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
				<!--[if lt IE 9]>
					<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
					<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
				<![endif]-->
			</head>

			<body>

			<div class="wrapper">
				<!-- Sidebar Holder -->
				<nav id="sidebar" class="bg-primary">
					<div class="sidebar-header">
						<h3>
							Library Admin Panel<br>
							<i id="sidebarCollapse" class="glyphicon glyphicon-circle-arrow-left"></i>
						</h3>
						<strong>
							Library<br>
							<i id="sidebarExtend" class="glyphicon glyphicon-circle-arrow-right"></i>
						</strong>
					</div><!-- /sidebar-header -->

					<!-- start sidebar -->
					<ul class="list-unstyled components">
						<li>
							<a href="home.php" aria-expanded="false">
								<i class="glyphicon glyphicon-home"></i>
								Home
							</a>
						</li>
			<li><a href="admin.php"> <i class="glyphicon glyphicon-tent"></i>Admin <span class="pull-right"><?=counting("admin", "id")?></span></a></li>
<li><a href="book_info.php"> <i class="glyphicon glyphicon-circle-arrow-down"></i>Book_info <span class="pull-right"><?=counting("book_info", "id")?></span></a></li>
<li><a href="charity.php"> <i class="glyphicon glyphicon-warning-sign"></i>Charity <span class="pull-right"><?=counting("charity", "id")?></span></a></li>
<li><a href="class_info.php"> <i class="glyphicon glyphicon-ok"></i>Class_info <span class="pull-right"><?=counting("class_info", "id")?></span></a></li>
<li><a href="donor.php"> <i class="glyphicon glyphicon-plane"></i>Donor <span class="pull-right"><?=counting("donor", "id")?></span></a></li>
<li><a href="gift.php"> <i class="glyphicon glyphicon-scale"></i>Gift <span class="pull-right"><?=counting("gift", "id")?></span></a></li>
<li><a href="lend_list.php"> <i class="glyphicon glyphicon-unchecked"></i>Lend_list <span class="pull-right"><?=counting("lend_list", "id")?></span></a></li>
<li><a href="logs.php"> <i class="glyphicon glyphicon-knight"></i>Logs <span class="pull-right"><?=counting("logs", "id")?></span></a></li>
<li><a href="reader_card.php"> <i class="glyphicon glyphicon-cloud-download"></i>Reader_card <span class="pull-right"><?=counting("reader_card", "id")?></span></a></li>
<li><a href="reader_info.php"> <i class="glyphicon glyphicon-dashboard"></i>Reader_info <span class="pull-right"><?=counting("reader_info", "id")?></span></a></li>
<li><a href="users.php"> <i class="glyphicon glyphicon-leaf"></i>Users <span class="pull-right"><?=counting("users", "id")?></span></a></li>
<li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
				</ul>

				<div class="visit">
					<p class="text-center">Created using MAGE &hearts;</p>
					<a href="https://github.com/housamz/php-mysql-admin-panel-generator" target="_blank" >Visit Project</a>
				</div>
			</nav><!-- /end sidebar -->

			<!-- Page Content Holder -->
			<div id="content">