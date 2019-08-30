<?php
include( '../Model/ketnoi.php' );
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
<div class="table-responsive">

<form id="DSTT" name="DSTT" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="97%" border="1" class="table table-hover ">
<tbody>
<tr align="center">
<th width="4%" scope="col">STT</th>
<th width="6%" scope="col">Mã TT</th>
<th width="8%" scope="col">Ngày Đăng</th>
<th width="9%" scope="col">Ngày Kết Thúc</th>
<th width="12%" scope="col">Tiêu Đề</th>
<th width="21%" scope="col">Nội Dung</th>
<th width="12%" scope="col">Hình TT</th>
<th width="9%" scope="col">Loại TT</th>
<th width="12%" scope="col">Hành Động</th>
<th width="7%" scope="col">Chọn</th>

</tr>

<?php
$stt = 1;

include( '../Control/tintuc_class.php' );
$tintuc = new Tintuc_class();
foreach ( $tintuc->select_danhsach_tintuc_control() as $u ) {
echo '
<tr align="center">
<td>' . $stt . '</td>
<td>' . $u[ 'MaTT' ] . '</td>
<td>' . $u[ 'NgayDang' ] . '</td>
<td>' . $u[ 'NgayKT' ] . '</td>
<td align="left">' . mb_strimwidth($u[ 'TieuDe' ], 0, 20, "...") . '</td>
<td align="left">' .  mb_strimwidth($u[ 'NoiDung' ], 0, 20, "...") . '</td>
<td>' .  mb_strimwidth($u[ 'HinhTT' ], 0, 20, "...")   . '</td>
<td>' . $u[ 'LoaiTT' ] . '</td>

<td><a href="chitiet_tintuc.php?chitiet=' . $u[ 'MaTT' ] . '"> xem</a> | <a href="delete_tintuc_view.php?xoathuong=' . $u[ 'MaTT' ] . '">xóa</a> | <a href="update_tintuc_view.php?capnhapthuong=' . $u[ 'MaTT' ] . '">sửa</a></td>
<td>
<div class="form-check">
 <label class="form-check-label">
<input class="form-check-input" type="checkbox" name = "chon[]" value="' . $u[ 'MaTT' ] . '" >
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
<hr>Chọn số dòng được thêm mới 
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
|
<input type="button" name="insert" class="btn btn-success" value="Thêm mới" onClick="setInsertAction()">

</form>
<script>
 

function setChitietAction() {
document.DSTT.action = "chitiet_tintuc.php";
document.DSTT.submit();
}

function setInsertAction() {
document.DSTT.action = "insert_tintuc_view.php";
document.DSTT.submit();
}

function setUpdateAction() {
document.DSTT.action = "update_tintuc_view.php";
document.DSTT.submit();
}

function setDeleteAction() {
if ( confirm( "Bạn có muốn xóa nó không?" ) ) {
{
document.DSTT.action = "delete_tintuc_view.php";
document.DSTT.submit();
    

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