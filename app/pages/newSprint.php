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
    if($_POST['duration']== 'oneweek') {
      $duration = 1;
    } else if($_POST['duration']== 'twoweeks') {
      $duration = 2;
    } else if($_POST['duration']== 'onemonth') {
      $duration = 3;
    }

    if($_POST['status']== 'notstarted') {
      $status = 1;
    } else if($_POST['status']== 'inprogress') {
      $status = 2;
    } else {
      $status = 3;
    }

    pg_query($dbconn, "INSERT INTO s18group02.Sprint(title, description, duration_id, status_id, m_id) VALUES('".$_POST["title"]."', '".$_POST["description"]."', ".$duration.", ".$status.", "._get(2).");");
    echo "<script>window.location.pathname = localStorage.getItem('base_path') + 'index.php/portfolio/"._get(0)."/project/"._get(1)."/milestone/"._get(2)."';</script>";
}
?>

<div class="portfolio-new">
  <form action="" method="post" class="container box-shadow">
    <div >
      <h1> Sprint Info </h1>
      <div class="item">
        Title:
        <input name="title" class="form-control" />
      </div>
      <div class="item">
        Description:
        <input name="description" class="form-control" />
      </div>
      <div class="item">
        Sprint Duration:
        <select name="duration">
          <option value="oneweek">One Week</option>
          <option value="twoweeks">Two Weeks</option>
          <option value="onemonth">One Month</option>
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
