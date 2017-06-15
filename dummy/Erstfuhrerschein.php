<?php
	$error=-1;
	ob_start();
	if($_GET['Erstführerschein']==2){
		
		$schule;
		$schein;
		$birthday;
		$birthplace;
		$name;
		$birthname;
		$vorname;
		$plz;
		$city;
		$street;
		$angehörig;
		$tel;
		$sehhilfe;
		$perso;
		$img;
		$leben;
		$erste;
		$sehtest;
		if(isset($_POST['schule']) && strcmp($_POST['schule'], "")>0){
			$schule=$_POST['schule'];
		}else{
			echo 'Angabe der Fahrschule fehlt.<br>';
			$error=1;
		}
		if(isset($_POST['schein']) && strcmp($_POST['schein'], "-1")>0){
			$schein=$_POST['schein'];
		}else{
			echo 'Es wurde keine Führerscheinklasse gewählt.<br>';
			$error=2;
		}
		if(isset($_POST['birthday']) && strcmp($_POST['birthday'], "")>0){
			$birthday=$_POST['birthday'];
		}else{
			echo 'Es wurde kein gültiges Geburtsdatum eingegeben.<br>';
			$error=3;
		}
		if(isset($_POST['birthplace']) && strcmp($_POST['birthplace'], "")>0){
			$birthplace=$_POST['birthplace'];
		}else{
			echo 'Angabe des Geburtsortes fehlt.<br>';
			$error=4;
		}
		if(isset($_POST['name']) && strcmp($_POST['name'], "")>0){
			$name=$_POST['name'];
		}else{
			echo 'Angabe des Familiennames fehlt.<br>';
			$error=5;
		}
		if(isset($_POST['birthname']) && strcmp($_POST['birthname'], "")>0){
			$birthname=$_POST['birthname'];
		}else{
			echo 'Angabe des Geburtsnames fehlt.<br>';
			$error=6;
		}
		if(isset($_POST['vorname']) && strcmp($_POST['vorname'], "")>0){
			$vorname=$_POST['vorname'];
		}else{
			echo 'Angabe des Vornamens fehlt.<br>';
			$error=7;
		}
		if(isset($_POST['plz']) && strcmp($_POST['plz'], "")>0){
			$plz=$_POST['plz'];
		}else{
			echo 'Angabe der Postleitzahl fehlt.<br>';
			$error=8;
		}
		if(isset($_POST['city']) && strcmp($_POST['city'], "")>0){
			$city=$_POST['city'];
		}else{
			echo 'Angabe des Wohnortes fehlt.<br>';
			$error=9;
		}
		if(isset($_POST['street']) && strcmp($_POST['street'], "")>0){
			$street=$_POST['street'];
		}else{
			echo 'Angabe der Straße/Haus-Nr. fehlt.<br>';
			$error=10;
		}
		if(isset($_POST['angehörig']) && strcmp($_POST['angehörig'], "")>0){
			$angehörig=$_POST['angehörig'];
		}else{
			echo 'Angabe der Staatsangehörigkeit fehlt.<br>';
			$error=11;
		}
		if(isset($_POST['tel']) && strcmp($_POST['tel'], "")>0){
			$tel=$_POST['tel'];
		}else{
			echo 'Angabe der Telefon-Nr. fehlt.<br>';
			$error=12;
		}
		

		$uploaddir="./tmp/";
		$uploadfile=$uploaddir.basename($_FILES['perso']['name'][0]);
		if(move_uploaded_file($_FILES['perso']['tmp_name'][0], $uploadfile)){
			$perso=file_get_contents($uploadfile);
		}else{
			echo "Entweder Fehler beim Hochladen des Personalausweises oder er ist nicht vorhanden!<br>";
			$error=13;
		}

		$uploadfile=$uploaddir.basename($_FILES['img']['name'][0]);
		if(move_uploaded_file($_FILES['img']['tmp_name'][0], $uploadfile)){
			$img=file_get_contents($uploadfile);
		}else{
			echo "Entweder Fehler beim Hochladen des Lichtbildes oder es ist nicht vorhanden!<br>";
			$error=14;
		}

		$uploadfile=$uploaddir.basename($_FILES['leben']['name'][0]);
		if(move_uploaded_file($_FILES['leben']['tmp_name'][0], $uploadfile)){
			$leben=file_get_contents($uploadfile);
		}else{
			echo "Entweder Fehler beim Hochladen des Nachweises über die Unterweisung in lebensrettenden Sofortmaßnahmen oder es ist nicht vorhanden!<br>";
			$error=15;
		}

		$uploadfile=$uploaddir.basename($_FILES['erste']['name'][0]);
		if(move_uploaded_file($_FILES['erste']['tmp_name'][0], $uploadfile)){
			$erste=file_get_contents($uploadfile);
		}else{
			echo "Entweder Fehler beim Hochladen des Nachweises über die Ausbildung in Erster Hilfe oder es ist nicht vorhanden!<br>";
			$error=16;
		}

		$uploadfile=$uploaddir.basename($_FILES['sehtest']['name'][0]);
		if(move_uploaded_file($_FILES['sehtest']['tmp_name'][0], $uploadfile)){
			$sehtest=file_get_contents($uploadfile);
		}else{
			echo "Entweder Fehler beim Hochladen des Sehtests/augenärztlichen Zeugnises/ Gutachtens oder es ist nicht vorhanden!<br>";
			$error=17;
		}

		if(isset($_POST['sehhilfe'])&& strcmp($_POST['sehhilfe'], "")>0){
			$sehhilfe=$_POST['sehhilfe'];
		}else{
			echo "Angabe ob Sie eine Sehhilfe brauchen fehlt.<br>";
			$error=18;
		}
		echo $error."<br>";
		if($error==-1){
			$statement=$pdo->prepare("INSERT INTO request (userid,name,status,content) VALUES(".$user['id'].",\"Erstführerschein\",0,:content)");
			$cont=array($schule,$schein,$birthday,$birthplace,$name,$birthname,$vorname,
				$plz,$city,$street,$angehörig,$tel,$sehhilfe,
				$perso,$img,$leben,$erste,$sehtest);
			$result=$statement->execute(array('content'=>implode(", ", $cont)));
			//var_dump($result);
			//echo $statement->errorCode();
		}
	}
	
