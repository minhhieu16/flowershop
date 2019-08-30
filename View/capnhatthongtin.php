<!DOCTYPE html>
<html lang="en">
  <head>
    <title>The Flower Shop</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../Data/fonts/icomoon/style.css">
	<link rel="stylesheet" href="../Data/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Data/css/magnific-popup.css">
	<link rel="stylesheet" href="../Data/css/jquery-ui.css">
	<link rel="stylesheet" href="../Data/css/owl.carousel.min.css">
	<link rel="stylesheet" href="../Data/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="../Data/css/aos.css">
	<link rel="stylesheet" href="../Data/css/style.css">
	
 
  </head>
  <body>
  
  <div class="site-wrap">
  <?php include('navbar.php')?>  
<!--chỉ mục -->
	  
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Trang Chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Liên Hệ</strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Thông tin cá nhân</h2>
          </div>
          <div class="col-md-7">
		<?php			 
			 if(isset($_SESSION['id']))
			 {
				 foreach( $p->thongtincanhan($_SESSION['id'],$_SESSION['tentk']) as $tk)
			  {
				 
				  echo '
				  <form method="post">
              
              <div class="p-5 p-lg-7 border">
				
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Họ và tên<span class="text-danger">*</span></label>
                    <input type="text" class="form-control"  name="c_fname" value="'.$tk["HoTen"].'">
                  </div>
                  <div class="col-md-6">
                    <label for="c_lname" class="text-black">Tên tài khoản<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="c_lname" value="'.$tk["TenTK"].'" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control"  name="c_email" placeholder="'.$tk["Email"].'" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="sdt" class="text-black">Số điện thoại</label>
                    <input type="text" class="form-control"  name="sdt" value="'.$tk["SDT"].'">
                  </div>
                </div>           
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Cập nhật" name="capnhat">
                  </div>
                </div>
              	
			  </div>
				  
            </form>
				  ';
				  

			 	}  
			  }

			  else
			  {
				  echo "<h1>HÃY ĐĂNG NHẬP!</h1>";
			  }
	  		if(isset($_REQUEST['capnhat']))
			{
				$ten = $_REQUEST['c_fname'];
				$sdt = $_REQUEST['sdt'];
				$id = $tk['id'];
				$p->update_thongtin($ten,$sdt,$id);
			}
		?>
			
          </div>
          <div class="col-md-5 ml-auto">
			  <?php
			   foreach( $p->thongtincanhan($_SESSION['id'],$_SESSION['tentk']) as $tk)
			  {			 
				  echo '
				  <div class="p-4 border mb-3">
				  <form method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12 align-content-between ">
								
								<div class="col-md-6 align-content-between "><label class="text-black">Hình đại diện</label>
								<img id="hinh" alt="Vui lòng thêm ảnh đại diện" width="200px" height="200px" src="../Data/images/TaiKhoan/'.$tk["HinhCN"].'" ></div>
								
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-5">
								<input type="file" name="upload_hinh" id="upload_hinh" value="Chọn hình">
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12 align-content-between">
								<input type="submit" name="uphinh" class="btn btn-primary btn-lg btn-block" value="Cập Nhật Hình">
							</div>
						</div>
					</form>
			  </div>
			';
			   }
			  
			  if(isset($_REQUEST['uphinh']))
			  {
				  
				  $local=$_FILES["upload_hinh"]["tmp_name"];
				  $name = $_FILES["upload_hinh"]["name"];
				  $type = $_FILES["upload_hinh"]["type"];
				  $id=$_SESSION['id'];
				  $p->update_hinh($id,$local,$name,$type);
			  }
			  ?>
			   <div class="p-4 border mb-3">
				  <form method="post" enctype="multipart/form-data" name="change_pass">
						<div class="row">
							<div class="col-md-6 align-content-between ">
								<label for="">Mật khẩu cũ:</label>
								<input type="password" name="oldpass" class="form-control">
							</div>
							<div class="col-md-6 align-content-between ">
								<label for="">Mật khẩu mới:</label>
								<input type="password" name="newpass" class="form-control">
							</div>
						</div>
					  <hr>
						<div class="row">
							<div class="col-md-12 align-content-between">
								<input type="submit" name="doimk" class="btn btn-primary btn-lg btn-block" value="Đổi Mật Khẩu">
							</div>
						</div>
					</form>
				   <?php
				   
				   		if(isset($_REQUEST['doimk']))
						{
							$oldpass = $_REQUEST['oldpass'];
							$newpass= $_REQUEST['newpass'];
							$id = $_SESSION['id'];
							if($oldpass != $newpass)
							{
								$p->doimatkhau($id,$oldpass,$newpass);
							}
							else
							{
								echo '2 mật khẩu không được giống nhau!';
							}
						}
				   ?>
			  </div>
			</div>
        </div>
      </div>
    </div>

    
  </div>
<script src="../Data/js/jquery-3.3.1.min.js"></script>
  <script src="../Data/js/jquery-ui.js"></script>
  <script src="../Data/js/popper.min.js"></script>
  <script src="../Data/js/bootstrap.min.js"></script>
  <script src="../Data/js/owl.carousel.min.js"></script>
  <script src="../Data/js/jquery.magnific-popup.min.js"></script>
  <script src="../Data/js/aos.js"></script>
  <script src="../Data/js/main.js"></script>  
  </body>
</html>

