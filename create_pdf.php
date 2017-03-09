<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$dir = dirname(__FILE__);

if (!empty($_POST)) 
{	
	
	
	$heading = $_POST['heading'];
	$record = $_REQUEST['check1'];

	$column = count($heading);
	$row = array_chunk($record, $column);
	
	$count = count($_POST['check']);
	$content = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
			"http://www.w3.org/TR/html4/loose.dtd">
			<html>
			<head>
			<title>User Information Template</title></head>
			<body>
			<table align=""><tr>';
					foreach ($heading as $key => $value) {
						$content.= '<th>'.$value.'</th>';
					}
					$content.='</tr>';

					foreach ($row as $key => $val){
						$content.='<tr>';
						foreach($val as $key1 => $z){
							$content.= '<td>'.$z.'</td>';
						}
						$content.='</tr>';
					}
			
		$content.='</table></body></html>';
		ob_get_clean();
		require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
		$html2pdf = new HTML2PDF('P','A4','en');
		$html2pdf->setDefaultFont('Arial');
		$html2pdf->WriteHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output('data.pdf','D');
}
?>