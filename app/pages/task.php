<?php

$conn_string = "host=dbase.dsa.missouri.edu dbname=s18dbmsgroups user=s18group02 password=corgis";
$dbconn = pg_connect($conn_string);
$stat = pg_connection_status($dbconn);
if ($stat !== PGSQL_CONNECTION_OK) {
    echo 'Connection status bad';
}

$task = pg_fetch_all(pg_query($dbconn, "SELECT T.title, T.description, St.status, CAST(T.date_created AS DATE), T.updated_on FROM Client_Portfolio Po, Project P, Milestone M, Sprint S, Task T, Task_Status St WHERE T.sprint_id = S.sprint_id AND S.m_id = M.milestone_id AND M.p_id = P.project_id AND P.portfolio_id = PO.portfolio_id AND PO.user_id = ".$_COOKIE["user_id"]." AND T.tstatus_id = St.tstatus_id AND T.task_id = "._get(4)." ORDER BY T.updated_on DESC;"));
$comments = pg_fetch_all(pg_query($dbconn, "SELECT * FROM Comment C LEFT JOIN Attachment A ON C.comment_id = A.comment_id LEFT JOIN Attachment_Type AT ON A.atype_id = AT.atype_id, Client_Portfolio Po, Project P, Milestone M, Sprint S, Task T WHERE C.t_id = T.task_id AND T.sprint_id = S.sprint_id AND S.m_id = M.milestone_id AND M.p_id = P.project_id AND P.portfolio_id = PO.portfolio_id AND PO.user_id = ".$_COOKIE["user_id"]." AND C.t_id = "._get(4)." ORDER BY C.updated_on DESC;"));
?>

<div class="portfolios company project task">
    <h2> Task: <?php echo $task[0]["title"] ?> </h2>

    <div class="company-details description">
      <div><b>Description:</b> <?php echo $task[0]["description"] ?></div>
    </div>
    <div class="company-details">
      <div><b>Status:</b> <?php echo $task[0]["status"] ?> </div>
      <div><b>Date Created:</b> <?php echo $task[0]["date_created"] ?> </div>
    </div>
    <div class="item-list comment-container">
        <?php 
          $colors = array("red", "green", "blue", "yellow"); 
          $milestone = array(
            array(
                'id' => 1,
                'comment' => 'Comment 1'
            ),
        
            array(
                'id' => 2,
                'comment' => 'Comment 2'
            ),
            array(
                'id' => 3,
                'comment' => 'Comment 3'
            ),
            array(
              'id' => 3,
              'comment' => 'Comment 4'
          ),
          );
        ?>

        <?php foreach ($comments as $value): ?>
          <div class="item box-shadow blah-toggler comment-item" data-target="<?php echo $value['comment_id']; ?>">
              <div class="name"><b><?php echo $value['subject'] ?></b></div>
              <div class=""><?php echo $value['content'] ?></div>

              <div>Attachment File Name: <?php echo $value['filename'] ?></div>
              <div>Type: <?php echo $value['type'] ?> </div>
          </div>
        <?php endforeach; ?>
        
    </div>
    <div id="portfolio-add" class="create box-shadow"> <i class="fas fa-plus"></i> </div>
    <!-- <div id="portfolio-edit" class="edit box-shadow"> <i class="fas fa-edit"></i> </div> -->
    <div id="portfolio-delete" class="delete box-shadow"> <i class="fas fa-times-circle"></i> </div>
</div>

<script>
    $( "#portfolio-add" ).click(function() {
        window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + <?php echo _get(0) ?> + '/project/' + <?php echo _get(1) ?> + '/milestone/'  + <?php echo _get(2) ?> + '/sprint/' + <?php echo _get(3) ?> + '/task/' + <?php echo _get(4) ?> + '/newComment';
    });
    // $( "#portfolio-edit" ).click(function() {
    //     window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + <?php echo _get(0) ?> + '/project/' + <?php echo _get(1) ?> + '/milestone/'  + <?php echo _get(2) ?> + '/sprint/' + <?php echo _get(3) ?> + '/task/'  + <?php echo _get(4) ?>;
    // });
    $( "#portfolio-delete" ).click(function() {
        window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + <?php echo _get(0) ?> + '/project/' + <?php echo _get(1) ?> + '/milestone/' + <?php echo _get(2) ?> + '/sprint/' + <?php echo _get(3) ?> ;
    });
    // $(".blah-toggler").on("click", function(){
    //     var t = $(this);
    //     window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + <?php echo _get(0); ?> + '/project/' + <?php echo _get(1) ?> + '/milestone/' + <?php echo _get(2) ?> + '/sprint/' + <?php echo _get(3) ?> + '/task/' + t.data('target');
    // });
</script>