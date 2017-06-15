<?php
	ob_start();
?>	
	<ul>
		<li><a>Klassenfahrt/Kitafahrt</a></li>
		<hr>
		<li><a>Leistungen für Bildung u. Teilhabe</a></li>
		<hr>
		<li><a>Eintägige Ausflüge</a></li>
		<hr>
	</ul>
<?php
	$content_nav=ob_get_contents();
	ob_end_clean();

?>