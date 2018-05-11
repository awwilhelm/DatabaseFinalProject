<?php

$conn_string = "host=dbase.dsa.missouri.edu dbname=s18dbmsgroups user=s18group02 password=corgis";
$dbconn = pg_connect($conn_string);
$stat = pg_connection_status($dbconn);
if ($stat !== PGSQL_CONNECTION_OK) {
    echo 'Connection status bad';
}
$company = pg_fetch_all(pg_query($dbconn, "SELECT P.company_name, S.status, P.date_created, A.street, A.city, A.state, A.zip_code, A.addr_id FROM Client_Portfolio P, Client_Status S, Address A WHERE P.user_id = ".$_COOKIE["user_id"]." AND P.portfolio_id = " . _get(0) . " AND P.cstatus_id = S.cstatus_id AND P.addr_id = A.addr_id;"));
?>


<?php
if (isset($_POST['SubmitButton'])) {
    if($_POST['status']== 'Active') {
      $status = 1;
    } else if($_POST['status']== 'On-Hold') {
      $status = 2;
    } else if($_POST['status']== 'Inactive') {
      $status = 3;
    } else {
      $status = 4;
    }
    $addr_id = pg_fetch_all(pg_query($dbconn, "UPDATE s18group02.Address SET street='".$_POST["street"]."', city='".$_POST["city"]."', state='".$_POST["state"]."', zip_code=".$_POST["zip_code"]." where addr_id=".$company[0]["addr_id"].";"))[0]["addr_id"];
    pg_query($dbconn, "UPDATE s18group02.Client_Portfolio SET company_name='".$_POST["company_name"]."', cstatus_id=".$status." WHERE portfolio_id="._get(0).";");
    echo "<script>window.location.pathname = localStorage.getItem('base_path') + 'index.php/portfolio/"._get(0)."';</script>";
}
?>

<div class="portfolio-new">
  <form  action="" method="post" class="container box-shadow">
    <div>
      <h1> Client Info </h1>
      <div class="item">
        Company Name:
        <input id="company_name" type="text" name="company_name" class="form-control" />
      </div>
      <div class="item">
        <h3>Client Address:</h3>
        Street:
        <input id="street" name="street" class="form-control" />
        <div class="city-state-zip">
          <div class="city-item">
            City:
            <input id="city" name="city" class="form-control" />
          </div>
          <div class="city-item">
            State:
            <input id="state" name="state" class="form-control" />
          </div>
          <div class="city-item">
            Zip:
            <input id="zip" name="zip_code" class="form-control" />
          </div>
        </div>
      </div>
      <div class="item">
        Client Status:
        <select id="status" name="status">
          <option value="Active">Active</option>
          <option value="On-Hold">On Hold</option>
          <option value="Inactive">Inactive</option>
          <option value="Need to Reach Out">Need to Reach Out</option>
        </select>
      </div>
    </div>
    <div class="create">
      <button id="submit" name="SubmitButton" type="submit" class="btn btn-success"> Edit </button>
    </div>

  </form>
</div>

<script>
  document.getElementById('company_name').value = '<?php echo $company[0]["company_name"]; ?>';
  document.getElementById('street').value = '<?php echo $company[0]["street"]; ?>';
  document.getElementById('city').value = '<?php echo $company[0]["city"]; ?>';
  document.getElementById('state').value = '<?php echo $company[0]["state"]; ?>';
  document.getElementById('zip').value = '<?php echo $company[0]["zip_code"]; ?>';
  document.getElementById('status').value = '<?php echo $company[0]["status"]; ?>';
</script>
