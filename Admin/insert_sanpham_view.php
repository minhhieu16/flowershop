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
<h4 class="card-title ">Sản phẩm về hoa</h4>
<p class="card-category"> Thêm 1 hoặc nhiều sản phẩm mà bạn muốn </p>
</div>
<div class="card-body">
   <a href="sanpham.php" > <input type="button" class="btn btn-info" name="insert" value=" trở lại"></a>

<form id="them" name="them" method="post" class="form-inline" enctype="multipart/form-data">
    
  <?php
 	
	
	if(isset($_REQUEST['sodong']))
	{
		$sodong = $_REQUEST['sodong'];
	
		for($i=0; $i < $sodong;$i++)
		{
			echo '
<input type="text" name="" class="form-control" readonly value="sản phẩm '.$i.'" >
<table width="100%" border="0">
  <tbody>
    <tr>
    <input type="hidden"  class="form-control"  name="masp[]" >
      <td style="text-align: left">
      <strong>Tên sản phẩm  </strong>:     </td>
      <td><input class="form-control" type="text" name="tensp[]" ></td>
      <td style="text-align: left"><strong>Mô tả:</strong></td>
      <td><textarea class="form-control" required name="mota[]" rows="2" cols="60" id=""></textarea></td>
      <td style="text-align: left"><strong>Mã loại sản phẩm</strong>:   </td>
    
    <td style="text-align: center"> 
<select name="maloaisp[]" id="select" required class="custom-select ">';
 foreach ($sanpham->select_sanpham_maloaisp_c() as $u)
  {
    echo "<option value=".$u['MaLoaiSP']." >" . $u['TenLoaiSP'] . "</option>";
  }

echo '
</select><br>
    
       </span></td>
      <td width="11%" rowspan="2" style="text-align: center"><input type="submit" class="btn btn-success" name="gui" value="Thêm" ></td>
    </tr>
    <tr>
      <td width="12%" style="text-align: left"><strong>Giá sản phẩm</strong>:     </td>
      <td width="11%">
		   <input class="form-control" type="text" name="giasp[]" id="">
		   
       </td>
      <td width="7%" style="text-align: left"><strong>Mô tả chi tiết:</strong></td>
      <td width="32%"><textarea class="form-control" name="motact[]" rows="6" cols="60" id="textarea"></textarea></td>
      <td width="11%" style="text-align: left">
       <strong>Hình sản phẩm</strong>:        <br>      </td>
      <td width="16%"><br>
        <input class="form-control" type="file" accept=".jpg,.gif,.png" onChange="kiemtraImg()" required  name="hinhsp[]" id="hinh"  multiple="multiple"></td>
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
	if(isset($_POST['gui']))
	{
		
		$sanpham->insert_sanpham_control($masp,$tensp,$giasp,$mota,$motact,$maloaisp,$name_hinh,$local_hinh);
	}
	if(isset($_POST['guitatca']))
	{
		
		$sanpham->insert_sanpham_control($masp,$tensp,$giasp,$mota,$motact,$maloaisp,$name_hinh,$local_hinh);
	}
	
?>

	
	<hr>
    <a href="sanpham.php" > <input type="button" class="btn btn-info" name="insert" value=" trở lại"></a>

	<input type="submit" name="guitatca" class="btn btn-success"  value=" Thêm tất cả" >	
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
    
function quayvesanpham()
    {
document.them.action = "sanpham.php";
document.them.submit();
     location.reload();
} 
   
} 
</script>

<!--chưa phần thân code -->
<?php include('footer.php') ?>
</div>
</div>
</body>
<?php include('script.php') ?>
</html>
