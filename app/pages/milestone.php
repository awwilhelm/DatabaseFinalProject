<div class="portfolios company project">
    <h2> Milestone: Milestone name </h2>

    <div class="company-details description">
      <div><b>Description:</b> This is a demo description for this milestone </div>
    </div>
    <div class="company-details">
      <div class="complete"><b>Complete:</b> 
        <label class="checkbox-container checkbox">
          <input type="checkbox" checked="checked">
          <span class="checkmark"></span>
        </label>
      </div>
      <div><b>Date Created:</b> 10/02/17 </div>
    </div>
    <div class="item-list">
        <?php 
          $colors = array("red", "green", "blue", "yellow"); 
          $milestone = array(
            array(
                'id' => 1,
                'sprint_name' => 'Sprint 1'
            ),
        
            array(
                'id' => 2,
                'sprint_name' => 'Sprint 2'
            ),
            array(
                'id' => 3,
                'sprint_name' => 'Sprint 3'
            ),
          );
        ?>

        <?php foreach ($milestone as $value): ?>
          <div class="item box-shadow blah-toggler" data-target="<?php echo $value['id']; ?>">
              <div class="name"><?php echo $value['sprint_name'] ?></div>
          </div>
        <?php endforeach; ?>
        
    </div>
    <div id="portfolio-add" class="create box-shadow"> <i class="fas fa-plus"></i> </div>
    <div id="portfolio-edit" class="edit box-shadow"> <i class="fas fa-edit"></i> </div>
    <div id="portfolio-delete" class="delete box-shadow"> <i class="fas fa-times-circle"></i> </div>
</div>

<script>
    $( "#portfolio-add" ).click(function() {
        window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + <?php echo _get(0) ?> + '/project/' + <?php echo _get(1) ?> + '/milestone/'  + <?php echo _get(2) ?> + '/newSprint';
    });
    $( "#portfolio-edit" ).click(function() {
        window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + <?php echo _get(0) ?> + '/project/' + <?php echo _get(1) ?> + '/milestone/'  + <?php echo _get(2) ?> + '/editMilestone';
    });
    $( "#portfolio-delete" ).click(function() {
        window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + <?php echo _get(0) ?> + '/project/' + <?php echo _get(1) ?>;
    });
    $(".blah-toggler").on("click", function(){
        var t = $(this);
        window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + <?php echo _get(0); ?> + '/project/' + <?php echo _get(1) ?> + '/milestone/' + <?php echo _get(2) ?> + '/sprint/' + t.data('target');
    });
</script>