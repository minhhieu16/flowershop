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
<h4 class="card-title ">Sản phẩm về hoa</h4>
<p class="card-category">Danh Sách các sản phẩm về hoa</p>
</div>
<div class="card-body">
<div class="table-responsive">

<form id="DSSP" name="DSSP" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="97%" border="1" class="table table-hover ">
<tbody>
<tr align="center">
<th width="4%" scope="col">STT</th>
<th width="6%" scope="col">Mã SP</th>
<th width="8%" scope="col">Tên SP</th>
<th width="9%" scope="col">Giá</th>
<th width="12%" scope="col">Mô tả </th>
<th width="21%" scope="col">Mô tả chi tiết</th>
<th width="12%" scope="col">Mã loại SP</th>
<th width="9%" scope="col">Hình SP</th>
<th width="12%" scope="col">Hành Động</th>
<th width="7%" scope="col">Chọn</th>

</tr>

<?php

	include('../Control/sanpham_class.php');
	$sanpham= new sanpham_class();
    $stt = 1;
foreach ( $sanpham->danhsach_sp() as $u ) {
    
echo '
<tr align="center">
<td>' . $stt . '</td>
<td>' . $u[ 'MaSP' ] . '</td>
<td>' . $u[ 'TenSP' ] . '</td>
<td>' . $u[ 'Gia' ] . '</td>
<td align="left">' . mb_strimwidth($u[ 'MoTa' ], 0, 20, "...") . '</td>
<td align="left">' .  mb_strimwidth($u[ 'MoTaChiTiet' ], 0, 20, "...") . '</td>
<td>' . $u[ 'MaLoaiSP' ] . '</td>
<td>' .  mb_strimwidth($u[ 'Hinh' ], 0, 20, "...")   . '</td>


<td><a href="chitiet_sanpham.php?chitiet=' . $u[ 'MaSP' ] . '"> xem</a> | <a href="delete_sanpham_view.php?xoathuong=' . $u[ 'MaSP' ] . '">xóa</a> | <a href="update_sanpham_view.php?capnhapthuong=' . $u[ 'MaSP' ] . '">sửa</a></td>
<td>
<div class="form-check">
 <label class="form-check-label">
<input class="form-check-input" type="checkbox" name = "chon[]" value="' . $u[ 'MaSP' ] . '" >
<span class="form-check-sign">
<span class="check"></span>
</span>
</label>
</div >
</td>
</tr> 
';
$stt++;

}

?>


</tbody>
</table>
	
<br>
    <input type="button" id="btn1" class="btn btn-outline-primary" value="Chọn hết"/>|
<input type="button" id="btn2" class="btn btn-outline-primary" value="Bỏ chọn"/>
<br><br>

<input type="button" name="select" class="btn btn-info " value="Xem chi tiết " onClick="setChitietAction()"> | <input type="button" name="delete" class="btn btn-danger "  value="Xóa" onClick="setDeleteAction()">| <input name="update" type="button" value="Sửa" class="btn btn-warning "  onClick="setUpdateAction()"><br>


<script language="javascript">
// Chức năng chọn hết
document.getElementById( "btn1" ).onclick = function () {
// Lấy danh sách checkbox
var checkboxes = document.getElementsByName( 'chon[]' );

// Lặp và thiết lập checked
for ( var i = 0; i < checkboxes.length; i++ ) {
checkboxes[ i ].checked = true;
}
};

// Chức năng bỏ chọn hết
document.getElementById( "btn2" ).onclick = function () {
// Lấy danh sách checkbox
var checkboxes = document.getElementsByName( 'chon[]' );

// Lặp và thiết lập Uncheck
for ( var i = 0; i < checkboxes.length; i++ ) {
checkboxes[ i ].checked = false;
}
};
</script>
<hr>
<p>Chọn số dòng được thêm mới 
<select name="sodong"  class="custom-select col-md-1">>
<option value="1">Chọn </option>
<option value="1">1 </option>
<option value="2">2 </option>
<option value="4">4 </option>
<option value="8">8 </option>
<option value="16">16 </option>
<option value="32">32 </option>
<option value="64">64 </option>
<option value="128">128 </option>
</select>

<input type="button" name="insert" class="btn btn-success" value="Thêm mới" onClick="setInsertAction()"></p>

</form>
<script>
 

function setChitietAction() {
document.DSSP.action = "chitiet_sanpham.php";
document.DSSP.submit();
}

function setInsertAction() {
document.DSSP.action = "insert_sanpham_view.php";
document.DSSP.submit();
}

function setUpdateAction() {
document.DSSP.action = "update_sanpham_view.php";
document.DSSP.submit();
}

function setDeleteAction() {
if ( confirm( "Bạn có muốn xóa nó không?" ) ) {
{
document.DSSP.action = "delete_sanpham_view.php";
document.DSSP.submit();
   
}
}
}
</script>
</div>
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