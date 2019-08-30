<?php

//include(__DIR__.'/../Model/sanpham_model.php');
include( '../Model/sanpham_model.php' );

class sanpham_class extends sanpham_model 
{

function demsodong()
    {
        $table = 'sanpham';
        $kq = $this->demsodong_model($table );
        return $kq;
    }
    function select_ID_sanpham_control( $id ) {
        $table = 'sanpham';
        $kq = $this->select_ID_sanpham_model( $id, $table );
        return $kq;

    }

    function danhsach_sp() {
        $table = 'sanpham';
        $kq = $this->danhsach_sp_model( $table );
        return $kq;
    }


    function select_chitiet_sanpham_theoID_c( $id ) {
        $table = 'sanpham';
        $kq = $this->select_chitiet_sanpham_theoID_model( $id, $table );
        return $kq;

    }

    function select_tatca_sanpham_theoID_loaisanpham_c( $id, $sapxep ) {
        $table = 'sanpham';
        $kq = $this->select_tatca_sanpham_theoID_loaisanpham_model( $id, $table, $sapxep );
        return $kq;

    }

    function select_id_layten_danhmuc_c( $id ) {
        $table = 'danhmuc';
        $kq = $this->select_id_layten_danhmuc_model( $id, $table );
        return $kq;
    }

    function select_danhmuc_c() {
        $table1 = 'danhmuc';
        $kq = $this->select_danhmuc_model( $table1 );
        return $kq;
    }

    function dem_soluong_sanpham( $id ) {
        $table = 'sanpham';
        $kq = $this->dem_SLSP_model( $id, $table );
        return $kq;
    }

    function select_id_loaisp_sanpham_c( $id ) {
        $table = 'loaisp';
        $kq = $this->select_id_loaisp_sanpham_model( $id, $table );
        return $kq;
    }

    function select_sanpham_maloaisp_c() {
        $table = 'loaisp';
        $kq = $this->select_sanpham_model( $table );
        return $kq;
    }

     function select_tatca_sanpham_theoID_danhmuc_c( $id, $sapxep ) {
        $table1 = 'sanpham';
        $table2 = 'loaisp';
        $table3 = 'danhmuc';
       // $phantrang = $this->phantrang();
       
        $kq = $this->select_tatca_sanpham_theoID_danhmuc_model( $id, $table1, $table2, $table3, $sapxep);
        return $kq;
        
       
    }


    function upload_hinh_sanpham_control( $masp, $name_hinh, $local_hinh ) {
        $N = count( $masp );
        for ( $i = 0; $i < $N; $i++ ) {
            $loi = array();
            $uploadOk = 1;
            $chimuc = '../Data/images/SanPham/';
            $duongdan_hinh = $chimuc . basename( $name_hinh[ $i ] );
            $check = getimagesize( $local_hinh[ $i ] );
            $size = $_FILES[ "hinhsp" ][ "size" ];
            $maxFileSize = 1024000;
            $duoihinh = strtolower( pathinfo( $name_hinh[ $i ], PATHINFO_EXTENSION ) );
            $expensions = array( "jpeg", "jpg", "png" );

            if ( $local_hinh[ $i ] == NULL ) {
                $loi[] = "Không có file hình.<br>";
                $uploadOk = 0;
            }
            if ( $check !== false ) {
                //$loi[] = "File is an image - " . $check["mime"] . ".<br>";
                $uploadOk = 1;
            } else {
                $loi[] = "Không phải file hình.<br>";
                $uploadOk = 0;
            }
            /* if (file_exists($duongdan_hinh))
             {
                $loi[] = "Đã tồn tại hình.<br>";  
                  $uploadOk = 0;
             }*/
            if ( $size[ $i ] > $maxFileSize ) {
                $loi[] = "Kích thước lớn hơn 700kb luôn.<br>";
                $uploadOk = 0;
            }
            if ( in_array( $duoihinh, $expensions ) === false ) {

                $loi[] = "Sorry, chỉ dùng JPG, JPEG, PNG & GIF <br>        ";
                $uploadOk = 0;
            }
            //---------- kiểm tra cuối
            if ( $uploadOk == 1 ) {
                if ( move_uploaded_file( $local_hinh[ $i ], $duongdan_hinh ) == 1 ) {
                    $loi[] = "file " . basename( $name_hinh[ $i ] ) . " đã được tải.";
                }
                return 1;
            } else {
                echo 'loi hinh ' . $i . '<br>';

                foreach ( $loi as $loi ) {
                    echo $loi;

                }

                return 0;
            }

        }

    }


