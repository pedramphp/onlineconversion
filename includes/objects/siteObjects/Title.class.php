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
						$mainKeyword = "Weight Conversion";
						if(!isset($request["converter"])){
							break;
						}
						$title = $this->buildTitle($mainKeyword);
						break;	
						
					case "temprature-converter":
					
						$title = "Temperature Conversion | Temperature Converter | Celsius Conversion";
						$request  = LiteFrame::FetchGetVariable();
						$mainKeyword = "Temperature Conversion";
						if(!isset($request["converter"]) || empty($request["converter"])){
							break;
						}
						
						$title = $this->buildTitle($mainKeyword);
						break;							
					
					case "speed-converter":
					
						$title = "Speed Conversion | Speed Converter | Speed Conversion Calculator";
						$request  = LiteFrame::FetchGetVariable();
						$mainKeyword = "Speed Conversion";
						if(!isset($request["converter"]) || empty($request["converter"])){
							break;
						}
						
						$title = $this->buildTitle($mainKeyword);
						break;								
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