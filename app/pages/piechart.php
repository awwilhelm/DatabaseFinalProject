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

//milestone completion
$milestonesNotStarted = pg_num_rows(pg_query($dbconn, "SELECT * FROM milestone WHERE status_id = 1"));
$milestonesInProgress = pg_num_rows(pg_query($dbconn, "SELECT * FROM milestone WHERE status_id = 2"));
$milestonesCompleted = pg_num_rows(pg_query($dbconn, "SELECT * FROM milestone WHERE status_id = 3"));

//sprint completion
$sprintsNotStarted = pg_num_rows(pg_query($dbconn, "SELECT * FROM sprint WHERE status_id = 1"));
$sprintsInProgress = pg_num_rows(pg_query($dbconn, "SELECT * FROM sprint WHERE status_id = 2"));
$sprintsCompleted = pg_num_rows(pg_query($dbconn, "SELECT * FROM sprint WHERE status_id = 3"));

//task completion
$tasksNotStarted = pg_num_rows(pg_query($dbconn, "SELECT * FROM task WHERE tstatus_id = 1"));
$tasksInProgress = pg_num_rows(pg_query($dbconn, "SELECT * FROM task WHERE tstatus_id = 2"));
$tasksUnderReview = pg_num_rows(pg_query($dbconn, "SELECT * FROM task WHERE tstatus_id = 3"));
$tasksOnHold = pg_num_rows(pg_query($dbconn, "SELECT * FROM task WHERE tstatus_id = 4"));
$tasksCompleted = pg_num_rows(pg_query($dbconn, "SELECT * FROM task WHERE tstatus_id = 5"));

//task types
$frontEndTasks = pg_num_rows(pg_query($dbconn, "SELECT * FROM task WHERE ttype_id = 1"));
$backEndTasks = pg_num_rows(pg_query($dbconn, "SELECT * FROM task WHERE ttype_id = 2"));
$databaseTasks = pg_num_rows(pg_query($dbconn, "SELECT * FROM task WHERE ttype_id = 3"));
$reportingTasks = pg_num_rows(pg_query($dbconn, "SELECT * FROM task WHERE ttype_id = 4"));
$researchTasks = pg_num_rows(pg_query($dbconn, "SELECT * FROM task WHERE ttype_id = 5"));

