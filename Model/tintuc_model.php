<?php

require_once("ketnoi.php");
class tintuc_model extends database
{
	function select_loaiTT_tintuc_model($loai,$table)
	{
		$con = $this->connect();
		$sql = "select * from $table where LoaiTT ='$loai' ";
		$ketqua = mysqli_query($con,$sql);
		 $result = array();
     
    if ($sql){
        while ($row = mysqli_fetch_array($ketqua)){
            $result[] = $row;
        }
    }
    return $result;
	}
	function select_ID_tintuc_model($id,$table)
	{
		
		$con = $this->connect();
		$sql = "select * from $table where MaTT ='$id' ";
		$ketqua = mysqli_query($con,$sql);
		 $result = array();
     
    if ($sql){
        while ($row = mysqli_fetch_array($ketqua)){
            $result[] = $row;
        }
    }
    return $result;
		
	}
	function select_tintuc_model($table)
	{
		
		$con = $this->connect();
		$sql = "select * from $table ";
		$ketqua = mysqli_query($con,$sql);
		 $result = array();
     
    if ($sql){
        while ($row = mysqli_fetch_array($ketqua)){
            $result[] = $row;
        }
    }
    return $result;
		
	}

     

	function insert_tintuc_model($matt,$table,$ngaydang,$ngaykt,$tieude,$noidung,$name_hinh,$loaitt)
	{
		
		
		$con = $this->connect();
		$N = count($matt);	
		for($i=0; $i < $N; $i++)
		{	
		$sql = "INSERT INTO $table(NgayDang,NgayKT,TieuDe,NoiDung,HinhTT,LoaiTT)
		VALUES ('$ngaydang[$i]','$ngaykt[$i]','$tieude[$i]','$noidung[$i]','$name_hinh[$i]','$loaitt[$i]')";
		$ketqua = mysqli_query($con,$sql);	
        
		}
		if(!$ketqua)
		{
			return 0;
		}
		return 1;
		
	}
	function update_tintuc_model($table,$matt,$ngaydang,$ngaykt,$tieude,$noidung,$loaitt,$name_hinh)
	{
		$N = count($matt);
		$con = $this->connect();
		for($i=0; $i < $N; $i++)
		{
	$sql = "
	update $table set NgayDang = '$ngaydang[$i]',NgayKT = '$ngaykt[$i]',
	TieuDe = '$tieude[$i]', NoiDung = '$noidung[$i]' , LoaiTT = '$loaitt[$i]', HinhTT = '$name_hinh[$i]'
	where MaTT = '$matt[$i]'";
	$ketqua = mysqli_query($con,$sql);
//	var_dump($sql);
//	var_dump($ketqua);	
      
		}   
		   if(!$ketqua)
		{
			return 0;
		}
		return 1;
			
	}
	function delete_tintuc_model($id,$table)
	{
		$con = $this->connect();
		$sql = " delete from $table where MaTT = '$id' ";
		$ketqua = mysqli_query($con,$sql);
		
//	var_dump($sql);
	//	var_dump($ketqua);
		
		if(!$ketqua)
		{
			return 0;
		}
		return 1;

	}
}


?>