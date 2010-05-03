<?php
# Disable editing and page creation for anonymous users
$wgGroupPermissions['*']['read'] = true;
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['createpage'] = false;
$wgGroupPermissions['*']['createaccount'] = false;

$wgMainCacheType = CACHE_NONE;
$wgMessageCacheType = CACHE_NONE;
$wgParserCacheType = CACHE_NONE;
$wgCachePages = false;

$wgHooks['PersonalUrls'][] = 'WebAuthLinks'; /* Add WebAuth Link */

function WebAuthLinks(&$personal_urls, $title)
{
    global $wgUser;
    global $wgScriptPath;

    if ($wgUser->isLoggedIn()) {
#      $personal_urls['logout'] = null;
    } else {
       $personal_urls['anonlogin']['text'] = "Login with WebAuth";
       if ($title == 'Special:Userlogout') {
           $personal_urls['anonlogin']['href'] = "$wgScriptPath/login.php?returnto=Main%20Page";
       }
       else {
           $personal_urls['anonlogin']['href'] = "$wgScriptPath/login.php?returnto=$title";
       }
    }
    return true;
}
?>
