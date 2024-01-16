<?php require APPROOT.'/views/inc/header.php';?>
<!--top nav -->
<?php require APPROOT.'/views/inc/components/topnavbar.php';?>

<header>
<link rel="stylesheet" href="<?php echo URLROOT;?>/css/dashboardstyle.css">

</header>
<h1>User <?php echo $_SESSION['user_name'];?>'s Dashboard</h1>
<h1>POSTS</h1>
<div class="content">
<?php foreach($data['posts'] as $post):?>
<div class="user-details">
<div class="input-box">
                <span class="details">USERNAME:</span>
                <span class="details"><?php echo $post->user_name;?></span>
                <div class="input-box">
                <span class="details">Date:</span>
                <span class="details"><?php echo $post->post_created_at;?></span>

                </div>
                </div>
                <div class="input-box">
                <span class="details">Title:</span>
                <span class="details"><?php echo $post->title;?></span>

                </div>
        
                <div class="input-box">
                <span class="details">Body:</span>    
                <span class="details"><?php echo $post->body;?></span>


                </div>
                <div class="input-box">
              

                </div>
              

                <!-- <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="password" id="password" placeholder=" required>
                </div> -->
            </div>
            <?php if($post->user_id== $_SESSION['user_id']):?>

            <div class="button">
            <a class="btn1" href="<?php echo URLROOT; ?>/Posts/edit/<?php echo $post->id;?>">EDIT</a>
            </div>
            <div class="button">
             <a class="btn1" href="<?php echo URLROOT; ?>/Posts/delete/<?php echo $post->id;?>">Delete</a>
           </div>
           <?php endif;?>
           <?php endforeach;?>
</div>

<?php require APPROOT.'/views/inc/footer.php';?>
