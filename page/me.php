<?php include 'block/header.php';

$user = UserInfo($_SESSION['id']);
//MessageSend(3, "Добро пожаловать", "/me12");
 ?>

   <div class="content">
     <h1><?php echo $_SESSION['name'].' '.$_SESSION['lastname']; ?></h1>
     <img src="<?php echo $user['avatar'] ?>" style="float:right;" width="40%" alt="">
    Name:<?php echo $_SESSION['name']; ?><br>
     Lastname:<?php echo $_SESSION['lastname']; ?><br>
     Position:<?php echo $_SESSION['position']; ?><br>
     <a href="/query/logout">Log out</a>
  </div>

 <?php
  include 'block/footer.php'; ?>
