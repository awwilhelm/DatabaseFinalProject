<div class="portfolios">
    <h2> Portfolios </h2>
    <div class="item-list">
        <?php 
          $colors = array("red", "green", "blue", "yellow"); 
          $data = array(
            array(
                'id' => 1,
                'name' => 'John Toxic',
                'projects' => array('Solder', 'Procter')
            ),
        
            array(
                'id' => 2,
                'name' => 'Paul Runner',
                'projects' => array('Tiger Walker')
            ),
          );
        ?>

        <?php foreach ($data as $value): ?>
          <div class="item box-shadow blah-toggler" data-target="<?php echo $value['id']; ?>">
              <div class="name"><?php echo $value['name'] ?></div>
              
              <div class="project-header"> Projects </div>
              <div class="project-list">
                  <?php foreach ($value['projects'] as $project): ?>
                    <div> <?php echo $project; ?> </div>
                  <?php endforeach; ?>
              </div>
          </div>
        <?php endforeach; ?>
        
    </div>
    <div id="portfolio-add" class="create box-shadow"> + </div>
</div>

<script>
    $( "#portfolio-add" ).click(function() {
        console.log("here");
        console.log(window);
        window.location.pathname = 'index.php/portfolio/newPortfolio';
    });
    $(".blah-toggler").on("click", function(){
        var t = $(this);
        $('#' + t.data('target')).hide();
        window.location.pathname = 'index.php/portfolio/' + t.data('target');
    });
</script>
<?php
  
?>
        