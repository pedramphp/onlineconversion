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
						$mainKeyword = "Weight Conversion";
						
						if(!isset($request["converter"]) || empty($request["converter"])){
							break;
						}
						
						$title = $this->buildDesc($mainKeyword, $titleCore);
						
						break;	
						
					case "temprature-converter":
					
						$titleCore = "Temprature Conversion is the best conversion tool for Fahrenheits, Celsius, Kelvin. Instant temprature conversion.";
						$title = $titleCore;
						$request  = LiteFrame::FetchGetVariable();
						$mainKeyword = "Temperature Conversion";
						if(!isset($request["converter"]) || empty($request["converter"])){
							break;
						}
						
						$title = $this->buildDesc($mainKeyword, $titleCore);
						break;							
					
					case "speed-converter":
					
						$titleCore = "Speed Conversion is the best conversion tool for meter per hour, feet per sec, miles per hour, meters per sec, knot, km per hour. Instant speed conversion.";
						$title = $titleCore;
						$request  = LiteFrame::FetchGetVariable();
						$mainKeyword = "Speed Conversion";
						if(!isset($request["converter"]) || empty($request["converter"])){
							break;
						}
						
						$title = $this->buildDesc($mainKeyword, $titleCore);
						break;			
			}
			
			$this->results = $title;
			
		}

		private function buildDesc($mainKeyword, $titleCore){
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

			
			$title  = "Convert " . $from ."s to " . $to . "s" . ", " . $abbFrom .  " to " . $abbTo . " by using " . $mainKeyword . " tool";
			return $title .= ", ". $titleCore;			
		}
		
	}


?>