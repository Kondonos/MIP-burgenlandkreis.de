<?php
	ob_start();	
	$error=-1;
	if($_GET['Erstzulassung']==2){
		$antrag="";
		if(isset($_POST['kfzid'])&& isset($_POST['kfzbrief']) && strlen($_POST['kfzid'])>0 && strlen($_POST['kfzbrief']>0)){
			$antrag=$_POST['kfzid'].", ".$_POST['kfzbrief'];
		}else{
			$error=1;
			echo "Es fehlen Angaben zum Fahrzeug<br>";
		}
		if(isset($_POST['evbnr'])&& strlen($_POST['evbnr'])>0){
			$antrag.=", ".$_POST['evbnr'];
		}else{
			$error=2;
			echo "Es fehlt die Angabe der evB-Nr.<br>";
		}
		if(isset($_POST['vll_name']) && isset($_POST['vll_vorname']) &&isset($_POST['vll_plz']) &&
			isset($_POST['vll_city'])&& isset($_POST['vll_street'])){
			$name=$_POST['vll_name'];
			$vorname=$_POST['vll_vorname'];
			$plz=$_POST['vll_plz'];
			$city=$_POST['vll_city'];
			$street=$_POST['vll_street'];
			if(strlen($name)>0 && strlen($vorname)>0 && strlen($plz)>0 && strlen($city)>0 && strlen($street)>0){
				$antrag.=", ".$name.", ".$vorname.", ".$plz.", ".$city.", ".$street;	
			}else{
				$error=3;
				echo "Es fehlen Angaben zum Bevollmächtigten.<br>";
			}
		}else{
			$error=3;
			echo "Es fehlen Angaben zum Bevollmächtigten.<br>";
		}
		if($error==-1){
			$statement=$pdo->prepare("INSERT INTO request (userid,name,status,content) VALUES(:uid,\"Erstzulassung\",0,:content)");
			$result=$statement->execute(array('uid'=>$user['id'],'content'=>$antrag));
		}

	}

?>
<h3>KFZ-Erstzulassung</h3>
<h4>Angaben zum Fahrzeug</h4>

<form action="?KFZ-Zulassung=1&Erstzulassung=2" method="post">
	<table class="formular">
		<tr>
			<td>
				Fahrzeug-Identnummer:
			</td>
			<td>
				<input type="text" name="kfzid">
			</td>
		</tr>
		<tr>
			<td>
				ZB II Nummer:
			</td>
			<td>
				<input type="text" name="kfzbrief">
			</td>
		</tr>		
	</table>

	<hr>
	<h4>Angaben zur Haftpflicht-Versicherung</h4>
	<table class="formular">
		<tr>
			<td>
				eVB-Nr.:
			</td>
			<td>
				<input type="text" name="evbnr">
			</td>
		</tr>
	</table>

	<hr>
	<h4>Angaben zum Bevollmächtigten</h4>
	<table class="formular">
		<tr>
			<td>
				Name:
			</td>
			<td>
				<input type="text" name="vll_name">
			</td>
		</tr>
		<tr>
			<td>
				Vorname:
			</td>
			<td>
				<input type="text" name="vll_vorname">
			</td>
		</tr>
		<tr>
			<td>
				PLZ:
			</td>
			<td>
				<input type="text" name="vll_plz">
			</td>
		</tr>
		<tr>
			<td>
				Ort:
			</td>
			<td>
				<input type="text" name="vll_city">
			</td>
		</tr>
		<tr>
			<td>
				Straße/Hausnummer:
			</td>
			<td>	
				<input type="text" name="vll_street">
			</td>
		</tr>
	</table>
	<br>
	<div class="save">
		<input type="submit" value="Abschicken">
	</div>
</form>
<?php
	$content_main=ob_get_contents();
	ob_end_clean();

?>

