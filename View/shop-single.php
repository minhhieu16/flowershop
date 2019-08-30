<?php
include( '../Model/ketnoi.php' );
$db = new database();
$db->connect();
include( '../Control/sanpham_class.php' );
$sanpham = new sanpham_class();

?>
<!DOCTYPE html>
<html lang="en">
  <?php include('header.php') ?>
  <body>
  
  <div class="site-wrap">
     <?php include('navbar.php') ?>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Trang Chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Chi Tiết Sản Phẩm</strong></div>
        </div>
      </div>
    </div>  
		
   
			  <?php
	$masp = $_REQUEST['masp'];
	foreach($sanpham->select_chitiet_sanpham_theoID_c($masp) as $u )
	{
		echo '<form method="get" >
		 <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="../Data/images/SanPham/'.$u['Hinh'].'" alt="Image" class="img-fluid">
			<input type="hidden" class="form-control text-center" value="'.$u['MaSP'].'" name="masp">
          </div>
          <div class="col-md-6">
		   <h2 class="text-black">'.$u['TenSP'].'</h2>
            <p>'.$u['MoTaChiTiet'].'</p>
            <p><strong class="text-primary h4">'.number_format( $u[ 'Gia' ]) .' VND</strong></p>
           
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input type="text" class="form-control text-center" name="soluong" value="1">
			  
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus"  type="button" >&plus;</button>
              </div>
            </div>
				<input type="submit" class="btn btn-primary" name="add" value="Thêm vào giỏ"
            </div>
			
			
          </div>
        </div>
      </div>
    </div>
	
		';
	}
	
	?>
	  </form>
	  <?php
		if(isset($_REQUEST["add"]))
		{
			echo '<script language="javascript">
			window.location="cart.php?masp='.$_REQUEST['masp'].'&sl='.$_REQUEST['soluong'].'"
			</script>';
			
		}
	  ?>
			
        


     <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Những Sản Phẩm Liên Quan</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
             
				<?php
	
	  $maloaisp_lienquansanpham=$_REQUEST['maloaisp'];
	  foreach($sanpham->select_tatca_sanpham_theoMaLoaiSP_loaisanpham_c($maloaisp_lienquansanpham) as $u)
	  {
		  echo '
		  <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="../Data/images/SanPham/'.$u['Hinh'].'" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="shop-single.php?masp='.$u['MaSP'].'">'.$u['TenSP'].'</a></h3>
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
		  

     <?php include('footer.php') ?>
  </div>

 <?php include('script.php') ?>
    
  </body>
</html>