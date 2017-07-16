<?php
	$error=-1;
	if($_GET["account"]==2)	{
		$email1;
		$email2;

		if( isset($_POST['email2']) && isset($_POST['email1']) && strcmp($_POST['email1'], "")>0 && 
				strcmp($_POST['email2'], "")>0){
			
			$email1=$_POST['email1'];
			$email2=$_POST['email2'];
			if(filter_var($email1,FILTER_VALIDATE_EMAIL) && strcmp($email1,$email2)==0){
				$statement=$pdo->prepare("SELECT * FROM user WHERE email = :email");
				$result = $statement->execute(array('email'=>$email1));
				$tmp = $statement->fetch();
				if($tmp!==false){
					$error=2;
				}else{
					$statement=$pdo->prepare("UPDATE user SET email= :email WHERE id= :uid");
					$result= $statement->execute(array('email'=>$email1,'uid'=>$user['id']));
					echo 'Email erfolgreich geändert. <a href="cockpit.php?Übersicht=1&account=1">Zur Übersicht</a>';
				}
			}else{
				$error=3;
			}
		}else{
			$error=1;
		}
	}
	if($_GET["account"]==3){
		if(isset($_POST['street']) && isset($_POST['plz']) && isset($_POST['city'])){
			$street=$_POST['street'];
			$plz=$_POST['plz'];
			$city=$_POST['city'];
			$address=$street.", ".$plz.", ".$city;
			$statement=$pdo->prepare("UPDATE user SET address= :address WHERE id = :uid");
			$result=$statement->execute(array('address'=>$address,"uid"=>$user['id']));
			echo 'Adresse erfolgreich geändert. <a href="cockpit.php?Übersicht=1&account=1">Zur Übersicht</a>';
		}else{
			$error=4;
		}
	}	

	if($_GET["account"]==1 || $error>0){
?>
	<h3>Kontodaten ändern</h3>
<?php	
	if($error==2){
		echo 'Die eingegebene E-Mail-Adresse ist schon vorhanden.<br>' ;
	}
	if($error==1){ 
		echo 'Mindestens ein Feld für die E-mail-Adressen ist leer.<br>';
	}
	if($error==3){
		echo "Die E-Mail-Adressen sind falsch geschrieben oder unterschiedlich.";
	}	
		if($error==4){
		echo "Es fehlt mindestens eine Adresszeile.<br>";
	}
?>
	<form action="?Übersicht=1&account=2" method="post">
		<h4>E-Mail ändern</h4>
		<table class="formular">
			<tr>
				<td>
					E-Mail:
				</td>
				<td>
					<input type="email" name="email1">	
				</td>
			</tr>	
			<tr>
				<td>
					E-Mail-Wdhl.:
				</td>
				<td>
					<input type="email" name="email2">
				</td>
			</tr>
		</table>
		<div class="save">
			<input type="submit" value="Speichern">
		</div>
	</form>

	<form action="?Übersicht=1&account=3" method="post">	
		<h4>Adresse</h4>

		<table>
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
		</table>
		<br>
		<div class="save">
			<input class="save"type="submit" value="Speichern">
		</div>
	</form>
<?php
	}
?>
