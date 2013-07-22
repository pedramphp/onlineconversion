<?php 

	class WeightPage extends SiteObject {
		private $fromMetric = "pound";
		private $toMetric = "kilogram";
		private $fromMetricTitle = "Pound";
		private $toMetricTitle = "Kilogram";


		public static $metrics = array(
			"Pound",
			"Metric ton",
			"Kilogram",
			"Gram",
			"Milligram",
			"Mcg",
			"Long ton",
			"Short ton",
			"Stone",
			"Ounce"
		);

		public static $shortmetrics = array(
			"Pound" => "lbs",
			"Kilogram" => "kg",
			"Ounce" => "oz",
			"Metric_ton" => "Metric ton",
			"Gram" => "g",
			"Milligram" => "mg",
			"Mcg" => "Mcg",
			"Long_ton" => "Long ton",
			"Short_ton" => "Short ton",
			"Stone" => "Stone"
		);

		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			$leftNav = new WeightLeftNav();
			$this->setConverter();
			$this->results = array(
				"left_nav" 			=> $leftNav->getResult(),
				"metricsFromList"	=> $this->getMetricsFrom(),
				"metricsToList"		=> $this->getMetricsTo(),
				"fromMetric"		=> $this->fromMetric,
				"toMetric"			=> $this->toMetric,
				"fromMetricTitle"		=> $this->fromMetricTitle,
				"toMetricTitle"			=> $this->toMetricTitle

			);
		}

		private function getMetricsFrom(){
			return $this->getMetrics($this->fromMetric);
		}

		private function getMetricsTo(){
			return $this->getMetrics($this->toMetric);
		}

		private function getMetrics($activeMetric){
			$list = array();

			foreach(self::$metrics as $metricText){
				$value = str_replace(" ", "_", $metricText);
				$list[] = array(
					"value" => $value,
					"text" => $metricText,
					"active" => (strtolower($value) === strtolower($activeMetric))
				);
			}
			return $list;
		}

		private function setConverter(){
			$request = LiteFrame::FetchGetVariable();
			if(!isset($request["converter"])){
				return;
			}
			$converter = $request["converter"];

			$converter = str_replace("-", "_", $converter);


			$converterArr = explode("_to_", $converter);
			if(sizeof($converterArr) != 2){
				return;
			}
			
			$this->fromMetric = strtolower($converterArr[0]);
			$this->toMetric = strtolower($converterArr[1]);

			$fromMetricTitle = str_replace("_", " ", $converterArr[0]);
			$toMetricTitle = str_replace("_", " ", $converterArr[1]);

			$this->fromMetricTitle = ucfirst($fromMetricTitle);
			$this->toMetricTitle = ucfirst($toMetricTitle);


		}
		
	}
?>
