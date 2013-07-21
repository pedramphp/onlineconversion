<?php 
	
	class Title extends SiteObject {
		
		public function __construct(){
			parent::__construct();	
		}
		
		
		public function process(){
			

			$title = "";
			switch(LiteFrame::getActiveAction()){
					case "weight-converter":
						$title = "Weight Conversion | Metric Conversion | Online Conversion";
						$request  = LiteFrame::FetchGetVariable();

						if(!isset($request["converter"])){
							break;
						}
						$converter = $request["converter"];
						$converter = str_replace("-", "_", $converter);
						$converterArr = explode("_to_", $converter);
						if(sizeof($converterArr) != 2){
							return;
						}
						$from 	= ucfirst(strtolower($converterArr[0]));
						$to 	= ucfirst(strtolower($converterArr[1]));
						$title  = "Convert " . $from ."s to " . $to . "s" . " | " . ucfirst(WeightPage::$shortmetrics[$from]) .  " to " . ucfirst(WeightPage::$shortmetrics[$to]) . " | " ."Weight Conversion"; 					
						break;	
			}
			$this->results = $title;
			
		}
		
	}


?>