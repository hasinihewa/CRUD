<?php require APPROOT.'/views/inc/header.php';?>

<header>
<link rel="stylesheet" href="<?php echo URLROOT;?>/css/register.css">
</header>
  <div class="container">
    <div class="title">Registration</div>
    
    <!-- <button class="button">Delete</button>
    <button class="button">Edit</button> -->

    <div class="content">
      <form action="<?php echo URLROOT?>/Users/register" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="name" id="name" placeholder="Enter your name" value="<?php echo $data['name'];?>" required>
            <span class="form-invalid"><?php echo $data['name_err']; ?></span>
          </div>
          <div class="input-box">
            <span class="details">Age</span>
            <input type="text" name="age" id="age" placeholder="Enter your age" value="<?php echo $data['age'];?>" required>
            <span class="form-invalid"><?php echo $data['age_err']; ?></span>

          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" id="email" placeholder="Enter your email" value="<?php echo $data['email'];?>" required>
            <span class="form-invalid"><?php echo $data['email_err']; ?></span>

          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phonenumber" id="phonenumber" placeholder="Enter your number" value="<?php echo $data['phonenumber'];?>" required>
            <span class="form-invalid"><?php echo $data['phonenumber_err']; ?></span>

          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" name="password" id="password" placeholder="Enter your password" value="<?php echo $data['password'];?>"required>
            <span class="form-invalid"><?php echo $data['password_err']; ?></span>

          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" name="confirm_password" id="confirm_password" placeholder="Confirm your password" value="<?php echo $data['confirm_password'];?>" required>
            <span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span>

          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>
  <?php require APPROOT.'/views/inc/footer.php';?>

