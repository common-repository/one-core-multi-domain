<div class="wrap">
	<h2><?php _e('Multi Domain How-To') ?></h2>
	<p>Befolgen Sie bitte diese Einleitung Schritt für Schritt und machen Sie vorher eine Sicherheitskopie ihrer bisherigen Wordpress installation.</p>
	<h3>.httaccess Datei bearbeiten.</h3>
	<p>Soll die Domain mittels www. erreichbar sein oder ohne?</p>
	<blockquote>
		<p><strong>ohne www.</strong></p>
		<textarea name="notwww" rows="2" cols="45">RewriteCond %{HTTP_HOST} ^www\.beispiel\.de$ [NC]
RewriteRule ^(.*)$ http://beispiel.de/$1 [L,R=301]</textarea>
		<p><strong>mit www.</strong></p>
		<textarea name="withwww" rows="2" cols="45">RewriteCond %{HTTP_HOST} ^beispiel\.de$ [NC]
RewriteRule ^(.*)$ http://www.beispiel.de/$1 [L,R=301]</textarea>
	</blockquote>
	
	<?php
	$domaindirectory	=	ABSPATH . 'wp-content/domains';
	if (!wp_mkdir_p( $domaindirectory )) {
		?>
		<h3>Ordner Rechte ändern</h3>
		<p>Bitte ändern Sie die Rechte des Ordners <strong>/wp-content</strong> auf <strong>777</strong>. Damit der Ordner <cite>domains</cite> dorts erstellt werden kann.</p>
		<?php
	}
	?>
	<h3>Config Datei erstellen</h3>
	<p>Erstellen Sie eine Neue Config Datei, mit folgendem Dateinamen <code>beispiel.de.php</code>. Die Datei sollen in dem Ordner <cite>/wp-content/domains/</cite> gespeichert werden. Falls Sie mit <cite>www.</cite> Arbeiten dann müssen Sie die Datei entsprechend anpassen. In der Datei müssen folgende Einstellungen enthalten sein:</p>
			<blockquote>
				<textarea name="mysqlsettings" rows="24" cols="80">
<?php echo "<?php"; ?>

/*
** 	MYSQL Settings
*/

// MySQL Einstellungen - diese Angaben bekommst du von deinem Webhoster
define('DB_NAME', 'datenbankname');
define('DB_USER', 'datenbankbenutzer');
define('DB_PASSWORD', 'datenbankpassword');
define('DB_HOST', 'localhost');

// Der Datenbankzeichensatz der beim Erstellen der Datenbanktabellen verwendet werden soll
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// verschiedene WordPress-Installationen betreiben. Nur Zahlen, Buchstaben und Unterstriche bitte!
$table_prefix  = 'wp_';

// WordPress Sprachdatei
define ('WPLANG', 'de_DE');

// For developers: WordPress debugging mode.
define('WP_DEBUG', false);
?></textarea>
			</blockquote>
<h3>Wordpress eigene wp-config.php Datei abändern.</h3>
<p>Die Auth Keys musst du allerdíngs anpassen anhand deiner bisherigen Config Installtion. Oder generiere Sie neu, mittels des Links.</p>
		<blockquote>
			<textarea name="notwww" rows="20" cols="90">
<?php echo "<?php"; ?>

include(ABSPATH . 'wp-content/plugins/multidomain/change.php');

/**
* Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service} kannst du dir alle KEYS generieren lassen.
*/
define('AUTH_KEY',         'gfbfhfhfgdhdhsdfjdrhjdrhshdrhdrhdrhdrgdrgdrgdrgdrhzkmztkmju,li.ftf');
define('SECURE_AUTH_KEY',  '{+Y&-Pw:sdrgqzq.FIDxXVu;koT=Vp(* Ihn{vD:>b-QN}?>aWx] S+6%?PO,CWvvK');
define('LOGGED_IN_KEY',    'Y-,^Br-=$gsadh3j`; f`Ye-Ae8,C_]eIoaUZZAbmmrCM=4Z+Y#iz0Las+pv0-GO-(');
define('NONCE_KEY',        '5P78{)jIeHj<mw+0Esad_ SNv~-%I<)3nz[>v)=GABv93x5x<`_mwhg2#E@sb*$`3w-');
define('AUTH_SALT',        '2*d[dw=3++zA++Lol:asdrFp*2|UR`.8%)K29s]Le}KcL1Rn+5tJ]4XG7Y Dv rTCL=');
define('SECURE_AUTH_SALT', 'k,@Y95;~+Y89U5Nk/Qbfd( 8d-Y/z6RS4Sf%>[ 2UIL7o+`yFzu@5fukFs?ww btT[X');
define('LOGGED_IN_SALT',   'q.&lWdTs|_X0u@fdsg_/CF?-k&k111:JEyLZS,8yKy@:|Bc*[+f0Xp#YWhv-Ny_dnm!4');
define('NONCE_SALT',       '_HJtXek;z?ZsJ55^sfdgqVJAn.8-LU1a}@zUc2b|_C,LgN)Vmg,M|x(*=4Ql__}Y+L-$');

if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

?></textarea>

		</blockquote>
		<br />
		<p>Nun ist die Installation fertig. Wordpress funktioniert mit einer Installtion mit mehreren Domains. Falls Sie eine zusätzliche Domain hinzufügen möchten, dann müssen Sie einfach eine neue <strong>beispiel.de.php</strong> config Datei erstellen.<strong>Enjoy this</strong></p>
</div>