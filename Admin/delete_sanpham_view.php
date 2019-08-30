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
<h4 class="card-title ">Sản Phẩm về hoa</h4>
<p class="card-category">Bạn xóa rồi thì không thể khôi phục lại được nữa !</p>
</div>
<div class="card-body">
    
 <h2> Bạn đã xóa các tin tức sau </h2>
<?php

include( '../Control/sanpham_class.php' );
$sanpham = new sanpham_class();
if(isset($_REQUEST['chon']))
{
$id = $_REQUEST['chon'];
$N = count($id);

    for($i=0; $i < $N; $i++)
    {
    echo 'tin tức có mã là : '.$id[$i].'<br>';
    $sanpham->delete_sanpham_control($id[$i]);
    
    }
    
}
if(isset($_REQUEST['xoathuong']))
{
    $id = $_REQUEST['xoathuong'];
    echo 'tin tức có mã là : '.$id.'<br>';
    
    $sanpham->delete_sanpham_control($id);

}

?>
       <a href="sanpham.php"> <input type="button" class="btn btn-info" name="insert" value=" trở lại" ></a>

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