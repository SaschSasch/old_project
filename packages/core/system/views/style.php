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
  <link rel="stylesheet" href="/assets/css/bootstrap-treeview.min.css">
  <script src="/assets/js/jquery-1.12.1.min.js"></script>
  <script src="/assets/js/jquery.backstretch.min.js"></script>
  <script src="/assets/js/jquery.magnific-popup.min.js"></script>
  <script src="/assets/flexslider/jquery.flexslider-min.js"></script>
  <script src="/assets/js/jquery.ui.map.min.js"></script>
  <script src="/assets/js/bootstrap-treeview.min.js"></script>

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
            <li>
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
  </nav>

  <?
    include('../../../../php/config/connect.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    $id = $_GET['idstyle'];
    $result = mysqli_query($connection_link, "SELECT Nomenclature_Id as id, ParentNomenclature_Id as parent, 
              Name_ru, Description FROM Taxon WHERE Nomenclature_Id = ".$id) or die(mysqli_error($connection_link));
    $row = $result->fetch_assoc();
    if (!is_null($row['parent'])) {
      $result = mysqli_query($connection_link, "SELECT Name_ru FROM Taxon WHERE Nomenclature_Id = ".$row['parent']) or die(mysqli_error($connection_link));
      $parent = $result->fetch_assoc();
    } else {
      $parent = NULL;
    }
    $result = mysqli_query($connection_link, "select Source from DPr.Resource where Resource_Id in
              (select Resource_Id from DPr.Resource_Taxon where Nomenclature_Id = ".$id.")") or die(mysqli_error($connection_link));
    $img = array();
    while ($tmp = $result->fetch_assoc()) {
        array_push($img, $tmp);
    }
  ?>

  <!-- Page Title -->
  <div class="page-title-container">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <ol style="margin-top: -24px; height: 50px;" class="breadcrumb">
            <li class="fadeInUp">
              <a href>
                <h2>
                  <? echo $row['Name_ru']; ?>
                </h2>
              </a>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Стиль -->
  <div class="col-sm-12" style="margin-top: 30px; margin-bottom:30px;">
    <div class="row">
      <div class="col-sm-2">
        <h4>Описание</h4>
      </div>
      <div class="col-sm-10">
        <h5><? echo $row['Description'] ?></h5>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-2">
        <h4>Место в каталоге</h4>
      </div>
      <div class="col-sm-10">
        <h5>
          <? 
            if (is_null($parent)) {
              echo 'Данный стиль является родительским';
            } else {
              echo $parent['Name_ru'];
            }
          ?>
        </h5>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-2">
        <h4>Иллюстрации</h4>
      </div>
      <div class="col-sm-10">
        <?
            if (count($img) != 0) {
              foreach ($img as $value) {
                echo '<img class="col-sm-12 col-md-4 thumbnail" src="'.$value['Source'].'" />';
              }
            }
          ?>
      </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
          <h4>Ключевые признаки стиля</h4>
        </div>
        <div class="col-sm-10">
          <label for="treeview"></label>
          <div id="treeview" />
        </div>
    </div>
  </div>

  <script src="/assets/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
  <script src="/assets/js/bootstrap-hover-dropdown.min.js"></script>
  <script src="/assets/js/wow.min.js"></script>
  <script src="/assets/js/retina-1.1.0.min.js"></script>
  <script src="/assets/js/jflickrfeed.min.js"></script>
  <script src="/assets/js/masonry.pkgd.min.js"></script>
  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script src="/assets/js/scripts.js"></script>
  <script src="/assets/js/treeview.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const id = new URL(location.href).searchParams.get('idstyle');
      const tree = [];
      $.ajax({
        dataType: "json",
        method: 'GET',
        url: `/php/getStyleSignes.php?id=${id}`,
      }).done(function (data) {
        TreeViewService.setTree(data, null);
        var options = TreeViewService.getOpts({
          showCheckbox: false
        });

        $('#treeview').treeview(options);
      }).error(function (err) {
        console.error(err);
      });
    });
  </script>

</body>

</html>