//tag types
$schemaBrainstorming = pg_num_rows(pg_query($dbconn, "SELECT * FROM task_has_tags WHERE task_id = 1"));
$dataInsertion = pg_num_rows(pg_query($dbconn, "SELECT * FROM task_has_tags WHERE task_id = 2"));
$updatingData = pg_num_rows(pg_query($dbconn, "SELECT * FROM task_has_tags WHERE task_id = 3"));
$refiningData = pg_num_rows(pg_query($dbconn, "SELECT * FROM task_has_tags WHERE task_id = 4"));
$frontEnd = pg_num_rows(pg_query($dbconn, "SELECT * FROM task_has_tags WHERE task_id = 5"));
$backEnd = pg_num_rows(pg_query($dbconn, "SELECT * FROM task_has_tags WHERE task_id = 6"));
$documentation = pg_num_rows(pg_query($dbconn, "SELECT * FROM task_has_tags WHERE task_id = 7"));
$unitTesting = pg_num_rows(pg_query($dbconn, "SELECT * FROM task_has_tags WHERE task_id = 8"));
$systemsTest = pg_num_rows(pg_query($dbconn, "SELECT * FROM task_has_tags WHERE task_id = 9"));
$integrationTesting = pg_num_rows(pg_query($dbconn, "SELECT * FROM task_has_tags WHERE task_id = 10"));
$gUI = pg_num_rows(pg_query($dbconn, "SELECT * FROM task_has_tags WHERE task_id = 11"));
$authentication = pg_num_rows(pg_query($dbconn, "SELECT * FROM task_has_tags WHERE task_id = 12"));
$requirementsFramework = pg_num_rows(pg_query($dbconn, "SELECT * FROM task_has_tags WHERE task_id = 13"));


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
      google.charts.setOnLoadCallback(milestonesChart);
      google.charts.setOnLoadCallback(sprintsChart);
      google.charts.setOnLoadCallback(tasksChart);
      google.charts.setOnLoadCallback(tasksTypeChart);
      google.charts.setOnLoadCallback(tagChart);

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
        var options = {'title':'PROJECTS COMPLETION',
                       'width':600,
                       'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('projects'));
        chart.draw(data, options);
      }
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      function milestonesChart() {

          var milestonesNotStarted = parseInt("<?php echo $milestonesNotStarted ?>");
          var milestonesInProgress = parseInt("<?php echo $milestonesInProgress ?>");
          var milestonesCompleted = parseInt("<?php echo $milestonesCompleted ?>");

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['NOT STARTED', milestonesNotStarted],
          ['IN PROGRESS', milestonesInProgress],
          ['COMPLETED', milestonesCompleted]
        ]);

        // Set chart options
        var options = {'title':'MILESTONES COMPLETION',
                       'width':600,
                       'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('milestones'));
        chart.draw(data, options);
      }
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      function sprintsChart() {

          var sprintsNotStarted = parseInt("<?php echo $sprintsNotStarted ?>");
          var sprintsInProgress = parseInt("<?php echo $sprintsInProgress ?>");
          var sprintsCompleted = parseInt("<?php echo $sprintsCompleted ?>");

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['NOT STARTED', sprintsNotStarted],
          ['IN PROGRESS', sprintsInProgress],
          ['COMPLETED', sprintsCompleted]
        ]);

        // Set chart options
        var options = {'title':'SPRINTS COMPLETION',
                       'width':600,
                       'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('sprints'));
        chart.draw(data, options);
      }
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      function tasksChart() {

          var tasksNotStarted = parseInt("<?php echo $tasksNotStarted ?>");
          var tasksInProgress = parseInt("<?php echo $tasksInProgress ?>");
          var tasksUnderReview = parseInt("<?php echo $tasksUnderReview ?>");
          var tasksOnHold = parseInt("<?php echo $tasksOnHold ?>");
          var tasksCompleted = parseInt("<?php echo $tasksCompleted ?>");

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['NOT STARTED', tasksNotStarted],
          ['IN PROGRESS', tasksInProgress],
          ['UNDER REVIEW', tasksUnderReview],
          ['ON HOLD', tasksOnHold],
          ['COMPLETED', tasksCompleted]
        ]);

        // Set chart options
        var options = {'title':'TASKS COMPLETION',
                       'width':600,
                       'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('tasks'));
        chart.draw(data, options);
      }
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      function tasksTypeChart() {

          var frontEndTasks = parseInt("<?php echo $frontEndTasks ?>");
          var backEndTasks = parseInt("<?php echo $backEndTasks ?>");
          var databaseTasks = parseInt("<?php echo $databaseTasks ?>");
          var reportingTasks = parseInt("<?php echo $reportingTasks ?>");
          var researchTasks = parseInt("<?php echo $researchTasks ?>");

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Count');
        data.addRows([
          ['FRONT END', frontEndTasks],
          ['BACK END', backEndTasks],
          ['DATABASE', databaseTasks],
          ['REPORTING', reportingTasks],
          ['RESEARCH', researchTasks]
        ]);

        // Set chart options
        var options = {'title':'TASKS BY TYPE',
                       'width':500,
                       'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('tasksType'));
        chart.draw(data, options);
      }
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      ////////////////////
      ///////////////////
      function tagChart() {

        var schemaBrainstorming = parseInt("<?php echo $schemaBrainstorming ?>");
        var dataInsertion = parseInt("<?php echo $dataInsertion ?>");
        var updatingData = parseInt("<?php echo $updatingData ?>");
        var refiningData = parseInt("<?php echo $refiningData ?>");
        var frontEnd = parseInt("<?php echo $frontEnd ?>");
        var backEnd = parseInt("<?php echo $backEnd ?>");
        var documentation = parseInt("<?php echo $documentation ?>");
        var unitTesting = parseInt("<?php echo $unitTesting ?>");
        var systemsTest = parseInt("<?php echo $systemsTest ?>");
        var integrationTesting = parseInt("<?php echo $integrationTesting ?>");
        var gUI = parseInt("<?php echo $gUI ?>");
        var authentication = parseInt("<?php echo $authentication ?>");
        var requirementsFramework = parseInt("<?php echo $requirementsFramework ?>");

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['SCHEMA BRAINSTORMING', schemaBrainstorming],
          ['DATA INSERTION', dataInsertion],
          ['UPDATING DATA', updatingData],
          ['REFINING DATA', refiningData],
          ['FRONT END', frontEnd],
          ['BACK END', backEnd],
          ['DOCUMENTATION', documentation],
          ['UNIT TESTING', unitTesting],
          ['SYSTEMS TEST', systemsTest],
          ['INTEGRATION TESTING', integrationTesting],
          ['GUI', gUI],
          ['AUTHENTICATION', authentication],
          ['REQUIREMENTS FRAMEWORK', requirementsFramework]
        ]);

        // Set chart options
        var options = {'title':'TAGS IN USE PERCENTAGE',
                       'width':600,
                       'pieHole': 0.4,
                       'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('tagChart'));
        chart.draw(data, options);
      }


    </script>
  </head>

  <body>
    <table>
      <tr>
        <td><div id="projects"></div></td>
        <td><div id="milestones"></div></td>
      </tr>
      <tr>
        <td><div id="sprints"></div></td>
        <td><div id="tasks"></div></td>
      </tr>
      <tr>
        <td><div id="tasksType"></div></td>
        <td><div id="tagChart"></div></td>
      </tr>
      <tr>
        <td><div id="sprintAvgChart"></div></td>
      </tr>
    </table>
  </body>
</html>
