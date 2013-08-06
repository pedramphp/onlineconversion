<?php 
	
	class Title extends SiteObject {
		
		public function __construct(){
			parent::__construct();	
		}
		
		
		public function process(){
			
			$title = ConverterPage::$pageTitle;
			$request  = LiteFrame::FetchGetVariable();
			$mainKeyword = ConverterPage::$pageTitleKeyword;
			if(isset($request["converter"]) && !empty($request["converter"])){
				$title = $this->buildTitle($mainKeyword);
			}
			$this->results = $title;
			
		}
		
		
		private function buildTitle($mainKeyword){
			$request  = LiteFrame::FetchGetVariable();
			$converter = $request["converter"];
			$converter = str_replace("-", "_", $converter);
			$converterArr = explode("_to_", $converter);
			if(sizeof($converterArr) != 2){
				return;
			}						
			$from 	= ucfirst(strtolower($converterArr[0]));
			$to 	= ucfirst(strtolower($converterArr[1]));

			$abbFrom = ucfirst(ConverterPage::$shortmetrics[$from]);
			$abbTo = ucfirst(ConverterPage::$shortmetrics[$to]);
			
			$from = str_replace("_", " ",$from);
			$to = str_replace("_", " ",$to);

			$title  = "Convert " . $from ."s to " . $to . "s" . " | " . $abbFrom .  " to " . $abbTo . " | " . $mainKeyword; 					
			return $title;			
		}
		
	}


?>