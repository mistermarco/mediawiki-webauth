<?php

# Use the common instance location
$path = '/afs/ir/dist/web/includes/mediawiki/';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

# Initialise common code
require_once( 'includes/WebStart.php' );

require_once('extensions/Auth_remoteuser.php');
$wgAuth = new Auth_remoteuser();

Auth_remote_user_hook();
$return_url = $_GET['returnto'];
header("Location: index.php?title=$return_url");

?>
