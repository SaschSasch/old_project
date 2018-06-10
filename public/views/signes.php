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

  <!-- Meet Our Team -->
  <div class="team-container">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 services-full-width-text wow fadeInLeft">
          <h1>Signes</h1>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 services-full-width-text wow fadeInLeft">
          <label for="treeview"></label>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <div id="treeview" ></div>
        </div>
        <div class="col-sm-12 col-md-6">
          <div class="row">
            <div class="col-sm-6">
              <button class="btn btn-primary" onclick="getChecked();">Выбрать</button>
            </div>
            <div class="col-sm-6">
              <button class="btn btn-primary" onclick="uncheckAll();">Очистить</button>
            </div>
          </div>
          <div id="checked" class="row col-sm-12"></div>
        </div>
      </div>
      <div id="result" class="row"></div>
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

  <script>
    const displayed = [];
    let signes;

    function changeDisplayed(bool, treeview) {
      $('#checked').empty();
      treeview.Checked.forEach(val => {
        const data = signes.find(v => v.id === val);

        let parents = [];
        let next = data.parent;
        let i = 0;
        while (next !== null && i < signes.length) {
          i++;
          if (signes[i].parent === next) {
            let curr = signes.find(v => v.id === next);
            i = 0;
            parents.unshift(`${curr.name} -> `);
            next = curr.parent;
          }
        }
        const p = document.createElement('p');
        $(p).addClass('choosen-sign').text(parents.join('') + data.name);
        $('#checked').append(p);
      });
    }
    
    document.addEventListener('DOMContentLoaded', function() {
      const [id] = location.pathname.split('/').slice(-1);
      const treeview = new TreeViewService(changeDisplayed);

      $.ajax({
        dataType: "json",
        method: 'GET',
        url: `/api/getSignes.php`,
      }).done(function (data) {
        signes = data;
        treeview
          .setNodesState({
            expanded: false,
          })
          .setTree(data, null, id);
        var options = treeview.getOpts({
          onhoverColor: '',
        });

        $('#treeview').treeview(options);
      }).error(function (err) {
        console.error(err);
      });

      window.getChecked = function() {
        var query = treeview.Checked.join(',');
        $('#result').empty();
        $.getJSON("/api/findSignes.php", {
          ask: query
        }, data => {
          data.sort((a,b) => - +a.count + +b.count);
          let summ = data.reduce((r, v) => {
            return r + +v.count;
          }, 0);
          data.forEach(value => {
            value.count = (+value.count / summ * 100).toFixed() + '%';
          }); 
          data.forEach(value => {
            var div = document.createElement('div'),
              br = document.createElement('br'),
              img = document.createElement('img');
            $(div).addClass('resultItem col-sm-12 col-md-4').text(value.name + ': ' + value.count);
            $(img).attr('src', value.pic).css('height', '250px');
            $(img).attr('onerror', 'this.onerror=null;this.src="https://placeimg.com/200/300/animals";')
            $(div).append(br).append($(img));
            $('#result').append(div);
          });
        });
      }
      
      window.uncheckAll = function() {
        $('#result').empty();
        $('#treeview').treeview('uncheckAll', {
          silent: true
        });
        treeview.clearChecked();
      }
    });
  </script>

  <!-- Javascript -->
  <? include('../parts/scripts.php'); ?>

</body>

</html>