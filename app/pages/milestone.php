<?php

$conn_string = "host=dbase.dsa.missouri.edu dbname=s18dbmsgroups user=s18group02 password=corgis";
$dbconn = pg_connect($conn_string);
$stat = pg_connection_status($dbconn);
if ($stat !== PGSQL_CONNECTION_OK) {
    echo 'Connection status bad';
}

$milestone = pg_fetch_all(pg_query($dbconn, "SELECT M.title, M.description, S.status, M.date_created, M.updated_on FROM Client_Portfolio Po, Project P, Milestone M, Status S WHERE M.p_id = P.project_id AND P.portfolio_id = PO.portfolio_id AND PO.user_id = ".$_COOKIE["user_id"]." AND M.status_id = S.status_id AND M.milestone_id = "._get(2)." ORDER BY M.updated_on DESC;"));
$sprints = pg_fetch_all(pg_query($dbconn, "SELECT S.sprint_id, S.title, S.updated_on FROM Client_Portfolio Po, Project P, Milestone M, Sprint S WHERE S.m_id = M.milestone_id AND M.p_id = P.project_id AND P.portfolio_id = PO.portfolio_id AND PO.user_id = ".$_COOKIE["user_id"]." AND m_id = "._get(2)." ORDER BY S.updated_on DESC;"));
?>

<div class="portfolios company project">
    <h2> Milestone: <?php echo $milestone[0]["title"] ?>  </h2>

    <div class="company-details description">
      <div><b>Description:</b> <?php echo $milestone[0]["description"] ?> </div>
    </div>
    <div class="company-details">
      <div><b>Status:</b> <?php echo $milestone[0]["status"] ?> </div>
      <div><b>Date Created:</b> <?php echo $milestone[0]["date_created"] ?> </div>
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

        <?php foreach ($sprints as $value): ?>
          <div class="item box-shadow blah-toggler" data-target="<?php echo $value['sprint_id']; ?>">
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