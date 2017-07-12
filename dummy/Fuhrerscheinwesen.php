<?php

	ob_start();
?>
	<ul>
		<li><a href="?Führerscheinwesen=1&Erstführerschein=1">Erstführerschein</a></li>
		<hr>
		<li><a>Führerschein erweitern</a></li>
		<hr>
		<li><a>Führerschein Umschreibung</a></li>
		<hr>
		<li><a>Internationaler Führerschein</a></li>
		<hr>
		<li><a>Ersatzführerschein</a></li>
		<hr>
	</ul>
<?php
	$content_nav=ob_get_contents();
	ob_end_clean();
	
	if(isset($_GET['Erstführerschein'])){
		include_once('Erstfuhrerschein.php');
	}else{
		ob_start();
?>
<h4>Erstführerschein</h4>
<hr>
<h4>Führerschein erweitern</h4>
<hr>
<?php
		$content_main=ob_get_contents();
		ob_end_clean();
	}	
?>