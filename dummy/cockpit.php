<?php
	session_start();
	$errorcode=-1;
	if(!isset($_SESSION['userid'])){
		$errorcode=0;
	}
//echo $_SESSION['userid']." ".$errorcode;
	$pdo=new PDO('mysql:host=127.0.0.1;dbname=test','Tester','1234');


	$statement=$pdo->prepare("SELECT * FROM user WHERE id=:id");
	$result=$statement->execute(array('id'=> $_SESSION['userid']));
	$user=$statement->fetch();
	$categories;
	if($user==false){
		$errorcode=1;
		header("Location: index.php");
	}else{
		$nav="";
		if($user['type']==0){
			$categories=array("Übersicht","KFZ-Zulassung","Führerscheinwesen","Umwelt","Fördermittel");
			
		}
		if($user['type']==1){
			$categories=array("Übersicht","Verkehrsangelegenheiten","KFZ-Zulassung","Führerscheinwesen","Umwelt");
		}
		if($user['type']==2){
			$categories=array("Übersicht","Verkehrsangelegenheiten","Umwelt");
		}
		arrayToList($nav,$categories);
		
	}

	////////////////////////////////////////////////////////////
	//////////Content
	////////////////////////////////////////////////////////////
	$content_nav="";
	$content_main="";
	if(isset($_GET["Übersicht"])|| empty($_GET)){
		$content_main="";
		include('Ubersicht.php');
	}
	if(isset($_GET['KFZ-Zulassung'])){
		$content_main="";
		include_once('KFZ.php');
	}
	if(isset($_GET['Führerscheinwesen'])){
		$content_main="";
		include_once('Fuhrerscheinwesen.php');
	}
	if(isset($_GET['deleteRequest'])){
		if(isset($_GET['id'])){
			$todel=$_GET['id'];
			$statement=$pdo->prepare("DELETE FROM request WHERE id=:id");
			$result=$statement->execute(array('id'=>$todel));
			header("Location: cockpit.php");
		}
	}
	if(isset($_GET['Fördermittel'])){
		include_once('Fordermittel.php');
	}
	if(isset($_GET['Umwelt'])){
		include_once('Umwelt.php');
	}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta charset="UTF-8">
		<script src="myJS/jquery-3.2.1.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="myStyles/cockpit.css">
		
<?php

	if($errorcode==0 || $errorcode==300){
		echo '<meta http-equiv=\"refresh" content=\"'.($errorcode==0?3:0).';URL=index.php\">';
	}
	echo '<script>
		window.onload=function(){
			document.getElementById("personName").innerHTML="'.$user['name'].'"
		}
		</script>';
?>
	</head>
	<body>
<?php
	if($errorcode==0){
	echo 'Bitte einloggen, <a href="index.php">hier</a>';		
	}else{
?>			
		<table id="status">
			<tr>
				<td class="left">
					<span id="personName">Name</span>
				</td>
				<td class="left">
					<a href="Logout.php" >Logout</a>
				</td>
				<td class="right">
					<form >
						<label for="search">Suche:</label>
						<input id="search" type="text">
						<label onclick="search()">-></label>
					</form>
				</td>
			</tr>
		</table>	
		
		<nav class="categories">
			<ul id="services_categories">
<?php
	echo $nav;
?>
			</ul>
		</nav>


		<div id="content">
<?php
	echo $content_main;
	$content_main="";
	if(isset($_GET["Übersicht"])&&isset($_GET["account"])){
		include_once("Account.php");
	}
?>
		</div>	

		<nav class="vertical">
<?php
	echo $content_nav;
?>
		</nav>

<!--
		<div id="fastlinks">

		</div>
-->
		<div class="help">
			<a><img src="chat.png" height="50" width="50"></a><br>
			<br>
			<a><img src="termin.png" height="50" width="50"></a>
		</div>

<?php
	}
?>	
	</body>
</html>
<?php
	function arrayToList(&$list,$array)
	{
		foreach ($array as $item) {
			appendListItem($list,$item);
		}
	}
	function appendListItem(&$list,$value)
	{
		$list.='<li><a href="?'.$value.'=1" id="'.$value.'">'.$value.'</a></li>';
	}
?>

	