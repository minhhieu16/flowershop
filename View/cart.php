<?php
include( '../Model/ketnoi.php' );
$db = new database();
$db->connect();
include( '../Control/sanpham_class.php' );
$sanpham = new sanpham_class();
error_reporting(0);
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
          <div class="col-md-12 mb-0"><a href="index.php">Trang Chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Giỏ Hàng</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post" name="cart" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Sản phẩm</th>
                    <th class="product-name">Tên sản phẩm</th>
                    <th class="product-price">Giá</th>
                    <th class="product-quantity">Số lượng</th>
                    <th class="product-total">Thành tiền</th>
                    <th class="product-remove">Xóa</th>
                  </tr>
                </thead>
                <tbody>
                    
                   
				<?php
						$masp = $_REQUEST['masp'];
					if(isset($masp))
						{
							$sanpham->insert_sp_giohang($masp,$_SESSION['id'],$_REQUEST['sl']);
						}
	
	
	
					if(isset($_SESSION['id']))
					{
						$arr = $sanpham->chitiet_giohang_c($_SESSION['id']);
						$total=0;
						
						foreach($arr as $u)
					{
							
							
							echo '<tr>
                             <form method="post" name="remove" id="remove"  action = " '.$_SERVER['PHP_SELF'].'"> 
								<td class="product-thumbnail">
								  <img src="../Data/images/SanPham/'.$u['Hinh'].'" alt="Image" class="img-fluid">
								</td>
								<td class="product-name">
								  <h2 class="h5 text-black">'.$u['TenSP'].'</h2>
								</td>
								<td>'.number_format($u['Gia']).' VND</td>
								<td>
								  <div class="input-group mb-3" style="max-width: 120px;">
									
									<input type="text" class="form-control text-center" value="'.$u['SoLuong'].'" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" disabled >
									
								  </div>

								</td>
								<td> <input type="text" class="form-control text-center" value="'.number_format($u['TongSoTien']).' VND " disabled></td>
                               
								<td> <input type="hidden" name="mahd" value="'.$u['MaHD'].'"> <button type= "submit" class="btn btn-primary btn-sm" name="xoa" id="xoa"> X </button>
								</td>
                                </form>
							  </tr>
							  ';
							  $total += $u['TongSoTien'];
						}
					}
					else
					{
						echo 'Vui Lòng đăng nhập';
					}
					
					
					?>
                  
								<tr>
								<td colspan="4" class="product-thumbnail"><h3>Tổng số tiền:</h3></td>
								<td> <input type="text" class="form-control text-center" value="<?php
									echo number_format($total) .' VND';
									
									?>" disabled></td>
								</tr>
                </tbody>
              </table>
            </div>
          </form>
         
			<?php
		
				if(isset($_REQUEST['xoa']))
				{
				    $id = isset($_REQUEST['mahd'])?$_REQUEST['mahd']:'';
				    echo 'ma hoa don '. var_dump($id);
				   if(isset($id))
				   {
				       	$sanpham->delete_sp_giohang($id);
				   }
				
				
				
				 
				}
			?>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="checkout.php" class="btn btn-outline-primary btn-sm btn-block">Thanh Toán</a>  
            </div>
        </div>
      </div>
    </div>

    <?php include('footer.php') ?>
  </div>
<?php include('script.php') ?>
     <script>
          function removesp(){
              document.cart.action="cart.php";
              document.cart.submit();
          }
             
          </script>
  </body>
</html>