<?php
	
	require_once(LiteFrame::GetFileSystemPath()."includes/Site.class.php");
	class LiteFrameAction{
		
		public function __construct(){
			if(LiteFrame::isAjax()){
				//$source =
				//LiteFrame::AJAXLayout();
				LiteFrame::AJAXLayout();
				LiteFrame::$yAction['from'] = LiteFrame::FetchPostVariable()["from"];
				LiteFrame::$yAction['to'] = LiteFrame::FetchPostVariable()["to"];

			}
		}
		
	}
?>
