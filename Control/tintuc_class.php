<?php


include(__DIR__ . '/../Model/tintuc_model.php');
//include('../Admin/Model/tintuc_model.php');
class Tintuc_class extends tintuc_model
{
	function select_loaiTT_tintuc_control($loai )
	{
		$table = 'tintuc';
		$kq= $this->select_loaiTT_tintuc_model($loai,$table);
		return $kq;		
	}

	function select_ID_tintuc_control ($id)
	{
		$table = 'tintuc';
		$kq= $this->select_ID_tintuc_model($id,$table);
		return $kq;		
		
	}
	function select_danhsach_tintuc_control ()
	{
		$table = 'tintuc';
		$kq= $this->select_tintuc_model($table);
		return $kq;		
	}
    
    
    function upload_hinh_tintuc_control($matt,$name_hinh,$local_hinh)
	{	 
        $N = count($matt);
		for($i=0; $i < $N; $i++)
		{
          
            $loi = array();  
            $uploadOk = 1;
            $chimuc ='../Data/images/TinTuc/';
            $duongdan_hinh = $chimuc . basename($name_hinh[$i]);
            $check = getimagesize($local_hinh[$i]);
            $size = $_FILES["hinhtt"]["size"];
            $maxFileSize = 1024000; 
            $duoihinh = strtolower(pathinfo($name_hinh[$i],PATHINFO_EXTENSION));
            $expensions= array("jpeg","jpg","png");
            
        //    if($local_hinh[$i] == NULL)
       //     {
        //        $loi[] = "Không có file hình.<br>";  
       //          $uploadOk = 0;
        //    }
            if($check !== false)
            {
                //$loi[] = "File is an image - " . $check["mime"] . ".<br>";
                 $uploadOk = 1;
            } 
            else 
            {
                $loi[] = "Không phải file hình.<br>";  
                 $uploadOk = 0;
            }
           /* if (file_exists($duongdan_hinh))
            {
               $loi[] = "Đã tồn tại hình.<br>";  
                 $uploadOk = 0;
            }*/
            if ($size[$i] > $maxFileSize  )
            {
                $loi[] = "Kích thước lớn hơn 700kb luôn.<br>";  
                 $uploadOk = 0;
            }
            if(in_array($duoihinh,$expensions)=== false)
            {

            $loi[] = "Sorry, chỉ dùng JPG, JPEG, PNG & GIF <br>        ";  
                 $uploadOk = 0;
            }  
           //---------- kiểm tra cuối
            if($uploadOk == 1)
            {
                if ( move_uploaded_file($local_hinh[$i],$duongdan_hinh) == 1)
                {
                    $loi[] = "file ". basename($name_hinh[$i]). " đã được tải."; 
                }
                return 1;
            }
            
            else 
            {
                echo 'loi hinh '.$i.'<br>';
                  
                foreach($loi as $loi)
                {
                  echo $loi;
                   
                }
                
               return 0 ; 
            }
            
        }    
          
    }
    function insert_tintuc_control($matt ,$ngaydang,$ngaykt,$tieude,$noidung,$loaitt,$name_hinh,$local_hinh)
	{
		$table='tintuc';
$kq_upload_img = $this->upload_hinh_tintuc_control($matt,$name_hinh,$local_hinh);
 $kq = $this->insert_tintuc_model($matt,$table,$ngaydang,$ngaykt,$tieude,$noidung,$name_hinh,$loaitt);
         if( $kq_upload_img == 1)
        {
       
            if($kq )
            {
                 echo "<script language=javascript>alert('thêm thành công!');</script>";
               
            }
             else
        {
            echo "<script language=javascript>alert('thêm thất bại!');</script>";
        }
		 }
      
	}
	function update_tintuc_control($matt,$ngaydang,$ngaykt,$tieude,$noidung,$loaitt,$name_hinh,$local_hinh)
	{
		$table = 'tintuc';
        $kq_upload_img = $this->upload_hinh_tintuc_control($matt,$name_hinh,$local_hinh);
          $kq = $this->update_tintuc_model($table,$matt,$ngaydang,$ngaykt,$tieude,$noidung,$loaitt,$name_hinh);
         if( $kq_upload_img == 1)
        {
           
             if($kq )
            {
                 echo "<script language=javascript>alert('Cập nhật thành công!');</script>";
            } 
            else
        {
            echo "<script language=javascript>alert('Cập nhật thất bại!');</script>";
        }
        }
      
		
	}
	function delete_tintuc_control($id)
	{
		$table = 'tintuc';
		$ketqua = $this->delete_tintuc_model($id,$table);
		if($ketqua)
        {
            // echo "<script language=javascript>alert('Xóa thành công!');</script>";
        }
	
		
	}
	
}

?>