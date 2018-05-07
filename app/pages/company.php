<div class="portfolios company">
    <h2> Company: Apple </h2>
    <div class="company-details">
      <div><b>Status:</b> Active </div>
      <div><b>Client Since:</b> 10/02/17 </div>
      <div><b>Address:</b> 1234 Sam's Butt </div>
    </div>
    <div class="item-list">
        <?php 
          $colors = array("red", "green", "blue", "yellow"); 
          $data = array(
            array(
                'id' => 1,
                'project' => 'Solder'
            ),
        
            array(
                'id' => 2,
                'project' => 'Procter'
            ),
          );
        ?>

        <?php foreach ($data as $value): ?>
          <div class="item box-shadow blah-toggler" data-target="<?php echo $value['id']; ?>">
              <div class="name"><?php echo $value['project'] ?></div>
          </div>
        <?php endforeach; ?>
        
    </div>
    <div id="portfolio-add" class="create box-shadow"> <i class="fas fa-plus"></i> </div>
    <div id="portfolio-edit" class="edit box-shadow"> <i class="fas fa-edit"></i> </div>
</div>

<script>
    $( "#portfolio-add" ).click(function() {
        console.log("here");
        console.log(window);
        window.location.pathname = 'index.php/portfolio/' + <?php echo _get(0); ?> + '/newCompany';
    });
    $( "#portfolio-edit" ).click(function() {
        console.log("here");
        console.log(window);
        window.location.pathname = 'index.php/portfolio/' + <?php echo _get(0); ?> + '/editCompany';
    });
    $(".blah-toggler").on("click", function(){
        var t = $(this);
        window.location.pathname = 'index.php/portfolio/' + <?php echo _get(0); ?> + '/project/' + t.data('target');
    });
</script>
<?php
  
?>
        