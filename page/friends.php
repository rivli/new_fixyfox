<?php include 'block/header.php';


 ?>



      <div class="content">

        <h1>Friends</h1>
        <div class="dayQuote">
          be together
        </div>


        <?php
        $i = 1;
        while($i<=22) { ?>
        <div class="friendBlock">
          <img class="friendLogo" src="https://fixyfox.ru/resources/avatars/1/1tYRldq4z2Y.jpg" alt="name Lastname">
          <div class="friendName">
            Name Lastname
          </div>
        </div>
        <?php $i++;} ?>

      </div>


    <?php include 'block/footer.php'; ?>
