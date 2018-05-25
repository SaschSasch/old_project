<!doctype html>
<html>

  <? include('../parts/head.php'); ?>

  <body>

    <? include('../parts/presentation.php'); ?>
    <? include('../parts/navbar.php'); ?>

    <!-- Page Title -->
    <div class="page-title-container">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 wow fadeIn">
            <i class="fa fa-briefcase fa-2x"></i>
            <h1>Registration /
              <p>Форма для регистрации нового пользователя</p>
            </h1>
          </div>
        </div>
      </div>
    </div>

    <form class="form-signin col-md-6 col-md-offset-3" action="../api/login.php" method="post" role="form">
      <h2 class="form-signin-heading">Регистрация</h2>
      <input type="email" class="form-control bottom" placeholder="Email" title="Ваш e-mail" required autocomplete autofocus>
      <input name="password" type="password" class="form-control bottom" placeholder="Пароль" autocomplete required>
      <input name="login" type="text" class="form-control bottom" pattern="[A-Za-z0-9]{6,}" placeholder="Логин" title="Только латинские символы и цифры, не меньше шести"
        required>
      <hr/>
      <button class="btn btn-lg btn-primary btn-block" type="submit" title="Полете... Поехали!">Зарегистрироваться</button>
    </form>

    <div class="mastfoot">
      <div class="inner">

      </div>
    </div>
    
    <? include('../parts/scripts.php'); ?>
  </body>

</html>