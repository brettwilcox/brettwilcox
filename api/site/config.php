<?php

namespace ProcessWire;

/**
 * ProcessWire Configuration File
 *
 * Site-specific configuration for ProcessWire
 *
 * Please see the file /wire/config.php which contains all configuration options you may
 * specify here. Simply copy any of the configuration options from that file and paste
 * them into this file in order to modify them.
 * 
 * SECURITY NOTICE
 * In non-dedicated environments, you should lock down the permissions of this file so
 * that it cannot be seen by other users on the system. For more information, please
 * see the config.php section at: https://processwire.com/docs/security/file-permissions/
 * 
 * This file is licensed under the MIT license
 * https://processwire.com/about/license/mit/
 *
 * ProcessWire 3.x, Copyright 2016 by Ryan Cramer
 * https://processwire.com
 *
 */

if (!defined("PROCESSWIRE")) die();

/*** .env ********************************************************************************/

/**
 * Load .env file
 *
 * set the environment variables and get values with: getenv('SECRET_KEY');
 *
 */
$dotenv = \Dotenv\Dotenv::createUnsafeImmutable(dirname(__DIR__, 3));
$dotenv->load();

/*** SITE CONFIG *************************************************************************/

/** @var Config $config */

/**
 * Enable debug mode?
 *
 * Debug mode causes additional info to appear for use during dev and debugging.
 * This is almost always recommended for sites in development. However, you should
 * always have this disabled for live/production sites.
 *
 * @var bool
 *
 */

$config->debug = getenv('DEBUG');


/*** INSTALLER CONFIG ********************************************************************/


/**
 * Installer: Database Configuration
 * 
 */
$config->dbHost = getenv('DATABASE_HOSTNAME');
$config->dbName = getenv('DATABASE_NAME');
$config->dbUser = getenv('DATABASE_USER');
$config->dbPass = getenv('DATABASE_PASS');
$config->dbPort = getenv('DATABASE_PORT');
$config->dbCharset = getenv('DATABASE_CHARSET');
$config->dbEngine = getenv('DATABASE_ENGINE');

/**
 * Installer: User Authentication Salt 
 * 
 * Must be retained if you migrate your site from one server to another
 * 
 */
$config->userAuthSalt = getenv('USER_SALT');

/**
 * Installer: File Permission Configuration
 * 
 */
$config->chmodDir = getenv('CHMOD_DIR'); // permission for directories created by ProcessWire
$config->chmodFile = getenv('CHMOD_FILE'); // permission for files created by ProcessWire 

/**
 * Installer: Time zone setting
 * 
 */
$config->timezone = getenv('TZ');

/**
 * Installer: Admin theme
 * 
 */
$config->defaultAdminTheme = 'AdminThemeUikit';

/**
 * Installer: Unix timestamp of date/time installed
 * 
 * This is used to detect which when certain behaviors must be backwards compatible.
 * Please leave this value as-is.
 * 
 */
$config->installed = 1555792356;

/**
 * Installer: HTTP Hosts Whitelist
 * 
 */
$config->httpHosts = getenv('SITE_URL');

/**
 * Secure files from outside access.
 * 
 */

$config->pagefileSecure = true;
/**
 * Disable session looking for IP
 *
 */

$config->sessionFingerprint = 8;
/**
 * Prepend template file 
 *
 */

$config->prependTemplateFile = '_init.php';
/**
 * X-Powered-By header behavior
 *
 */
$config->usePoweredBy = false;

/**
 * PageList default settings
 * 
 * Note that 'limit' and 'speed' can also be overridden in the ProcessPageList module settings.
 * The 'useHoverActions' are currently only known compatible with AdminThemeDefault.
 * 
 * #property int limit Number of items to show per pagination (default=50)
 * #property int speed Animation speed in ms for opening/closing lists (default=200)
 * #property bool useHoverActions Show page actions when page is hovered? (default=false)
 * #property int hoverActionDelay Delay in ms between hovering a page and showing the actions (default=100)
 * #property int hoverActionFade Time in ms to spend fading in or out the actions (default=100)
 * 
 * @var array
 * 
 */
$config->pageList = array(
    'limit' => 50,
    'speed' => 0,
    'useHoverActions' => true,
    'hoverActionDelay' => 300,
    'hoverActionFade' => 100
);

/**
 * https: This is automatically set to TRUE when the request is an HTTPS request, null when not determined.
 *
 */
$config->https = null;


/**
 * Enable ProcessWire advanced development mode?
 * 
 * Turns on additional options in ProcessWire Admin that aren't applicable in all instances.
 * Be careful with this as some options configured in advanced mode cannot be removed once
 * set (at least not without going directly into the database). 
 * 
 * #notes Recommended mode is false, except occasionally during ProcessWire core or module development.
 * @var bool
 *
 */
$config->advanced = getenv('ADVANCED');

/**
 * Force current session IP address (overriding auto-detect)
 * 
 * This overrides the return value of `$session->getIP()` method.
 * Use this property only for setting the IP address. To get the IP address
 * always use the `$session->getIP()` method instead. 
 * 
 * This is useful if you are in an environment where the remote IP address 
 * comes from some property other than the REMOTE_ADDR in $_SERVER. For instance,
 * if you are using a load balancer, what’s usually detected as the IP address is
 * actually the IP address between the load balancer and the server, rather than
 * the client IP address. So in that case, you’d want to set this property as
 * follows:
 * ~~~~~
 * $config->sessionForceIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
 * ~~~~~
 * If you don’t have a specific need to override the IP address of the user
 * then you should leave this blank.
 * 
 * @var string
 * 
 */
$config->sessionForceIP = $_SERVER['HTTP_X_FORWARDED_FOR'];

# Set login session length in seconds
$config->sessionExpireSeconds = 900;

# Set user cookies to never expire.
# This will keep data like saved queries.
$config->cookieOptions('age', time() + (10 * 365 * 24 * 60 * 60));


// ProcessWireConfig v1
if (($f = $config->paths->assets . "config/config.json") && is_readable($f)) {
    if ($a = json_decode(file_get_contents($f), true)) $config->setArray($a);
}

// Dynamically enable/disable tracy.
if (!$config->debug) {
    $config->tracyDisabled = true;
}

// Edition of system.
$config->edition = getenv('EDITION');

// Short description of service meta is providing
$config->service = getenv('SERVICE');

$config->title = "meta";

// meta version
$config->versionMeta = '0.6.0';

// Version of the master schema
$config->versionSchema = '0.1.0';

// HS5 Key for generating tokens.
$config->keyHS256 = getenv('KEY_HS256');

// Get RS256 Private Key
$config->keyRS256Private = "";

// Get RS256 Public Key
$config->keyRS256Public = "";

$config->maintenance = getenv('MAINTENANCE');