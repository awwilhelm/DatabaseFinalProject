<?php

$conn_string = "host=dbase.dsa.missouri.edu dbname=s18dbmsgroups user=s18group02 password=corgis";
$dbconn = pg_connect($conn_string);
$stat = pg_connection_status($dbconn);
if ($stat !== PGSQL_CONNECTION_OK) {
    echo 'Connection status bad';
}
$milestones = pg_fetch_all(pg_query($dbconn, "SELECT milestone_id, title, updated_on FROM Milestone WHERE p_id = 1 ORDER BY updated_on DESC;"));
?>

<!-- <?php
if ($_POST) {
    echo '<pre>';
    echo htmlspecialchars(print_r($_POST, true));
    echo '</pre>';
    echo $_POST["please"];
}
?>

<form action="" method="post">
  <div>
    <div>
    Name:  <input type="text" name="test" /><br />
</div>
</div>
    Email: <input type="text" name="personal[email]" /><br />
    Beer: <br />
    <select multiple name="beer[]">
        <option value="warthog">Warthog</option>
        <option value="guinness">Guinness</option>
        <option value="stuttgarter">Stuttgarter Schwabenbräu</option>
    </select><br />
    <input type="submit" value="submit me!" />
</form>
 -->

<div class="portfolio-new">
  <form  action="" method="post" class="container box-shadow">
    <div>
      <h1> Client Info </h1>
      <div class="item">
        Company Name:
        <input type="text" name="please" name="company_name" class="form-control" />
      </div>
      <div class="item">
        <h3>Client Address:</h3>
        Street:
        <input name="street" class="form-control" />
        <div class="city-state-zip">
          <div class="city-item">
            City:
            <input name="city" class="form-control" />
          </div>
          <div class="city-item">
            State:
            <input name="state" class="form-control" />
          </div>
          <div class="city-item">
            Zip:
            <input name="zip" class="form-control" />
          </div>
        </div>
      </div>
      <div class="item">
        Client Status:
        <select name="status">
          <option value="Active">Active</option>
          <option value="On-Hold">On Hold</option>
          <option value="Inactive">Mercedes</option>
          <option value="Need to Reach Out">Need to Reach Out</option>
        </select>
      </div>
    </div>
    <div class="create">
      <button id="submit" name="submit" type="submit" class="btn btn-success"> Create </button>
    </div>

  </form>
</div>

<!-- <script>
  $('#login_form').on('submit', function(e) { //use on if jQuery 1.7+
        e.preventDefault();  //prevent form from submitting
        var data = $("#login_form :input").serializeArray();
        console.log(data); //use the console for debugging, F12 in Chrome, not alerts
    });
</script> -->

