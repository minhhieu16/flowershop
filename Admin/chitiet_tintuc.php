
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
<h4 class="card-title "><strong>Chi tiết</strong> Tin Tức về hoa</h4>
   
<p class="card-category">Xem chi tiết các thông tin tại đây </p>
</div>
<div class="card-body">
<form id="chitiet" name="chitiet" method="post" enctype="multipart/form-data">
<?php
//include( '../Model/ketnoi.php' );
//$db = new database();
//$db->connect();
include( '../Control/tintuc_class.php' );
$tintuc = new Tintuc_class();
if ( isset( $_REQUEST[ 'chon' ] ) ) {
$id = $_REQUEST[ 'chon' ];
$N = count( $id );
for ( $i = 0; $i < $N; $i++ ) {
foreach ( $tintuc->select_ID_tintuc_control( $id[ $i ] ) as $u ) {
echo '
 <input type="text" class="form-control col-md-6" value = "Mã tin tức '.$u[ 'MaTT' ].'">
 <input type="hidden" name="matt[]" value = "'.$u[ 'MaTT' ] . '">
<table width="100%"  border="0" 
<tbody>
<tr>
<td style="text-align: right">
<strong>Ngày đăng   </strong>:     </td>
<td><input class="form-control" type="date"  value = "' . $u[ 'NgayDang' ] . '" name="ngaydang[]" id="date"></td>
<td style="text-align: right"><strong>Tiêu đề :</strong></td>
<td><textarea class="form-control" name="tieude[]"  value = "' . $u[ 'TieuDe' ] . '" rows="2" cols="60" id="textarea2">' . $u[ 'TieuDe' ] . '</textarea></td>
<td style="text-align: right">
<strong>Loại tin tức </strong>:     </td>
<td style="text-align: center">

<select name="loaitt[]" id="select" class="custom-select">';
    
    if(!empty($u[ 'LoaiTT' ]))
    {
        echo '<option value="'.$u[ 'LoaiTT' ].'">'.$u[ 'LoaiTT' ].'</option>';
    }


    echo '
<option value=""> chọn </option>
<option value="1"> 1 </option>
<option value="2"> 2</option>
</select>
<span style="text-align: center"></span></td>
<td width="11%" rowspan="2" style="text-align: center"><a href="delete_tintuc_view.php?xoathuong=' . $u[ 'MaTT' ] . '">xóa</a> | <a href="update_tintuc_view.php?capnhapthuong=' . $u[ 'MaTT' ] . '">sửa</a></td>
</tr>
<tr>
<td width="12%" style="text-align: right">
<strong>Ngày kết thúc </strong>:     </td>
<td width="11%">
<input class="form-control" type="date" name="ngaykt[]" id="date2">

</td>
<td width="7%" style="text-align: right"><strong>Nội dung:</strong></td>
<td width="32%"><textarea class="form-control"  value = "' . $u[ 'NoiDung' ] . '" name="noidung[]" rows="6" cols="60" id="textarea">' . $u[ 'NoiDung' ] . '</textarea></td>
<td width="11%" style="text-align: right">
<strong>Hình tin tức</strong>:        <br>      </td>
<td width="16%"><br>
<img src="../Data/images/TinTuc/'.$u['HinhTT'].'" width="100px" height="100px" >
</td>
</tr>
</tbody>
</table>

';
}
}
}
if ( isset( $_REQUEST[ 'chitiet' ] ) ) {
$id = $_REQUEST[ 'chitiet' ];
foreach ( $tintuc->select_ID_tintuc_control( $id ) as $u ) {
    echo '
<input type="text" class="form-control col-md-6" value = "Mã tin tức '.$u[ 'MaTT' ].'">
 <input type="hidden" name="matt[]" value = "'.$u[ 'MaTT' ] . '">
<table width="100%"  border="0" >
<tbody>
<tr>
<td style="text-align: right">
<strong>Ngày đăng   </strong>:     </td>
<td><input class="form-control" type="date"  value = "' . $u[ 'NgayDang' ] . '" name="ngaydang[]" id="date"></td>
<td style="text-align: right"><strong>Tiêu đề :</strong></td>
<td><textarea class="form-control" name="tieude[]"  value = "' . $u[ 'TieuDe' ] . '" rows="2" cols="60" id="textarea2">' . $u[ 'TieuDe' ] . '</textarea></td>
<td style="text-align: right">
<strong>Loại tin tức </strong>:     </td>
<td style="text-align: center">
<select name="loaitt[]" id="select" class="custom-select">';
    
    if(!empty($u[ 'LoaiTT' ]))
    {
        echo '<option value="'.$u[ 'LoaiTT' ].'">'.$u[ 'LoaiTT' ].'</option>';
    }


    echo '
<option value=""> chọn </option>
<option value="1"> 1 </option>
<option value="2"> 2</option>
</select>
<span style="text-align: center"></span></td>
<td width="11%" rowspan="2" style="text-align: center"> <a href="delete_tintuc_view.php?xoathuong=' . $u[ 'MaTT' ] . '">xóa</a> | <a href="update_tintuc_view.php?capnhapthuong=' . $u[ 'MaTT' ] . '">sửa</a></td>
</tr>
<tr>
<td width="12%" style="text-align: right">
<strong>Ngày kết thúc </strong>:     </td>
<td width="11%">
<input class="form-control" type="date" name="ngaykt[]" id="date2">
</td>
<td width="7%" style="text-align: right"><strong>Nội dung:</strong></td>
<td width="32%"><textarea class="form-control"  value = "' . $u[ 'NoiDung' ] . '" name="noidung[]" rows="6" cols="60" id="textarea">' . $u[ 'NoiDung' ] . '</textarea></td>
<td width="11%" style="text-align: right">
<strong>Hình tin tức</strong>:        <br>      </td>
<td width="16%"><br>
 <img src="../Data/images/TinTuc/'.$u['HinhTT'].'" width="100px" height="100px" >
</td>
</tr>
</tbody>
</table>
';
}
}
?>
  <a href="tintuc.php"> <input type="button" class="btn btn-info" name="insert" value=" trở lại" ></a>
</form>
</div> 
</div>
</div>
</div>
</div>
</div
<!--chưa phần thân code -->
<?php include('footer.php') ?>
</div>
</div>
</body>
<?php include('script.php') ?>
</html>