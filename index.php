<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Pdf Converter</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-1.11.0.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container" style="margin-top: 50px;">
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<div class="panel panel-primary">
				  	<div class="panel-heading">
				    	<h3 class="panel-title" style="padding:12px 0px;font-size:23px;"><strong>Pdf Converter</strong></h3>
				  	</div>
				  	<div class="panel-body">
						<h4>Please Select CSV File:</h4>
							<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="" method="post" enctype="multipart/form-data">
						        <input type="file" name="csv_file" placeholder="Upload CSV" required/>	
						     	<br />
						        <input type="submit" class="btn btn-primary" value="Submit" name="submit"/>
						        <br />
							</form>
						<br/>
		  			</div>
				</div>
			</div>
		</div>				
	</div>
</body>
</html>
<?php
	if(isset($_REQUEST['submit'])){
?>
	<style type="text/css">
	.csvTable tr td{white-space: nowrap}
	  /* .csvTable tr:nth-child(even) {background: #CCC;font-size:12px;color:black;}
	    		.csvTable tr:nth-child(odd) {background: #FFF;font-size:12px;color:black;} */  
	table { border:1px solid #ccc; border-collapse:collapse; padding:5px; }	
th { background:#eff5fc; padding:10px; text-align:center; }	
td { padding:10px; }
</style>
<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<h4>Please click on download</h4>
			 <form name="pdf_convert" method="POST" action="create_pdf.php">
			 <?php
			if (isset($_FILES['csv_file']) && $_FILES['csv_file']['size'] > 0) 
			{
					$row = 0;	
					if (($handle = fopen($_FILES['csv_file']['tmp_name'], "r")) !== FALSE) 
					{
						echo "<table class='csvTable' border='1'>\n<thead>";
					
						while (($data = fgetcsv($handle, 0, ",")) !== FALSE) 
						{
							
							$num = count($data);
							if($row ==0) 
							{
								foreach ($data as $key => $value) {
									echo "<input type='hidden' value='".$value."' name='heading[]'>";
								}
							}
							else
							{
								foreach ($data as $key => $value) {
									echo "<input type='hidden' value='".$value."' name='check1[]'>";
								}
							}
								$row++;
								if($row==4)
									echo "\n</thead>\n<tbody>";	
						}
						echo '</tbody></table>';	
						fclose($handle);
					}else
						echo 'Can not open file: '.$_FILES['csv_file']; 
			}else
			echo 'NO File selected';
			 ?>
			  <input type="submit" name="submit" value="Download" class="btn btn-success" />
			 </form>
		</div>
	</div>
</div>
 
<?php
	}
?>