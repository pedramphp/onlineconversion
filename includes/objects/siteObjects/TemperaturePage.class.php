<?php 
	
	require_once("ConverterPage.class.php");
	
	class TemperaturePage extends ConverterPage {
		
		public function __construct(){
			
			$this->fromMetric 		= "celsius";
			$this->toMetric 		= "fahrenheit";
			$this->fromMetricTitle	= "Celsius";
			$this->toMetricTitle 	= "Fahrenheit";
			$this->converterTitle 	= "Temperature Converter";
			$this->header = "Simple easy to use Temperature conversion tool";
			self::$pageTitle = "Temperature Conversion | Temperature Converter | Celsius Conversion";
			self::$pageTitleKeyword =  "Temperature Conversion";
			self::$pageDesc = "Temperature Conversion is the best conversion tool for Fahrenheits, Celsius, Kelvin. Instant temperature conversion.";
			
			
			self::$shortmetrics = array(
				"Celsius" 		=> "Celsius",
				"Fahrenheit" 	=> "Fahrenheit",
				"Kelvin" 		=> "Kelvin"
			);
			
			self::$CONVERSIONS_TABLE = array(
				"CELSIUS" 			=> array(
					"FAHRENHEIT" 	=> -17.2222,
					"KELVIN" 		=> -272.15
				),
				
				"KELVIN" 			=> array(
					"FAHRENHEIT" 	=> 255.928,
					"CELSIUS" 		=> 274.15
				),
				
				"FAHRENHEIT" 		=> array(
					"KELVIN" 		=> -457.87,
					"CELSIUS" 		=> 33.8
				)
			);
			
			self::$METRICS = array(
				"Celsius",
				"Fahrenheit",
				"Kelvin"
			);
		
			parent::__construct();

		}

	}
?>
