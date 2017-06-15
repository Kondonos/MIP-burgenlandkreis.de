<?php
	$content_nav='
		<ul >
			<li><a href="?KFZ-Zulassung=1&Erstzulassung=1">Erstzulassung</a></li>
			<hr>
			<li><a>Wiederzulassung</a></li>
			<hr>
			<li><a>Umschreibung</a></li>
			<hr>
			<li><a>Abmeldung</a></li>
			<hr>
			<li><a>Internaltionale Zulassung</a></li>
			<hr>
			<li><a>Rote Kennzeichen</a></li>
			<hr>
			<li><a>FZV</a></li>
			<hr>
			<li><a>StVZO</a></li>
			<hr>
		</ul>';
	if(isset($_GET['Erstzulassung'])){
		include_once('Erstzulassung.php');
	}else{
	ob_start();	
?>
	<h4>Erstzulassung</h4>

	<hr>
	<h4>Wiederzulassung</h4>
<?php
	$content_main=ob_get_contents();
	ob_end_clean();
	}
?>
