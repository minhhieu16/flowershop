<?php
include('../Model/taikhoan_model.php');
class taikhoan_control extends taikhoan_model
{
	function kiemtra_dangky($data)
	{
		if ($this->ktra_email($data[1]))
		{
			echo '<script language="javascript" type="text/javascript">alert("Email đã tồn tại");</script>';
			
		}
		else if($this->ktra_ten($data[0]))
		{
			echo '<script language="javascript" type="text/javascript">alert("Tên đã tồn tại");</script>';
		}
		else
		{
			return true;
		}
	}
	
	function dangky($user_name,$user_email,$user_pass,$user_cfpass)
	{
		if($user_cfpass == $user_pass)
		{
			$row = array($user_name,$user_email,$user_pass);
			if($this->kiemtra_dangky($row))
			{
				$user_pass = password_hash($user_pass, PASSWORD_BCRYPT);
				$row[2] = $user_pass;
				if($this->dangky_model($row,'taikhoan'))
				{
					echo '<script language="javascript">alert("Đăng ký thành công")</script>';
					echo '<script language="javascript">window.location="../View/index.php"</script>';
				}
			}
			else
			{
				echo '<h2>Đăng ký không thành công</h2>';
			}
		}
		else
		{
			echo '<h2>Mật khẩu không giống nhau</h2>';
		}
		
	}
	
	function dangnhap($user,$pass)
	{
		$row = $this->dangnhap_model($user);
		
		if(password_verify($pass, $row[2]))
		{
			
			
			
			if($row['Loaitk']==1)
			{
				session_start();
				$_SESSION['id']=$row[0];
				$_SESSION['tentk']=$row[1];
				$_SESSION['Loaitk']=$row['Loaitk'];
				$_SESSION['HinhCN']= $row['HinhCN'];
				echo '<script language="javascript">window.location="../View/index.php"</script>';
			}
			else
			{
				session_start();
				$_SESSION['id']=$row[0];
				$_SESSION['tentk']=$row[1];
				$_SESSION['Loaitk']=$row['Loaitk'];
				$_SESSION['HinhCN']= $row['HinhCN'];
				echo '<script language="javascript">window.location="../Admin/index.php"</script>';
			}
			
		}
		else
		{
			echo 'Đăng nhập thất bại!';
		}
	}
	
	function dangxuat()
	{
		session_unset();
		session_destroy();
		echo '<script language="javascript">window.location="index.php"</script>';
		exit();
	}
	function thongtincanhan($id,$user)
	{
		$kq= $this->thongtincanhan_model($id);
		return $kq;
		
	}
	
	function update_thongtin($ten,$sdt,$id)
	{
		$kq = $this->capnhat_thongtin_tk_model($ten,$sdt,$id);
		if(!$kq)
		{
			echo "<h2>Cập nhật thất bại</h2>";
		}
		else
		{
			echo "<h2>Cập nhật thành công</h2>";
		}
	}
	
	function update_hinh($id,$local,$name,$type)
	{
		
		if($type!= 'image/jpeg' && $type != 'image/jpg' && $type!= 'image/png')
		{
			echo '<h3>Chỉ được tải hình JPEG, JPG, PNG!</h3>';
		}
		else
		{
			if(move_uploaded_file($local,"../Data/images/TaiKhoan/".$name))
			{
				if($this->update_hinh_model($id,$name))
				{
					echo '<h2>Cập nhật ảnh thành công!</h2>';
				}
				else
				{
					echo '<h2>Cập nhật ảnh thất bại!</h2>';
				}
			}
			
		}
	}
	
	function doimatkhau($id,$oldpass,$pass)
	{
		$newpass = password_hash($pass, PASSWORD_BCRYPT);
		$ktrpass = $this->ktra_matkhau_model($id);
		
		
		if(password_verify($oldpass, $ktrpass))
		{
			$kq = $this->doimatkhau_model($id, $newpass);
			echo '<h2>Đổi mật khẩu thành công!<h2>';
		}
		else
		{
			echo '<h2>Mật khẩu cũ không đúng!</h2>';
			
		}
		
	}
}
?>