<?php
 	include('../Model/ketnoi.php');
	$db = new database();
	$db->connect();
	include('../Control/sanpham_class.php');
	$sanpham= new sanpham_class();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post">

	


<table width="700" border="1">
  <tbody>
    <tr>
	  <th scope="col">STT</th>
      <th scope="col">Mã SP</th>
      <th scope="col">Tên SP</th>
      <th scope="col">Giá SP</th>
      <th scope="col">Hình SP</th>
      <th scope="col">Ma Loại SP</th>
      <th scope="col">Mô Tả</th>
    </tr>
   <?php
 $stt = 1;
 foreach ($sanpham->select_sanpham_c() as $u)
  {
	 echo '
	  <tr>
		  <td>'.$stt.'</td>
		  <td>'.$u['MaSP'].'</td>
		  <td>'.$u['TenSP'].'</td>
		  <td>'.$u['Gia'].'</td>
		  <td>'.$u['Hinh'].'</td>
		  <td>'.$u['MaLoaiSP'].'</td>
		  <td>'.$u['MoTa'].'</td>
		  <td><a href="#"> xem</a> | <a href="#">xóa</a> | <a href="#">sửa</a></td>
      </tr> 
	 ';
	 $stt ++;
  }
?>
   
  </tbody>
</table>
<a href="#">xem</a> | <a href="#">xóa</a> | <a href="#">sửa</a><br>
<input type="submit" name="gui"><br>
</form>
<?php
	if(isset($_POST['gui']))
	{
		$tensp = $_POST['tensp'];
		$giasp = $_POST['giasp'];
		//$hinhsp = $_FILES['hinhsp'][''];
		$motasp = $_POST['motasp'];
		$maloaisp = $_POST['maloaisp'];
$sanpham->insert_sanpham_c($maloaisp,$tensp,$giasp,$hinhsp,$motasp);
	}
	
	
?>
	
</body>
</html>
