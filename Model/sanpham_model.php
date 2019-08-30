<?php
require_once( "ketnoi.php" );
error_reporting( 0 );
class sanpham_model extends database {

function demsodong_model($table )
    {
        $con = $this->connect();
		$sql = "select MaSP from $table  ";
		$ketqua = mysqli_query($con,$sql);
		 $result = array();
     
    if ($sql){
        while ($row = mysqli_fetch_array($ketqua)){
            $result[] = $row;
        }
    }
    }
    function select_ID_sanpham_model( $id, $table ) {

        $con = $this->connect();
        $sql = "select * from $table where MaSP ='$id' ";
        $ketqua = mysqli_query( $con, $sql );
        $result = array();

        if ( $sql ) {
            while ( $row = mysqli_fetch_array( $ketqua ) ) {
                $result[] = $row;
            }
        }
        return $result;
    }

    function select_sanpham_model( $table ) {
        $con = $this->connect();
        $sql = "select * from $table";

        $ketqua = mysqli_query( $con, $sql );
        $result = array();
        if ( $sql ) {
            while ( $row = mysqli_fetch_array( $ketqua ) ) {
                $result[] = $row;
            }
        }

        return $result;
    }

    function danhsach_sp_model( $table ) {
        $con = $this->connect();
        $sql = "select * from $table";

        $ketqua = mysqli_query( $con, $sql );
        $result = array();
        if ( $sql ) {
            while ( $row = mysqli_fetch_array( $ketqua ) ) {
                $result[] = $row;
            }
        }

        return $result;
    }

    function select_tatca_sanpham_theoMaLoaiSP_loaisanpham_model( $maloaisp, $table ) {
        $con = $this->connect();
        $sql = "select * from $table where MaLoaiSP = '$maloaisp' ";

        $ketqua = mysqli_query( $con, $sql );
        $result = array();
        if ( $sql ) {
            while ( $row = mysqli_fetch_array( $ketqua ) ) {
                $result[] = $row;
            }
        }
        return $result;

    }

    function select_chitiet_sanpham_theoID_model( $id, $table ) {
        $con = $this->connect();
        $sql = "select * from $table where MaSP = '$id' ";
        $ketqua = mysqli_query( $con, $sql );
        $result = array();
        if ( $sql ) {
            while ( $row = mysqli_fetch_array( $ketqua ) ) {
                $result[] = $row;
            }
        }
        return $result;
    }

    function select_danhmuc_model( $table1 ) {
        $con = $this->connect();
        $sql = "select * from $table1 ";
        $ketqua = mysqli_query( $con, $sql );
        $result = array();
        if ( $sql ) {
            while ( $row = mysqli_fetch_array( $ketqua ) ) {
                $result[] = $row;
            }
        }
        return $result;
    }

    function select_tatca_sanpham_theoID_loaisanpham_model( $id, $table, $sapxep ) {
        $con = $this->connect();
        $sql = "select * from $table where MaLoaiSP = '$id' order by $sapxep ";
        $ketqua = mysqli_query( $con, $sql );
        $result = array();
        if ( $sql ) {
            while ( $row = mysqli_fetch_array( $ketqua ) ) {
                $result[] = $row;
            }
        }
        return $result;

    }

    function select_id_layten_danhmuc_model( $id, $table ) {
        $con = $this->connect();
        $sql = "select * from $table where MaDM = '$id' ";
        $ketqua = mysqli_query( $con, $sql );
        $result = array();
        if ( $sql ) {
            while ( $row = mysqli_fetch_array( $ketqua ) ) {
                $result[] = $row;
            }
        }
        return $result;
    }

    function dem_SLSP_model( $id, $table ) {
        $con = $this->connect();
        $sql = "select TenSP from $table where MaLoaiSP = '$id' ";
        $ketqua = mysqli_query( $con, $sql );
        $result = array();
        if ( $sql ) {
            while ( $row = mysqli_fetch_array( $ketqua ) ) {
                $result[] = $row;
            }
        }
        $sl = count( $result );
        return $sl;

    }

    function select_id_loaisp_sanpham_model( $id, $table ) {
        $con = $this->connect();
        $sql = "select * from $table where MaDM = '$id' ";
        $ketqua = mysqli_query( $con, $sql );
        $result = array();
        if ( $sql ) {
            while ( $row = mysqli_fetch_array( $ketqua ) ) {
                $result[] = $row;
            }
        }
        return $result;
    }

