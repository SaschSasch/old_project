<!DOCTYPE html>
<html lang="en">

    <head>

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
        <link rel="stylesheet" href="../assets/css/custom-style.css ">
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

    </head>

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
              <a href="components.php"><i class="glyphicon glyphicon-scissors fa-lg"></i><br>Одежда</a>
            </li>
            <li>
              <a href="signes.html"><i class="fa fa-key fa-lg"></i><br>Ключевые признаки</a>
            </li>
            <li>
              <a href="findstyle.html"><i class="fa fa-search fa-lg"></i><br>Поиск<br></a>
            </li>
            <li>
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

    <?
      $link=mysqli_connect("localhost", "root", "", "DPr");
      $result = mysqli_query($link,"SELECT T.Nomenclature_Id, T.Name_ru, T.Description, R.Source FROM Taxon AS T, Resource AS R, Resource_Taxon AS RT WHERE  T.Nomenclature_Id = RT.Nomenclature_Id AND R.Resource_Id = RT.Resource_Id AND T.Nomenclature_Id = ".$_GET['idstyle']) or die(mysqli_error);
      $row = $result->fetch_assoc();
    ?>

        <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                      <ol style="margin-top: -24px; height: 50px;" class="breadcrumb">
                        <li class="fadeInUp"><a href><h2><? echo $row['Name_ru']; ?></h2></a></li>
                      </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Стиль -->
        <div class="col-md-offset-2 col-sm-10" style="margin-top: 30px; margin-bottom:30px;">
            <div class="row">

             <div class="col-sm-4 col-md-3">
                <img class="thumbnail" src="<? echo $row['Source']; ?>" />

              </div>
              <div class="col-sm-8 col-md-9 center-block">
                <blockquote>
                  <p class="text-justify full-description"><? echo $row['Description']?></p>
                  <?
                    $styles = mysqli_query($link,"SELECT Name_ru FROM Taxon where ParentNomenclature_Id = ".$row['Nomenclature_Id']) or die(mysqli_error);
                    // echo '<pre>'.$styles->num_rows.'</pre>';
                  if ($styles->num_rows) {
                    echo '<p class="text-justify">Стили - последователи</p>
                    <ul class="text-justify">';

                    while ($row = $styles->fetch_assoc()) {
                      echo '<li>'.$row['Name_ru'].'</li>';
                    }
                    echo '</ul>';
                  }
                  ?>
                </blockquote>
              </div>
            </div>
        </div>

        <!-- Footer -->
      <!--  <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 footer-box wow fadeInUp">
                        <h4>About Us</h4>
                        <div class="footer-box-text">
	                        <p>
	                        	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
	                        	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
	                        </p>
	                        <p><a href="about.php">Read more...</a></p>
                        </div>
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInDown">
                        <h4>Email Updates</h4>
                        <div class="footer-box-text footer-box-text-subscribe">
                        	<p>Enter your email and you'll be one of the first to get new updates:</p>
                        	<form role="form" action="/assets/subscribe.php" method="post">
		                    	<div class="form-group">
		                    		<label class="sr-only" for="subscribe-email">Email address</label>
		                        	<input type="text" name="email" placeholder="Email..." class="subscribe-email" id="subscribe-email">
		                        </div>
		                        <button type="submit" class="btn">Subscribe</button>
		                    </form>
		                    <p class="success-message"></p>
		                    <p class="error-message"></p>
                        </div>
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInUp">
                        <h4>Flickr Photos</h4>
                        <div class="footer-box-text flickr-feed"></div>
                    </div>
                    <div class="col-sm-3 footer-box wow fadeInDown">
                        <h4>Contact Us</h4>
                        <div class="footer-box-text footer-box-text-contact">
	                        <p><i class="fa fa-map-marker"></i> Address: Via Principe Amedeo 9, 10100, Torino, TO, Italy</p>
	                        <p><i class="fa fa-phone"></i> Phone: 0039 333 12 68 347</p>
	                        <p><i class="fa fa-user"></i> Skype: Andia_Agency</p>
	                        <p><i class="fa fa-envelope"></i> Email: <a href="">contact@andia.co.uk</a></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                	<div class="col-sm-12 wow fadeIn">
                		<div class="footer-border"></div>
                	</div>
                </div>
                <div class="row">
                    <div class="col-sm-7 footer-copyright wow fadeIn">
                        <p>Copyright 2012 Andia - All rights reserved. Template by <a href="http://azmind.com">Azmind</a>.</p>
                    </div>
                    <div class="col-sm-5 footer-social wow fadeIn">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Javascript -->
        <script src="/assets/js/jquery-1.11.1.min.js"></script>
        <script src="/assets/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
        <script src="/assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script src="/assets/js/jquery.backstretch.min.js"></script>
        <script src="/assets/js/wow.min.js"></script>
        <script src="/assets/js/retina-1.1.0.min.js"></script>
        <script src="/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="/assets/flexslider/jquery.flexslider-min.js"></script>
        <script src="/assets/js/jflickrfeed.min.js"></script>
        <script src="/assets/js/masonry.pkgd.min.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="/assets/js/jquery.ui.map.min.js"></script>
        <script src="/assets/js/scripts.js"></script>

    </body>

</html>
