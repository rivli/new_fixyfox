<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>FixyFOX</title>
    <SCRIPT type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></SCRIPT>
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <div class="header">
      <div class="menu">


        <?php
        $here = $url1;
        function WeHere($where,$here) {
          if ($where == $here) {
            echo 'style="font-weight:bold;"';
          };
        };
         ?>
        <a href="/" class="menuAnchor">FixyFox</a>
        <a href="/me" class="menuAnchor" <?php WeHere("me",$here); ?>>Me</a>
        <a href="/friends" class="menuAnchor" <?php WeHere("friends",$here); ?>>Friends</a>
        <a href="/talks" class="menuAnchor" <?php WeHere("talks",$here); ?>>Messages</a>
        <a href="/settings" class="menuAnchor" <?php WeHere("settings",$here); ?>>Settings</a>
      </div>
    </div>

    <!--<div class="addGoal" title="добавить цель">
      +
    </div>-->
<?php  if ($_SESSION['message']) MessageShow(); ?>
