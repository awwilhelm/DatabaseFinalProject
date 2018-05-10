<?php

$conn_string = "host=dbase.dsa.missouri.edu dbname=s18dbmsgroups user=s18group02 password=corgis";
$dbconn = pg_connect($conn_string);
$stat = pg_connection_status($dbconn);
if ($stat !== PGSQL_CONNECTION_OK) {
    echo 'Connection status bad';
}

$sprint = pg_fetch_all(pg_query($dbconn, "SELECT S.title, S.description, St.status, S.start_date, S.updated_on FROM Client_Portfolio Po, Project P, Milestone M, Sprint S, Status St WHERE S.m_id = M.milestone_id AND M.p_id = P.project_id AND P.portfolio_id = PO.portfolio_id AND PO.user_id = ".$_COOKIE["user_id"]." AND S.status_id = St.status_id AND S.sprint_id = "._get(3)." ORDER BY S.updated_on DESC;"));
$tasks = pg_fetch_all(pg_query($dbconn, "SELECT T.task_id, T.title, T.updated_on FROM Client_Portfolio Po, Project P, Milestone M, Sprint S, Task T WHERE T.sprint_id = S.sprint_id AND S.m_id = M.milestone_id AND M.p_id = P.project_id AND P.portfolio_id = PO.portfolio_id AND PO.user_id = ".$_COOKIE["user_id"]." AND T.sprint_id = "._get(3)." ORDER BY T.updated_on DESC;"));
?>

<div class="portfolios company project">
    <h2> Sprint: <?php echo $sprint[0]["title"] ?>  </h2>

    <div class="company-details description">
      <div><b>Description:</b> <?php echo $sprint[0]["description"] ?>  </div>
    </div>
    <div class="company-details">
      <div><b>Status:</b> <?php echo $sprint[0]["status"] ?> </div>
      <div><b>Date Created:</b> <?php echo $sprint[0]["start_date"] ?>  </div>
    </div>
    <div class="item-list">
        <?php 
          $colors = array("red", "green", "blue", "yellow"); 
          $milestone = array(
            array(
                'id' => 1,
                'task_name' => 'Task 1'
            ),
        
            array(
                'id' => 2,
                'task_name' => 'Task 2'
            ),
            array(
                'id' => 3,
                'task_name' => 'Task 3'
            ),
          );
        ?>

        <?php foreach ($tasks as $value): ?>
          <div class="item box-shadow blah-toggler" data-target="<?php echo $value['task_id']; ?>">
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
        window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + <?php echo _get(0) ?> + '/project/' + <?php echo _get(1) ?> + '/milestone/'  + <?php echo _get(2) ?> + '/sprint/' + <?php echo _get(3) ?> + '/newTask/' ;
    });
    $( "#portfolio-edit" ).click(function() {
        window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + <?php echo _get(0) ?> + '/project/' + <?php echo _get(1) ?> + '/milestone/'  + <?php echo _get(2) ?> + '/sprint/' + <?php echo _get(3) ?> + '/editSprint/';
    });
    $( "#portfolio-delete" ).click(function() {
        window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + <?php echo _get(0) ?> + '/project/' + <?php echo _get(1) ?> + '/milestone/' + <?php echo _get(2) ?>;
    });
    $(".blah-toggler").on("click", function(){
        var t = $(this);
        window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + <?php echo _get(0); ?> + '/project/' + <?php echo _get(1) ?> + '/milestone/' + <?php echo _get(2) ?> + '/sprint/' + <?php echo _get(3) ?> + '/task/' + t.data('target');
    });
</script>