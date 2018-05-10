<?php

$conn_string = "host=dbase.dsa.missouri.edu dbname=s18dbmsgroups user=s18group02 password=corgis";
$dbconn = pg_connect($conn_string);
$stat = pg_connection_status($dbconn);
if ($stat !== PGSQL_CONNECTION_OK) {
    echo 'Connection status bad';
}

$projectsNotStarted = pg_num_rows(pg_query($dbconn, "SELECT * FROM project WHERE status_id = 1"));
$projectsInProgress = pg_num_rows(pg_query($dbconn, "SELECT * FROM project WHERE status_id = 2"));
$projectsCompleted = pg_num_rows(pg_query($dbconn, "SELECT * FROM project WHERE status_id = 3"));

?>

<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(projectsChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function projectsChart() {

          var projectsNotStarted = parseInt("<?php echo $projectsNotStarted ?>");
          var projectsInProgress = parseInt("<?php echo $projectsInProgress ?>");
          var projectsCompleted = parseInt("<?php echo $projectsCompleted ?>");

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['NOT STARTED', projectsNotStarted],
          ['IN PROGRESS', projectsInProgress],
          ['COMPLETED', projectsCompleted]
        ]);

        // Set chart options
        var options = {'title':'PROJECTS',
                       'width':600,
                       'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('projects'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <div id="projects"></div>
  </body>
</html>
