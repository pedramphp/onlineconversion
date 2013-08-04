<?php
 
class SiteObjectLoader {
		
	public static function Loader( $className ){
		
		$path = LiteFrame::GetFileSystemPath().'includes/objects/siteObjects/'.$className.'.class.php';
		
		if( !file_exists( $path ) ){ return false; }
		require_once ( $path );
		
	}/* </ Loader >*/	
	
}


spl_autoload_register( array( 'SiteObjectLoader', 'Loader' ) ); // As of PHP 5.3.0

?>