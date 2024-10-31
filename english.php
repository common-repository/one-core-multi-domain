<h2><?php _e('Multi Domain How-To') ?></h2>
<p>Please follow this introduction step by step and make a backup before installation of their recent Wordpress.</p>
<h3>.httaccess edit file.</h3>
<p>If the domain using www. be accessible or not?</p>
		<blockquote>
			<p><strong>ohne www.</strong></p>
			<textarea name="notwww" rows="2" cols="45">RewriteCond %{HTTP_HOST} ^www\.example\.com$ [NC]
RewriteRule ^(.*)$ http://example.com/$1 [L,R=301]</textarea>
			<p><strong>mit www.</strong></p>
			<textarea name="withwww" rows="2" cols="45">RewriteCond %{HTTP_HOST} ^example\.com$ [NC]
RewriteRule ^(.*)$ http://www.example.com/$1 [L,R=301]</textarea>
		</blockquote>

		<?php
		$domaindirectory	=	ABSPATH . 'wp-content/domainss';
		if (!wp_mkdir_p( $domaindirectory )) {
			?>
			<h3>Change Directory Permission</h3>
			<p></p>
			<p>Please change the rights of the folder <strong>/wp-content</strong> to <strong>777</strong> So that the folder can be created domains sibilities.</p>
		
			<?php
		}
		?>
		<h3>Create a Config File</h3>
		<p>Create a new config file with the file name <code>example.com.php</code>. The file should be saved in the folder <cite>/wp-content/domains/</cite>. If you are using <cite>www.</cite> Work then you need to adjust the file accordingly. In the file the following settings must be included:</p>
		<blockquote>
			<textarea name="mysqlsettings" rows="27" cols="80">
<?php echo "<?php"; ?>

/*
** 	MYSQL Settings
*/

// ** MySQL settings - You can get this info from your web host ** //
define('DB_NAME', 'datebasename');
define('DB_USER', 'datebaseuser');
define('DB_PASSWORD', 'datebasepassword');
define('DB_HOST', 'localhost');

define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

/**
 * WordPress Database Table prefix.
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 */
define ('WPLANG', '');

// For developers: WordPress debugging mode.
define('WP_DEBUG', false);
?></textarea>
		</blockquote>
		<h3>Edit the wp-config.php File</h3>
		<p>The Auth Keys, however, you have to adjust based on your previous config Installtion. Or you can generate new, using the links.</p>
				<blockquote>
					<textarea name="notwww" rows="22" cols="100">
<?php echo "<?php"; ?>

include(ABSPATH . 'wp-content/plugins/multidomain/change.php');

/**
* Change these to different unique phrases!
* You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
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
				<p>Now the installation is finished. Wordpress works with a Installtion with multiple domains. If you add an additional domain you want, you simply need a new config file <strong>example.de.php</strong>.</p>