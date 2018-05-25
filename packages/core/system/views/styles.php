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
                    <h1>
                        <span class="violet">Storia degli Stili</span>
                    </h1>
                    <p>История стилей.</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Top menu -->
    <nav class="navbar" role="navigation">
        <div class="container offset 10">
            <div class="navbar-header">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="top-navbar-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.php">
                                <i class="fa fa-home fa-lg"></i>
                                <br>Главная</a>
                        </li>
                        <li>
                            <a href="styles.php">
                                <i class="fa fa-camera-retro fa-lg"></i>
                                <br>Стили</a>
                        </li>
                        <li>
                            <a href="components.php">
                                <i class="glyphicon glyphicon-scissors fa-lg"></i>
                                <br>Одежда</a>
                        </li>
                        <li>
                            <a href="signes.html">
                                <i class="fa fa-key fa-lg"></i>
                                <br>Ключевые признаки</a>
                        </li>
                        <li>
                            <a href="findstyle.html">
                                <i class="fa fa-search fa-lg"></i>
                                <br>Поиск
                                <br>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000">
                                <i class="fa fa-briefcase fa-lg"></i>
                                <br>Кабинет
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="sign-up.php">Регистрация</a>
                                </li>
                                <li>
                                    <a href="login.php">Вход</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Title -->
    <div class="page-title-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 wow fadeIn">
                    <i class="fa fa-camera-retro fa-2x"></i>
                    <h1>Styles /
                        <p>Современные стили одежды</p>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Стили -->
    <div class="portfolio-container">
        <div class="container">
            <div class="row">
                <?
                    include('../../../../php/config/connect.php');
                    $result = mysqli_query($connection_link,"SELECT Nomenclature_Id, Name_ru, Description FROM Taxon") or die(mysqli_error);
                    $index = 0;
                    while ($row = $result->fetch_assoc()) {
                        echo '<a href="style.php?idstyle='.$row['Nomenclature_Id'].'">
                        <div class="col-xs-12 col-sm-4 col-md-3 portfolio-masonry" ';
                        if ($index % 4 === 0) echo 'style="clear: both;"';
                        echo'>
                                <div class="portfolio-box web-design">
                                    <div class="portfolio-box-container">
                                        <!-- <img class="center-block" src="'.$row['photo'].'" alt="" data-at2x="'.$row['photo'].'"> -->
                                        <div class="portfolio-box-text">
                                            <h3 style="text-transform: capitalize;">'.$row['Name_ru'].'</h3>
                                            <p class="description">'.$row['Description'].'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        ';
                        $index++;
                    }
                ?>

            </div>
        </div>
    </div>

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