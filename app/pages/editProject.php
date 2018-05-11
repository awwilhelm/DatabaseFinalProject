<?php

  $conn_string = "host=dbase.dsa.missouri.edu dbname=s18dbmsgroups user=s18group02 password=corgis";
  $dbconn = pg_connect($conn_string);
  $stat = pg_connection_status($dbconn);
  if ($stat !== PGSQL_CONNECTION_OK) {
      echo 'Connection status bad';
  }
  $project = pg_fetch_all(pg_query($dbconn, "SELECT P.title, P.description, S.status, P.date_created, P.updated_on, P.ptype_id FROM Client_Portfolio Po, Project P, Status S WHERE P.portfolio_id = Po.portfolio_id AND P.status_id = S.status_id AND Po.user_id = ".$_COOKIE["user_id"]." AND P.project_id = "._get(1)." ORDER BY P.updated_on DESC;"));

?>

<?php
if (isset($_POST['SubmitButton'])) {
    if($_POST['project']== 'Web Application') {
      $project = 1;
    } else if($_POST['project']== 'Report Delivery') {
      $project = 2;
    } else if($_POST['project']== 'Batch Process') {
      $project = 3;
    } else if($_POST['project']== 'Mobile Application') {
      $project = 4;
    } else {
      $project = 5;
    }

    if($_POST['status']== 'Not Started') {
      $status = 1;
    } else if($_POST['status']== 'In Progress') {
      $status = 2;
    } else {
      $status = 3;
    }
    pg_query($dbconn, "UPDATE s18group02.Project SET title='".$_POST["title"]."', description='".$_POST["description"]."', ptype_id=".$project.", status_id=".$status." where project_id="._get(1).";");
    echo "<script>window.location.pathname = localStorage.getItem('base_path') + 'index.php/portfolio/"._get(0)."';</script>";
}
?>

<div class="portfolio-new">
  <form action="" method="post" class="container box-shadow">
    <div >
      <h1> Project </h1>
      <div class="item">
        Title:
        <input id="title" name="title" class="form-control" />
      </div>
      <div class="item">
        Description:
        <input id="description" name="description" class="form-control" />
      </div>
      <div class="item">
        Project Type:
        <select id="project" name="project">
          <option value="Web Application">Web Application</option>
          <option value="Report Delivery">Report Delivery</option>
          <option value="Batch Process">Batch Process</option>
          <option value="Mobile Application">Mobile Application</option>
          <option value="Database">Database</option>
        </select>
      </div>
      <div class="item">
        Status:
        <select id="status" name="status">
          <option value="Not Started">Not Started</option>
          <option value="In Progress">In Progress</option>
          <option value="Completed">Completed</option>
        </select>
      </div>
      
      
  </div>
  <div class="create">
    <button id="submit" type="submit" name="SubmitButton" class="btn btn-success"> Edit </button>
  </div>

  </form>
</div>

<script>
  let ptype = <?php echo $project[0]["ptype_id"]; ?>;
  let pString = "";
  if(ptype== 0) {
    pString = 'Web Application';
  } else if(ptype== 1) {
    pString = 'Report Delivery';
  } else if(ptype== 2) {
    pString = 'Batch Process';
  } else if(ptype== 2) {
    pString = 'Mobile Application';
  } else {
    pString = 'Database';
  }
  console.log(pString);
  document.getElementById('title').value = '<?php echo $project[0]["title"]; ?>';
  document.getElementById('description').value = '<?php echo $project[0]["description"]; ?>';
  document.getElementById('project').value = pString;
  document.getElementById('status').value = '<?php echo $project[0]["status"]; ?>';
</script>