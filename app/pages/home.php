<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Congratulations!</h1> 

            <p>php-boilerplate is up and running.</p>            

            <p>You can check out <?php echo $html->link('this', 'hello/world'); ?> 
            page to see the example route working</p>
            
            <?php
                $conn_string = "host=dbase.dsa.missouri.edu dbname=s18dbmsgroups user=s18group02 password=corgis";
                $dbconn = pg_connect($conn_string);
                $stat = pg_connection_status($dbconn);
                if ($stat === PGSQL_CONNECTION_OK) {
                    echo 'Connection status ok';
                } else {
                    echo 'Connection status bad';
                }
                $result = pg_query($dbconn, "SELECT P.portfolio_id, C.company_name, P.date_created, P.updated_on FROM s18group02.Portfolio P JOIN s18group02.Client C ON P.client_id = C.client_id ORDER BY updated_on DESC;");
                console.log(var_dump(pg_fetch_all($result)));
                console.log($result);
                echo("<script>console.log($result);</script>");
            ?>
            <?php foreach($result as $key=>$value): ?>
                <div> helloooo </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

