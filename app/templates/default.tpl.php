<?php if(!defined('INCLUDED')) exit('This file cannot be opened directly'); ?>

<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $config['site_title']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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

    <div id="wrapper" class="toggled">

      <div id="sidebar-wrapper">
          <ul class="sidebar-nav">
              <li class="sidebar-brand">
                  <a href="/#">
                      Start Bootstrap
                  </a>
              </li>
              <li>
                  <a href="/index.php/portfolio">Portfolio</a>
              </li>
              <li>
                  <a href="/index.php/hello/world">Shortcuts</a>
              </li>
              <li>
                  <a href="/#">Overview</a>
              </li>
              <li>
                  <a href="/#">Events</a>
              </li>
              <li>
                  <a href="/#">About</a>
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
      </script>

  </body>
</html>
