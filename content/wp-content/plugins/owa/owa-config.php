<?php

//
// Open Web Analytics - An Open Source Web Analytics Framework
//
// Copyright 2006 Peter Adams. All rights reserved.
//
// Licensed under GPL v2.0 http://www.gnu.org/copyleft/gpl.html
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.
//
// $Id: owa-config-dist.php 1762 2014-01-21 08:00:44Z padams $
//

/**
 * OWA Configuration
 * 
 * @author      Peter Adams <peter@openwebanalytics.com>
 * @copyright   Copyright &copy; 2006 Peter Adams <peter@openwebanalytics.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GPL v2.0
 * @category    owa
 * @package     owa
 * @version		$Revision: 1762 $	      
 * @since		owa 1.0.0
 */
 
/**
 * DATABASE CONFIGURATION
 *
 * Connection info for databases that will be used by OWA. 
 *
 */

define('OWA_DB_TYPE', 'mysql'); // options: mysql
define('OWA_DB_NAME', 'u_wheybags'); // name of the database
define('OWA_DB_HOST', 'userweb.netsoc.tcd.ie'); // host name of the server housing the database
define('OWA_DB_USER', 'wheybags'); // database user
define('OWA_DB_PASSWORD', 'jin4EeF1'); // database user's password

/**
 * AUTHENTICATION KEYS AND SALTS
 *
 * Change these to different unique phrases.
 */
define('OWA_NONCE_KEY', '<+za?7wkmo~t~rN)v^@1Zn3/N/FcbdJ4k2$VW2aCg}Z!tYu85YpC@d[.^])Fl^0D');  
define('OWA_NONCE_SALT', 'p*,kIS}7XqJyvN){m3a.;*Hv+x]D@Q4%|`2eo4?9s2YRkLjc2MRf,3dv,~;c[kGZ');
define('OWA_AUTH_KEY', 'M0m]7p_Cc@|%.`ju`PmrkzYy`E;O`wSu?wYYP},q8VNS@Lq8ar8tzg0LM3N2Z:0f');
define('OWA_AUTH_SALT', '&M2i?Cji[{yLNk:|p:(:^+wMj#GE9)!{=nNDJt8h!fG4x$BhN^k~ef7>mTn6FZfq');

/** 
 * PUBLIC URL
 *
 * Define the URL of OWA's base directory e.g. http://www.domain.com/path/to/owa/ 
 * Don't forget the slash at the end.
 */
 
define('OWA_PUBLIC_URL', 'http://freeablo.org/owa/');  

/** 
 * OWA ERROR HANDLER
 *
 * Overide OWA error handler. This should be done through the admin GUI, but 
 * can be handy during install or development. 
 * 
 * Choices are: 
 *
 * 'production' - will log only critical errors to a log file.
 * 'development' - logs al sorts of useful debug to log file.
 */

//define('OWA_ERROR_HANDLER', 'development');

/** 
 * LOG PHP ERRORS
 *
 * Log all php errors to OWA's error log file. Only do this to debug.
 */

//define('OWA_LOG_PHP_ERRORS', true);
 
/** 
 * OBJECT CACHING
 *
 * Override setting to cache objects. Caching will increase performance. 
 */

//define('OWA_CACHE_OBJECTS', true);

/**
 * CONFIGURATION ID
 *
 * Override to load an alternative user configuration
 */
 
//define('OWA_CONFIGURATION_ID', '1');


?>