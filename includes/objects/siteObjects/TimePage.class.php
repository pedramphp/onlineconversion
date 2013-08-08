<?php 
	
	require_once("ConverterPage.class.php");
	
	class TimePage extends ConverterPage {
		
		public function __construct(){
			
			$this->fromMetric 		= "Nanosecond";
			$this->toMetric 		= "Microsecond";
			$this->fromMetricTitle	= "Nanosecond";
			$this->toMetricTitle 	= "Microsecond";
			$this->converterTitle 	= "Time Converter";
			$this->header = "Simple easy to use time conversion tool";
			self::$pageTitle = "Time Conversion | Metric Conversion | Online Conversion";
			self::$pageTitleKeyword = "Time Conversion";
			self::$pageDesc = "Time Conversion is the best conversion tool for Nanosecond, Microsecond, Millisecond, Second, Minute, Hour, Day, Week, Month, Year, Decade, Century. Instant time conversion.";
			
			self::$shortmetrics = array(
				"Nanosecond"	=> "ns",
				"Microsecond"	=> "μs",
				"Millisecond"		=> "ms",
				"Second"			=> "sec",
				"Minute"			=> "min",
				"Hour"				=> "hr",
				"Day"				=> "Day",
				"Week"				=> "Week",
				"Month"			=> "Month",
				"Year"				=> "Year",
				"Decade"			=> "Decade",
				"Century"			=> "Century"
		
			);
			self::$CONVERSIONS_TABLE = array(
				"NANOSECOND" 	=> array(
				"MICROSECOND"	=> 1000,
				"MILLISECOND"		=> 1e+6,
				"SECOND"				=> 1e+9,
				"MINUTE"				=> 6e+10,
				"HOUR"				=> 3.6e+12,
				"DAY"					=> 8.64e+13,
				"WEEK"					=> 6.048e+14,
				"MONTH"				=> 2.63e+15,
				"YEAR"					=> 3.156e+16,
				"DECADE"				=> 3.156e+17,
				"CENTURY"			=> 3.156e+18
				),
				
				"MICROSECOND" 	=> array(
				"NANOSECOND"		=> 0.001,
				"MILLISECOND"		=> 1000,
				"SECOND"				=> 1e+6,
				"MINUTE"				=> 6e+7,
				"HOUR"				=> 3.6e+9,
				"DAY"					=> 8.64e+10,
				"WEEK"					=> 6.048e+11,
				"MONTH"				=> 2.63e+12,
				"YEAR"					=> 3.156e+13,
				"DECADE"				=> 3.156e+14,
				"CENTURY"			=> 3.156e+15
				),
				
				"MILLISECOND" 	=> array(
				"NANOSECOND"		=> 1e-6,
				"MICROSECOND"	=> 0.001,
				"SECOND"				=> 1000,
				"MINUTE"				=> 60000,
				"HOUR"				=> 3.6e+6,
				"DAY"					=> 8.64e+7,
				"WEEK"					=> 6.048e+8,
				"MONTH"				=> 2.63e+9,
				"YEAR"					=> 3.156e+10,
				"DECADE"				=> 3.156e+11,
				"CENTURY"			=> 3.156e+12
				),
				
				"SECOND" 	=> array(
				"NANOSECOND"		=> 1e-9,
				"MICROSECOND"	=> 1e-6,
				"MILLISECOND"		=> 0.001,
				"MINUTE"				=> 60,
				"HOUR"				=> 3600,
				"DAY"					=> 86400,
				"WEEK"					=> 604800,
				"MONTH"				=> 2.63e+6,
				"YEAR"					=> 3.156e+7,
				"DECADE"				=> 3.156e+8,
				"CENTURY"			=> 3.156e+9
				),
				
				"MINUTE" 	=> array(
				"NANOSECOND"		=> 1.6667e-11,
				"MICROSECOND"	=> 1.6667e-8,
				"MILLISECOND"		=> 1.6667e-5,
				"SECOND"				=> 0.0166667,
				"HOUR"					=> 60,
				"DAY"					=> 1440,
				"WEEK"					=> 10080,
				"MONTH"				=> 43829.1,
				"YEAR"					=> 525949,
				"DECADE"				=> 5.259e+6,
				"CENTURY"			=> 5.259e+7
				),
				
				"HOUR" 	=> array(
				"NANOSECOND"		=> 2.7778e-13,
				"MICROSECOND"	=> 2.7778e-10,
				"MILLISECOND"		=> 2.7778e-7,
				"SECOND"				=> 0.000277778,
				"MINUTE"				=> 0.0166667,
				"DAY"					=> 24,
				"WEEK"					=> 168,
				"MONTH"				=> 730.484,
				"YEAR"					=> 8765.81,
				"DECADE"				=> 87658.1,
				"CENTURY"			=> 876581
				),
				
				"DAY" 	=> array(
				"NANOSECOND"		=> 1.1574e-14,
				"MICROSECOND"	=> 1.1574e-11,
				"MILLISECOND"		=> 1.1574e-8,
				"SECOND"				=> 1.1574e-5,
				"MINUTE"				=> 0.000694444,
				"HOUR"					=> 0.0416667,
				"WEEK"					=> 7,
				"MONTH"				=> 30.4368,
				"YEAR"					=> 365.242,
				"DECADE"				=> 3652.42,
				"CENTURY"			=> 36524.2
				),
				
				"WEEK" 	=> array(
				"NANOSECOND"		=> 1.6534e-15,
				"MICROSECOND"	=> 1.6534e-12,
				"MILLISECOND"		=> 1.6534e-9,
				"SECOND"				=> 1.6534e-6,
				"MINUTE"				=> 9.9206e-5,
				"HOUR"					=> 0.00595238,
				"DAY"					=> 0.142857,
				"MONTH"				=> 4.34812,
				"YEAR"					=> 52.1775,
				"DECADE"				=> 521.775,
				"CENTURY"			=> 5217.75
				),
				
				"MONTH" 	=> array(
				"NANOSECOND"		=> 3.8027e-16,
				"MICROSECOND"	=> 3.8027e-13,
				"MILLISECOND"		=> 3.8027e-10,
				"SECOND"				=> 3.8027e-7,
				"MINUTE"				=> 2.2816e-5,
				"HOUR"					=> 0.00136895,
				"DAY"					=> 0.0328549,
				"WEEK"					=> 0.229984,
				"YEAR"					=> 12,
				"DECADE"				=> 120,
				"CENTURY"			=> 1200
				),
				
				
				"YEAR" 	=> array(
				"NANOSECOND"		=> 3.1689e-17,
				"MICROSECOND"	=> 3.1689e-14,
				"MILLISECOND"		=> 3.1689e-11,
				"SECOND"				=> 3.1689e-8,
				"MINUTE"				=> 1.9013e-6,
				"HOUR"					=> 0.00011408,
				"DAY"					=> 0.00273791,
				"WEEK"					=> 0.0191654,
				"MONTH"				=> 0.0833333,
				"DECADE"				=> 10,
				"CENTURY"			=> 100
				),
				
				
				"DECADE" 	=> array(
				"NANOSECOND"		=> 3.1689e-18,
				"MICROSECOND"	=> 3.1689e-15,
				"MILLISECOND"		=> 3.1689e-12,
				"SECOND"				=> 3.1689e-9,
				"MINUTE"				=> 1.9013e-7,
				"HOUR"					=> 1.1408e-5,
				"DAY"					=> 0.000273791,
				"WEEK"					=> 0.00191654,
				"MONTH"				=> 0.00833333,
				"YEAR"					=> 0.1,
				"CENTURY"			=> 10
				),
				
				"CENTURY" 	=> array(
				"NANOSECOND"		=> 3.1689e-19,
				"MICROSECOND"	=> 3.1689e-16,
				"MILLISECOND"		=> 3.1689e-13,
				"SECOND"				=> 3.1689e-10,
				"MINUTE"				=> 1.9013e-8,
				"HOUR"					=> 1.1408e-6,
				"DAY"					=> 2.7379e-5,
				"WEEK"					=> 0.000191654,
				"MONTH"				=> 0.000833333,
				"YEAR"					=> 0.01,
				"DECADE"				=> 0.1
				)

			);
			
			self::$METRICS = array(
				"Nanosecond",
				"Microsecond",
				"Millisecond",
				"Second",
				"Minute",
				"Hour",
				"Day",
				"Week",
				"Month",
				"Year",
				"Decade",
				"Century"
			);
		
			parent::__construct();

		}

	}
?>
