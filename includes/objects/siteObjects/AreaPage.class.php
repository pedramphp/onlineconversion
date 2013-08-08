<?php 
	
	require_once("ConverterPage.class.php");
	
	class AreaPage extends ConverterPage {
		
		public function __construct(){
			
			$this->fromMetric 		= "Square km";
			$this->toMetric 		= "Hectare";
			$this->fromMetricTitle	= "Square km";
			$this->toMetricTitle 	= "Hectare";
			$this->converterTitle 	= "Area Converter";
			$this->header = "Simple easy to use Area conversion tool";
			self::$pageTitle = "Area Conversion | Metric Conversion | Online Conversion";
			self::$pageTitleKeyword = "Area Conversion";
			self::$pageDesc = "Area Conversion is the best conversion tool for Square km, Hectare, Square meter, Square mile, Acre, Square yard, Square foot, Square inch. Instant area conversion.";
			
			self::$shortmetrics = array(
					"Square_km"			=> "Square km",
					"Hectare"				=> "Hectare",
					"Square_meter"		=> "Square meter",
					"Square_mile"		=> "Square mile",
					"Acre"					=> "Acre",
					"Square_yard"		=> "Square yard",
					"Square_foot"		=> "Square foot",
					"Square_inch"		=> "Square inch"
			);
			
			self::$CONVERSIONS_TABLE = array(
				"SQUARE_KM" 			=> array(
					"HECTARE"				=> 0.01,
					"SQUARE_METER"		=> 1e-6,
					"SQUARE_MILE"		=> 2.58999,
					"ACRE"						=> 0.00404686,
					"SQUARE_YARD"		=> 8.3613e-7,
					"SQUARE_FOOT"		=> 9.2903e-8,
					"SQUARE_INCH"		=> 6.4516e-10
				),
				
				"HECTARE" 			=> array(
					"SQUARE_KM"			=> 100,
					"SQUARE_METER"		=> 1e-4,
					"SQUARE_MILE"		=> 258.999,
					"ACRE"						=> 0.404686,
					"SQUARE_YARD"		=> 8.3613e-5,
					"SQUARE_FOOT"		=> 9.2903e-6,
					"SQUARE_INCH"		=> 6.4516e-8
				),
				
				"SQUARE_METER" 	=> array(
					"SQUARE_KM"			=> 1e+6,
					"HECTARE"				=> 10000,
					"SQUARE_MILE"		=> 2.59e+6,
					"ACRE"						=> 4046.86,
					"SQUARE_YARD"		=> 0.836127,
					"SQUARE_FOOT"		=> 0.092903,
					"SQUARE_INCH"		=> 0.00064516
				),
				
				"SQUARE_MILE" 	=> array(
					"SQUARE_KM"			=> 0.386102,
					"HECTARE"				=> 0.00386102,
					"SQUARE_METER"		=> 3.861e-7,
					"ACRE"						=> 0.0015625,
					"SQUARE_YARD"		=> 3.2283e-7,
					"SQUARE_FOOT"		=> 3.587e-8,
					"SQUARE_INCH"		=> 2.491e-10
				),
				
				"ACRE" 	=> array(
					"SQUARE_KM"			=> 247.105,
					"HECTARE"				=> 2.47105,
					"SQUARE_METER"		=> 0.000247105,
					"SQUARE_MILE"		=> 640,
					"SQUARE_YARD"		=> 0.000206612,
					"SQUARE_FOOT"		=> 2.2957e-5,
					"SQUARE_INCH"		=> 1.5942e-7
				),
				
				"SQUARE_YARD" 	=> array(
					"SQUARE_KM"			=> 1.196e+6,
					"HECTARE"				=> 11959.9,
					"SQUARE_METER"		=> 1.19599,
					"SQUARE_MILE"		=> 3.098e+6,
					"ACRE"						=> 4840,
					"SQUARE_FOOT"		=> 0.111111,
					"SQUARE_INCH"		=> 0.000771605
				),
				
				"SQUARE_FOOT" 	=> array(
					"SQUARE_KM"			=> 1.076e+7,
					"HECTARE"				=> 107639,
					"SQUARE_METER"		=> 10.7639,
					"SQUARE_MILE"		=> 2.788e+7,
					"ACRE"						=> 43560,
					"SQUARE_YARD"		=> 9,
					"SQUARE_INCH"		=> 0.00694444
				),
				
				"SQUARE_INCH" 	=> array(
					"SQUARE_KM"			=> 1.55e+9,
					"HECTARE"				=> 1.55e+7,
					"SQUARE_METER"		=> 1550,
					"SQUARE_MILE"		=> 4.014e+9,
					"ACRE"						=> 6.273e+6,
					"SQUARE_YARD"		=> 1296,
					"SQUARE_FOOT"		=> 144
				)
				
			);
			
			self::$METRICS = array(
				"Square km",
				"Hectare",
				"Square meter",
				"Square mile",
				"Acre",
				"Square yard",
				"Square foot",
				"Square inch"
			);
		
			parent::__construct();

		}

	}
?>
