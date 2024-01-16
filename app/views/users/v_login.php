<?php require APPROOT.'/views/inc/header.php';?>
<!--top nav -->

<header>
<link rel="stylesheet" href="<?php echo URLROOT;?>/css/loginstyle.css">
</header>
<div  class="loginContainer" >
    <!-- Modal Container -->
    <form action="<?php echo URLROOT; ?>/users/login" method="POST">
            <div class="imgcontainer">
                <img src="../img/logo3.png" alt="Avatar" class="logo">
            </div>
            <div class="imgcontainer1">
                <img src="../img/Group 89.png" alt="Avatar" class="sidepic1">
            </div>
            <div class="imgcontainer2">
                <img src="../img/Frame 8.png" alt="Avatar" class="sidepic2">
            </div>

            <div class="container">
                <h1>Login</h1>
                <div class="input-box">
                    <!-- <label for="uname"><b>Username</b></label> -->
                    <input type="text" placeholder="Username" name="email" id="email" value="<?php echo $data['email'];?>" required>
                    <span class="form-invalid"><?php echo $data['email_err'];?></span>
                    <i class='bx bxs-user'></i>
                </div>
                
                <div class="input-box">
                    <!-- <label for="psw"><b>Password</b></label> -->
                    <input type="password" placeholder="Password" name="password" id="password" value="<?php echo $data['password'];?>" required>
                    <span class="form-invalid"><?php echo $data['password_err'];?></span>

                    <i class='bx bxs-low-vision'></i>
                </div>
                <div class="remember-forget">
                    <label><input type="checkbox" checked="checked" name="remember"> Remember me</label>
                    <a href="#">Forgot password?</a><br>
                </div>
            
                <button class="btn" type="submit">Login</button>
            </div>
        </form>
    </div> 

<?php require APPROOT.'/views/inc/footer.php';?>
