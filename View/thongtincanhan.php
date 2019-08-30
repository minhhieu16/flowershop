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
			  <form method="post">
              
              <div class="p-5 p-lg-7 border">
				
                <div class="form-group row">
                  <div class="col-md-6">
		<?php			 
			 if(isset($_SESSION['id']))
			 {
				 foreach( $p->thongtincanhan($_SESSION['id'],$_SESSION['tentk']) as $tk)
			  {
				 
				  echo '
				  
                    <label for="c_fname" class="text-black">Họ và tên<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="c_fname" value="'.$tk["HoTen"].'" disabled>
                  </div>
                  <div class="col-md-6">
                    <label for="c_lname" class="text-black">Tên tài khoản<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_lname" name="c_lname" value="'.$tk["TenTK"].'" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="c_email" name="c_email" placeholder="'.$tk["Email"].'" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_subject" class="text-black">Số điện thoại</label>
                    <input type="text" class="form-control" id="c_subject" name="c_subject" value="'.$tk["SDT"].'" disabled>
                  </div>
                </div>           
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="capnhat" value="
					Chỉnh sửa">
                  
				  ';
				  

			 	}  
			  }
			  else
			  {
				  echo "<h1>HÃY ĐĂNG NHẬP!</h1>";
			  }
	  
	  		if(isset($_REQUEST['capnhat']))
			{
				echo '<script language="javascript">window.location="capnhatthongtin.php"</script>';
			}
	  
	  
		?>
			</div>
                </div>
              	
			  </div>
				  
            </form>
          </div>
          <div class="col-md-5 ml-auto">
			  <?php
			   foreach( $p->thongtincanhan($_SESSION['id'],$_SESSION['tentk']) as $tk)
			  {			 
				  echo '
				  <div class="p-4 border mb-3">
				  
						
							<div class="col-md-12 align-content-between ">
								
								<div class="col-md-6 align-content-between "><label class="text-black">Hình đại diện</label>
								<img alt="#" width="200px" height="200px" src="../Data/images/TaiKhoan/'.$tk["HinhCN"].'" value="Chọn hình"></div>
								
							</div>
						
					
			  </div>
			';
			   }
			  ?>
			   <div class="align-content-between"></div>
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

