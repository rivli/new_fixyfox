<?php

$_POST['email'] = FormChars($_POST['email']);
$_POST['password'] = GenPass(FormChars($_POST['password']), $_POST['email']);
$_POST['name'] = FormChars($_POST['name']);
$_POST['lastname'] = FormChars($_POST['lastname']);


$Row = mysqli_fetch_array(mysqli_query($CONNECT, "SELECT `email` FROM `users` WHERE `email` = '".$_POST['email']."'"));
if ($Row['email']) exit('E-Mail <b>'.$_POST['email'].'</b> уже используеться.');
mysqli_query($CONNECT , "INSERT INTO `users`  VALUES ('','user', '".$_POST['name']."', '".$_POST['lastname']."', '".$_POST['email']."', '".$_POST['password']."',NOW(),'0','','','".$_POST['sex']."','')");


$query = "SELECT * FROM `users` WHERE (`email` = '".$_POST['email']."') and (`password` = '".$_POST['password']."')";
$result = mysqli_query($CONNECT, $query);
$user = mysqli_fetch_array($result);


///Далее создаем таблицы для пользоваетля Images,messages,friends,articles,communities с id = $user['id']

$sql1 = "CREATE TABLE `".$user['id']."-Objectives` ( `id` INT NOT NULL AUTO_INCREMENT , `status` VARCHAR(255) NOT NULL , `name` VARCHAR(255) NOT NULL , `stage` VARCHAR(255) NOT NULL , `description` TEXT NOT NULL , `date` DATE NOT NULL , `time` TIME NOT NULL , `deliveryDate` DATE NOT NULL , `deliveryTime` TIME NOT NULL , `tags` TEXT NOT NULL , `commacces` INT(255) NOT NULL , `likes` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($FFUSERS, $sql1);//создаем таблицу для статей

$sql2 = "CREATE TABLE `".$user['id']."-Images` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `status` VARCHAR(255) NOT NULL , `url` VARCHAR(255) NOT NULL , `description` TEXT NOT NULL , `likes` TEXT NOT NULL , `comments` INT(255) NOT NULL , `album` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($FFUSERS, $sql2);//создаем таблицу для Изображений

$sql3 = "CREATE TABLE `".$user['id']."-Friends` ( `id` INT NOT NULL AUTO_INCREMENT , `userid` INT(255) NOT NULL , `status` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($FFUSERS, $sql3);//создаем таблицу для Друзей

$sql4 = "CREATE TABLE `".$user['id']."-Messages` ( `id` INT NOT NULL AUTO_INCREMENT , `userid` INT(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($FFUSERS, $sql4);//создаем таблицу для Переписчиков

$sql5 = "CREATE TABLE `".$user['id']."-Teams` ( `id` INT NOT NULL AUTO_INCREMENT , `url` VARCHAR(255) NOT NULL , `status` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($FFUSERS, $sql5);//создаем таблицу для сообществ

//------------------------------------------------------------------------------------------------------

$_SESSION['id'] = $user['id'];
$_SESSION['name'] = $user['name'];
$_SESSION['lastname'] = $user['lastname'];
$_SESSION['position'] = $user['position'];
$_SESSION['status'] = "login";



$Code = base64_encode($_POST['email']);
mail($_POST['email'], 'Регистрация на Choiceasy', 'Ссылка для активации: http://choiceasy.com/users/query/verification/'.substr($Code, -5).substr($Code, 0, -5), 'From: admin@choiseasy.com');
MessageSend(3, 'Регистрация акаунта успешно завершена. На указанный E-mail адрес <b>'.$_POST['email'].'</b> отправленно письмо о подтверждении регистрации.', "/".$_SESSION['id']);


?>
