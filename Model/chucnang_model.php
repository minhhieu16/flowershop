<?php

require_once("ketnoi.php");
class chucnang_model extends database
{
	
	function select_search_model($search)
	{
		
		$con = $this->connect();
		$sql = "select * from sanpham  where TenSP like '%$search%' ";
		$ketqua = mysqli_query($con,$sql);
		 $result = array();
     
    if ($sql)
    {
        while ($row = mysqli_fetch_array($ketqua)){
            $result[] = $row;
        }
    }
    else
    {
        echo "không có thứ bạn cần tìm ^.^";
    }
    return $result;
		
	
	}
	
	
}


?>