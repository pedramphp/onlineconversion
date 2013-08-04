<?php
	
	require_once(LiteFrame::GetFileSystemPath()."includes/Site.class.php");
	class LiteFrameAction{
		
		public function __construct(){
			LiteFrame::AJAXLayout();
			$vars = LiteFrame::FetchPostVariable();
			LiteFrame::$yAction['from'] = $vars["from"];
			LiteFrame::$yAction['to'] = $vars["to"];
		}
		
	}
?>
