<?php
	
	require_once(LiteFrame::GetFileSystemPath()."includes/Site.class.php");
	class LiteFrameAction{
		
		public function __construct(){
			LiteFrame::IncludeJson();
			LiteFrame::SetTemplateAction("global-converter");
			
			$site = new Site("AreaPage");
			LiteFrame::$yAction["SiteData"]["activePage"] = "areaPage";
		}
		
	}
?>