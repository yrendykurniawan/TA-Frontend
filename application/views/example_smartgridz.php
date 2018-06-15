<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Emotion-Meter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
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
		
		
    </div>

</body>
</html>