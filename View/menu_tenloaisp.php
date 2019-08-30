<?php

							foreach ( $sanpham->select_id_layten_danhmuc_c( $id_danhmuc_menu_sanpham ) as $u)
							{
								echo '<h3 class="mb-3 h6 text-uppercase text-black d-block">'.$u['TenDM'].' </h3>';
							}
							echo '<ul class="list-unstyled mb-0">';		
							foreach ( $sanpham->select_id_loaisp_sanpham_c( $id_danhmuc_menu_sanpham ) as $u ) 
							{
								$id_lsp=  $u[ 'MaLoaiSP' ];
								
								echo '
								   <li class="mb-1">
									   <a href="Shoptheoloai.php?maloaisp='.$id_lsp.'&madanhmuc='.$id_danhmuc_menu_sanpham.'" class="d-flex">
										   <span>'. $u[ 'TenLoaiSP' ] . '</span>
										   <span class="text-black ml-auto">
										   '.$sanpham->dem_soluong_sanpham( $id_lsp ) . '
										   </span>
									   </a>
								   </li>
			  ';							
							}
							echo ' </ul>';
							
?>