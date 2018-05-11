

<?php
  if ($_POST) {
      $conn_string = "host=dbase.dsa.missouri.edu dbname=s18dbmsgroups user=s18group02 password=corgis";
      $dbconn = pg_connect($conn_string);
      $stat = pg_connection_status($dbconn);
      if ($stat !== PGSQL_CONNECTION_OK) {
          echo 'Connection status bad';
      }

      $login = pg_fetch_all(pg_query($dbconn, "select * from users where username='".$_POST["username"]."' and password='".$_POST["password"]."';"));
      
      if($login[0]["user_id"] > 0 ) {
        setcookie("user_id", $login[0]["user_id"], time() + (86400 * 30), "/");
        echo '<script> localStorage.setItem("username", "'.$_POST["username"].'"); </script>';
        echo '<script> localStorage.setItem("password", "'.$_POST["password"].'"); </script>';

        echo "<script>window.location.pathname = localStorage.getItem('base_path') + 'index.php/portfolio/';</script>";
      }
  }
?>

<div class="login">
  <div class="login-container">
    <h2>Login</h2>
    <form action="" method="post">
      <div>
        <span>Username</span> <input class="form-control" name="username"/>
      </div>
      <div>
        <span>Password</span> <input class="form-control" name="password" type="password" />
      </div>
      <button class="btn login-submit" type="submit">Submit</button>
    </form>
  </div>
</div>

