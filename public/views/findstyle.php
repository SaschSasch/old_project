<!DOCTYPE html>
<html lang="en">

<? include('../parts/head.php'); ?>

<body>

  <? include('../parts/presentation.php'); ?>
  <? include('../parts/navbar.php'); ?>

  <!-- Page Title -->
  <div class="page-title-container">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 wow fadeIn">
          <i class="fa fa-search fa-2x"></i>
          <h1>Find style /
            <p>Поиск по стилю</p>
          </h1>
        </div>
      </div>
    </div>
  </div>

  <script>
    function find() {
      console.log('gotcha!');
      var req = $('#find').val();
      console.log('req', req);
      $.getJSON("/api/find.php", {
        find: req
      }, function (data) { // путь к php поменять
        console.log(data);
        $('#container_res').empty();
        $.each(data, function (key, value) {
          var div =
            '<div class="col-sm-12" style="margin-top: 30px; margin-bottom:30px;"><div class="row">';
          if (value.photo) {
            div += '<div class="col-sm-4 col-md-3"><img class="thumbnail" src="' + value.photo +
              '" /></div>';
          } else {
            div += '<div class="col-sm-2 col-md-2"></div>';
          }
          div += '<div class="col-sm-8 col-md-8 center-block"><strong class="text-center">' + value.name +
            '</strong>';
          if (value.description) {
            div += '<blockquote><p class="text-justify full-description">' + value.description +
              '</p></blockquote>';
          }
          div += '</div></div></div>';
          $('#container_res').append(div);
          // console.log(key, value);
        });
      });
      return false;
    }
  </script>
      <!-- Contact Us -->
  <div class="col-lg-12 col-md-12">
    <div class="form-inline">
      <div class="form-group">
        <div class="input-group">
          <input id="find" type="text" class="form-control" placeholder="Что ищем?">
          <span class="input-group-btn">
            <button class="btn btn-primary" onclick="find();">Найти</button>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div id="container_res" class="col-sm-12"></div>

  <? include('../parts/scripts.php'); ?>
</body>
</html>