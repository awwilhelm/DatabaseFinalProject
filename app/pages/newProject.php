<?php

  $conn_string = "host=dbase.dsa.missouri.edu dbname=s18dbmsgroups user=s18group02 password=corgis";
  $dbconn = pg_connect($conn_string);
  $stat = pg_connection_status($dbconn);
  if ($stat !== PGSQL_CONNECTION_OK) {
      echo 'Connection status bad';
  }
?>

<?php
if (isset($_POST['SubmitButton'])) {
    if($_POST['project']== 'web') {
      $project = 1;
    } else if($_POST['project']== 'report') {
      $project = 2;
    } else if($_POST['project']== 'batch') {
      $project = 3;
    } else if($_POST['project']== 'mobile') {
      $project = 4;
    } else {
      $project = 5;
    }

    if($_POST['status']== 'notstarted') {
      $status = 1;
    } else if($_POST['status']== 'inprogress') {
      $status = 2;
    } else {
      $status = 3;
    }
    pg_query($dbconn, "INSERT INTO s18group02.Project(title, description, ptype_id, status_id, portfolio_id) VALUES('".$_POST["title"]."', '".$_POST["description"]."', ".$project.", ".$status.", "._get(0).");");
    echo "<script>window.location.pathname = localStorage.getItem('base_path') + 'index.php/portfolio/"._get(0)."';</script>";
}
?>

<div class="portfolio-new">
  <form action="" method="post" class="container box-shadow">
    <div >
      <h1> Client Info </h1>
      <div class="item">
        Title:
        <input name="title" class="form-control" />
      </div>
      <div class="item">
        Description:
        <input name="description" class="form-control" />
      </div>
      <div class="item">
        Project Type:
        <select name="project">
          <option value="web">Web Application</option>
          <option value="report">Report Delivery</option>
          <option value="batch">Batch Process</option>
          <option value="mobile">Mobile Application</option>
          <option value="database">Database</option>
        </select>
      </div>
      <div class="item">
        Status:
        <select name="status">
          <option value="notstarted">Not Started</option>
          <option value="inprogress">In Progress</option>
          <option value="completed">Completed</option>
        </select>
      </div>
      
      
  </div>
  <div class="create">
    <button id="submit" type="submit" name="SubmitButton" class="btn btn-success"> Create </button>
  </div>

  </form>
</div>