  function select_tatca_sanpham_theoID_danhmuc_model( $id, $table1, $table2, $table3, $sapxep ) {
        $con = $this->connect();
        $sql = "SELECT * FROM $table1 s JOIN $table2 l 
on s.MaLoaiSP=l.MaLoaiSP JOIN $table3 d  on l.MaDM = d.MaDM 
WHERE d.MaDM = '$id' ORDER BY $sapxep";
        $ketqua = mysqli_query( $con, $sql );
      
        $result = array();
        if ( $sql ) {
            while ( $row = mysqli_fetch_array( $ketqua ) ) {
                $result[] = $row;
            }
        }
        return $result;

    }


    function insert_sanpham_model( $table, $masp, $tensp, $giasp, $mota, $motact, $maloaisp, $name_hinh, $local_hinh ) {

        $con = $this->connect();
        $N = count( $masp );
        var_dump($N);
        for ( $i = 0; $i < $N; $i++ ) {
            $sql = "INSERT INTO $table(TenSP,Gia,MoTa,MoTaChiTiet,Hinh,MaLoaiSP)
		VALUES ('$tensp[$i]','$giasp[$i]','$mota[$i]','$motact[$i]','$name_hinh[$i]','$maloaisp[$i]')";
            $ketqua = mysqli_query( $con, $sql );
       // var_dump($sql);
          //var_dump($ketqua);
           
        }
         if ( !$ketqua ) {
                return 0;
            }
            return 1;

    }

    function update_sanpham_model( $table, $masp, $tensp, $giasp, $mota, $motact, $maloaisp, $name_hinh, $local_hinh ) {
        $N = count( $masp );
        $con = $this->connect();
        for ( $i = 0; $i < $N; $i++ ) {
            $sql = "
	update $table set TenSP = '$tensp[$i]',Gia = '$giasp[$i]',
	MoTa = '$mota[$i]', MoTaChiTiet = '$motact[$i]' , MaLoaiSP = '$maloaisp[$i]', Hinh = '$name_hinh[$i]'
	where MaSP = '$masp[$i]'";
            $ketqua = mysqli_query( $con, $sql );
            //var_dump($sql);
          //var_dump($ketqua);
            
        }
        if ( !$ketqua ) {
                return 0;
            }
            return 1;

    }

    function delete_sanpham_model( $id, $table ) {
        $con = $this->connect();

        $sql = " delete from $table where MaSP = '$id' ";
        $ketqua = mysqli_query( $con, $sql );
 //var_dump($sql);
// var_dump($ketqua);
        if ( !$ketqua ) 
        {
            return 0;
        }
        return 1;
    }





    function insert_hoadon_model( $data, $idtk ) {
        $link = $this->connect();
        $sql = "insert into hoadon(NgayLapHD,id,MaSP,Gia,SoLuong,TongSoTien) values('$data[2]','$idtk','$data[0]','$data[1]','$data[3]',('$data[1]'*'$data[3]'))";
        $kq = mysqli_query( $link, $sql );
        return $kq;
    }

    function select_giohang_theoIdKH_model( $id ) {
        $link = $this->connect();
        $sql = "select * from hoadon h join sanpham s on s.MaSP = h.MaSP where h.
		id = '$id'";
        $kq = mysqli_query( $link, $sql );
        $i = mysqli_num_rows( $kq );
        $result = array();
        if ( $i > 0 ) {
            while ( $row = mysqli_fetch_array( $kq ) ) {
                $result[] = $row;
            }
        }
        return $result;
    }

    function kiemtra_sptontai_giohang_theoIDKH_model( $id, $masp ) {
        $link = $this->connect();
        $sql = "select * from hoadon where id = '$id' and MaSP='$masp'";
        $kq = mysqli_query( $link, $sql );
        $i = mysqli_num_rows( $kq );

        if ( $i == 0 ) {
            return true;
        } else {
            return false;
        }
    }

    function update_sp_giohang_model( $data, $id ) {
        $link = $this->connect();
        $sql = "update hoadon set NgayLapHD='$data[2]', SoLuong='$data[3]',TongSoTien=('$data[1]'*'$data[3]') where id='$id' and MaSP='$data[0]'";
        $kq = mysqli_query( $link, $sql );
        return $kq;


    }

    function delete_sp_giohang_model( $mahd ) {
        $link = $this->connect();
        $sql = "delete from hoadon where MaHD='$mahd'";
        $kq = mysqli_query( $link, $sql );
        //var_dump($sql);
       //  var_dump($kq);
        
        return $kq;
    }

}




?>