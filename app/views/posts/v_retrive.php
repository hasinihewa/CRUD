<?php require APPROOT.'/views/inc/header.php';?>

<header>
<link rel="stylesheet" href="<?php echo URLROOT;?>/css/register.css">
</header>
  <div class="container">
    <div class="title">PROFILE</div>
    <!-- <h1>User-<?php echo $_SESSION['name']?></h1> -->
    <?php foreach($data['users'] as $user): ?>

    <!-- <button class="button">Delete</button>
    <button class="button">Edit</button> -->
    <!-- In the v_profile view file -->
    <div class="content">
        <form action="#">
            <div class="user-details">
            <div class="input-box">
                <span class="details">Name:</span>
                <span id="name"><?= $user->name ?></span>
                </div>
                <div class="input-box">
                <span class="details">Age:</span>
                <span id="age"><?= $user->age ?></span>
                </div>
                <div class="input-box">
                <span class="details">Email</span>
                <span id="email"><?= $user->email ?></span>
                </div>
                <div class="input-box">
                <span class="details">Phone Number</span>
                <span id="phonenumber"><?= $user->phonenumber ?></span>
                </div>

                <!-- <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="password" id="password" placeholder="<?= $user->password ?>" required>
                </div> -->
            </div>
            <div class="button">
            <a class="btn1" href="<?php echo URLROOT; ?>/Users/edit">EDIT</a>
            </div>
            <div class="button">
             <a class="btn1" href="<?php echo URLROOT; ?>/Users/edit">Delete</a>
           </div>
      </form>
    </div>
<?php endforeach;?>

        
    </div>
  </div>
  <?php require APPROOT.'/views/inc/footer.php';?>

