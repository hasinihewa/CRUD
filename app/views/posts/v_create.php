<?php require APPROOT.'/views/inc/header.php';?>
<!--top nav -->
<!-- <?php require APPROOT.'/views/inc/components/topnavbar.php';?> -->

<header>
<link rel="stylesheet" href="<?php echo URLROOT;?>/css/posts/post_style.css">

</header>

<h1>CREATE POST</h1>

<section class="home">
        <div class="container">
          <div class="content">
            <form action="<?php echo URLROOT; ?>/Posts/create" method="POST">
              <div class="user-details">
                
                <div class="input-box">
                  <span class="details">Advertisement Title</span>
                  <input type="text" id="title" name="title" placeholder="Title" value="<?php echo $data['title'];?>" required>
                  <span class="form-invalid"><?php echo $data['title_err']; ?></span>

                </div>   
                
                <div class="input-box " id="content">
                  <span class="details">Content</span>
                  <textarea id="body" name="body" placeholder="Description" rows="10" cols="30" value="<?php echo $data['body'];?>"></textarea>
                  <span class="form-invalid"><?php echo $data['body_err']; ?></span>

                </div>
                
              </div>
        
              <div class="button">
                <input type="submit" value="Publish" >
              </div>
            </form>
          </div>
        </div>
      </section>

<?php require APPROOT.'/views/inc/footer.php';?>
