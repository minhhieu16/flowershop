<?php
include( '../Model/ketnoi.php' );
$db = new database();
$db->connect();
include( '../Control/sanpham_class.php' );
$sanpham = new sanpham_class();
$id_danhmuc_menu_sanpham = $_REQUEST['madanhmuc'];
$id_loaisp_menu_sanpham = $_REQUEST[ 'maloaisp' ];
?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>

<body>
	<div class="site-wrap">
		<?php include('navbar.php'); ?>
<!--chỉ mục đường dẫn-->
		<div class="bg-light py-3">
			<div class="container">
				<div class="row">
					<div class="col-md-12 mb-0"><a href="index.php">Trang Chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Sản Phẩm</strong>
					</div>
				</div>
			</div>
		</div>

		<div class="site-section">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-9 order-2">
						<div class="row">
							<div class="col-md-12 mb-5">
								<div class="float-md-left mb-4">
									<h2 class="text-black h5">Tất cả sản phẩm</h2>
								</div>
								<div class="d-flex">
									<div class="dropdown mr-1 ml-md-auto">	
									</div>
									<!--lọc sản phẩm-->
									<div class="btn-group">
										<button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Sắp xếp</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
											<a class="dropdown-item" href="#">Liên quan</a>
											<a class="dropdown-item" href="shop.php?locsp=1&madanhmuc=<?php if(isset($id_danhmuc_menu_sanpham)){echo $id_danhmuc_menu_sanpham;} ?>&maloaisp =<?php if(isset($id_loaisp_menu_sanpham)){echo $id_loaisp_menu_sanpham;} ?>">Tên, A - Z</a>
											<a class="dropdown-item" href="shop.php?locsp=1&madanhmuc=<?php if(isset($id_danhmuc_menu_sanpham)){echo $id_danhmuc_menu_sanpham;} ?>&maloaisp =<?php if(isset($id_loaisp_menu_sanpham)){echo $id_loaisp_menu_sanpham;} ?>">Tên, Z - A</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="shop.php?locsp=1&madanhmuc=<?php if(isset($id_danhmuc_menu_sanpham)){echo $id_danhmuc_menu_sanpham;} ?>&maloaisp =<?php if(isset($id_loaisp_menu_sanpham)){echo $id_loaisp_menu_sanpham;} ?>">Giá, thấp đến cao</a>
											<a class="dropdown-item" href="shop.php?locsp=1&madanhmuc=<?php if(isset($id_danhmuc_menu_sanpham)){echo $id_danhmuc_menu_sanpham;} ?>&maloaisp =<?php if(isset($id_loaisp_menu_sanpham)){echo $id_loaisp_menu_sanpham;} ?>">Giá, cao đến thấp</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--hinh san pham-->
						<div class="row mb-5">

							<?php
							
							
							
							if(isset($_GET['locsp']))
							{
										$loc = $_GET['locsp'];
									if($loc == 1)
										{
											$sapxep = 'TenSP asc';
										
											foreach ( $sanpham->select_tatca_sanpham_theoID_loaisanpham_c($id_loaisp_menu_sanpham,$sapxep) as $u ) {
								
								echo '
								
								<div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
								<div class="block-4 text-center border">
									<figure class="block-4-image">
										<a href="shop-single.html"><img src="../Data/images/SanPham/' . $u[ 'Hinh' ] . '" alt="Image placeholder" class="img-fluid"></a>
									</figure>
									<div class="block-4-text p-4">
										<h3><a  href="shop-single.php?masp='.$u['MaSP'].'&maloaisp='.$u['MaLoaiSP'].'">' . $u[ 'TenSP' ] . '</a></h3>
										<p class="mb-0">Finding perfect t-shirt</p>
									<p class="text-primary font-weight-bold">' .number_format( $u[ 'Gia' ]) . ' VND </p>
									</div>
								</div>
							</div>
								';
							}
										}
									if($loc == 2)
										{
											$sapxep = 'TenSP desc';
											foreach ( $sanpham->select_tatca_sanpham_theoID_loaisanpham_c($id_loaisp_menu_sanpham,$sapxep) as $u ) {
								
								echo '
								
								<div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
								<div class="block-4 text-center border">
									<figure class="block-4-image">
										<a href="shop-single.html"><img src="../Data/images/SanPham/' . $u[ 'Hinh' ] . '" alt="Image placeholder" class="img-fluid"></a>
									</figure>
									<div class="block-4-text p-4">
										<h3><a  href="shop-single.php?masp='.$u['MaSP'].'&maloaisp='.$u['MaLoaiSP'].'">' . $u[ 'TenSP' ] . '</a></h3>
										<p class="mb-0">Finding perfect t-shirt</p>
									<p class="text-primary font-weight-bold">' .number_format( $u[ 'Gia' ]) . ' VND </p>
									</div>
								</div>
							</div>
								';
							}
										}
									if($loc == 3)
										{
											$sapxep = 'Gia asc';
											foreach ( $sanpham->select_tatca_sanpham_theoID_loaisanpham_c($id_loaisp_menu_sanpham,$sapxep) as $u ) {
								
								echo '
								
								<div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
								<div class="block-4 text-center border">
									<figure class="block-4-image">
										<a href="shop-single.html"><img src="../Data/images/SanPham/' . $u[ 'Hinh' ] . '" alt="Image placeholder" class="img-fluid"></a>
									</figure>
									<div class="block-4-text p-4">
										<h3><a  href="shop-single.php?masp='.$u['MaSP'].'&maloaisp='.$u['MaLoaiSP'].'">' . $u[ 'TenSP' ] . '</a></h3>
										<p class="mb-0">Finding perfect t-shirt</p>
									<p class="text-primary font-weight-bold">' .number_format( $u[ 'Gia' ]) . ' VND </p>
									</div>
								</div>
							</div>
								';
							}
										}
									if($loc == 4)
										{
											$sapxep = 'Gia desc';
											foreach ( $sanpham->select_tatca_sanpham_theoID_loaisanpham_c($id_loaisp_menu_sanpham,$sapxep) as $u ) {
								
								echo '
								
								<div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
								<div class="block-4 text-center border">
									<figure class="block-4-image">
										<a href="shop-single.html"><img src="../Data/images/SanPham/' . $u[ 'Hinh' ] . '" alt="Image placeholder" class="img-fluid"></a>
									</figure>
									<div class="block-4-text p-4">
										<h3><a  href="shop-single.php?masp='.$u['MaSP'].'&maloaisp='.$u['MaLoaiSP'].'">' . $u[ 'TenSP' ] . '</a></h3>
										<p class="mb-0">Finding perfect t-shirt</p>
									<p class="text-primary font-weight-bold">' .number_format( $u[ 'Gia' ]) . ' VND </p>
									</div>
								</div>
							</div>
								';
							}
										}
							
							}
							else
							{
								$sapxep = 'NULL';
								foreach ( $sanpham->select_tatca_sanpham_theoID_loaisanpham_c($id_loaisp_menu_sanpham,$sapxep) as $u ) {
								
								echo '
								
								<div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
								<div class="block-4 text-center border">
									<figure class="block-4-image">
										<a href="shop-single.html"><img src="../Data/images/SanPham/' . $u[ 'Hinh' ] . '" alt="Image placeholder" class="img-fluid"></a>
									</figure>
									<div class="block-4-text p-4">
										<h3><a  href="shop-single.php?masp='.$u['MaSP'].'&maloaisp='.$u['MaLoaiSP'].'">' . $u[ 'TenSP' ] . '</a></h3>
										<p class="mb-0">Finding perfect t-shirt</p>
									<p class="text-primary font-weight-bold">' .number_format( $u[ 'Gia' ]) . ' VND </p>
									</div>
								</div>
							</div>
								';
							}
							}
							
							?>
						</div>
						
<!--				phân trang 1-2-3-4		-->
				<div class="row" data-aos="fade-up">
							<div class="col-md-12 text-center">
								<div class="site-block-27">
									<ul>
										<li><a href="#">&lt;</a>
										</li>
										<li class="active"><span>1</span>
										</li>
										<li><a href="#">2</a>
										</li>
										<li><a href="#">3</a>
										</li>
										<li><a href="#">4</a>
										</li>
										<li><a href="#">5</a>
										</li>
										<li><a href="#">&gt;</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 order-1 mb-5 mb-md-0">
						<div class="border p-4 rounded mb-4">
						<?php include('menu_tenloaisp.php')?>
						</div>		
					</div>
				</div>
			</div>
		</div>
		<?php include('script.php')?>
</body>
</html>