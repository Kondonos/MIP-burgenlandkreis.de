<?php

	$content_nav='
		
			<ul>
				<li><a href="?Übersicht=1&actuell=1">Aktuelles</a></li>
				<hr>
				<li><a href="?Übersicht=1&account=1">Kontodaten ändern</a></li>
				<hr>
			</ul>';
	if(sizeof($_GET)<=1||isset($_GET["actuell"])){
		$statement=$pdo->prepare("SELECT * FROM request WHERE userid=:userid");
		$result=$statement->execute(array('userid'=>$_SESSION['userid']));	
		$requests=$statement->fetchall();
		$quests = array();
		if($requests!==false){	
			foreach ($requests as $request) {
				$format=
				'<tr>
					<td>%d</td>
					<td>%s</td>
					<td>%s</td>
					<td>%02d.%02d.%04d</td>
					<!--<td><a href="?'.$request['name'].'edit=1">ändern</a>-->
					<td><a href="?deleteRequest=1&id='.$request['id'].'">löschen</a>
				</tr>';
				$stat=$request['status'];
				$values=array($request['id'],$request['name'],(($stat==0)?"beantragt": (($stat==1)? "in Bearbeitung": (($stat==2)?"genehmigt":"abgelehnt"))));
				$mdate=DateTime::createFromFormat("Y-m-d H:i:s",$request['date']);
	
				$date=explode('-',$mdate->format("d-m-Y"));
				$values=array_merge($values,$date);
				array_push($quests, vsprintf($format,$values));	
			}
		}else{
			array_push($quests, "<td>Es sind keine Anträge vorhanden.</li><hr>");
		}
		$content_main='
			<table class="antrage">';
		foreach ($quests as $quest) {
   			$content_main.=$quest;
		}
		$content_main.='
			</table>';
	}
	
				
?>