?>
	<form action="?Führerscheinwesen&Erstführerschein=2" enctype="multipart/form-data" method="post">
		<table>
			<tr>
				<td>
					Fahrschule:
				</td>
				<td>
					<input type="text" name="schule">
				</td>
			</tr>
			<tr>
				<td>
					Angestrebter Fügrerschein:
				</td>
				<td>
					<select name="schein" size=1>
						<option value="-1" selected>Bitte wählen</option>
						<option value="am">AM</option>
						<option value="a1">A1</option>
						<option value="a2">A2</option>
						<option value="a">A</option>
						<option value="b">B</option>
						<option value="t">T</option>
						<option value="l">L</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					Geburtsdatum:
				</td>
				<td>
					<input type="date" name="birthday"> 
				</td>
			</tr>
			<tr>
				<td>
					Geburtsort:
				</td>
				<td>
					<input type="text" name="birthplace">
				</td>
			</tr>
			<tr>
				<td>
					Familienname:
				</td>
				<td>
					<input type="text" name="name">
				</td>
			</tr>
			<tr>
				<td>
					Geburtsname: 
				</td>
				<td>
					<input type="text" name="birthname">
				</td>
			</tr>
			<tr>
				<td>
					Vornamen: 
				</td>
				<td>
					<input type="text" name="vorname">
				</td>
			</tr>
			<tr>
				<td>
					PLZ:
				</td>
				<td>
					<input type="text" name="plz">
				</td>
			</tr>
			<tr>
				<td>
					Ort:
				</td>
				<td>
					<input type="text" name="city">
				</td>
			</tr>
			<tr>
				<td>
					Straße/Haus-Nr.:
				</td>
				<td>
					<input type="text" name="street">
				</td>
			</tr>
			<tr>
				<td>
					Staatsangehörigkeit:
				</td>
				<td>
					<input type="text" name="angehörig">
				</td>
			</tr>
			<tr>
				<td>
					Telefon:
				</td>
				<td>
					<input type="text" name="tel">
				</td>
			</tr>
		</table>
		<br>
		<fieldset >
			Ich trage im Straßenverkehr eine Sehhilfe?<br>
			<input type="radio" name="sehhilfe" value="ja">ja<br>
			<input type="radio" name="sehhilfe" value="nein" >nein
		</fieldset>
		<br>
		<!--<input type="hidden" name="MAX_FILE_SIZE" value="40000000" /-->
		<table>
			<tr>
				<td>
					Personalausweis:
				</td>
				<td>
					<input type="file" name="perso[]">
				</td>
			</tr>
			<tr>
				<td>
					Lichtbild:
				</td>
				<td>
					<input type="file" name="img[]">
				</td>
			</tr>
			<tr>
				<td>
					Nachweis über die Unterweisung in lebensrettenden Sofortmaßnahmen:
				</td>
				<td>
					<input type="file" name="leben[]">
				</td>
			</tr>
			<tr>
				<td>
					Nachweis über die Ausbildung in Erster Hilfe:
				</td>
				<td>
					<input type="file" name="erste[]">
				</td>
			</tr>
			<tr>
				<td>
					Sehtest/augenärztliches Zeugnis oder Gutachten:
				</td>
				<td>
					<input type="file" name="sehtest[]">
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