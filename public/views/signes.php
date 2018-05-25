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
          <i class="fa fa-key"></i>
          <h1>Signes /
            <p>Ключевые признаки стилей</p>
          </h1>
        </div>
      </div>
    </div>
  </div>

  <script>
    let tree = [];
    let checked = [];
    $(document).ready(function () {
      $.ajax({
        dataType: "json",
        method: 'GET',
        url: '/api/getSignes.php',
      }).done(function (data) {
        console.log('wtf', data);
        // recursive(data.slice(0, 5), null, tree);
        tree = getTree(data, null);
        console.log('tree', tree);
        clearEmptyNodeChilds(tree);
        var options = {
          bootstrap2: false,
          showTags: true,
          levels: 10,
          highlightSelected: false,
          multiSelect: true,
          showCheckbox: true,
          onNodeChecked: function (event, data) {
            if (checked.indexOf(data.id) === -1)
              checked.push(data.id);
            console.log(checked);
          },
          onNodeUnchecked: function (event, data) {
            if (checked.indexOf(data.id) !== -1)
              checked.pop(checked.indexOf(data.id));
            console.log(checked);
          },
          data: tree
        };
        console.log('wtf2', options.data, tree);
        $('#treeview').treeview(options);
      }).error(function (err) {
        console.error(err);
      });

      function getTree(array, parent) {
        let out = array.filter(function (el) {
          return el.parent === parent;
        }).map(function (root) {
          const {
            id,
            name
          } = root;
          // console.log(`el ${id} is leaf for ${parent}`);
          return {
            id,
            text: name,
            state: {
              checked: false,
              disabled: false,
              expanded: false,
              selected: false
            },
            nodes: getTree(array, id),
          };
        });
        return out;
      }

      function clearEmptyNodeChilds(array) {
        $.each(array, function (key, value) {
          if (value.nodes.length !== 0) {
            clearEmptyNodeChilds(value.nodes)
          } else {
            delete value.nodes;
          }
        });
      }

      // $('#treeview').on('nodeChecked', function(event, data) {
      //   console.log(event, data);
      //   // checked.push();
      // });
    });

    function getChecked() {
      var query = checked.join(',');
      $('#result').empty();
      $.getJSON("/api/findSignes.php", {
        ask: query
      }, function (data) { // путь к php поменять
        // console.log('test', data, data[0]);
        var parent = $('#result');
        var li = document.createElement('li');
        var summ = 0;
        $.each(data, function (key, value) {
          summ += Number(value.count);
        });
        console.log(summ);
        $.each(data, function (key, value) {
          value.count = (Number(value.count) / summ * 100).toFixed() + '%';
        });
        console.log(data);
        $.each(data, function (key, value) {
          var li = document.createElement('li'),
            br = document.createElement('br'),
            img = document.createElement('img');
          $(li).addClass('resultItem').text(value.name + ': ' + value.count);
          $(img).attr('src', value.photo).css('height', '150px');
          $(li).append(br).append($(img));
          $(parent).append(li);
        });
      });
    }

    function uncheckAll() {
      $('#result').empty();
      $('#treeview').treeview('uncheckAll', {
        silent: true
      });
      checked = [];
    }
  </script>

  <!-- Meet Our Team -->
  <div class="team-container">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 services-full-width-text wow fadeInLeft">
          <h1>Signes</h1>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 services-full-width-text wow fadeInLeft">
          <label for="treeview"></label>
          <div id="treeview" />
        </div>
      </div>
      <div class="col-sm-6">
        <div class="col-sm-6">
          <button class="btn btn-primary" onclick="getChecked();">Выбрать</button>
        </div>
        <div class="col-sm-6">
          <button class="btn btn-primary" onclick="uncheckAll();">Очистить</button>
        </div>
        <div id="result" class="col-sm-12">
          <ul style="list-style: none;">
          </ul>
        </div>
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
                <div class="testimonial-text">
                  <p style="font-size: 25px;">
                    В этом разделе Вы можете выбрать одну или несколько ключевых признаков по которым программа определит к какому стилю можно
                    отнести выбранный набор. Результат будет отображен в процентном соотношении. Также под каждым из стилей
                    есть возможность просмотреть какие компоненты стиля принадлежат выбранным ключевым признакам.
                    <br>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Javascript -->
  <? include('../parts/scripts.php'); ?>

</body>

</html>