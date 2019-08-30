<?php
if ( isset( $id_maloaisp ) )
{
	foreach ( $sanpham->select_tatca_sanpham_theoID_loaisanpham_c( $id_maloaisp ) as $u ) 
	{
	echo '
		<div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
		<div class="block-4 text-center border">
		<figure class="block-4-image">
		<a href="shop-single.html"><img src="../Data/images/SanPham/' . $u[ 'Hinh' ] . '" alt="Image placeholder" class="img-fluid"></a>
		</figure>
		<div class="block-4-text p-4">
		<h3><a href="shop-single.html">' . $u[ 'TenSP' ] . '</a></h3>
		<p class="mb-0">Finding perfect t-shirt</p>
		<p class="text-primary font-weight-bold">' . $u[ 'Gia' ] . '</p>
		</div>
		</div>
		</div>
	';
	}
}

?>