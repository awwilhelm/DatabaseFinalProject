<?php

$conn_string = "host=dbase.dsa.missouri.edu dbname=s18dbmsgroups user=s18group02 password=corgis";
$dbconn = pg_connect($conn_string);
$stat = pg_connection_status($dbconn);
if ($stat !== PGSQL_CONNECTION_OK) {
    echo 'Connection status bad';
}
$company = pg_fetch_all(pg_query($dbconn, "SELECT P.company_name, S.status, CAST(P.date_created AS DATE), A.street, A.city, A.state, A.zip_code FROM Client_Portfolio P, Client_Status S, Address A WHERE P.user_id = ".$_COOKIE["user_id"]." AND P.portfolio_id = " . _get(0) . " AND P.cstatus_id = S.cstatus_id AND P.addr_id = A.addr_id;"));
$projects = pg_fetch_all(pg_query($dbconn, "SELECT P.project_id, P.title, CAST(P.updated_on AS DATE) FROM Client_Portfolio Po, Project P WHERE P.portfolio_id = "._get(0)." AND P.portfolio_id = Po.portfolio_id AND Po.user_id = ".$_COOKIE["user_id"]." ORDER BY updated_on DESC;"));
?>

<div class="portfolios company">
    <h2> Company: <?php echo $company[0]['company_name'] ?> </h2>
    <div class="company-details">
      <div><b>Status:</b> <?php echo $company[0]['status'] ?> </div>
      <div><b>Client Since:</b> <?php echo $company[0]['date_created'] ?> </div>
      <div>
        <b>Address:</b> 
        <div><?php echo ($company[0]['street']) ?></div>
        <div><?php echo($company[0]['city']. ", " .$company[0]['state']." ".$company[0]['zip_code']) ?> </div>
      </div>
    </div>
    <div class="item-list">
        <?php 
          $colors = array("red", "green", "blue", "yellow"); 
          $data = array(
            array(
                'id' => 1,
                'project' => 'Solder'
            ),
        
            array(
                'id' => 2,
                'project' => 'Procter'
            ),
          );
        ?>

        <?php foreach ($projects as $value): ?>
          <div class="item box-shadow blah-toggler" data-target="<?php echo $value['project_id']; ?>">
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
        window.location.pathname = localStorage.getItem("base_path") + '/index.php/portfolio/' + <?php echo _get(0) ?> + '/newProject';
    });
    $( "#portfolio-edit" ).click(function() {
        window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + <?php echo _get(0) ?> + '/editCompany';
    });
    $( "#portfolio-delete" ).click(function() {
        <?php $addr_id = pg_fetch_all(pg_query($dbconn, "DELETE FROM s18group02.Client_Portfolio WHERE portfolio_id = "._get(0) ." RETURNING addr_id;"))[0]["addr_id"]?>;
        <?php pg_query($dbconn, "DELETE FROM s18group02.address WHERE addr_id = ".$addr_id.";"); ?>
        window.location.pathname = localStorage.getItem("base_path") + '/index.php/portfolio/';
    });
    $(".blah-toggler").on("click", function(){
        var t = $(this);
        window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + <?php echo _get(0); ?> + '/project/' + t.data('target');
    });
</script>
        