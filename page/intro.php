<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hardcore</title>
    <link rel="stylesheet" href="/css/intro.css">

  <SCRIPT type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></SCRIPT>
  <script type="text/javascript">

  function showReg () {
    $(".loginBlock").hide();
    $(".registrationBlock").show();
  }

  function showLogin () {
    $(".loginBlock").show();
    $(".registrationBlock").hide();
  }
  </script>
  </head>
  <body>
    <?php  if ($_SESSION['message']) MessageShow(); ?>
    <div class="BGimg1"></div>
    <div class="words">
    <blockquote>Времени нам отпущено не так уж много, чтобы его тратить, пытаясь прожить чью-то чужую жизнь. Не доверяйте догмам: нельзя жить, опираясь только на то, что придумали другие. Ни в коем случае чужие мнения не должны заглушать ваш собственный внутренний голос. И самое главное — наберитесь мужества, чтобы следовать зову собственного сердца и своей интуиции.
    </blockquote>
    <div style="float:right;font-weight:bold;">Стив Джобс</div>
    </div>
    <div class="logo" style="font-size:80px;color:white;font-weight:bold;">FixyFox</div>
    <div class="loginBlock">
      <button class="loginButton ">Login</button>
      <button class="registrationButton" onclick="showReg()">Registration</button>
      <form class="login" action="query/login" method="post">
        <input type="email" id="first" name="email" placeholder="E-mail" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <label><input type="checkbox" name="dontRememberMe">Не запоминать</label><br>
        <input type="submit" name="submit" value="GO">
      </form>
    </div>

    <div class="registrationBlock">
      <button class="loginButton" onclick="showLogin()">Login</button>
      <button class="registrationButton">Registration</button>
      <form class="login" action="query/registration" method="post">
        <input type="text" id="first" name="name" placeholder="Имя" pattern="[A-Za-zА-Яа-яЁё]{3,20}" title="Не менее 3 и не более 20 символов на Английском или Русском языках." required>
          <input type="text" name="lastname" placeholder="Фамилия" pattern="[A-Za-zА-Яа-яЁё]{3,20}" title="Не менее 3 и не более 20 символов на Английском или Русском языках." required>
          <input type="email" name="email" placeholder="E-mail" required>
          <input type="password" name="password" placeholder="Password" required><br>
          <select name="sex" required>
            <option disabled selected value="">Ваш пол</option>
            <option value="male" >Мужчина</option>
            <option value="female">Женщина</option>
          </select>

        <input type="submit" name="submit" value="Регистрация">
      </form>
    </div>
  </body>
</html>
