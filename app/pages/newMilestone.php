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
    if($_POST['type']== 'preliminary') {
      $type = 1;
    } else if($_POST['type']== 'activedev') {
      $type = 2;
    } else if($_POST['type']== 'feature') {
      $type = 3;
    } else if($_POST['type']== 'support') {
      $type = 4;
    }

    if($_POST['status']== 'notstarted') {
      $status = 1;
    } else if($_POST['status']== 'inprogress') {
      $status = 2;
    } else {
      $status = 3;
    }

    pg_query($dbconn, "INSERT INTO s18group02.Milestone(title, description, mtype_id, status_id, p_id) VALUES('".$_POST["title"]."', '".$_POST["description"]."', ".$type.", ".$status.", "._get(1).");");
    echo "<script>window.location.pathname = localStorage.getItem('base_path') + 'index.php/portfolio/"._get(0)."/project/"._get(1)."';</script>";
}
?>

<div class="portfolio-new">
  <form action="" method="post" class="container box-shadow">
    <div >
      <h1> Milestone Info </h1>
      <div class="item">
        Title:
        <input name="title" class="form-control" />
      </div>
      <div class="item">
        Description:
        <input name="description" class="form-control" />
      </div>
      <div class="item">
        Milestone Type:
        <select name="type">
          <option value="preliminary">Preliminary</option>
          <option value="activedev">Active Developments</option>
          <option value="feature">Feature Addition</option>
          <option value="support">Wrap-Up/Support</option>
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
