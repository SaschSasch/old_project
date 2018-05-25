<!DOCTYPE html>
<html lang="en">

<? include('../parts/head.php'); ?>

<body>

  <? include('../parts/presentation.php'); ?>
  <? include('../parts/navbar.php'); ?>

  <?
    include('../../api/config/connect.php');
    $id = $_GET['idstyle'];
    $result = mysqli_query($connection_link, "SELECT Nomenclature_Id as id, ParentNomenclature_Id as parent, 
              Name_ru, Description FROM Taxon WHERE Nomenclature_Id = ".$id) or die(mysqli_error($connection_link));
    $row = $result->fetch_assoc();
    if (!is_null($row['parent'])) {
      $result = mysqli_query($connection_link, "SELECT Name_ru FROM Taxon WHERE Nomenclature_Id = ".$row['parent'])
      or die(mysqli_error($connection_link));
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
        <div id="catalog"></div>
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
          <div id="treeview"></div>
        </div>
    </div>
  </div>

  <? include('../parts/scripts.php'); ?>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const [id] = location.pathname.split('/').slice(-1);

      $.ajax({
        dataType: "json",
        method: 'GET',
        url: `/api/getStylePath.php?id=${id}`,
      }).done(function (data) {
        const treeview = new TreeViewService();
        treeview
          .setNodesState({
            expanded: true,
          })
          .setTree(data, null, id);
        var options = treeview.getOpts({
          showCheckbox: false,
          collapseIcon: '',
          onhoverColor: '',
        });

        $('#catalog').treeview(options);
      }).error(function (err) {
        console.error(err);
      });

      $.ajax({
        dataType: "json",
        method: 'GET',
        url: `/api/getStyleSignes.php?id=${id}`,
      }).done(function (data) {
        const treeview = new TreeViewService();
        treeview
          .setNodesState({expanded: true})
          .setTree(data, null);
        var options = treeview.getOpts({
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