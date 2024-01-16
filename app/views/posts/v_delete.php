<?php require APPROOT.'/views/inc/header.php';?>

<header>
<link rel="stylesheet" href="<?php echo URLROOT;?>/css/register.css">
</header>
  <div class="container">
    <div class="title">POST EDIT</div>
    <!-- <?php print_r($data);?> -->
    <div class="content">
        <form action="<?php echo URLROOT;?>/Posts/edit/<?php echo $data['post_id' ];?>" method="POST">
        <div class="user-details">
               
               <div class="input-box">
               <label class="details">Title:</label>
               <input type="text" id="title" name="title" placeholder="Title" value="<?php echo $data['title'];?>" required>
                  <span class="form-invalid"><?php echo $data['title_err']; ?></span>

             </div>
             <div class="input-box">
               <!-- <label class="details">UserName:</label>
               <input type="text" name="title" id="title" value="<?php echo $_SESSION['user_name'];?>">

               -->
             </div>
           
               
                <div class="input-box">
                <label class="details">Body:</label>
                <input type="text" name="body" id="body" value="<?php echo $data['body'];?>">
                <span><?php echo $data['body_err'];?></span>

                <!-- <input type="text" name="title" id="title" value="<?php echo $_POST['title'];?>"> -->
               
              </div>
                
                <!-- <div class="input-box">
                <label class="details">Email:</label>
                <label name="email" id="email">hasini</label>
                </div>
                <div class="input-box">
                <label class="details">Phone Number:</label>
                <label name="phonenumber" id="phonenumber">hasini</label>
                </div> -->


               
            </div>
            <div class="button">
            <a class="btn1" href="<?php echo URLROOT; ?>/Posts/dashboard">UPDATE</a>
            </div>
            
            
      </form>
    </div>

    
    </div>
  </div>
  <?php require APPROOT.'/views/inc/footer.php';?>

