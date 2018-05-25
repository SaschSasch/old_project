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
          <i class="glyphicon glyphicon-scissors fa-2x"></i>
          <h1 style="font-size: 30px;">Hierarchy /</h1>
          <p style="font-size: 23px;">Иерархия стилей</p>
        </div>
      </div>
    </div>
  </div>

  <? include('../parts/scripts.php'); ?>
  
  <div class="col-sm-12 col-md-offset-3 col-md-6">
    <div id="styletree"/>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      $.ajax({
        dataType: "json",
        method: 'GET',
        url: `/api/getStyles.php`,
      }).done(function (data) {
        const treeview = new TreeViewService();
        treeview.setTree(data, null);
        var options = treeview.getOpts({
          showCheckbox: false
        });

        $('#styletree').treeview(options);
      }).error(function (err) {
        console.error(err);
      });
    });
  </script>

</body>

</html>