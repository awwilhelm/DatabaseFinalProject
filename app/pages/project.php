<?php

$conn_string = "host=dbase.dsa.missouri.edu dbname=s18dbmsgroups user=s18group02 password=corgis";
$dbconn = pg_connect($conn_string);
$stat = pg_connection_status($dbconn);
if ($stat !== PGSQL_CONNECTION_OK) {
    echo 'Connection status bad';
}

$project = pg_fetch_all(pg_query($dbconn, "SELECT P.title, P.description, S.status, P.date_created, P.updated_on FROM Client_Portfolio Po, Project P, Status S WHERE P.portfolio_id = Po.portfolio_id AND P.status_id = S.status_id AND Po.user_id = ".$_COOKIE["user_id"]." AND P.project_id = "._get(1)." ORDER BY P.updated_on DESC;"));
$milestones = pg_fetch_all(pg_query($dbconn, "SELECT M.milestone_id, M.title, M.updated_on FROM Client_Portfolio Po, Project P, Milestone M WHERE M.p_id = P.project_id AND P.portfolio_id = PO.portfolio_id AND PO.user_id = ".$_COOKIE["user_id"]." AND M.p_id = "._get(1)." ORDER BY M.updated_on DESC;"));
?>

<div class="portfolios company project">
    <h2> Project: <?php echo $project[0]["title"] ?> </h2>

    <div class="company-details description">
      <div><b>Description:</b> <?php echo $project[0]["description"] ?> </div>
    </div>
    <div class="company-details">
      <div><b>Status:</b> <?php echo $project[0]["status"] ?> </div>
      <div><b>Date Created:</b> <?php echo $project[0]["date_created"] ?> </div>
    </div>
    <div class="item-list">
        <?php 
          $colors = array("red", "green", "blue", "yellow"); 
          $milestone = array(
            array(
                'id' => 1,
                'milestone_name' => 'Milestone 1'
            ),
        
            array(
                'id' => 2,
                'milestone_name' => 'Milestone 2'
            ),
          );
        ?>

        <?php foreach ($milestones as $value): ?>
          <div class="item box-shadow blah-toggler" data-target="<?php echo $value['milestone_id']; ?>">
              <div class="name"><?php echo $value['title'] ?></div>
              <div class="name"><?php echo $value['updated_on'] ?></div>
          </div>
        <?php endforeach; ?>
        
    </div>
    <div id="portfolio-add" class="create box-shadow"> <i class="fas fa-plus"></i> </div>
    <div id="portfolio-edit" class="edit box-shadow"> <i class="fas fa-edit"></i> </div>
    <div id="portfolio-delete" class="delete box-shadow"> <i class="fas fa-times-circle"></i> </div>
</div>

<script>
    $( "#portfolio-add" ).click(function() {
        window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + <?php echo _get(0) ?> + '/project/' + <?php echo _get(1) ?> + '/newMilestone';
    });
    $( "#portfolio-edit" ).click(function() {
        window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + <?php echo _get(0) ?> + '/project/' + <?php echo _get(1) ?> + '/editProject';
    });
    $( "#portfolio-delete" ).click(function() {
        <?php pg_query($dbconn, "DELETE FROM s18group02.Project WHERE project_id = "._get(1).";"); ?>
        window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + <?php echo _get(0) ?>;
    });
    $(".blah-toggler").on("click", function(){
        var t = $(this);
        window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + <?php echo _get(0); ?> + '/project/' + <?php echo _get(1) ?> + '/milestone/' + t.data('target');
    });

</script>
        