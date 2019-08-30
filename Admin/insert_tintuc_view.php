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
   <a href="tintuc.php" > <input type="button" class="btn btn-info" name="insert" value=" trở lại"></a>

<form id="them" name="them" method="post" class="form-inline" enctype="multipart/form-data">
	

  <?php
 	
	include('../Control/tintuc_class.php');
	$tintuc= new Tintuc_class();
	
	if(isset($_REQUEST['sodong']))
	{
		$sodong = $_REQUEST['sodong'];
	
		for($i=0; $i<$sodong;$i++)
		{
			echo '
		<input type="text" name="" class="form-control" readonly value="Tin tức '.$i.'" >
			<table width="100%" border="0">
  <tbody>
    <tr>
    <input type="hidden" name="matt[]" >
      <td style="text-align: left">
      <strong>Ngày đăng   </strong>:     </td>
      <td><input class="form-control" type="date" name="ngaydang[]" id="date"></td>
      <td style="text-align: left"><strong>Tiêu đề :</strong></td>
      <td><textarea class="form-control" required name="tieude[]" rows="2" cols="60" id="textarea2"></textarea></td>
      <td style="text-align: left">
       <strong>Loại tin tức </strong>:     </td>
      <td style="text-align: center"><select name="loaitt[]" id="select" required class="custom-select col-md-4">
         <option value="">chọn  </option>
		<option value="1"> 1 </option>
        <option value="2"> 2</option>
      </select>
        <span style="text-align: center"></span></td>
      <td width="11%" rowspan="2" style="text-align: center"><input type="submit" class="btn btn-success" name="gui" value="Thêm" ></td>
    </tr>
    <tr>
      <td width="12%" style="text-align: left">
      <strong>Ngày kết thúc </strong>:     </td>
      <td width="11%">
		   <input class="form-control" type="date" name="ngaykt[]" id="date2">
		   
       </td>
      <td width="7%" style="text-align: left"><strong>Nội dung:</strong></td>
      <td width="32%"><textarea class="form-control" name="noidung[]" rows="6" cols="60" id="textarea"></textarea></td>
      <td width="11%" style="text-align: left">
       <strong>Hình tin tức</strong>:        <br>      </td>
      <td width="16%"><br>
        <input class="form-control" type="file" accept=".jpg,.gif,.png" onChange="kiemtraImg()" required  name="hinhtt[]" id="hinh"  multiple="multiple"></td>
      </tr>
  </tbody>
</table>

			';
		}
	}
	
	  
	if(isset($_POST['gui']))
	{
		 $matt = isset($_REQUEST['matt'])?$_REQUEST['matt']:'';
		$ngaydang = isset($_REQUEST['ngaydang'])?$_REQUEST['ngaydang']:'';
		$ngaykt = isset($_REQUEST['ngaykt'])?$_REQUEST['ngaykt']:'';
		$tieude= isset($_REQUEST['tieude'])?$_REQUEST['tieude']:'';
		$noidung =isset($_REQUEST['noidung'])?$_REQUEST['noidung']:'';
		$loaitt =isset($_REQUEST['loaitt'])?$_REQUEST['loaitt']:'';
		if(isset($_FILES['hinhtt']))
		{
			$name_hinh = $_FILES['hinhtt']['name'];
			$local_hinh =$_FILES['hinhtt']['tmp_name'];	
			$tintuc->insert_tintuc_control($matt,$ngaydang,$ngaykt,$tieude,$noidung,$loaitt,$name_hinh,$local_hinh);
		}
	
	}
	if(isset($_POST['guitatca']))
	{
		
			 $matt = isset($_REQUEST['matt'])?$_REQUEST['matt']:'';
		$ngaydang = isset($_REQUEST['ngaydang'])?$_REQUEST['ngaydang']:'';
		$ngaykt = isset($_REQUEST['ngaykt'])?$_REQUEST['ngaykt']:'';
		$tieude= isset($_REQUEST['tieude'])?$_REQUEST['tieude']:'';
		$noidung =isset($_REQUEST['noidung'])?$_REQUEST['noidung']:'';
		$loaitt =isset($_REQUEST['loaitt'])?$_REQUEST['loaitt']:'';
		if(isset($_FILES['hinhtt']))
		{
			$name_hinh = $_FILES['hinhtt']['name'];
			$local_hinh =$_FILES['hinhtt']['tmp_name'];	
			$tintuc->insert_tintuc_control($matt,$ngaydang,$ngaykt,$tieude,$noidung,$loaitt,$name_hinh,$local_hinh);
		}
	}
	
?>

	
	<hr>
  <a href="tintuc.php" > <input type="button" class="btn btn-info" name="insert" value=" trở lại"></a>

	<input type="submit" name="guitatca" class="btn btn-success" value=" Thêm tất cả" >	
	</form><br>
</div>

</div>
</div>

</div>
</div>
</div>
<script>
 function kiemtraImg(e)
    { 
    var file = document.getElementById("hinh");
             var file_name = file.value;
             var extension = file_name.split('.').pop().toLowerCase();
             var size      = file.files[0].size;
             var allowedFormats = ["jpeg", "jpg", "pdf","png", "tif"];

              if(!(allowedFormats.indexOf(extension) > -1)){
               alert("chỉ nhập file có đuôi jpg/jpeg/pdf/tif");

               document.getElementById("submit").disabled = true;
               return false;              
              } else if( ((size/1024)/1024) > 1){
                 alert("không nhận file hình lớn hơn 1Mbs");
                 return false;
              } else {
               document.getElementById("submit").disabled = false;   
              }
    }  
function quayvetintuc() {
document.them.action = "tintuc.php";
document.them.submit();
     location.reload();
} 
 
</script>

<!--chưa phần thân code -->
<?php include('footer.php') ?>
</div>
</div>
</body>
<?php include('script.php') ?>
</html>