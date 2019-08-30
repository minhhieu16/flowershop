<?php

require_once("ketnoi.php");
class taikhoan_model extends database
{
		function dangky_model($data,$table)
	{
		$link= $this->connect();
		$sql = "insert into $table (TenTK,MatKhau,Email) values('$data[0]','$data[2]','$data[1]')";
		$kq = mysqli_query($link,$sql);
		// ham select thi moi tra ve ket qua
		// ham insert, delete thi chi tra ve true false
		if ($kq == true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function ktra_email($email)
	{
		$link = $this->connect();
		
		$sql= "select Email from taikhoan where Email ='$email' LIMIT 1";
		$kq = mysqli_query($link,$sql);
		$i = mysqli_num_rows($kq);
		if($i==1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function ktra_ten($ten)
	{
		$link = $this->connect();
		$sql= "select TenTK from taikhoan where TenTK ='$ten' LIMIT 1";
		$kq = mysqli_query($link,$sql);
		$i = mysqli_num_rows($kq);
		if($i==1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function dangnhap_model($user)
	{
		$link = $this->connect();
		
		$sql = "select * from taikhoan where TenTK = '$user'";
		$kq = mysqli_query($link,$sql);
		$i= mysqli_num_rows($kq);
		if($i!=1)
		{
			return 0;
		}
		else
		{
			while($row = mysqli_fetch_array($kq))
			{
				return $row;
			}
			
		}
	
	}
	
	function thongtincanhan_model($id)
	{
		$link = $this->connect();
		
		$sql = "select * from taikhoan where id = '$id' limit 1";
		$kq = mysqli_query($link,$sql);
		//var_dump($sql);
		$result = array();
		
			while($row = mysqli_fetch_array($kq))
			{
				$result[] = $row;
			}
				
			return $result;
			//var_dump($result);
		
	}
	function capnhat_thongtin_tk_model($ten,$sdt,$id)
	{
		$link=$this->connect();
		$sql ="update taikhoan set HoTen='$ten', SDT='$sdt' where id='$id'";
		$kq= mysqli_query($link,$sql);
		if(!$kq)
		{
			return false;
		}
		return true;
	}
	
	function update_hinh_model($id,$hinh)
	{
		$link=$this->connect();
		$sql="update taikhoan set HinhCN='$hinh' where id='$id'";
		$kq= mysqli_query($link,$sql);
		if(!$kq)
		{
			return false;
		}
		return true;
	}
	function ktra_matkhau_model($id)
	{
		$link= $this->connect();
		$sql = "select MatKhau from taikhoan where id='$id' limit 1";
		$kq = mysqli_query($link,$sql);
		
		$i=mysqli_num_rows($kq);
		if($i=1)
		{
			while($row=mysqli_fetch_array($kq))
			{
				return $row['MatKhau'];
			}
			
		}
		var_dump($row);
		
	}
	function doimatkhau_model($id,$pass)
	{
		$link = $this->connect();
		$sql = "update taikhoan set MatKhau ='$pass' where id = '$id' ";
		$kq = mysqli_query($link,$sql);
		if(!$kq)
		{
			return false;
		}
		return true;
	}
}
?>