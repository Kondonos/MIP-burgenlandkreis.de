<?php
	session_start();
  $conf=parse_ini_file("config.conf");
  if (!isset($conf["user"])||!isset($conf["name"])||!isset($conf["password"])) {
    die;
  }
  $dbuser=$conf["user"];
  $dbname=$conf["name"];
  $dbpwd=$conf["password"];
	$pdo=new PDO('mysql:host=127.0.0.1;dbname='.$dbname,$dbuser,$dbpwd);
	if(isset($_GET['login'])){
		$email=$_POST['email'];
		$pwd=$_POST['pwd'];

		$statement=$pdo->prepare("SELECT * FROM user WHERE email= :email");
		$result=$statement->execute(array('email'=>$email));
		$user=$statement->fetch();

		//Überprüfung des Passworts
		if(($user!==false && password_verify($pwd,$user['password']))){
			$_SESSION['userid']=$user['id'];
			$login=1;
		}else{
			$errorMessage="E-Mail oder Passwort war ungültig<br>";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>

  <!-- PAGETITLE -->
	<title>Aktuelles&nbsp;|&nbsp;Burgenlandkreis</title>
<?php
	if(isset($login)){
?>
  		
  		<meta http-equiv="refresh" content="0;URL=cockpit.php">
<?php
	}
?>
  	<!-- WEBCONFIG META [Start] -->
      	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <meta http-equiv="content-script-type" content="text/javascript">
      <meta http-equiv="Content-Style-Type" content="text/css">
      <meta name="content-language" content="de">
      <meta name="date" content="">
      
<!-- ********************************************************************** 
	 META-TAGS FROM DOCUMENT-OBJECT
     ********************************************************************** -->
<meta name="generator" content="brain-GeoCMS 4.1 - brain-SCC GmbH">
<meta name="publisher" content="Burgenlandkreis">
<meta name="copyright" content="Burgenlandkreis">
<meta name="author" content="Burgenlandkreis">
<meta name="date" content="2011-11-09">
<meta name="revisit-after" content="">
<meta name="description" content="Aktuelle Informationen aus dem Burgenlandkreis">
<meta name="keywords" content="landkreis, burgenlandkreis, naumburg, weißenfels, freyburg, zeitz, blk, saale, unstrut">
<meta name="geo.region" content="DE-Sachsen-Anhalt">
<meta name="geo.placename" content="Schönburger Straße 41, 06618 Naumburg (Saale), Deutschland">
<meta name="geo.position" content="51.152;11.824">
<meta name="ICBM" content="51.152, 11.824">
<meta name="verify-v1" content="">
<meta name="robots" content="index, follow">


<link rel="canonical" href="http://www.burgenlandkreis.de/de/aktuelles.html">
      <meta name="verify-v1" content="23W0tg25iCmtl3qKOUJ7waVe26IP6t8RYL2Hn64mG7I=">
      <!-- WEBCONFIG META [Ende]  -->
    

  
      <!-- WEBCONFIG CSS [Start] -->
      
<!-- ********************************************************************** 
	 CSS FROM DOCUMENT-OBJECT
     ********************************************************************** -->

<!-- STYLESHEET FUER MODUL: _common (frontend) -->
<link rel="stylesheet" href="print.css" type="text/css" media="print">
<link rel="stylesheet" href="forms.css" type="text/css" media="screen,projection">
<link rel="stylesheet" href="bc_formular.css" type="text/css" media="screen,projection">
<link rel="stylesheet" href="layout_standard.css" type="text/css" media="screen,projection">
<link rel="stylesheet" href="typo_.css" type="text/css" media="screen,projection">
<link rel="stylesheet" href="standard_fruehling.css" type="text/css" media="screen,projection">
<link rel="stylesheet" href="formscript.css" type="text/css" media="screen,projection">






<!-- STYLESHEET FUER MODUL: articlelist (frontend) -->
<link rel="stylesheet" href="articlelist.css" type="text/css" media="screen,projection">


<!-- STYLESHEET FUER MODUL: jquery (frontend) -->
<link rel="stylesheet" href="jquery-ui-1.8.custom.css" type="text/css" media="screen">
<link rel="stylesheet" href="jquery.lightbox-0.5.css" type="text/css" media="screen">


<!-- STYLESHEET FUER MODUL: pager (frontend) -->
<link rel="stylesheet" href="pager.css" type="text/css" media="screen,projection">


<!-- STYLESHEET FUER MODUL: simplesearch (frontend) -->
<link rel="stylesheet" href="simplesearch.css" type="text/css" media="screen,projection">

      <!-- WEBCONFIG CSS [Ende]  -->
    

  <!-- IE PNG FIX -->
  <!--[if IE 6]>
  <style type="text/css">
    img, div, h1, h2, h3, ul, li, ol, a, span, p, a.tooltip span { behavior:url(iepngfix.htc) }
  </style>
  <![endif]-->

  <!-- FAV-ICONS -->
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

  <!-- SCRIPTS -->
  <script language="JavaScript" type="text/javascript">/* Code removed by ScrapBook */</script>
  <script language="JavaScript" type="text/javascript" src="about:blank"></script>

<script language="JavaScript" src="about:blank" type="text/javascript"></script>

  
      <!-- WEBCONFIG JS [Start] -->
      

<!-- JAVASCRIPT FUER MODUL: aaa_braincms -->
<script language="javascript" src="about:blank" type="text/javascript"></script>


<!-- JAVASCRIPT FUER MODUL: aaaa jquery -->
<script language="javascript" src="about:blank" type="text/javascript"></script>
<script language="javascript" src="about:blank" type="text/javascript"></script>
<script language="javascript" src="about:blank" type="text/javascript"></script>
<script language="javascript" src="about:blank" type="text/javascript"></script>
<script language="javascript" src="about:blank" type="text/javascript"></script>


<!-- JAVASCRIPT FUER MODUL: jquery -->

<script type="text/javascript" charset="UTF-8">/* Code removed by ScrapBook */</script>


<!-- JAVASCRIPT FUER MODUL: xajax -->

<script type="text/javascript" charset="UTF-8">/* Code removed by ScrapBook */</script>
<script type="text/javascript" src="about:blank" charset="UTF-8"></script>
<script type="text/javascript" charset="UTF-8">/* Code removed by ScrapBook */</script>

<script type="text/javascript" charset="UTF-8">/* Code removed by ScrapBook */</script>

      <!-- WEBCONFIG JS [Ende]  -->
    


  
  <!-- DIREKTER STYLE-INCLUDE SCREEN-->
  
  
  
  <!-- DIREKTER JAVASCRIPT-INCLUDE -->
  
  
  
  <!-- DIREKTER AJAX-INCLUDE -->
  
  
  


<!-- StyleSwitcher/FontSize -->
<script src="about:blank" type="text/javascript"></script>
<link rel="alternate stylesheet" type="text/css" media="all" href="font100.css" title="normal">
<link rel="alternate stylesheet" type="text/css" media="all" href="font200.css" title="leicht">
<link rel="alternate stylesheet" type="text/css" media="all" href="font300.css" title="stark">

<link rel= "stylesheet" href="myStyles/index.css" media="all" type="text/css">

<!--<script language="JavaScript" type="text/javascript" src="myJS/index.js"></script>
-->
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  
<div id="myform">
	<div id="error">
<?php	
  	if(isset($errorMessage)){
  		echo $errorMessage;
  	}
?>
	</div>		
  	<form action="?login=1" method="post">
    	<select name="type" size="1" onselect="">
      		<option selected value="0">Login</option>
      		<!--<option value="1"><a href="fehler.html">Demo_priv</a></option>
      		<option value="2"><a href="fehler.html">Demo_busi</a></option>
        -->
    	</select>
    	<label for="email">E-mail:</label>
    	<input id="email" name="email" type="email">

    	<label for="pwd">Passwort:</label>
    	<input id="pwd" name="pwd" type="password">
    	
    	<input id="sign_in" type="submit" value="login">
    	<a href="registry.php" id="registry">Registrierung</a>
  	</form>

</div>
    
      


<!--PAGE:START--->
<div id="SITE">

  <div class="TOPLINE_1">
    <a rel="nofollow" href="http://www.burgenlandkreis.de/" target="_self" border="0" title="Burgenlandkreis">
    <div class="topsite01" alt="Burgenlandkreis"></div>
    <div class="topsite02" alt="Burgenlandkreis"></div>
    </a>
  </div>

  <div class="TOPLINE_2">
    <a rel="nofollow" href="http://www.burgenlandkreis.de/de/index.php?id=118024000249" target="_self" border="0" title="Karte vergößern">
    <div class="topsite03" alt="Burgenlandkreis"></div>
    </a>
    <a rel="nofollow" href="http://www.burgenlandkreis.de/" target="_self" border="0" title="Burgenlandkreis">
    <div class="topsite04" alt="Burgenlandkreis"></div>
    </a>
  </div>


  <div id="MIDDLE">

    <div id="LEFT">
      <div id="LEFTNAV">
        <span class="hidden"><hr><h3>Hauptnavigation</h3></span>
        
<!-- Beginn LEFT_NAV -->

<!-- Ende LEFT_NAV -->

        
      <!--[MAIN_NAVIGATION]-->
      <ol>
        
        <!-- ACT -->
    	   <li><a href="#" title="Aktuelle Meldungen aus dem Burgenlandkreis" class="active" target="_self">Aktuelles</a>
        	
          </li>
    
        <!-- SUBCLOSE -->
    	   <li><a href="http://www.burgenlandkreis.de/de/bekanntmachungen.html" title="Öffnet im gleichen Fenster die Seite Bekanntmachungen" class="normal" target="_self">Bekanntmachungen</a>
        	
          </li>
    
        <!-- NO -->
    	   <li><a href="http://www.burgenlandkreis.de/de/strassenverkehr.html" title="zu den Inhalten" class="normal" target="_self">Straßenverkehr</a>
        	
          </li>
    
        <!-- SUBCLOSE -->
    	   <li><a href="http://www.burgenlandkreis.de/de/daten-fakten.html" title="Daten &amp; Fakten" class="normal" target="_self">Daten &amp; Fakten</a>
        	
          </li>
    
        <!-- SUBCLOSE -->
    	   <li><a href="http://www.burgenlandkreis.de/de/kreistag-verwaltung.html" title="Kreistag &amp; Verwaltung" class="normal" target="_self">Kreistag &amp; Verwaltung</a>
        	
          </li>
    
        <!-- SUBCLOSE -->
    	   <li><a href="http://www.burgenlandkreis.de/de/wirtschaft1.html" title="Wirtschaft" class="normal" target="_self">Wirtschaft</a>
        	
          </li>
    
        <!-- SUBCLOSE -->
    	   <li><a href="http://www.burgenlandkreis.de/de/bildung-jugend.html" title="Bildung &amp; Jugend" class="normal" target="_self">Bildung &amp; Jugend</a>
        	
          </li>
    
        <!-- SUBCLOSE -->
    	   <li><a href="http://www.burgenlandkreis.de/de/kultur-sport-tourismus.html" title="Kultur, Sport &amp; Tourismus" class="normal" target="_self">Kultur, Sport &amp; Tourismus</a>
        	
          </li>
    
        <!-- SUBCLOSE -->
    	   <li><a href="http://www.burgenlandkreis.de/de/natur-umwelt.html" title="Natur &amp; Umwelt" class="normal" target="_self">Natur &amp; Umwelt</a>
        	
          </li>
    
        <!-- SUBCLOSE -->
    	   <li><a href="http://www.burgenlandkreis.de/de/gesundheit-soziales.html" title="Gesundheit &amp; Soziales" class="normal" target="_self">Gesundheit &amp; Soziales</a>
        	
          </li>
    
        <!-- SUBCLOSE -->
    	   <li><a href="http://www.burgenlandkreis.de/de/Brandschutz.html" title="Amt für Brand- und Katastrophenschutz und Rettungswesen" class="normal" target="_self">Brandschutz</a>
        	
          </li>
    
        <!-- NO -->
    	   <li><a href="http://www.integration-burgenlandkreis.de/de/" title="Informationen für Zugewanderte und Menschen mit Migrationshintergrund" class="normal" target="_blank">Integrationsnetzwerk</a>
        	
          </li>
    
        <!-- NO -->
    	   <li><a href="http://www.familie-burgenlandkreis.de/" title="Öffnet neues Fenster zum Familienportal" class="normal" target="_blank">Familienportal</a>
        	
          </li>
    
        <!-- NO -->
    	   <li><a href="http://www.welterbeansaaleundunstrut.de/" title="Öffnet neues Fenster zum Förderverein Weltkulturerbe an Saale und Unstrut" class="normal" target="_blank">Welterbe</a>
        	
          </li>
    
        <!-- NO -->
    	   <li><a href="http://www.burgenlandkreis.de/de/dialog-der-konfessionen.html" title="zu den Inhalten" class="normal" target="_blank">Dialog der Konfessionen</a>
        	
          </li>
    
        <!-- NO -->
    	   <li><a href="http://www.jobcenter-blk.de/" title="Öffnet neues Fenster zum Jobcenter des Burgenlandkreises" class="normal" target="_blank">Jobcenter</a>
        	
          </li>
    
      </ol>
    
      </div>
      
      <div class="LEFT_CONTENT">
        
      </div>
      
    </div>
    <span class="hidden"><hr><h3>Sie befinden sich hier:</h3></span>
    <div id="CONTENT">
      <ul id="fontsize">
        <li><span class="fontsize_label">Schriftgröße</span></li>
        <li><a href="#" rel="nofollow" title="Schrift normal" id="fonta"><span>Normal</span></a></li>
        <li><a href="#" rel="nofollow" title="Schrift leicht vergrößert" id="fontb"><span>Mittel</span></a></li>
        <li><a href="#" rel="nofollow" title="Schrift vergrößert" id="fontc"><span>Groß</span></a></li>
      </ul>
      <div id="URHERE">
        <div class="" style="float: left; width: 400px;">
          
		<span class="urhere"><a href="http://www.burgenlandkreis.de/" title="Startseite">Startseite</a> » <a href="#" title="Aktuelles" target="_self">Aktuelles</a> »</span>
	
        </div>
        <div class="hidden_text" style="float: left; width: 120px;">
        <a rel="nofollow" title="Seite drucken"><img src="drucken.gif" alt="Seite drucken" border="0"></a>
        <!--a rel="nofollow" href="http://www.burgenlandkreis.de/de/aktuelles/&PAGE_MEDIA=text" title="Textversion"><img src="/layout/images/Textversion.gif" border="0" alt="Textversion"></a-->
        </div>
      </div>
      <span class="hidden"><br><hr><h3>Seiten-Inhalt:</h3></span>
      <div id="CONTENTBOX" class="">
      
      
<div class="modul_articlelist ">

	<!-- Templatebedingung: articlelist_main_listview -->	
	<div class="articlelist_main">
		
		
		
		
		
			
		
		
		
		
  <ol class="articlelist_listview">
	 	
		 	<li id="cid_118024036172" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">12.05.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/behinderten-und-inklusionsbeirat-burgenlandkreis-stellt-aktionsplan-vor-20036172.html" title="Behinderten- und Inklusionsbeirat Burgenlandkreis stellt Aktionsplan vor">Behinderten- und Inklusionsbeirat Burgenlandkreis stellt Aktionsplan vor</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024036152" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">11.05.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/botschaftergarten-macht-lust-auf-saale-unstrut-region-20036152.html" title="Botschaftergarten macht Lust auf Saale-Unstrut-Region">Botschaftergarten macht Lust auf Saale-Unstrut-Region</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024036127" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">09.05.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/unternehmen-fuer-berufliche-integration-von-menschen-mit-handicap-geehrt-20036127.html" title="Unternehmen für berufliche Integration von Menschen mit Handicap geehrt">Unternehmen für berufliche Integration von Menschen mit Handicap geehrt</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024036052" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">05.05.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/haende-hoch-und-zwar-fuers-handwerk-20036052.html" title="„HÄNDE HOCH“ – und zwar fürs Handwerk">„HÄNDE HOCH“ – und zwar fürs Handwerk</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024036065" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">05.05.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/arbeitsmarktstatistik-april-mit-83-prozent-liegt-die-arbeitslosenquote-im-burgenlandkreis-unter-dem-landesdurchschnitt-20036065.html" title="Arbeitsmarktstatistik April: Mit 8,3 Prozent liegt die Arbeitslosenquote im Burgenlandkreis unter dem Landesdurchschnitt">Arbeitsmarktstatistik April: Mit 8,3 Prozent liegt die Arbeitslosenquote im Burgenlandkreis unter dem Landesdurchschnitt</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024036045" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">04.05.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/kunstsommer-2017-20036045.html" title="Kunstsommer 2017">Kunstsommer 2017</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024036030" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">02.05.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/grosse-freude-beim-verein-music-art-weissenfels-e-v-20036030.html" title="Große Freude beim Verein music art weißenfels e. V.">Große Freude beim Verein music art weißenfels e. V.</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024036004" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">28.04.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/aktionsmonat-richtet-blick-auf-barrieren-im-alltag-20036004.html" title="Aktionsmonat richtet Blick auf Barrieren im Alltag">Aktionsmonat richtet Blick auf Barrieren im Alltag</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035979" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">27.04.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/jugendliche-verschoenern-litfasssaeule-20035979.html" title="Jugendliche verschönern Litfaßsäule">Jugendliche verschönern Litfaßsäule</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024036001" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">27.04.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/an-die-zukunft-denken-girls-und-boys-day-im-landratsamt-20036001.html" title="An die Zukunft denken">An die Zukunft denken</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035955" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">26.04.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/landrat-besucht-die-caritas-behindertenwerkstatt-und-das-unternehmen-hollfelder-guehring-cutting-tools-20035955.html" title="Landrat besucht die Caritas-Behindertenwerkstatt und das Unternehmen Hollfelder Gühring Cutting Tools">Landrat besucht die Caritas-Behindertenwerkstatt und das Unternehmen Hollfelder Gühring Cutting Tools</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035896" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">18.04.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/4-welterbe-wandertag-steht-in-den-startloechern-20035896.html" title="4. Welterbe-Wandertag steht in den Startlöchern">4. Welterbe-Wandertag steht in den Startlöchern</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035884" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">13.04.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/teilhabemanager-sollen-inklusion-vorantreiben-20035884.html" title="Teilhabemanager sollen Inklusion vorantreiben">Teilhabemanager sollen Inklusion vorantreiben</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035853" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">12.04.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/auf-einer-laenge-von-sechs-kilometern-nun-grundhaft-ausgebaut-20035853.html" title="Auf einer Länge von sechs Kilometern nun grundhaft ausgebaut">Auf einer Länge von sechs Kilometern nun grundhaft ausgebaut</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035835" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">05.04.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/hohenmoelsener-wirbt-auf-weltreise-fuer-die-heimat-20035835.html" title="Hohenmölsener wirbt auf Weltreise für die Heimat">Hohenmölsener wirbt auf Weltreise für die Heimat</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035798" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">31.03.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/geldsegen-fuer-orgelbauprojekt-des-naumburger-buergervereins-20035798.html" title="Geldsegen für Orgelbauprojekt des Naumburger Bürgervereins">Geldsegen für Orgelbauprojekt des Naumburger Bürgervereins</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035795" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">30.03.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/neue-wege-der-politikvermittlung-schueler-mit-projekt-erfolgreich-20035795.html" title="Neue Wege der Politikvermittlung - Schüler mit Projekt erfolgreich">Neue Wege der Politikvermittlung - Schüler mit Projekt erfolgreich</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035764" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">28.03.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/thats-me-bilder-meiner-anderen-seite-neue-ausstellung-im-landratsamt-20035764.html" title="„That’s me – Bilder meiner anderen Seite “ – neue Ausstellung im Landratsamt">„That’s me – Bilder meiner anderen Seite “ – neue Ausstellung im Landratsamt</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035767" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">28.03.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/einheitliches-mitteldeutsches-s-bahn-netz-gefordert-20035767.html" title="Einheitliches Mitteldeutsches S-Bahn-Netz gefordert">Einheitliches Mitteldeutsches S-Bahn-Netz gefordert</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035757" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">28.03.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/tage-bis-zur-entscheidung-werden-gezaehlt-20035757.html" title="Tage bis zur Entscheidung werden gezählt">Tage bis zur Entscheidung werden gezählt</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035712" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">23.03.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/fotoausstellung-im-umweltamt-des-burgenlandkreises-20035712.html" title="Fotoausstellung im Umweltamt des Burgenlandkreises">Fotoausstellung im Umweltamt des Burgenlandkreises</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035742" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">23.03.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/natur-braucht-kontrolleure-weiterbildung-fuer-naturschuetzer-20035742.html" title="Natur braucht Kontrolleure - Weiterbildung für Naturschützer">Natur braucht Kontrolleure - Weiterbildung für Naturschützer</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035704" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">21.03.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/achtung-autofahrer-kroeten-ueberqueren-wieder-die-fahrbahnen-20035704.html" title="Achtung Autofahrer! Kröten überqueren wieder die Fahrbahnen">Achtung Autofahrer! Kröten überqueren wieder die Fahrbahnen</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035662" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">20.03.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/buergersprechstunde-mit-landrat-goetz-ulrich-erlebt-in-zeitz-die-erste-auflage-20035662.html" title="Bürgersprechstunde mit Landrat Götz Ulrich erlebt in Zeitz die erste Auflage">Bürgersprechstunde mit Landrat Götz Ulrich erlebt in Zeitz die erste Auflage</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035659" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">17.03.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/landratsamt-oeffnet-zum-girls-und-boys-day-seine-pforten-20035659.html" title="Landratsamt öffnet zum Girls´ und Boys´ Day seine Pforten">Landratsamt öffnet zum Girls´ und Boys´ Day seine Pforten</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035563" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">13.03.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/beste-taenzerinnen-und-taenzer-aus-sachsen-anhalt-messen-sich-in-naumburg-20035563.html" title="Beste Tänzerinnen und Tänzer aus Sachsen-Anhalt messen sich in Naumburg">Beste Tänzerinnen und Tänzer aus Sachsen-Anhalt messen sich in Naumburg</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035587" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">13.03.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/hinweise-des-umweltamtes-zum-artenschutz-und-schnittverbot-20035587.html" title="Hinweise des Umweltamtes zum Artenschutz und Schnittverbot">Hinweise des Umweltamtes zum Artenschutz und Schnittverbot</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035515" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">08.03.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/einladung-zum-4-welterbewandertag-20035515.html" title="Einladung zum 4. Welterbewandertag">Einladung zum 4. Welterbewandertag</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035451" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">06.03.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/auszeichnung-fuer-verdienstvolle-und-kontinuierliche-geschichtspflege-20035451.html" title="Auszeichnung für verdienstvolle und kontinuierliche Geschichtspflege">Auszeichnung für verdienstvolle und kontinuierliche Geschichtspflege</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035430" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">04.03.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/nachweis-des-influenzavirus-h5n8-bei-einem-toten-bussard-in-der-ortslage-leisslingweissenfels-20035430.html" title="Nachweis des Influenzavirus H5N8 bei einem toten Bussard in der Ortslage Leißling/Weißenfels">Nachweis des Influenzavirus H5N8 bei einem toten Bussard in der Ortslage Leißling/Weißenfels</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035330" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">02.03.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/feierliche-einbuergerung-im-burgenlandkreis-20035330.html" title="Feierliche Einbürgerung im Burgenlandkreis">Feierliche Einbürgerung im Burgenlandkreis</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035289" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">01.03.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/initiativpreis-fuer-unternehmen-im-burgenlandkreis-wird-2017-zum-2-mal-verliehen-20035289.html" title="Initiativpreis für Unternehmen im Burgenlandkreis wird 2017 zum 2. Mal verliehen">Initiativpreis für Unternehmen im Burgenlandkreis wird 2017 zum 2. Mal verliehen</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035231" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">28.02.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/volkshochschule-burgenlandkreis-ueberzeugt-erneut-mit-qualitaet-und-ist-fit-fuer-die-zukunft-20035231.html" title="Volkshochschule Burgenlandkreis überzeugt erneut mit Qualität und ist fit für die Zukunft">Volkshochschule Burgenlandkreis überzeugt erneut mit Qualität und ist fit für die Zukunft</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035239" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">28.02.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/Kfz-zulassungsstelle-in-weissenfels-bleibt-heute-geschlossen-20035239.html" title="Kfz-Zulassungsstelle in Weißenfels bleibt heute geschlossen">Kfz-Zulassungsstelle in Weißenfels bleibt heute geschlossen</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035218" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">27.02.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/jugendliche-lassen-historische-burganlage-entstehen-20035218.html" title="Jugendliche lassen historische Burganlage entstehen">Jugendliche lassen historische Burganlage entstehen</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035167" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">23.02.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/ministerpraesident-haseloff-zu-besuch-im-burgenlandkreis-20035167.html" title="Ministerpräsident Haseloff zu Besuch im Burgenlandkreis">Ministerpräsident Haseloff zu Besuch im Burgenlandkreis</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035139" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">22.02.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/betriebsbesuch-bei-traditionsunternehmen-20035139.html" title="Betriebsbesuch bei Traditionsunternehmen">Betriebsbesuch bei Traditionsunternehmen</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035115" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">21.02.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/thuenen-institut-erforscht-integrationspotenziale-laendlicher-raeume-20035115.html" title="Thünen-Institut erforscht Integrationspotenziale ländlicher Räume">Thünen-Institut erforscht Integrationspotenziale ländlicher Räume</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035066" class="zeile_0 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">09.02.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/abfrage-und-reservierung-von-wunschkennzeichen-online-moeglich-20035066.html" title="Abfrage und Reservierung von Wunschkennzeichen online möglich">Abfrage und Reservierung von Wunschkennzeichen online möglich</a>
				
				
        
				</strong>
		 	</li>
		 	
		 	<li id="cid_118024035053" class="zeile_1 schema_presse">
		 	  
				<span class="articlelist-listview-showdate">08.02.2017</span><br>
				
		 		<strong class="articlelist-listview-title"><a href="http://www.burgenlandkreis.de/de/aktuelles/mitwirkung-an-kunstausstellung-einfach-zusammen-leben-gefragt-20035053.html" title="Jetzt mitwirken an Kunstausstellung „EINFACH zusammen leben“">Jetzt mitwirken an Kunstausstellung „EINFACH zusammen leben“</a>
				
				
        
				</strong>
		 	</li>
		 	
	 	</ol>
	
		<div class="PagerToolbar">
		<span class="PagerEntries">
			Eintrag: 1 - 40 / 601
		</span>
		<span class="PagerPaging">	
			Seite: <span class="pagebrowser_nolink"><img src="rewind.png" alt="Davor" title="Davor" border="0"></span> <span class="pagerbrowser_currentpage">1</span>|<a class="pagerbrowser_pagelink" href="http://www.burgenlandkreis.de/de/aktuelles.html?id=118024000203&amp;articlelist[page]=2">2</a>|<a class="pagerbrowser_pagelink" href="http://www.burgenlandkreis.de/de/aktuelles.html?id=118024000203&amp;articlelist[page]=3">3</a>|<a class="pagerbrowser_pagelink" href="http://www.burgenlandkreis.de/de/aktuelles.html?id=118024000203&amp;articlelist[page]=4">4</a>|<a class="pagerbrowser_pagelink" href="http://www.burgenlandkreis.de/de/aktuelles.html?id=118024000203&amp;articlelist[page]=5">5</a> <a class="pagebrowser_link" href="http://www.burgenlandkreis.de/de/aktuelles.html?id=118024000203&amp;articlelist[page]=2"><img src="forward_active.png" alt="Danach" title="Danach" border="0"></a>      
		</span>
	</div>
		
		
		
		
		<script type="text/javascript">/* Code removed by ScrapBook */</script>

<script type="text/javascript">/* Code removed by ScrapBook */</script>
		
	</div>
	

</div>

      </div>
    </div>

    <div id="RIGHT">
      <div id="RIGHTNAV">
        <span class="hidden"><hr><h3>Suche:</h3></span>
        
  <div class="SUCHFELDBOX">
  <div class="modul_simplesearch ">

	<!-- Templatebedingung: simplesearch_main_listview -->	
		
		
		
		
			

<form action="http://www.burgenlandkreis.de/index.php" method="get" name="search_simplesearch:box9b200dfebbbbf3eb1513d14749e21144" id="search_simplesearch:box9b200dfebbbbf3eb1513d14749e21144" target="_self">
	<div class="simplesearch_form">
		
<div class="simplesearch_elements">
	<span class="simplesearch_label">&nbsp;Suchbegriff</span>
	<span class="simplesearch_element"><input class="SEARCHFIELD" name="simplesearch[searchtext]" type="text"></span>
</div>

<div class="simplesearch_elements">
	<span class="simplesearch_label">&nbsp;</span>
	<span class="simplesearch_element"><input class="BUTTON" name="simplesearch[submit]" value=" " type="submit"></span>
</div>
<input name="id" value="118024000358" type="hidden">
<input name="simplesearch[go]" value="1" type="hidden">

	</div>
</form>

		
		
		

		
	</div>
  </div>
  
        <span class="hidden"><hr><h3>Wichtige Links:</h3></span>
        
			<div id=""><a href="http://www.burgenlandkreis.de/de/&amp;PHPSESSID=ptill23a1u09o6ogn41630n9t5" target="" "="" title="Weiter zu: "></a></div>

        
        
  	   <div id="rigthLevel0" class="normal"><a href="http://www.burgenlandkreis.de/de/facebook.html" title="Der Burgenlandkreis bei Facebook" target="_blank">Facebook</a></div>
    
  	   <div id="rigthLevel0" class="normal"><a href="https://www.youtube.com/channel/UC-PUiuFgCcIUKdkUssCD3mA" title="Der Burgenlandkreis bei youtube" target="_blank">youtube</a></div>
    
  	   <div id="rigthLevel0" class="normal"><a href="http://www.burgenlandkreis.de/de/buergerservice.html" title="Öffnet im gleichen Fenster die Seite Bürgerservice" target="_self">Bürger- &amp; Unternehmensservice</a></div>
    
  	   <div id="rigthLevel0" class="normal"><a href="http://www.burgenlandkreis.de/de/erreichbarkeit_und_sprechzeiten1.html" title="Öffnet im gleichen Fenster die Seite Erreichbarkeit und Sprechzeiten der Ämter" target="_self">Erreichbarkeit &amp; Sprechzeiten der Ämter</a></div>
    
  	   <div id="rigthLevel0" class="normal"><a href="http://www.dasoertliche.de/" title="Das Örtliche" target="_blank">Das Örtliche</a></div>
    
  	   <div id="rigthLevel0" class="normal"><a href="http://www.blk-onlinetv.de/" title="Burgenlandkreis Regional TV" target="_blank">Burgenlandkreis Regional TV</a></div>
    
  	   <div id="rigthLevel0" class="normal"><a href="http://www.mz-web.de/" title="Mitteldeutsche Zeitung" target="_blank">Mitteldeutsche Zeitung</a></div>
    
  	   <div id="rigthLevel0" class="normal"><a href="http://www.naumburger-tageblatt.de/" title="Naumburger Tageblatt" target="_blank">Naumburger Tageblatt</a></div>
    
  	   <div id="rigthLevel0" class="normal"><a href="http://www.myheimat.de/" title="myheimat" target="_blank">myheimat</a></div>
    
  	   <div id="rigthLevel0" class="normal"><a href="http://www.wochenspiegel-web.de/" title="Öffnet neues Fenster zum Wochenspiegel" target="_blank">Wochenspiegel</a></div>
    
  	   <div id="rigthLevel0" class="normal"><a href="http://www.supersonntag-web.de/" title="Super Sonntag" target="_blank">Super Sonntag</a></div>
    
  	   <div id="rigthLevel0" class="normal"><a href="http://www.burgenlandkreis.de/de/veranstaltungen.html" title="Veranstaltungen" target="_self">Veranstaltungen</a></div>
    
  	   <div id="rigthLevel0" class="normal"><a href="http://www.burgenlandkreis.de/de/vereinsverzeichnis.html" title="Vereinsverzeichnis" target="_self">Vereinsverzeichnis</a></div>
    
  	   <div id="rigthLevel0" class="normal"><a href="http://www.burgenlandkreis.de/de/archiv_artikel.html" title="Archiv" target="_self">Archiv</a></div>
    
    
        <span class="hidden"><hr><h3>Interner-Bereich Login:</h3></span>
        <span class="hidden"><hr><h3>Service-Links:</h3></span>
        
      
        
  	   <div class="ServiceLevel"><a href="http://www.burgenlandkreis.de/de/kontakt.html" title="Kontakt" target="_self"><img src="kontakt.gif" alt="Kontakt" title="Kontakt" border="0" align="absmiddle">Kontakt</a></div>
    
  	   <div class="ServiceLevel"><a href="http://www.burgenlandkreis.de/de/impressum.html" title="Impressum" target="_self"><img src="impressum.gif" alt="Impressum" title="Impressum" border="0" align="absmiddle">Impressum</a></div>
    
  	   <div class="ServiceLevel"><a href="http://www.burgenlandkreis.de/de/datenschutzerklaerung.html" title="Datenschutzerklärung" target="_self"><img src="datenschutz.gif" alt="Datenschutzerklärung" title="Datenschutzerklärung" border="0" align="absmiddle">Datenschutzerklärung</a></div>
    
  	   <div class="ServiceLevel"><a href="http://www.burgenlandkreis.de/de/index.php?id=118024000044&amp;formscript%5Burl%5D=http%3A%2F%2Fwww.burgenlandkreis.de%2Fde%2Faktuelles.html" title="Seite empfehlen" target="_self"><img src="empfehlen.gif" alt="Seite empfehlen" title="Seite empfehlen" border="0" align="absmiddle">Seite empfehlen</a></div>
    
  	   <div class="ServiceLevel"><a href="http://www.burgenlandkreis.de/de/sitemap.html" title="Sitemap" target="_self"><img src="sitemap.gif" alt="Sitemap" title="Sitemap" border="0" align="absmiddle">Sitemap</a></div>
    
  	   <div class="ServiceLevel"><a href="http://www.burgenlandkreis.de/de/bildergalerie.html" title="Bildergalerie" target="_self"><img src="bildergalerie.gif" alt="Bildergalerie" title="Bildergalerie" border="0" align="absmiddle">Bildergalerie</a></div>
    
  	   <div class="ServiceLevel"><a href="http://www.burgenlandkreis.de/de/links.html" title="Links" target="_self"><img src="links.gif" alt="Links" title="Links" border="0" align="absmiddle">Links</a></div>
    
  	   <div class="ServiceLevel"><a href="http://www.burgenlandkreis.de/de/suche.html" title="Suche" target="_self"><img src="suche.gif" alt="Suche" title="Suche" border="0" align="absmiddle">Suche</a></div>
    
  	   <div class="ServiceLevel"><a href="http://www.burgenlandkreis.de/de/login.html" title="Login" target="_self"><img src="login.gif" alt="Login" title="Login" border="0" align="absmiddle">Login</a></div>
    
    
      <div class="ServiceLevel"><a rel="nofollow" href="http://www.burgenlandkreis.de/de/aktuelles.html?id=118024000203&amp;PAGE_MEDIA=text" title="Textversion"><img src="Textversion.gif" alt="Textversion" title="Textversion" border="0" align="absmiddle">Volltextversion</a></div>
 
      </div>
      
      <div class="LEFT_CONTENT">
        
      </div>
      
    </div>

    </div>
</div>
<!--PAGE:END--->
<!-- Piwik -->
<script type="text/javascript">/* Code removed by ScrapBook */</script><script src="about:blank" type="text/javascript"></script><script type="text/javascript">/* Code removed by ScrapBook */</script><noscript><p><img src="http://analytics.brain-scc.de/piwik.php?idsite=58" style="border:0" alt="" ></p></noscript>
<!-- End Piwik Tag -->

  

<!-- JAVASCRIPT FUER MODUL: aaa_braincms -->
		
		
		
<script type="text/javascript" charset="UTF-8">/* Code removed by ScrapBook */</script>
<!-- Piwik -->
<script type="text/javascript">/* Code removed by ScrapBook */</script><script src="about:blank" type="text/javascript"></script><script type="text/javascript">/* Code removed by ScrapBook */</script><noscript><p><img src="http://analytics.brain-scc.de/piwik.php?idsite=58" style="border:0" alt="" ></p></noscript>
<!-- End Piwik Tracking Code -->



<div style="display: none; z-index: 1000; outline: 0px none;" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable" tabindex="-1" role="dialog" aria-labelledby="ui-dialog-title-braincms-confirm"><div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix"><span class="ui-dialog-title" id="ui-dialog-title-braincms-confirm">&nbsp;</span><a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button"><span class="ui-icon ui-icon-closethick">close</span></a></div><div id="braincms-confirm" class="ui-dialog-content ui-widget-content"></div><div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix"><div class="ui-dialog-buttonset"><button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false"><span class="ui-button-text">Nein</span></button></div></div></div><div style="display: none; z-index: 1000; outline: 0px none;" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable" tabindex="-1" role="dialog" aria-labelledby="ui-dialog-title-braincms-dialog"><div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix"><span class="ui-dialog-title" id="ui-dialog-title-braincms-dialog">&nbsp;</span><a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button"><span class="ui-icon ui-icon-closethick">close</span></a></div><div id="braincms-dialog" style="text-align: left;" class="ui-dialog-content ui-widget-content"></div><div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix"><div class="ui-dialog-buttonset"><button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false"><span class="ui-button-text">Schließen</span></button></div></div></div></body>
</html>
