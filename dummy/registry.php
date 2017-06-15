<?php
	session_start();
	$pdo=new PDO('mysql:host=127.0.0.1;dbname=test','Tester','1234');

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="myStyles/registry.css">
	<title>Registrierung</title>
</head>
<body>
<h3>Registrierung</h3>
<?php
	$showForm=true;
	if(isset($_GET['register'])){
		$error=false;
		$u_name=$_POST["u_name"];
		$u_type=$_POST["u_type"];
		$u_email=$_POST["u_email"];
		$pwd1=$_POST["pwd1"];
		$pwd2=$_POST["pwd2"];
		$a_street=$_POST["a_street"];
		$a_plz=$_POST["a_plz"];
		$a_city=$_POST["a_city"];
		//var_dump($_POST);
		//var_dump($_GET);
		if(strlen($u_name)==0){
			echo 'Bitte einen Namen eingeben<br>';
			$error = true;
		}

		if($u_type=="-1"){
			echo 'Bitte einen Account-Typ wählen';
			$error=true;
		}
		if(!filter_var($u_email,FILTER_VALIDATE_EMAIL)){
			echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
 			$error = true;
		}
		if(strlen($pwd1) == 0) {
 			echo 'Bitte ein Passwort angeben<br>';
 			$error = true;
 		}
		if(strlen($pwd2) == 0) {
 			echo 'Bitte ein Passwort angeben<br>';
 			$error = true;
 		}
 		if(strcmp($pwd1,$pwd2)!=0){
 			echo 'Die Passwörter müssen übereinstimmen<br>';
 			$error=true;
 		}
 		if(strlen($a_street)==0){
 			echo 'Bitte eine Straße angeben<br>';
 			$error = true;
 		}
 		if(strlen($a_plz)==0){
 			echo 'Bitte eine Postleitzahl angeben<br>';
 			$error = true;
 		}	
 		if(strlen($a_city)==0){
 			echo 'Bitte eine Stadt angeben<br>';
 			$error = true;
 		}

 		//Überprüfe, dass die E-Mail noch nicht registriert wurde
 		if(!$error){
 			$statement = $pdo->prepare("SELECT * FROM user WHERE email= :email");
 			$result = $statement->execute(array('email' => $u_email));
 			$user = $statement->fetch();
 			//var_dump($user);
 			if($user!==false){
 				echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
 				$error=true;
 			}
 		}
 		//registrieren
 		if(!$error){
 			$pwd_hash=password_hash($pwd1,PASSWORD_DEFAULT);
 			$statement=$pdo->prepare("INSERT INTO user (name,email,password,type,address) VALUES (?,?,?,?,?)");
 			$address=$a_street.", ".$a_plz." ".$a_city;
 			//echo $u_name." ".$u_type." ".$u_email."<br>".$pwd_hash."<br>".$address;
 			$result=$statement->execute(array($u_name, $u_email, $pwd_hash, $u_type, $address));

 			if($result){
 				echo 'Sie wurden erfolgreich registriert. <a href="index.php">Zum Login</a>';
 				$showForm=false;
 			}else{
 				echo 'Beim Abspeichern ist leider ein Fehler aufgetreten.<br>';
 			}
 		}

	}
	
	if($showForm){
?>	
	<form action="registry.php?register=1" method="post">
		<table>
			<tr>
				<td>
					Name:		
				</td>
				<td>
					<input type="text" name="u_name">
				</td>
			</tr>
			<tr>
				<td>
					Account-Typ:		
				</td>
				<td>
					<select name="u_type" size="1">
						<option value="-1" selected>Bitte wählen</option>
						<option value="prv">private</option>
						<option value="bsn">geschäftlich</option>
						<option value="ins">institutionell</option>
					</select>
				</td>
			</tr>
		</table>
		
		<hr>
		<b>Anschrift:</b>
		<table>
			<tr>
				<td>
					Straße/Haus-Nr.:
				</td>
				<td>
					<input type="text" name="a_street">
				</td>
			</tr>
			<tr>
				<td>
					PLZ:
				</td>
				<td>
					<input type="text" name="a_plz">
				</td>
			</tr>
			<tr>
				<td>
					Ort:
				</td>
				<td>
					<input type="text" name="a_city">
				</td>
			</tr>
		</table>

		<hr>
		<table>
			<tr>
				<td>
					E-mail:	
				</td>
				<td>
					<input type="text" name="u_email">
				</td>
			</tr>
			<tr>
				<td>
					Passwort:
				</td>
				<td>
					<input type="password" name="pwd1">
				</td>
			</tr>
			<tr>
				<td>
					Passwort whdl.:
				</td>
				<td>
					<input type="password" name="pwd2">
				</td>
			</tr>
		</table>
		<br>
		<div id="button">
			<input type="submit" value="Registrieren">
		</div>
	</form>
<?php
	}

?>
</body>
</html>