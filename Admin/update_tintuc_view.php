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
<!--chưa phần thân code -->t
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
<a href="tintuc.php" > <input type="button" class="btn btn-info" name="insert" value=" trở lại"></a><br>
<?php

include( '../Control/tintuc_class.php' );
$tintuc = new Tintuc_class();
if ( isset( $_REQUEST[ 'chon' ] ) ) {
$id = $_REQUEST[ 'chon' ];
$N = count( $id );
for ( $i = 0; $i < $N; $i++ )
{
foreach ( $tintuc->select_ID_tintuc_control( $id[ $i ] ) as $u ) {
echo '
<input type="text" class="form-control col-md-6" value = "Mã tin tức '.$u[ 'MaTT' ].'">
<input type="hidden" name="matt[]" value = "'.$u[ 'MaTT' ] . '">
<table width="100%"  border="0" >
<tbody>
<tr>
<td style="text-align: left">
<strong>Ngày đăng   </strong>:     </td>
<td><input class="form-control" type="date"  value = "' . $u[ 'NgayDang' ] . '" name="ngaydang[]" id="date"></td>
<td style="text-align: left"><strong>Tiêu đề :</strong></td>
<td><textarea class="form-control" name="tieude[]"  value = "' . $u[ 'TieuDe' ] . '" rows="2" cols="60" id="textarea2">' . $u[ 'TieuDe' ] . '</textarea></td>
<td style="text-align: left">
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
<td width="11%" rowspan="2" style="text-align: center"><input type="submit" id="submit"  name="gui" trow value="Cập nhật" ></td>
</tr>
<tr>
<td width="12%" style="text-align: left">
<strong>Ngày kết thúc </strong>:     </td>
<td width="11%">
<input class="form-control" type="date" value = "' . $u[ 'NgayKT' ] . '" name="ngaykt[]" id="date2">
</td>
<td width="7%" style="text-align: left"><strong>Nội dung:</strong></td>
<td width="32%"><textarea class="form-control"  value = "' . $u[ 'NoiDung' ] . '" name="noidung[]" rows="6" cols="60" id="textarea">' . $u[ 'NoiDung' ] . '</textarea></td>
<td width="11%" style="text-align: left">
<strong>Hình tin tức</strong>:        <br>      </td>
<td width="16%">

<img src="../Data/images/TinTuc/'.$u['HinhTT'].'" width="100px" height="100px" >
<input class="form-control" type="text" name="hinhtt_getname[]" value="'.$u['HinhTT'].'" id="" multiple >
<input class="form-control"  onChange="kiemtraImg()" required accept=".jpg,.gif,.png" type="file" name="hinhtt[]" id="hinh"  multiple="multiple">

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
foreach ( $tintuc->select_ID_tintuc_control( $id ) as $u )
{
    echo '
<input type="text" class="form-control col-md-6" value = "Mã tin tức '.$u[ 'MaTT' ].'">
<input type="hidden" name="matt[]" value = "'.$u[ 'MaTT' ] . '">
<table width="100%"  border="0" >
<tbody>
<tr>
<td style="text-align: left">
<strong>Ngày đăng   </strong>:     </td>
<td><input class="form-control" type="date"  value = "' . $u[ 'NgayDang' ] . '" name="ngaydang[]" id="date"></td>
<td style="text-align: left"><strong>Tiêu đề :</strong></td>
<td><textarea class="form-control" name="tieude[]"  value = "' . $u[ 'TieuDe' ] . '" rows="2" cols="60" id="textarea2">' . $u[ 'TieuDe' ] . '</textarea></td>
<td style="text-align: left">
<strong>Loại tin tức </strong>:     </td>
<td style="text-align: center"><select name="loaitt[]" id="select" class="custom-select" >'; 
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
<td width="11%" rowspan="2" style="text-align: center"></td>
</tr>
<tr>
<td width="12%" style="text-align: left">
<strong>Ngày kết thúc </strong>:     </td>
<td width="11%">
<input class="form-control" type="date" name="ngaykt[]" value = "' . $u[ 'NgayKT' ] . '" id="date2">
</td>
<td width="7%" style="text-align: left"><strong>Nội dung:</strong></td>
<td width="32%"><textarea class="form-control"  value = "' . $u[ 'NoiDung' ] . '" name="noidung[]" rows="6" cols="60" id="textarea">' . $u[ 'NoiDung' ] . '</textarea></td>
<td width="11%" style="text-align: left">
<strong>Hình tin tức</strong>:        <br>      </td>
<td width="16%">
<img src="../Data/images/TinTuc/'.$u['HinhTT'].'" width="100px" height="100px" >
<input class="form-control" type="text" name="hinhtt_getname[]" value="'.$u['HinhTT'].'" id="" multiple >
<input class="form-control"  onChange="kiemtraImg()"  accept=".jpg,.gif,.png"  required type="file" name="hinhtt[]" id="hinh"  multiple="multiple">

</td>
</tr>
</tbody>
</table>

';
}
}
$matt = isset($_REQUEST['matt'])?$_REQUEST['matt']:'';
$ngaydang = isset($_REQUEST['ngaydang'])?$_REQUEST['ngaydang']:'';
$ngaykt = isset($_REQUEST['ngaykt'])?$_REQUEST['ngaykt']:'';
$tieude= isset($_REQUEST['tieude'])?$_REQUEST['tieude']:'';
$noidung =isset($_REQUEST['noidung'])?$_REQUEST['noidung']:'';
$loaitt =isset($_REQUEST['loaitt'])?$_REQUEST['loaitt']:'';
$hinhtt_getname = isset($_REQUEST['hinhtt_getname'])?$_REQUEST['hinhtt_getname']:'';
    if(isset($_FILES['hinhtt']))
		{
			$name_hinh = $_FILES['hinhtt']['name'];
			$local_hinh =$_FILES['hinhtt']['tmp_name'];	
		}
if ( isset( $_REQUEST[ 'gui_tatca' ] ) ) {
    
$tintuc->update_tintuc_control( $matt, $ngaydang, $ngaykt, $tieude, $noidung, $loaitt, $name_hinh, $local_hinh );
}
if ( isset( $_REQUEST[ 'gui' ] ) ) {
$tintuc->update_tintuc_control( $matt, $ngaydang, $ngaykt, $tieude, $noidung, $loaitt, $name_hinh, $local_hinh );
}
?>
<a href="tintuc.php" > <input type="button" class="btn btn-info" name="insert" value=" trở lại"></a>


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