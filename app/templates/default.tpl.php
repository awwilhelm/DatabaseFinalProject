<?php if(!defined('INCLUDED')) exit('This file cannot be opened directly'); ?>

<?php

$conn_string = "host=dbase.dsa.missouri.edu dbname=s18dbmsgroups user=s18group02 password=corgis";
$dbconn = pg_connect($conn_string);
$stat = pg_connection_status($dbconn);
if ($stat !== PGSQL_CONNECTION_OK) {
    echo 'Connection status bad';
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $config['site_title']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">


    <?php echo $html->css('css/bootstrap.min.css'); ?>
    <?php echo $html->css('css/bootstrap-grid.min.css'); ?>
    <?php echo $html->css('css/bootstrap-reboot.min.css'); ?>
    <?php echo $html->css('css/app.css'); ?>
    <?php echo $html->css('css/sidebar.css'); ?>
  </head>
  <body>

    <!-- This is the content placeholder, pages will be included here -->
    

    


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <?php echo $html->js('js/bootstrap.min.js'); ?>
    <?php echo $html->js('js/app.js'); ?>
    
    <script>
        console.log(<?php echo $user?>);
        if(window.location.pathname == localStorage.getItem("base_path") || window.location.pathname == localStorage.getItem("base_path") +'index.php'  || window.location.pathname == localStorage.getItem("base_path") +'index.php/') {
            window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/';
        }
        if((localStorage.getItem('username') == null || localStorage.getItem('username') == "") && window.location.pathname != localStorage.getItem("base_path") + 'index.php/login/' ) { 
            window.location.pathname = localStorage.getItem("base_path") + 'index.php/login/';
        }
    </script>

    <div id="wrapper" class="toggled">
      <div id="sidebar-wrapper">
          <ul class="sidebar-nav">
              <li class="sidebar-brand">
                  <a href=<?php echo $config['base_path'] . "/index.php/portfolio" ?>>
                      Home
                  </a>
              </li>
              <li>
                  <a href=<?php echo $config['base_path'] . "/index.php/portfolio" ?> >Portfolio</a>
              </li>
              <li>
                  <a href=<?php echo $config['base_path'] . "/index.php/analytics/piechart" ?> >Analytics</a>
              </li>
              <li id="login-li">
                  <a href=<?php echo $config['base_path'] . "/index.php/login" ?> >Login</a>
              </li>
              <li id="logout-li">
                  <a id="logout" href=<?php echo $config['base_path'] . "/index.php/login" ?> >Logout</a>
              </li>
          </ul>
      </div>
      <!-- /#sidebar-wrapper -->

      <!-- Page Content -->
      <div id="page-content-wrapper">
          <div class="container-fluid">
              <!-- <a href="#menu-toggle" class="btn btn-success" id="menu-toggle">Toggle Menu</a> -->
              <?php echo template_content(); ?>
          </div>
      </div>
      <!-- /#page-content-wrapper -->

    </div>
      <!-- /#wrapper -->

      <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    });

    $("#logout").click(function(e) {
        localStorage.setItem("username", "");
        localStorage.setItem("password", "");
    });
    let username =localStorage.getItem("username") == null || localStorage.getItem("username") == "";
    if(username){
        $('#login-li').show();
        $('#logout-li').hide();
    } else {
        $('#login-li').hide();
        $('#logout-li').show();
    }
    </script>

  </body>
</html>

<script>
    //localStorage.setItem("base_path", '/');
    localStorage.setItem("base_path", '/~s18group02/DatabaseFinalProject/');
</script>
