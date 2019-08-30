<!DOCTYPE html>
<html lang="en">
<?php include('header.php');	
?>
<body>
    

  <?php include('navbar.php');?>
	<!--Banner trang chủ-->
  <div class="site-blocks-cover" style="background-image: url('../Data/images/Logon_va_Khac/2121.jpg');" data-aos="fade">
    <div class="container">
      <div class="row align-items-start align-items-md-center justify-content-end">
        <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
          <h1 class="mb-2">Hoa Yêu Thương</h1>
          <div class="intro-text text-center text-md-left">
            <p class="mb-4">Giành tặng những đóa hoa, bó hoa, cành hoa xinh đẹp nhất đến người bạn yêu thương. </p>
            <p> <a href="#" class="btn btn-sm btn-primary">Shop Now</a> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
	<?php include('dichvu.php');?>
	<!--Bộ sưu tập-->
  <div class="site-section site-blocks-2">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay=""> <a class="block-2-item" href="shop.php?madanhmuc=1">
          <figure class="image" style = "width:330px;height:430px"> <img src="../Data/images/Logon_va_Khac/hoachucmung.jpg" width=330 height=430 alt="" class="img-fluid"> </figure>
          <div class="text"> <span class="text-uppercase">Bộ sưu tập</span>
            <h3>Hoa chúc mừng</h3>
          </div>
          </a> </div>
        <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100"> <a class="block-2-item" href="shop.php?madanhmuc=2">
          <figure class="image"  style = "width:330px;height:430px"> <img src="../Data/images/Logon_va_Khac/hoachude.jpg" width=330 height=430 alt="" class="img-fluid"> </figure>
          <div class="text"> <span class="text-uppercase">Bộ sưu tập</span>
            <h3>Hoa chủ đề</h3>
          </div>
          </a> </div>
        <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200"> <a class="block-2-item" href="shop.php?madanhmuc=3">
          <figure class="image"  style = "width:330px;height:430px"> <img src="../Data/images/Logon_va_Khac/hoachiabuonpg.jpg" width=330 height=430 alt="" class="img-fluid"> </figure>
          <div class="text"> <span class="text-uppercase">Bộ sưu tập</span>
            <h3>Hoa chia buồn</h3>
          </div>
          </a> </div>
      </div>
    </div>
  </div>
  <!--/*giới thiệu sản phẩm mới*/-->
  <div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Hoa Mới </h2>
        </div>
      </div>
      <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
             
				<?php
	include( '../Control/sanpham_class.php' );
			$sanpham = new sanpham_class();
	  $maloaisp_lienquansanpham=1;
	  foreach($sanpham->select_tatca_sanpham_theoMaLoaiSP_loaisanpham_c($maloaisp_lienquansanpham) as $u)
	  {
		  echo '
		  <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="../Data/images/SanPham/'.$u['Hinh'].'" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="shop-single.php?masp='.$u['MaSP'].'&maloaisp='.$u['MaLoaiSP'].'">'.$u['TenSP'].'</a></h3>
                    <p class="mb-0">'.$u['MoTa'].'</p>
                    <p class="text-primary font-weight-bold">'.$u['Gia'].' VND</p>
                  </div>
                </div>
              </div>
		 
		  ';
	  }
	  
?>
             
            </div>
          </div>
        </div>
    </div>
  </div>
  <!--Khuyến mãi-->
  <div class="site-section block-8">
    <div class="container">
      <div class="row justify-content-center  mb-5">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Siêu khuyến mãi!</h2>
        </div>
      </div>
      <?php
	include( '../Control/tintuc_class.php' );
$tintuc = new Tintuc_class();
	foreach($tintuc->select_loaiTT_tintuc_control($loai = 1) as $u)
	{
		echo '
		<div class="row align-items-center">
        <div class="col-md-12 col-lg-7 mb-5"> <a href="#"><img src="../Data/images/TinTuc/'.$u['HinhTT'].'" alt="Image placeholder" class="img-fluid rounded"></a>
		</div>
        <div class="col-md-12 col-lg-5 text-center pl-md-5">
          <h2><a href="#">'.$u['TieuDe'].'</a></h2>
          <p class="post-meta mb-4">Từ <a href="#">'.$u['NgayBD'].'</a> <span class="block-8-sep">&bullet;</span>'.$u['NgayKT'].' </p>
          <p>'.$u['NoiDung'].'</p>
          <p><a href="#" class="btn btn-primary btn-sm">Shop Now</a></p>
        </div>
      </div>
		';
	}
		?>
    </div>
  </div>
	
	
  <?php include('footer.php')?>
</div>
<?php include('script.php')?>
</body>
</html>