<?php 
	
	require_once("ConverterPage.class.php");
	
	class LengthPage extends ConverterPage {
		
		public function __construct(){
			
			$this->fromMetric 		= "Meter";
			$this->toMetric 		= "Kilometer";
			$this->fromMetricTitle	= "Meter";
			$this->toMetricTitle 	= "Kilometer";
			$this->converterTitle 	= "Length Converter";
			$this->header = "Simple easy to use length conversion tool";
			self::$pageTitle = "Length Conversion | Metric Conversion | Online Conversion";
			self::$pageTitleKeyword = "Length Conversion";
			self::$pageDesc = "Length Conversion is the best conversion tool for Meter, Kilometer, Centimeter, Millimeter, Mile, Yard, Foot, Inch, Nautical mile. Instant length conversion.";
			
			self::$shortmetrics = array(
					"Meter" 		=> "Meter",
					"Kilometer" 	=> "Kilometer",
					"Centimeter" 	=> "Centimeter",
					"Millimeter" 	=> "Millimeter",
					"Mile" 			=> "Mile",
					"Yard" 			=> "Yard",
					"Foot" 			=> "Foot",
					"Inch" 			=> "Inch", 
					"Nautical_mile" => "NNautical mile"
			);
			
			self::$CONVERSIONS_TABLE = array(
				"METER" 			=> array(
					"KILOMETER" 	=> 1000,
					"CENTIMETER" 	=> 0.01,
					"MILLIMETER" 	=> 0.001,
					"MILE" 			=> 1609.34,
					"YARD" 			=> 0.9144,
					"FOOT" 			=> 0.3048,
					"INCH" 			=> 0.0254, 
					"NAUTICAL_MILE" => 1852
				),

				"KILOMETER" 		=> array(
					"METER" 		=> 0.001,
					"CENTIMETER" 	=> 1e-5,
					"MILLIMETER" 	=> 1e-6,
					"MILE" 			=> 1.60934,
					"YARD" 			=> 0.0009144,
					"FOOT" 			=> 0.0003048,
					"INCH" 			=> 2.54e-5, 
					"NAUTICAL_MILE" => 1.852
				),

				"CENTIMETER" 		=> array(
					"METER" 		=> 100,
					"KILOMETER" 	=> 100000,
					"MILLIMETER" 	=> 0.1,
					"MILE" 			=> 160934,
					"YARD" 			=> 91.44,
					"FOOT" 			=> 30.48,
					"INCH" 			=> 2.54, 
					"NAUTICAL_MILE" => 185200
				),

				"MILLIMETER" 		=> array(
					"METER" 		=> 1000,
					"CENTIMETER" 	=> 10,
					"KILOMETER" 	=> 1e+6,
					"MILE" 			=> 1.609e+6,
					"YARD" 			=> 914.4,
					"FOOT" 			=> 304.8,
					"INCH" 			=> 25.4, 
					"NAUTICAL_MILE" => 1.852e+6
				),
				
				"MILE" 		=> array(
					"METER" 		=> 0.000621371,
					"CENTIMETER" 	=> 6.2137e-6,
					"MILLIMETER" 	=> 6.2137e-7,
					"KILOMETER" 	=> 0.621371,
					"YARD" 			=> 0.000568182,
					"FOOT" 			=> 0.000189394,
					"INCH" 			=> 1.5783e-5, 
					"NAUTICAL_MILE" => 1.15078
				),
				
				"YARD" 		=> array(
					"METER" 		=> 1.09361,
					"CENTIMETER" 	=> 0.0109361,
					"MILLIMETER" 	=> 0.00109361,
					"MILE" 			=> 1760,
					"KILOMETER" 	=> 1093.61,
					"FOOT" 			=> 0.333333,
					"INCH" 			=> 0.0277778, 
					"NAUTICAL_MILE" => 2025.37
				),
				
				"FOOT" 		=> array(
					"METER" 		=> 3.28084,
					"CENTIMETER" 	=> 0.0328084,
					"MILLIMETER" 	=> 0.00328084,
					"MILE" 			=> 5280,
					"YARD" 			=> 3,
					"KILOMETER" 	=> 3280.84,
					"INCH" 			=> 0.0833333, 
					"NAUTICAL_MILE" => 6076.12
				),					
					
				"NAUTICAL_MILE" 	=> array(
					"METER" 		=> 0.000539957,
					"CENTIMETER" 	=> 5.3996e-6,
					"MILLIMETER" 	=> 5.3996e-7,
					"MILE" 			=> 0.868976,
					"YARD" 			=> 0.000493737,
					"FOOT" 			=> 0.000164579,
					"INCH" 			=> 1.3715e-5, 
					"KILOMETER" 	=> 0.539957
				),					
					
				"INCH" 	=> array(
					"METER" 		=> 0.000539957,
					"CENTIMETER" 	=> 5.3996e-6,
					"MILLIMETER" 	=> 5.3996e-7,
					"MILE" 			=> 0.868976,
					"YARD" 			=> 0.000493737,
					"FOOT" 			=> 0.000164579,
					"NAUTICAL_MILE" => 1.3715e-5, 
					"KILOMETER" 	=> 0.539957
				)
			);
			
			self::$METRICS = array(
					"Meter",
					"Kilometer",
					"Centimeter",
					"Millimeter",
					"Mile",
					"Yard",
					"Foot",
					"Inch", 
					"Nautical mile"
			);
		
			parent::__construct();

		}

	}
?>
