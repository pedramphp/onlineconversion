<?php


 


/**
 *
 *	Auto Site Object Loader :
 *	Auto Loader ( Loads site objects that have not been loaded when they are called )
 *
 */
require_once(LiteFrame::GetFileSystemPath()."includes/objects/siteObjects/SiteObjectLoader.class.php");






/**
 *
 *	Framework Module Loader :
 *	Auto Loader ( Loads site modules that have not been loaded when they are called )
 *
 *	Redirect
 *
 */
 
require_once(LiteFrame::GetFileSystemPath()."frameworkModules/FrameworkModuleLoader.class.php");


/**
 * 
 *	Site Module Loader : 
 *	Auto Loader ( Loads site modules that have not been loaded when they are called )
 *  
 */
require_once(LiteFrame::GetFileSystemPath()."includes/modules/SiteModuleLoader.class.php");



/**
 * 
 *	Site Module Loader : 
 *	Auto Loader ( Loads exception modules that have not been loaded when they are called )
 *  
 */
require_once(LiteFrame::GetFileSystemPath()."includes/modules/ExceptionLoader.class.php");



/**
 * 
 *	Site Module Loader : 
 *	Auto Loader ( Loads exception modules that have not been loaded when they are called )
 *  
 */
require_once(LiteFrame::GetFileSystemPath()."includes/jsonrpc/settings/JsonRPCLoader.class.php");



?>