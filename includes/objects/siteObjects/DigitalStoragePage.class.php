<?php 
	
	require_once("ConverterPage.class.php");
	
	class DigitalStoragePage extends ConverterPage {
		
		public function __construct(){
			
			$this->fromMetric 		= "Bit";
			$this->toMetric 		= "Byte";
			$this->fromMetricTitle	= "Bit";
			$this->toMetricTitle 	= "Byte";
			$this->converterTitle 	= "Digital Storage Converter";
			$this->header = "Simple easy to use digital storage conversion tool";
			self::$pageTitle = "Digital Storage Conversion | Measurement Units Conversion | Online Conversion";
			self::$pageTitleKeyword = "Digital Storage Conversion";
			self::$pageDesc = "Digital Storage Conversion is the best conversion tool for Bit, Byte, Kilobit, Kilobyte, Megabit, Megabyte, Gigabit, Gigabyte, Terabit, Terabyte, Petabit, Petabyte. Instant digital storage conversion.";
			
			self::$shortmetrics = array(
					"Bit"				=> "bit",
					"Byte"			=> "B",
					"Kilobit"			=> "Kbit",
					"Kilobyte"		=> "KB",
					"Megabit"		=> "Mbit",
					"Megabyte"	=> "MB",
					"Gigabit"		=> "Gbit",
					"Gigabyte"		=> "GB",
					"Terabit"		=> "Tbit",
					"Terabyte"		=> "TB",
					"Petabit"		=> "Pbit",
					"Petabyte"		=> "PB"
			);
			
			self::$CONVERSIONS_TABLE = array(
				"BIT" 			=> array(
					"BYTE"				=> 8,
					"KILOBIT"			=> 1024,
					"KILOBYTE"		=> 8192,
					"MEGABIT"		=> 1.049e+6,
					"MEGABYTE"		=> 8.389e+6,
					"GIGABIT"			=> 1.074e+9,
					"GIGABYTE"		=> 8.59e+9,
					"TERABIT"			=> 1.1e+12,
					"TERABYTE"		=> 8.796e+12,
					"PETABIT"			=> 1.126e+15,
					"PETABYTE"		=> 9.007e+15
				),
				
				"BYTE" 			=> array(
					"BIT"				=> 0.125,
					"KILOBIT"			=> 128,
					"KILOBYTE"		=> 1024,
					"MEGABIT"		=> 131072,
					"MEGABYTE"		=> 1.049e+6,
					"GIGABIT"			=> 1.342e+8,
					"GIGABYTE"		=> 1.074e+9,
					"TERABIT"			=> 1.374e+11,
					"TERABYTE"		=> 1.1e+12,
					"PETABIT"			=> 1.407e+14,
					"PETABYTE"		=> 1.126e+15
				),
				
				"KILOBIT" 			=> array(
					"BIT"				=> 0.000976563,
					"BYTE"				=> 0.0078125,
					"KILOBYTE"		=> 8,
					"MEGABIT"		=> 1024,
					"MEGABYTE"		=> 8192,
					"GIGABIT"			=> 1.049e+6,
					"GIGABYTE"		=> 8.389e+6,
					"TERABIT"			=> 1.074e+9,
					"TERABYTE"		=> 8.59e+9,
					"PETABIT"			=> 1.1e+12,
					"PETABYTE"		=> 8.796e+12
				),
				
				"KILOBYTE" 			=> array(
					"BIT"				=> 0.00012207,
					"BYTE"				=> 0.000976563,
					"KILOBIT"			=> 0.125,
					"MEGABIT"		=> 128,
					"MEGABYTE"		=> 1024,
					"GIGABIT"			=> 131072,
					"GIGABYTE"		=> 1.049e+6,
					"TERABIT"			=> 1.342e+8,
					"TERABYTE"		=> 1.074e+9,
					"PETABIT"			=> 1.374e+11,
					"PETABYTE"		=> 1.1e+12
				),
				
				"MEGABIT" 			=> array(
					"BIT"				=> 9.5367e-7,
					"BYTE"				=> 7.6294e-6,
					"KILOBIT"			=> 0.000976563,
					"KILOBYTE"		=> 0.0078125,
					"MEGABYTE"		=> 8,
					"GIGABIT"			=> 1024,
					"GIGABYTE"		=> 8192,
					"TERABIT"			=> 1.049e+6,
					"TERABYTE"		=> 8.389e+6,
					"PETABIT"			=> 1.074e+9,
					"PETABYTE"		=> 8.59e+9
				),
				
				"MEGABYTE" 			=> array(
					"BIT"				=> 1.1921e-7,
					"BYTE"				=> 9.5367e-7,
					"KILOBIT"			=> 0.00012207,
					"KILOBYTE"		=> 0.000976563,
					"MEGABIT"		=> 0.125,
					"GIGABIT"			=> 128,
					"GIGABYTE"		=> 1024,
					"TERABIT"			=> 131072,
					"TERABYTE"		=> 1.049e+6,
					"PETABIT"			=> 1.342e+8,
					"PETABYTE"		=> 1.074e+9
				),
				
				"GIGABIT" 			=> array(
					"BIT"				=> 9.3132e-10,
					"BYTE"				=> 7.4506e-9,
					"KILOBIT"			=> 9.5367e-7,
					"KILOBYTE"		=> 7.6294e-6,
					"MEGABIT"		=> 0.000976563,
					"MEGABYTE"		=> 0.0078125,
					"GIGABYTE"		=> 8,
					"TERABIT"			=> 1024,
					"TERABYTE"		=> 8192,
					"PETABIT"			=> 1.049e+6,
					"PETABYTE"		=> 8.389e+6
				),
				
				"GIGABYTE" 			=> array(
					"BIT"				=> 1.1642e-10,
					"BYTE"				=> 9.3132e-10,
					"KILOBIT"			=> 1.1921e-7,
					"KILOBYTE"		=> 9.5367e-7,
					"MEGABIT"		=> 0.00012207,
					"MEGABYTE"		=> 0.000976563,
					"GIGABIT"			=> 0.125,
					"TERABIT"			=> 128,
					"TERABYTE"		=> 1024,
					"PETABIT"			=> 131072,
					"PETABYTE"		=> 1.049e+6
				),
				
				"TERABIT" 			=> array(
					"BIT"				=> 9.0949e-13,
					"BYTE"				=> 7.276e-12,
					"KILOBIT"			=> 9.3132e-10,
					"KILOBYTE"		=> 7.4506e-9,
					"MEGABIT"		=> 9.5367e-7,
					"MEGABYTE"		=> 7.6294e-6,
					"GIGABIT"			=> 0.000976563,
					"GIGABYTE"		=> 0.0078125,
					"TERABYTE"		=> 8,
					"PETABIT"			=> 1024,
					"PETABYTE"		=> 8192
				),
				
				"TERABYTE" 			=> array(
					"BIT"				=> 1.1369e-13,
					"BYTE"				=> 9.0949e-13,
					"KILOBIT"			=> 1.1642e-10,
					"KILOBYTE"		=> 9.3132e-10,
					"MEGABIT"		=> 1.1921e-7,
					"MEGABYTE"		=> 9.5367e-7,
					"GIGABIT"			=> 0.00012207,
					"GIGABYTE"		=> 0.000976563,
					"TERABIT"			=> 0.125,
					"PETABIT"			=> 128,
					"PETABYTE"		=> 1024
				),
				
				"PETABIT" 			=> array(
					"BIT"				=> 8.8818e-16,
					"BYTE"				=> 7.1054e-15,
					"KILOBIT"			=> 9.0949e-13,
					"KILOBYTE"		=> 7.276e-12,
					"MEGABIT"		=> 9.3132e-10,
					"MEGABYTE"		=> 7.4506e-9,
					"GIGABIT"			=> 9.5367e-7,
					"GIGABYTE"		=> 7.6294e-6,
					"TERABIT"			=> 0.000976563,
					"TERABYTE"		=> 0.0078125,
					"PETABYTE"		=> 8
				),
				
				"PETABYTE" 			=> array(
					"BIT"				=> 1.1102e-16,
					"BYTE"			=> 8.8818e-16,
					"KILOBIT"			=> 1.1369e-13,
					"KILOBYTE"		=> 9.0949e-13,
					"MEGABIT"		=> 1.1642e-10,
					"MEGABYTE"	=> 9.3132e-10,
					"GIGABIT"		=> 1.1921e-7,
					"GIGABYTE"		=> 9.5367e-7,
					"TERABIT"		=> 0.00012207,
					"TERABYTE"		=> 0.000976563,
					"PETABIT"		=> 0.125
				)

			);
			
			self::$METRICS = array(
					"Bit",
					"Byte",
					"Kilobit",
					"Kilobyte",
					"Megabit",
					"Megabyte",
					"Gigabit",
					"Gigabyte",
					"Terabit",
					"Terabyte",
					"Petabit",
					"Petabyte"
			);
		
			parent::__construct();

		}

	}
?>
