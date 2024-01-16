<?php require APPROOT.'/views/inc/header.php';?>

<header>
<link rel="stylesheet" href="<?php echo URLROOT;?>/css/register.css">
</header>
  <div class="container">
    <div class="title">POST EDIT</div>
    <!-- <?php print_r($data);?> -->
    <div class="content">
        <form action="<?php echo URLROOT;?>/Posts/edit/<?php echo $data['post_id' ];?>" method="post">
        <div class="user-details">
               
               <div class="input-box">
               <label class="details">Title:</label>
               <input type="text" id="title" name="title" placeholder="Title" value="<?php echo $data['title'];?>">
                  <span class="form-invalid"><?php echo $data['title_err']; ?></span>

             </div>
             <div class="input-box">
             </div>
                <div class="input-box">
                <label class="details">Body:</label>
                <input type="text" name="body" id="body" placeholder="Description" value="<?php echo $data['body'];?>">
                <span><?php echo $data['body_err'];?></span>
              </div> 
            </div>
            <!-- <div class="button">
            <a class="btn1" href="<?php echo URLROOT; ?>/Posts/dashboard">UPDATE</a>
            </div> -->
            <div class="button">
            <button type="submit" class="btn1" href="<?php echo URLROOT; ?>/Posts/dashboard" >UPDATE</button>
            </div>

            
            
      </form>
    </div>

    
    </div>
  </div>
  <?php require APPROOT.'/views/inc/footer.php';?>

