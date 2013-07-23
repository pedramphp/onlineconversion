<?php 
	
	class Description extends SiteObject {
		
		public function __construct(){
			parent::__construct();	
		}
		
		
		public function process(){
			$title = "";
			switch(LiteFrame::getActiveAction()){
					case "weight-converter":
						$titleCore = "Weight Conversion is the best conversion tool for kilograms, ounces, pounds, gram, ton. Instant weight conversion.";
						$title = $titleCore;
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

						$abbFrom = ucfirst(WeightPage::$shortmetrics[$from]);
						$abbTo = ucfirst(WeightPage::$shortmetrics[$to]);

						$from = str_replace("_", " ",$from);
						$to = str_replace("_", " ",$to);

						
						$title  = "Convert " . $from ."s to " . $to . "s" . ", " . $abbFrom .  " to " . $abbTo . " by using weight conversion tool";
						$title .= ", ". $titleCore;
						
						break;	
			}
			
			$this->results = $title;
			
		}
		
	}


?>