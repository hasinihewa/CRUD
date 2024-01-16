<?php require APPROOT.'/views/inc/header.php';?>

<header>
<link rel="stylesheet" href="<?php echo URLROOT;?>/css/register.css">
</header>
  <div class="container">
    <div class="title">ADD POST</div>

    <!-- <button class="button">Delete</button>
    <button class="button">Edit</button> -->
    <!-- In the v_profile view file -->
    <div class="content">
      <form action="<?php echo URLROOT?>/Posts/create" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Title</span>
            <input type="text" name="Title" id="title" placeholder="title" placeholder="Enter the Title" value="<?php echo $data['title'];?>"  required>
            <span class="form-invalid"><?php echo $data['title_err']; ?></span>
          </div>
          <div class="input-box">
            
          </div>
          <div class="input-box">
            <span class="details">Body</span>
            <input type="text" name="body" id="body" placeholder="Enter description" value="<?php echo $data['body'];?>" required>
            <span class="form-invalid"><?php echo $data['body_err']; ?></span>

          </div>
          <!-- <div class="input-box">
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

          </div> -->
        </div>
        <div class="button">
          <input type="submit" value="PUBLISH">
        </div>
      </form>
    </div>

        
    </div>
  </div>
  <?php require APPROOT.'/views/inc/footer.php';?>

