<?php 
	
	require_once("ConverterPage.class.php");
	
	class SpeedPage extends ConverterPage {
		

		public function __construct(){
			
			$this->fromMetric 		= "miles-per-hour";
			$this->toMetric 		= "feet-per-sec";
			$this->fromMetricTitle	= "Miles per hour";
			$this->toMetricTitle 	= "Feet per sec";
			$this->converterTitle 	= "Speed Converter";
			$this->header = "Simple easy to use speed conversion tool";
			self::$pageTitle = "Speed Conversion | Speed Converter | Speed Conversion Calculator";
			self::$pageTitleKeyword =  "Speed Conversion";
			self::$pageDesc = "Speed Conversion is the best conversion tool for meter per hour, feet per sec, miles per hour, meters per sec, knot, km per hour. Instant speed conversion.";
			
			self::$shortmetrics = array(
				"Miles_per_hour"	=> "Miles Per Hour",
				"Feet_per_sec" 		=> "Feet Per Sec",
				"Meters_per_sec" 	=> "Meters Per Sec",
				"Km_per_hour" 		=> "Km Per Hour",
				"Feet_per_sec" 		=> "Feet Per Sec",
				"Knot" 				=> "Knot"
				
			);
			
			self::$CONVERSIONS_TABLE = array(
				"MILES-PER-HOUR" 		=> array(
					"FEET-PER-SEC" 		=> 0.681818,
					"METERS-PER-SEC" 	=> 2.23694,
					"KM-PER-HOUR" 		=> 0.621371,
					"KNOT" 			=> 1.15078
				),
				
				"FEET-PER-SEC" 			=> array(
					"MILES-PER-HOUR" 	=> 1.46667,
					"METERS-PER-SEC" 	=> 3.28084,
					"KM-PER-HOUR" 		=> 0.911344,
					"KNOT" 				=> 1.68781
				),
				
				"KM-PER-HOUR" 			=> array(
					"FEET-PER-SEC" 		=> 1.09728,
					"METERS-PER-SEC" 	=> 3.6,
					"MILES-PER-HOUR" 	=> 1.60934,
					"KNOT" 			=> 1.852
				),
				
				"KNOT" 				=> array(
					"FEET-PER-SEC" 		=> 0.592484,
					"METERS-PER-SEC" 	=> 1.94384,
					"KM-PER-HOUR" 		=> 0.539957,
					"MILES-PER-HOUR" 	=> 0.868976
				),
				
				"METERS-PER-SEC"		=> array(
					"FEET-PER-SEC" 		=> 0.3048,
					"KNOT"			 	=> 0.514444,
					"KM-PER-HOUR" 		=> 0.277778,
					"MILES-PER-HOUR" 	=> 0.44704
				),
			);
			
			self::$METRICS = array(
				"Miles/hour",
				"Feet/sec",
				"Meters/sec",
				"Km/hour",
				"Knot"
			);
		
			parent::__construct();

		}

	}
?>
