<?php
namespace cdecom;
use \black_willow as bw;

phpinfo();
exit();
	/****************************************************************

	Chateau d'encre 2.1

	Code and all stuff found in this site are mine unless I say otherwise,
	which I normally do if I'm using another someone's material.

	Copyright Adam Joel Richards, Raingarden Cafe, 2019.
	St. Catharines, Ontario.  It's nice here, I love it.

	******************************************************************/



\error_reporting( E_ALL );

//\ini_set( "include_path", ".;C:/GitHub/Black Willow/black_willow;C:/GitHub/Workspaces/housekeeping" );

//include "Black_Willow.php";

exit();

$the_handle = $_SERVER[ "MY_PROJECT_HANDLE" ];
$GLOBALS[ $the_handle ] = new \black_willow\Black_Willow( $_SERVER[ "MY_PROJECT_INIT_FILE" ] );
// If there is any other Raingarden preloading to do, put the file in the rg_init folder.
// Only functions and data are allowed, one function (php) or data-source (json) per file.
$the_folder = $_SERVER[ "MY_PROJECT_INIT" ];
$GLOBALS[ "the_json_preloads" ] = new \Ds\Map();
if ( \is_dir( $the_folder )) {
	if ( $the_init_folder = \opendir( $the_folder )) {
		while ( ( $another_file = readdir( $the_init_folder ) ) !== false) {
			$the_extension = \pathinfo( $another_file )[ "extension" ];
			if ( \is_file( "$the_folder\\$another_file" ) ) {
				if ( $the_extension !== "php" AND $the_extension !== "json" ) {
					throw new \black_willow\bw_errex\BW_Framework_Loading_Error( "This_data_file_is_unloadable: $the_folder\\$another_file" );
				} else {
					if( $the_extension === "json" ) {
						$the_json = \json_decode( \file_get_contents( "$the_folder\\$another_file" ) );
						$GLOBALS[ "the_json_preloads" ]->put( "$the_folder\\$another_file", $the_json );
					} else {
						include( "$the_folder\\$another_file" );
					}
				}
			}
		}
		\closedir( $the_init_folder );
	}
}
$the_kickstart = $GLOBALS[ $the_handle ]->kickstart_it( $the_handle );
echo $the_kickstart;