<?php
error_reporting(0);

$domaindirectory	=	ABSPATH . 'wp-content/domains';
$domain	=	basename($_SERVER['HTTP_HOST']);

$domaininc	=	include($domaindirectory . '/' . $domain . '.php');


if (!$domaininc) {
	//not avilibel config file for this domain		
	require_once( ABSPATH . '/wp-includes/classes.php' );
	require_once( ABSPATH . '/wp-includes/functions.php' );
	require_once( ABSPATH . '/wp-includes/plugin.php' );
	
	$languag	=	ABSPATH . 'wp-content/languages/';	
		if (file_exists($languag . 'de_DE.po')) {
			$german	=	true;
		}
		
	if (wp_mkdir_p( $domaindirectory )) {
		//directory domains is avilibel
		$domain	=	str_ireplace("www.", "", $domain);
		if ($german) {
			wp_die("<h1>Domain Config Datei nicht aufrufbar!</h1><p>Deine Wordpress Config Datei ist nicht aufrufbar! Es liegt wahrscheinlich daran, dass Sie keine Datei erstellt haben in dem Ordner /wp-content/domains/<strong>domainname</strong>.php</p><p>Die Configdatei muss folgenden Dateinamen haben: <strong>$domain.php</strong><br />Bitte bedenken Sie wie die Domain in zunkunft aufgerufen werden soll! Mit <cite>www</cite> am Anfang oder nicht! Falls die Domain mit <cite>www</cite> aufgerufen werden soll, dann sollte die Datei so lauten: <strong>www.$domain.php</strong></p><br /><p>Errorinclude: $domaindirectory/<strong>$domain.php</strong></p>");
		}else {
			//English
			wp_die("<h1>Domain Config file not accessible!</h1><p>Your Wordpress Config file is not accessible! It's probably because you have not created a file in the folder / wp-content/domains/<strong>domainname.php</strong></p><p>The config file must have the following filename: <strong>$domain.php</strong><br />Please consider how the domain should be called in the future! With www at the beginning or not! If the domain will be called with <cite>www</cite>, then the file should  be:<strong>www.$domain.php</strong></p><br /><p>Errorinclude: $domaindirectory/<strong>$domain.php</strong></p>");
			}
	}else {
		//directory domains is not avilibel
		if ($german) {
			wp_die("<h1>Ordner Rechte</h1><p>Ändern Sie bitte die Datei Rechte vom diesem Ordner /<strong>wp-content<strong> auf 777</p>");
		}else {
			//English
			wp_die("<h1>Directory Permission</h1><p>Please Change the Permission for the Direcorty /<strong>wp-content</strong> to 777</p>");
		}
	}
}
	
?>