<?php
include('../Control/taikhoan_Control.php');
$p = new taikhoan_control();

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng Ký</title><link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
 
</head>

<body>
	
<section class="login-block">
    <div class="container">
    <div class="row">
        <div class="col-md-4 login-sec">
            <h2 class="text-center">Đăng Ký </h2>
            <form class="login-form" method="post" name="dangky_form">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Tên Tài khoản *</label>
    <input type="text" class="form-control" placeholder="" name="user_name" autofocus required oninvalid="this.setCustomValidity('Nhập Tên Tài Khoản')" oninput="this.setCustomValidity('')">
  </div>
<div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Email*</label>
    <input type="email" class="form-control" placeholder="" name="user_email" autofocus required oninvalid="this.setCustomValidity('Nhập Email')" oninput="this.setCustomValidity('')">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Mật khẩu*</label>
    <input type="password" class="form-control" placeholder="" name="user_pass" autofocus required oninvalid="this.setCustomValidity('Nhập Mật Khẩu')" oninput="this.setCustomValidity('')">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Nhập Lại Mật khẩu*</label>
    <input type="password" class="form-control" placeholder="" name="user_cfpass" autofocus required oninvalid="this.setCustomValidity('Nhập Xác nhận Mật Khẩu')" oninput="this.setCustomValidity('')">
  </div>
    <div class="form-check">
    <button type="submit" name="nut" class="btn btn-login float-center">Đăng ký</button>
  </div>
  
</form>
			<hr>
	<a href="index.php" class="btn btn-primary" title="Quay lại trang chủ">❮ Quay lại</a>
</script>
<?php
if(isset($_REQUEST['nut']))
{
	$user_name=$_REQUEST['user_name'];
	$user_email=$_REQUEST['user_email'];
	$user_pass=$_REQUEST['user_pass'];
	$user_cfpass=$_REQUEST['user_cfpass'];
	$p->dangky($user_name,$user_email,$user_pass,$user_cfpass);
}			
?>
<div class="copy-text">Design by <i class="fa fa-heart"></i> by <a href="#">Nhóm 8</a></div>
        </div>
        <div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active" style="text-align: right">
      <img class="d-block img-fluid" src="../Data/images/Logon_va_Khac/3.jpg" alt="First slide" style="height:650px; width:100%">
      <div class="carousel-caption d-none d-md-block">
        
  </div>
    </div>
   
    </div>

            </div>       
            
        </div>
    </div>
</div>
</section>
	
<style>
	
 
@import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
.login-block{
    background: #DE6262;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #FFB88C, #DE6262); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
float:left;
width:100%;
padding : 50px 0;
height: 800px;
}
.banner-sec{background:url()  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
.container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
.carousel-inner{border-radius:0 10px 10px 0;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 50px 30px; position:relative;}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#FEB58A;}
.login-sec .copy-text a{color:#E36262;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
.login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
.btn-login{background: #DE6262; color:#fff; font-weight:600;}
.banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
.banner-text h2{color:#fff; font-weight:600;}
.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
.banner-text p{color:#fff;}	
</style>
</body>
</html>
	
