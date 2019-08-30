<?php
include( '../Model/ketnoi.php' );
$db = new database();
$db->connect();
include( '../Control/sanpham_class.php' );
include( '../Control/chucnang_class.php' );
$chucnang = new chucnang_class();
$sanpham = new sanpham_class();
?>
<!DOCTYPE html>
<html lang="vn">
<?php include('header.php'); ?>

<body>

	<div class="site-wrap">
		<?php include('navbar.php'); ?>
<!--chỉ mục đường dẫn-->
		<div class="bg-light py-3">
			<div class="container">
				<div class="row">
					<div class="col-md-12 mb-0"><a href="index.php">Trang Chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Tìm kiếm</strong>
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
									<h2 class="text-black h5">Sản phẩm bạn tìm</h2>
								</div>
								<div class="d-flex">
									<div class="dropdown mr-1 ml-md-auto">	
									</div>
									<!--lọc sản phẩm-->
									<div class="btn-group">
										<button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Sắp xếp</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
											<a class="dropdown-item" href="#">Liên quan</a>
											<a class="dropdown-item" href="#">Tên, A - Z</a>
											<a class="dropdown-item" href="#">Tên, Z - A</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">Giá, thấp đến cao</a>
											<a class="dropdown-item" href="#">Giá, cao đến thấp</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--hinh san pham-->
						<div class="row mb-5">

							<?php
							$timkiem = $_REQUEST['tk'];
								foreach ( $chucnang->timkiem_class($timkiem ) as $u )
								{					
								echo '							
								<div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
								<div class="block-4 text-center border">
									<figure class="block-4-image">
										<a href="shop-single.html"><img src="../Data/images/SanPham/'. $u[ 'Hinh' ] . '" alt="Image placeholder" class="img-fluid"></a>
									</figure>
									<div class="block-4-text p-4">
										<h3><a href="shop-single.php?masp='.$u['MaSP'].'&maloaisp='.$u['MaLoaiSP'].'">' . $u[ 'TenSP' ] . '</a></h3>
										<p class="mb-0">Finding perfect t-shirt</p>
										<p class="text-primary font-weight-bold">' . $u[ 'Gia' ] . '</p>
									</div>
								</div>
							</div>
								';
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
					<!--menu ten loại sản phẩm -->
					<div class="col-md-3 order-1 mb-5 mb-md-0">
						<div class="border p-4 rounded mb-4">
							<?php //include('menu_tenloaisp.php')
							echo '<h3 class="mb-3 h6 text-uppercase text-black d-block"> Danh Mục Sản Phẩm </h3>';
							
							echo '<ul class="list-unstyled mb-0">';		
							foreach ( $sanpham->select_danhmuc_c() as $u ) 
							{
							
								echo '
								   <li class="mb-1">
									   <a href="shop.php?madanhmuc='.$u['MaDM'].'" class="d-flex">
										   <span>'. $u[ 'TenDM' ] . '</span>
										   
									   </a>
								   </li>
			  ';							
							}
							echo ' </ul>';
							?>
						</div>		
					</div>
				</div>
			</div>
		</div>
		<?php include('script.php')?>
</body>
</html>