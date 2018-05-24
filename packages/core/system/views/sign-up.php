<!doctype html>
<html>

<head>
<!--  <title>Login</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="/assets/bootstrap-3.3.5-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/custom-style.css">
</head> -->

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Storia degli Stili</title>

<!-- CSS -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
<link rel="stylesheet" href="/assets/bootstrap-3.3.5-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/assets/css/animate.css">
<link rel="stylesheet" href="/assets/css/magnific-popup.css">
<link rel="stylesheet" href="/assets/flexslider/flexslider.css">
<link rel="stylesheet" href="/assets/css/form-elements.css">
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="stylesheet" href="/assets/css/media-queries.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Favicon and touch icons -->
<link rel="shortcut icon" href="/assets/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="/assets/ico/apple-touch-icon-57-precomposed.png">

<body>
  <!-- Presentation -->
  <div class="presentation-container">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 wow fadeInLeftBig">
            <h1> <span class="violet">Storia degli Stili</span> </h1>
            <p>История стилей.</p>
          </div>
        </div>
    </div>
  </div>


<!-- Top menu -->
<nav class="navbar" role="navigation">
<div class="container offset 10">
  <div class="navbar-header">
    <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/index.php">Библиотека современных стилей</a>
  </div> -->
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="top-navbar-1">
    <ul class="nav navbar-nav navbar-right">
      <li>
        <a href="index.php"><i class="fa fa-home fa-lg"></i><br>Главная</a>
      </li>
      <li>
        <a href="styles.php"><i class="fa fa-camera-retro fa-lg"></i><br>Стили</a>
      </li>
      <li>
        <a href="components.php"><i class="glyphicon glyphicon-scissors  fa-lg"></i><br>Одежда</a>
      </li>
      <li>
        <a href="signes.html"><i class="fa fa-key fa-lg"></i><br>Ключевые признаки</a>
      </li>
      <li>
        <a href="findstyle.html"><i class="fa fa-search fa-lg"></i><br>Поиск<br></a>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000">
          <i class="fa fa-briefcase fa-lg"></i><br>Кабинет <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="sign-up.php">Регистрация</a></li>
          <li><a href="login.php">Вход</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
</nav>

<!-- Page Title -->
<div class="page-title-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 wow fadeIn">
                <i class="fa fa-briefcase fa-2x"></i>
                <h1>Registration /
                <p>Форма для регистрации нового пользователя</p> </h1>
            </div>
        </div>
    </div>
</div>

<!--  <div class="site-wrapper">

    <div class="site-wrapper-inner">

      <div class="cover-container">

        <div class="masthead clearfix">
          <div class="inner">


            <!--<h3 class="masthead-brand"><a href="/index.php">Диплом</a></h3> -->
          <!--   <ul class="nav masthead-nav">
              <li class=""><a href="/index.php">Домашняя страница</a></li>
              <li class="active"><a href="#">Регистрация</a></li>
            </ul>
          </div>
        </div>  -->

        <form class="form-signin col-md-6 col-md-offset-3" action="../php/login.php" method="post" role="form">
          <h2 class="form-signin-heading">Регистрация</h2>
          <input type="email" class="form-control bottom" placeholder="Email" title="Ваш e-mail" required autocomplete autofocus>
          <input name="password" type="password" class="form-control bottom" placeholder="Пароль" autocomplete required>
          <input name="login" type="text" class="form-control bottom" pattern="[A-Za-z0-9]{6,}" placeholder="Логин" title="Только латинские символы и цифры, не меньше шести" required>
          <hr/>
          <button class="btn btn-lg btn-primary btn-block" type="submit" title="Полете... Поехали!">Зарегистрироваться</button>
        </form>

        <div class="mastfoot">
          <div class="inner">

          </div>
        </div>

      </div>

    </div>

  </div>


  <script src="/assets/js/jquery-1.12.1.min.js"></script>
  <script src="/assets/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
</body>

</html>
