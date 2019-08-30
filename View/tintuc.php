<?php
include( '../Model/ketnoi.php' );
$db = new database();
$db->connect();
include( '../Control/tintuc_class.php' );
$tintuc = new Tintuc_class();
?>
<!doctype html>
<html>
<?php include('header.php')?>
<body>
<?php include('navbar.php')?>
	<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Trang Chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Tin Tức</strong></div>
        </div>
      </div>
    </div>  
<div class="site-section block-8">
    <div class="container">
      <div class="row justify-content-center  mb-5">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Siêu khuyến mãi!</h2>
        </div>
      </div>
		<!--tin tuc loại 1-->
		<?php
	
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
	<div class="container">
      <div class="row justify-content-center  mb-5">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Hoa Tin Tức</h2>
        </div>
      </div>
		<!--tin tuc loai 2-->
		<?php 
		$dem = 1;
		foreach($tintuc->select_loaiTT_tintuc_control($loai = 2) as $u)
	{
			if($dem % 2 == 0)
			{
				echo '
				<div class="row align-items-center">
        <div class="col-md-12 col-lg-4 mb-5"> <a href="#"><img src="../Data/images/TinTuc/'.$u['HinhTT'].'" alt="Image placeholder" class="img-fluid rounded"></a>
		</div>
        <div class="col-md-12 col-lg-8 text-center pl-md-5">
          <h2><a href="#">'.$u['TieuDe'].'</a></h2>
          <p class="post-meta mb-4">Từ <a href="#">'.$u['NgayBD'].'</a> <span class="block-8-sep">&bullet;</span>'.$u['NgayKT'].' </p>
          <p>'.$u['NoiDung'].'</p>
          <p><a href="#" class="btn btn-primary btn-sm">Shop Now</a></p>
        </div>
      </div>
				';
			}
			if($dem % 2 != 0)
			{
				echo '<div class="row align-items-center">
       
        <div class="col-md-12 col-lg-8 text-center pl-md-5">
          <h2><a href="#">'.$u['TieuDe'].'</a></h2>
          <p class="post-meta mb-4">Từ <a href="#">'.$u['NgayBD'].'</a> <span class="block-8-sep">&bullet;</span>'.$u['NgayKT'].' </p>
          <p>'.$u['NoiDung'].'</p>
          <p><a href="#" class="btn btn-primary btn-sm">Shop Now</a></p>
        </div>
		 <div class="col-md-12 col-lg-4 mb-5"> <a href="#"><img src="../Data/images/TinTuc/'.$u['HinhTT'].'" alt="Image placeholder" class="img-fluid rounded"></a>
		</div>
      </div>';
			}
			$dem ++;
		}
		?>
      
		
    </div>
  </div>
<?php include('footer.php')?>
<?php include('script.php')?>
</body>
</html>