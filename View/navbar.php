<?php
include('../Control/taikhoan_Control.php');
	$p=new taikhoan_control();
error_reporting(0);
?>

<header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="" class="site-block-top-search" method="post">
                <span class="icon icon-search2" ></span>
                <input type="text" class="form-control border-0" name="search" placeholder="Tìm kiếm...?" onClick="">
				  
              </form>
	<?php
				
			session_start();
				if(isset( $_POST[ "search" ]))
				{
					if (  $_POST[ "search" ] != '' )
					{
						$search = $_POST[ "search" ];
						header('location:Timkiem_sanpham.php?tk='.$search.'');

					} 
				}
	
	?>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo" style="">
                <a href="index.php" class="js-logo-clone" style="padding: 15px; word-spacing: 15px;border-bottom-color: deepskyblue;border-top-color: firebrick;border-left-color:navy;border-right-color: fuchsia">The <strong style="font-size: 150%;color: darkorange">Flower</strong> Shop</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
				  <?php
						
						if(isset($_SESSION['id']))
						{
							echo '
							<ul >
					<li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><img src="../Data/images/TaiKhoan/'.$_SESSION['HinhCN'].'" style="width: 40px; height: 40px; " class="rounded"></span>'.$_SESSION['tentk'].'</a>
						  <div class="dropdown-menu">
							  <a class="dropdown-item" href="#">Đơn Mua</a>
							  <a class="dropdown-item" href="thongtincanhan.php">Tài Khoản Cá Nhân</a>
							  <a class="dropdown-item" href="capnhatthongtin.php">Cài Đặt Tài Khoản</a>
							  <div class="dropdown-divider"></div>
							  <a class="dropdown-item" href="?dx=1">Đăng Xuất</a>
						  </div>
					</li>
                 	<li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="icon icon-heart-o"></span></a>
						 <div class="dropdown-menu">
							  <a class="dropdown-item" href="#">Sản Phẩm Yêu Thích</a>
							  
						  </div>
					
					</li>
                  <li>
                    <a href="cart.php" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>		
                      
                    </a>
                  </li> 
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
							';
						}
						else
						{
							echo '
								<ul >
									<li ><a href="DangNhap.php">Đăng nhập<span class="icon icon-login"></span></a></li>
									<li ><a href="DangKy.php">Đăng ký<span class="icon icon-logout"></span></a></li>
									<li>
										<a href="cart.php" class="site-cart">
										  <span class="icon icon-shopping_cart"></span>		
										</a>
									 </li> 
								</ul>						
							';
						}
				  
				  if(isset($_GET['dx']))
				  {
					  
					  $dx = $_GET['dx'];
					  if($dx ==1)
						 {
							  $p->dangxuat();
						 }
					  
					 
				  }
					?>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li>
              <a href="index.php" name="">Trang Chủ</a>
              
            </li>
            <li >
              <a href="about.php">Giới Thiệu</a>
             
            </li>
            <li  class="has-children active"><a >Sản Phẩm</a>
			    <ul class="dropdown">
                <li><a href="shop.php?madanhmuc=1">Hoa Chủ Đề</a></li>
                <li><a href="shop.php?madanhmuc=2">Hoa Chúc Mừng</a></li>
                <li><a href="shop.php?madanhmuc=3">Hoa Chia Buồn</a></li>
                <li >
                  <a href="shop.php?madanhmuc=4">Sản phẩm liên quan</a>
                </li>
              </ul>
			  </li>
            <li><a href="tintuc.php">Tin Tức</a></li>
            
            <li><a href="contact.php">Liên Hệ</a></li>
          </ul>
        </div>
      </nav>
    </header>