    function insert_sanpham_control( $masp, $tensp, $giasp, $mota, $motact, $maloaisp, $name_hinh, $local_hinh ) {
        $table = 'sanpham';
        // insert_sanpham_control($masp,$tensp,$giasp,$mota,$motact,$maloaisp,$name_hinh,$local_hinh)
        $kq_upload_img = $this->upload_hinh_sanpham_control( $masp, $name_hinh, $local_hinh );
         $kq = $this->insert_sanpham_model( $table, $masp, $tensp, $giasp, $mota, $motact, $maloaisp, $name_hinh, $local_hinh );
        if ( $kq_upload_img == 1 ) {
           
            if ( $kq ) {
                echo "<script language=javascript>alert('thêm thành công!');</script>";

            }
        } else {
            echo "<script language=javascript>alert('thêm thất bại!');</script>";
        }
    }

    function update_sanpham_control( $masp, $tensp, $giasp, $mota, $motact, $maloaisp, $name_hinh, $local_hinh ) {
        $table = 'sanpham';
        $kq_upload_img = $this->upload_hinh_sanpham_control( $masp, $name_hinh, $local_hinh );
        $kq = $this->update_sanpham_model( $table, $masp, $tensp, $giasp, $mota, $motact, $maloaisp, $name_hinh, $local_hinh );
        if ( $kq_upload_img == 1 ) {


            if ( $kq ) {
                echo "<script language=javascript>alert('Cập nhật thành công!');</script>";
            }
        } else {
            echo "<script language=javascript>alert('Cập nhật thất bại!');</script>";
        }

    }

    function delete_sanpham_control( $id ) {
        $table = 'sanpham';
        $ketqua = $this->delete_sanpham_model( $id, $table );
        if ( $ketqua ) {
            echo "<script language=javascript>alert('Xóa thành công!');</script>";
        }
        return $ketqua;

    }

    function select_tatca_sanpham_theoMaLoaiSP_loaisanpham_c( $maloaisp ) {
        $table = 'sanpham';
        $kq = $this->select_tatca_sanpham_theoMaLoaiSP_loaisanpham_model( $maloaisp, $table );
        return $kq;
    }




  
    // them vao bang chi tiet hoa don
    function insert_sp_giohang( $idsp, $idtk, $sl ) // id này lấy đc nè
    {
        $table = 'sanpham';
        // kiểm tra xem tài khoản đã có sp nào trong hóa đơn chưa
        if ( $this->kiemtra_sptontai_giohang_theoIDKH_model( $idtk, $idsp ) == true ) {
            //nếu chưa có thì insert sp vào hóa đơn
            $ctsp = $this->select_chitiet_sanpham_theoID_model( $idsp, $table ); //truyền vào lấy đc ra thông tin 
            foreach ( $this->select_chitiet_sanpham_theoID_c( $idsp ) as $a ) {
                $ngaylap = date( "d-m-y" );
                $msp = $a[ 'MaSP' ];
                $gia = $a[ 'Gia' ];
                $soluong = $sl;
                $data = array( $msp, $gia, $ngaylap, $soluong );

                $kq = $this->insert_hoadon_model( $data, $idtk );
            }
        } else {
            //nếu có rồi thì update sp trong hóa đơn
            $ctsp = $this->select_chitiet_sanpham_theoID_model( $idsp, $table ); //truyền vào lấy đc ra thông tin 
            foreach ( $this->select_chitiet_sanpham_theoID_c( $idsp ) as $a ) {
                $ngaylap = date( "d-m-y" );
                $msp = $a[ 'MaSP' ];
                $gia = $a[ 'Gia' ];
                $soluong = $sl;
                $data = array( $msp, $gia, $ngaylap, $soluong );

                $kq = $this->update_sp_giohang_model( $data, $idtk );

            }
        }

    }

    function chitiet_giohang_c( $id ) {
        $kq = $this->select_giohang_theoIdKH_model( $id );
        return $kq;
    }

    function delete_sp_giohang( $mahd ) {
        $kq = $this->delete_sp_giohang_model( $mahd );
        if($kq)
        {
            echo '<script language="javascript">window.location="cart.php"</script> ';
        }
    }
}
?>