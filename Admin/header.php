<?php
session_start();
if($_SESSION['Loaitk']!=2)
	{
		echo '<script language="javascript">window.location="../View/index.php"</script>';
	}
error_reporting(0);
?>
<head>
  <meta charset="utf-8" />
<meta http-equiv="refresh" content="">
  <link rel="apple-touch-icon" sizes="76x76" href="../Data/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../Data/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Admin
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="../Data/assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <link href="../Data/assets/demo/demo.css" rel="stylesheet" />
	
	
</head>

