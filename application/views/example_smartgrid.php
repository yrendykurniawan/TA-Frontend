<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Emotion-Meter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
	
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		 // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Anger', <?php echo $cout_anger; ?>],
          ['Fear', <?php echo $cout_fear; ?>],
          ['Joy', <?php echo $cout_joy; ?>],
          ['Sadness', <?php echo $cout_sadness; ?>],
          ['Suprise', <?php echo $cout_surprise; ?>],
		  ['Disgust', <?php echo $cout_disgust; ?>]
        ]);

        // Set chart options
        var options = {'title':'Emotion',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
	</script> 
</head>
<body>

    <div class="container">
        <div class="page-header">
            <h1>Emotion-Meter</h1>
        </div>

        <form class="form-inline" method="post" action="<?php echo base_url(); ?>">
            <div class="form-group">
              <label for="employee_name">Video ID</label>
              <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="Video ID" >
            </div>
			
            <button type="submit" class="btn btn-default">Search</button>
        </form>
        <hr />
		
		<div id="chart_div"></div>
		
        <!-- Print the SmartGrid html -->
        <?php echo isset($grid_html) ? $grid_html : ''; ?>
        
    </div>

</body>
</html>