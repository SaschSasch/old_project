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
        <link rel="stylesheet" href="/assets/css/media-queries.css">
        <link rel="stylesheet" href="/assets/css/bootstrap-treeview.min.css">
        <script src="/assets/js/jquery-1.11.1.min.js"></script>
        <script src="/assets/js/jquery.ui.map.min.js"></script>
        <script src="/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="/assets/flexslider/jquery.flexslider-min.js"></script>
        <script src="/assets/js/jquery.backstretch.min.js"></script>
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
                        <i class="glyphicon glyphicon-scissors fa-2x"></i>
                        <h1 style = "font-size: 30px;">Components /</h1>
                        <p  style = "font-size: 23px;">Основные компоненты костюма</p>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var tree = [];
            $(document).ready(function() {
              $.getJSON("/php/getComponents.php", function(data){ // путь к php поменять
                    console.log('wtf', data, data[0].id);
                    var parent = $('.elementsList');
                    recursive(data, null, tree);
                    clearEmptyNodeChilds(tree);
                    var options = {
                      bootstrap2: false,
                      showTags: true,
                      levels: 4,
                      highlightSelected: false,
                      data: tree
                    };
                    console.log('wtf2', options.data, tree);
                    $('#treeview').treeview(options);
              });

              function recursive(array, id_parent, parent) {
                var count = 0,
                    noChildrens = true;
                $.each(array, function(key, value) {
                  count++;
                  if (value.id_parent == id_parent) {
                    noChildrens = false;
                    var node = {};
                    node.text = value.name;
                    node.state = {
                      checked: false,
                      disabled: false,
                      expanded: false,
                      selected: false
                    };
                    if (!value.photo) {
                      node.nodes = [];
                    }
                    else {
                      node.icon = 'fa fa-camera-retro';
                      node.nodes = [{
                        text: '<img class="img-responsive" src="'+value.photo+'" />'
                      }];
                    }
                    if (value.styles) {
                      value.styles.forEach(function(item, i, arr) {
                        node.nodes.push({
                          text: item.count+': '+item.name
                        })
                      });
                    }
                    parent.push(node);
                    recursive(array, value.id_component, node.nodes);
                  }
                });
              }

              function clearEmptyNodeChilds(array) {
                $.each(array, function(key, value) {
                  if (value.nodes &&value.nodes.length !== 0) {
                    clearEmptyNodeChilds(value.nodes)
                  } else {
                    delete value.nodes;
                  }
                });
              }
            });
        </script>

        <!-- Components Full Width Text -->
        <div class="services-full-width-container">
        	<div class="container">
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6 services-full-width-text wow fadeInLeft">
                <h1>Elements</h1>
                <label for="treeview"></label>
                <div id="treeview"/></div>
              </div>
  	        </div>
          </div>
        </div>


        <!-- Testimonials -->
        <div class="testimonials-container">
          <div class="container">
            <div class="row">
                <div class="col-sm-12 testimonials-title wow fadeIn">
                    <h2>Описание</h2>
                </div>
              </div>
              <div class="row">
                  <div class="col-sm-10 col-sm-offset-1 testimonial-list">
                    <div role="tabpanel">
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="tab1">
                        <!--	<div class="testimonial-image">
                            <img src="/assets/img/testimonials/1.jpg" alt="" data-at2x="/assets/img/testimonials/1.jpg">
                          </div> -->
                          <div class="testimonial-text">
                                    <p style = "font-size: 25px;">
                                      В этом разделе можно просмотреть отдельные компоненты костюма - головные уборы,верхнюю одежду, платья
                                      и сумки. Выбрав определенную компоненту, демонстрируется фото и стили, к которым она (компонента) принадлежит.
                                      <br>
                                    </p>
                                  </div>
                        </div>
        <!-- Components -->
      <!--  <div class="services-container">
	        <div class="container">
	            <div class="row">
	            	<div class="col-sm-3">
		                <div class="service wow fadeInUp">
		                    <div class="service-icon"><i class="fa fa-eye"></i></div>
		                    <h3>Beautiful Websites</h3>
		                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p>
		                </div>
					</div>
					<div class="col-sm-3">
		                <div class="service wow fadeInDown">
		                    <div class="service-icon"><i class="fa fa-table"></i></div>
		                    <h3>Responsive Layout</h3>
		                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p>
		                </div>
	                </div>
	                <div class="col-sm-3">
		                <div class="service wow fadeInUp">
		                    <div class="service-icon"><i class="fa fa-magic"></i></div>
		                    <h3>Awesome Logos</h3>
		                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p>
		                </div>
	                </div>
	                <div class="col-sm-3">
		                <div class="service wow fadeInDown">
		                    <div class="service-icon"><i class="fa fa-print"></i></div>
		                    <h3>High Res Prints</h3>
		                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p>
		                </div>
	                </div>
	            </div>
	        </div>
        </div> -->

        <!-- Components Half Width Text -->
      <!--  <div class="services-half-width-container">
        	<div class="container">
	            <div class="row">
	                <div class="col-sm-6 services-half-width-text wow fadeInLeft">
	                    <h3>Lorem Ipsum</h3>
	                    <p>
	                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
	                    	Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper <span class="violet">suscipit lobortis</span>
	                    	nisl ut aliquip ex ea commodo consequat. Lorem ipsum <strong>dolor sit amet</strong>, consectetur adipisicing elit,
	                    	sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper
	                    	suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit,
	                    	sed do <strong>eiusmod tempor</strong> incididunt.
	                    </p>
	                </div>
	                <div class="col-sm-6 services-half-width-text wow fadeInUp">
	                    <h3>Dolor Sit Amet</h3>
	                    <p>
	                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
	                    	Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper <span class="violet">suscipit lobortis</span>
	                    	nisl ut aliquip ex ea commodo consequat. Lorem ipsum <strong>dolor sit amet</strong>, consectetur adipisicing elit,
	                    	sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper
	                    	suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit,
	                    	sed do <strong>eiusmod tempor</strong> incididunt.
	                    </p>
	                </div>
	            </div>
	        </div>
        </div> -->

        <!-- Call To Action -->
        <!--<div class="call-to-action-container">
        	<div class="container">
	            <div class="row">
	                <div class="col-sm-12 call-to-action-text wow fadeInLeftBig">
	                    <p>
	                    	Lorem ipsum <span class="violet">dolor sit amet</span>, consectetur adipisicing elit,
	                    	sed do eiusmod tempor incididunt ut labore et ut wisi.
	                    </p>
	                    <div class="call-to-action-button">
	                        <a class="big-link-3" href="#">Try It Now!</a>
	                    </div>
	                </div>
	            </div>
	        </div>
        </div> -->

        <!-- Footer -->
  <!--      <footer>
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
        </footer> -->

        <!-- Javascript -->
        <script src="/assets/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
        <script src="/assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script src="/assets/js/wow.min.js"></script>
        <script src="/assets/js/retina-1.1.0.min.js"></script>
        <script src="/assets/js/jflickrfeed.min.js"></script>
        <script src="/assets/js/masonry.pkgd.min.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="/assets/js/scripts.js"></script>

    </body>

</html>
