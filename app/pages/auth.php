<?php
  header("content-type:application/json");
  $conn_string = "host=dbase.dsa.missouri.edu dbname=s18dbmsgroups user=s18group02 password=corgis";
  $dbconn = pg_connect($conn_string);
  $stat = pg_connection_status($dbconn);
  if ($stat !== PGSQL_CONNECTION_OK) {
      echo 'Connection status bad';
  }
  $query = "select user_id from users where username='".$_POST["username"]."' and password='".$_POST["password"]."';";
  

  $login = pg_fetch_all(pg_query($dbconn, $query));

  $results = 123;
  
  echo json_encode($login[0]["user_id"]);
      
?>