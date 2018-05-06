<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Congratulations!</h1> 

            <p>php-boilerplate is up and running.</p>            

            <p>You can check out <?php echo $html->link('this', 'hello/world'); ?> 
            page to see the example route working</p>
            
            <?php
                $conn_string = "host=dbase.dsa.missouri.edu dbname=s18group02 user=s18dbmsgroups password=corgis";
                $dbconn = pg_connect($conn_string);
                $stat = pg_connection_status($dbconn);
                if ($stat === PGSQL_CONNECTION_OK) {
                    echo 'Connection status ok';
                } else {
                    echo 'Connection status bad';
                }
            ?>
        </div>
    </div>
</div>

