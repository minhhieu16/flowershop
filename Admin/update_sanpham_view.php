<?php
 	include('../Model/ketnoi.php');
	$db = new database();
	$db->connect();
	include('../Control/sanpham_class.php');
	$sanpham= new sanpham_class();

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
    <h4 class="card-title "><strong>Cập nhật</strong> Tin Tức về hoa</h4>
<p class="card-category"> Cập nhật lại 1 hoặc tất cả tại đây</p>
</div>
<div class="card-body">
<form id="capnhat" name="capnhat" method="post" enctype="multipart/form-data">
<a href="sanpham.php" > <input type="button" class="btn btn-info" name="insert" value=" trở lại"></a>
<?php

if ( isset( $_REQUEST[ 'chon' ] ) ) {
$id = $_REQUEST[ 'chon' ];
$N = count( $id );
for ( $i = 0; $i < $N; $i++ )
{
foreach ( $sanpham->select_ID_sanpham_control( $id[ $i ] ) as $u ) 
{	echo '

<input type="text" class="form-control col-md-6" value = "Mã sản phẩm '.$u[ 'MaSP' ].'">
<input type="hidden" name="masp[]" value = "'.$u[ 'MaSP' ] . '">
<table width="100%" border="0">
  <tbody>
    <tr>
      <td style="text-align: left">
      <strong>Tên sản phẩm  </strong>:     </td>
      <td><input class="form-control" type="text" name="tensp[]" ></td>
      <td style="text-align: left"><strong>Mô tả:</strong></td>
      <td><textarea class="form-control" required name="mota[]" rows="2" cols="60" id=""></textarea></td>
      <td style="text-align: left"><strong>Mã loại sản phẩm</strong>:   </td>
    
    <td style="text-align: center"> 
<select name="maloaisp[]" id="select" required class="custom-select ">';}
 foreach ($sanpham->select_sanpham_maloaisp_c() as $u)
  {
    echo "<option value=".$u['MaLoaiSP']." >" . $u['TenLoaiSP'] . "</option>";
  }

foreach ( $sanpham->select_ID_sanpham_control( $id[ $i ] ) as $u ) 
{	echo '
</select><br>
    
       </span></td>
      <td width="11%" rowspan="2" style="text-align: center"><input type="submit" class="btn btn-success" name="gui" value="Thêm" ></td>
    </tr>
    <tr>
      <td width="12%" style="text-align: left"><strong>Giá sản phẩm</strong>:     </td>
      <td width="11%">
		   <input class="form-control" type="text" required name="giasp[]" id="">
		   
       </td>
      <td width="7%" style="text-align: left"><strong>Mô tả chi tiết:</strong></td>
      <td width="32%"><textarea class="form-control" name="motact[]" rows="6" cols="60" id="textarea"></textarea></td>
      <td width="11%" style="text-align: left">
       <strong>Hình sản phẩm</strong>:        <br>      </td>
      <td width="16%"><br>
      <img src="../Data/images/SanPham/'.$u['Hinh'].'" width="100px" height="100px" >
        <input class="form-control" type="file" accept=".jpg,.gif,.png" onChange="kiemtraImg()" required  name="hinhsp[]" id="hinh"  multiple="multiple">
        
        </td>
      </tr>
  </tbody>
</table>
			';

}
}
}
if ( isset( $_REQUEST[ 'capnhapthuong' ] ) ) {
$id = $_REQUEST[ 'capnhapthuong' ];

foreach ( $sanpham->select_ID_sanpham_control( $id ) as $u ) 
{	echo '

<input type="text" class="form-control col-md-6" value = "Mã sản phẩm '.$u[ 'MaSP' ].'">
<input type="hidden" name="masp[]" value = "'.$u[ 'MaSP' ] . '">
<table width="100%" border="0">
  <tbody>
    <tr>
      <td style="text-align: left">
      <strong>Tên sản phẩm  </strong>:     </td>
      <td><input class="form-control" type="text" name="tensp[]" ></td>
      <td style="text-align: left"><strong>Mô tả:</strong></td>
      <td><textarea class="form-control" required name="mota[]" rows="2" cols="60" id=""></textarea></td>
      <td style="text-align: left"><strong>Mã loại sản phẩm</strong>:   </td>
    
    <td style="text-align: center"> 
<select name="maloaisp[]" id="select" required class="custom-select ">';}
 foreach ($sanpham->select_sanpham_maloaisp_c() as $u)
  {
    echo "<option value=".$u['MaLoaiSP']." >" . $u['TenLoaiSP'] . "</option>";
  }

foreach ( $sanpham->select_ID_sanpham_control( $id ) as $u ) 
{	echo '
</select><br>
    
       </span></td>
      <td width="11%" rowspan="2" style="text-align: center"><input type="submit" class="btn btn-success" name="gui" value="Thêm" ></td>
    </tr>
    <tr>
      <td width="12%" style="text-align: left"><strong>Giá sản phẩm</strong>:     </td>
      <td width="11%">
		   <input class="form-control" type="text" required name="giasp[]" id="">
		   
       </td>
      <td width="7%" style="text-align: left"><strong>Mô tả chi tiết:</strong></td>
      <td width="32%"><textarea class="form-control" name="motact[]" rows="6" cols="60" id="textarea"></textarea></td>
      <td width="11%" style="text-align: left">
       <strong>Hình sản phẩm</strong>:        <br>      </td>
      <td width="16%"><br>
      <img src="../Data/images/SanPham/'.$u['Hinh'].'" width="100px" height="100px" >
        <input class="form-control" type="file" accept=".jpg,.gif,.png" onChange="kiemtraImg()" required  name="hinhsp[]" id="hinh"  multiple="multiple">
        
        </td>
      </tr>
  </tbody>
</table>
			';

}

}
    
 $masp = isset($_REQUEST['masp'])?$_REQUEST['masp']:'';
		$giasp = isset($_REQUEST['giasp'])?$_REQUEST['giasp']:'';
		$mota = isset($_REQUEST['mota'])?$_REQUEST['mota']:'';
		$motact= isset($_REQUEST['motact'])?$_REQUEST['motact']:'';
		$tensp=isset($_REQUEST['tensp'])?$_REQUEST['tensp']:'';
		$maloaisp =isset($_REQUEST['maloaisp'])?$_REQUEST['maloaisp']:'';
		if(isset($_FILES['hinhsp']))
		{
			$name_hinh = $_FILES['hinhsp']['name'];
			$local_hinh =$_FILES['hinhsp']['tmp_name'];	
		}
if ( isset( $_REQUEST[ 'gui_tatca' ] ) )
{
    $masp = isset($_REQUEST['masp'])?$_REQUEST['masp']:'';
		$giasp = isset($_REQUEST['giasp'])?$_REQUEST['giasp']:'';
		$mota = isset($_REQUEST['mota'])?$_REQUEST['mota']:'';
		$motact= isset($_REQUEST['motact'])?$_REQUEST['motact']:'';
		$tensp=isset($_REQUEST['tensp'])?$_REQUEST['tensp']:'';
		$maloaisp =isset($_REQUEST['maloaisp'])?$_REQUEST['maloaisp']:'';
		if(isset($_FILES['hinhsp']))
		{
			$name_hinh = $_FILES['hinhsp']['name'];
			$local_hinh =$_FILES['hinhsp']['tmp_name'];	
			$sanpham->update_sanpham_control( $masp,$tensp,$giasp,$mota,$motact,$maloaisp,$name_hinh,$local_hinh);
		}

}
if ( isset( $_REQUEST[ 'gui' ] ) ) 
{
   $masp = isset($_REQUEST['masp'])?$_REQUEST['masp']:'';
		$giasp = isset($_REQUEST['giasp'])?$_REQUEST['giasp']:'';
		$mota = isset($_REQUEST['mota'])?$_REQUEST['mota']:'';
		$motact= isset($_REQUEST['motact'])?$_REQUEST['motact']:'';
		$tensp=isset($_REQUEST['tensp'])?$_REQUEST['tensp']:'';
		$maloaisp =isset($_REQUEST['maloaisp'])?$_REQUEST['maloaisp']:'';
		if(isset($_FILES['hinhsp']))
		{
			$name_hinh = $_FILES['hinhsp']['name'];
			$local_hinh =$_FILES['hinhsp']['tmp_name'];	
			$sanpham->update_sanpham_control( $masp,$tensp,$giasp,$mota,$motact,$maloaisp,$name_hinh,$local_hinh);
		}

}
?>
<a href="sanpham.php" > <input type="button" class="btn btn-info" name="insert" value=" trở lại"></a>


<input type="submit" class="btn btn-success" id="submit"  name="gui_tatca" value="Cập nhật tất cả">
</form>
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

