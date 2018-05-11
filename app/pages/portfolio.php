<?php
$conn_string = "host=dbase.dsa.missouri.edu dbname=s18dbmsgroups user=s18group02 password=corgis";
$dbconn = pg_connect($conn_string);
$stat = pg_connection_status($dbconn);
if ($stat !== PGSQL_CONNECTION_OK) {
    echo 'Connection status bad';
}

$portfolios = pg_fetch_all(pg_query($dbconn, "SELECT portfolio_id, user_id, company_name, CAST(updated_on AS DATE) FROM Client_Portfolio WHERE user_id = ".$_COOKIE["user_id"] ." ORDER BY updated_on DESC;"));
?>

<!-- <script>
    //console.log(GetUserId());
    GetUserId(function(data){
        console.log(data);
    })
    
</script> -->

<div class="portfolios">
    <h2> Portfolios </h2>
    <div class="item-list">
        <?php 
          $colors = array("red", "green", "blue", "yellow"); 
          $data = array(
            array(
                'id' => 1,
                'company_name' => 'Apple',
                'projects' => array('Solder', 'Procter')
            ),
        
            array(
                'id' => 2,
                'company_name' => 'Target',
                'projects' => array('Tiger Walker')
            ),
          );
        ?>

        <?php foreach ($portfolios as $value): ?>
          <div class="item box-shadow blah-toggler" data-target="<?php echo $value['portfolio_id']; ?>">
              <div class="name"><?php echo $value['company_name'] ?></div>
              
              <div class="name"><?php echo $value['updated_on'] ?></div>
              
              <!-- <div class="project-header"> Projects </div>
              <div class="project-list">
                  <?php foreach ($value['projects'] as $project): ?>
                    <div> <?php echo $project; ?> </div>
                  <?php endforeach; ?>
              </div> -->
          </div>
        <?php endforeach; ?>
        
    </div>
    <div id="portfolio-add" class="create box-shadow"> <i class="fas fa-plus"></i> </div>
    <!-- <div id="portfolio-edit" class="edit box-shadow"> <i class="fas fa-edit"></i> </div> -->
</div>

<script>
    $( "#portfolio-add" ).click(function() {
        window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/newCompany';
    });
    $(".blah-toggler").on("click", function(){
        var t = $(this);
        $('#' + t.data('target')).hide();
        window.location.pathname = localStorage.getItem("base_path") + 'index.php/portfolio/' + t.data('target');
    });
</script>
<?php
  
?>
        