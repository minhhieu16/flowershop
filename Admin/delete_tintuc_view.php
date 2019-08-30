<?php
include('../Model/ketnoi.php');
	$db = new database();
	$db->connect();
?>
<!DOCTYPE html>
<html lang="vn">
<?php include('header.php') ?>
<body class="">
<div class="wrapper ">
<!--Menu admin -->
<?php include('menu.php') ?>
<div class="main-panel">
<?php include('menu2.php') ?>
<!--chưa phần thân code -->

<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header card-header-primary">
<h4 class="card-title ">Tin Tức về hoa</h4>
<p class="card-category"> Here is a subtitle for this table</p>
</div>
<div class="card-body">
    
 <h2> Bạn đã xóa các tin tức sau </h2>
    <?php
 	
	include('../Control/tintuc_class.php');
	$tintuc= new Tintuc_class();
	if(isset($_REQUEST['chon']))
{
	$id = $_REQUEST['chon'];

$N = count($id);
	
for($i=0; $i < $N; $i++)
{
	echo 'tin tức có mã là : '.$id[$i].'<br>';
	$tintuc->delete_tintuc_control($id[$i]);
	
	}}
	if(isset($_REQUEST['xoathuong']))
{
	$id = $_REQUEST['xoathuong'];
echo 'cac id se chon'.$id ;

	$tintuc->delete_tintuc_control($id);
		
	}
    
?>
       <a href="tintuc.php"> <input type="button" class="btn btn-info" value=" trở lại" ></a>

</div>

</div>
</div>

</div>
</div>
</div>


<!--chưa phần thân code -->
<?php include('footer.php') ?>
</div>
</div>
</body>
<?php include('script.php') ?>
</html>