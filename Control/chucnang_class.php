<?php

include(__DIR__ . '/../Model/chucnang_model.php');

class chucnang_class extends chucnang_model 
{
	function timkiem_class($search)
	{
		$ketqua= $this->select_search_model($search);
		return $ketqua;
	}
    function phantrang()
    {
    echo ' tong so trang '. $this->demsodong();
	$tongdong =  $this->demsodong();
	$gioihandong = 6;
	$tranghientai = isset($_GET['page'])?$_GET['page']:1;
    $sotrang = ceil($tongdong/$gioihandong);
	
	if($tranghientai > $sotrang )
	{
		$tranghientai = $sotrang;
	}
	elseif($tranghientai < 1)
	{
		$tranghientai = 1;
	}
	  echo ' trang hien tai : '. $tranghientai.'<br>';
	$start = ($tranghientai - 1 )*$gioihandong;
        
        $limitor = array(
        'start'=>$start,
        'limit'=>$gioihandong,
            'sotrang'=>$sotrang
        );
        return($limitor);
    }
}


?>