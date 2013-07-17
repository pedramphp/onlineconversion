<?php

class SiteSettings {
	
	public static  $tools;
	public function __construct(){}
	
	public function setTemplate(){
		
		//LiteFrame::SetTemplateFolderName("default");
		//LiteFrame::SetTemplateColorName("dark");
		self::$tools= new Tools();
		
	}/* </ SetTemplate > */
	
	public function setTemplateColor(){
		
		//LiteFrame::IncludeStyle('reset.css','rules.css','default.css','footer.css');
		
	} /* </ SetTemplateColor > */
	
	public function setCoreJavascript(){
		LiteFrame::IncludeJavascript('default.js');
	} /* </ SetCoreJavascript > */
	
} /* </ SiteSettings > */
	
?>