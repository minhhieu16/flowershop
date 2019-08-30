<?php
 	include('../Model/ketnoi.php');
	$db = new database();
	$db->connect();
	include('../Control/tintuc_class.php');
	$tintuc= new Tintuc_class();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post">

   <?php

 foreach ($tintuc->select_danhsach_tintuc_control() as $u)
  {
	 echo 'ma tin tuc :'. $u['MaTT'].'<br/>';
	 echo 'ngày dăng  :'. $u['NgayDang'].'<br/>';
	 echo 'Tieu đề    :'. $u['TieuDe'].'<br/>';
	 echo 'Noi dung   :'. $u['NoiDung'].'<br/>';
	 echo 'Hình ảnh   :'. $u['HinhTT'].'<br/>';
	 echo '
	 <img src="../Data/Image/'.$u['HinhTT'].'" height="100" width="100"/> <br/>
	 ';
	  echo '<a href="#">xem</a> | <a href="delete_tintuc_view.php?idxoa='.$u['MaTT'].'">xóa</a> | <a href="update_tintuc_view.php?id='.$u['MaTT'].'">sửa</a><br>';
	 echo '<hr/>'.'<br/>';
	
  }
?>

<input type="submit" name="gui"><br>
</form>

</body>
</html>
