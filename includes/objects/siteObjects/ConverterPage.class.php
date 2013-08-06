<?php 
	
	abstract class ConverterPage extends SiteObject {
		protected $fromMetric;
		protected $toMetric;
		protected $fromMetricTitle;
		protected $toMetricTitle;
		protected $converterTitle;
		public static $METRICS;
		protected static $CONVERSIONS_TABLE;
		protected $header;
		public static $shortmetrics;
		public static $pageTitle;
		public static $pageTitleKeyword;
		public static $pageDesc;
		
		public function __construct(){
			parent::__construct();
		}
		
		
		protected function process(){
			
			$this->setConverter();
			
			$this->results = array(
				"left_nav" 			=> $this->getLeftNav(),
				"metricsFromList"	=> $this->getMetricsFrom(),
				"metricsToList"		=> $this->getMetricsTo(),
				"fromMetric"		=> $this->fromMetric,
				"toMetric"			=> $this->toMetric,
				"fromMetricTitle"	=> $this->fromMetricTitle,
				"toMetricTitle"		=> $this->toMetricTitle,
				"conversionTable"	=> self::$CONVERSIONS_TABLE,
				"converterTitle"	=> $this->converterTitle,
				"header"			=> $this->header
			);
			
			
		}

		private function getMetricsFrom(){
			return $this->getMetrics($this->fromMetric);
		}

		private function getMetricsTo(){
			return $this->getMetrics($this->toMetric);
		}

		private function getMetrics($activeMetric){
			$activeMetric = preg_replace("/-per-/","/",$activeMetric);	
			$list = array();
			foreach(self::$METRICS as $metricText){
				$value = str_replace(" ", "_", $metricText);
				$list[] = array(
					"value"	 => $value,
					"text"	 => $metricText,
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
			$converter = str_replace("_per_", "-per-", $converter);
			$converterArr = explode("_to_", $converter);
			if(sizeof($converterArr) != 2){
				return;
			}
			
			$this->fromMetric 	= strtolower($converterArr[0]);
			$this->toMetric		= strtolower($converterArr[1]);

			$fromMetricTitle 	= str_replace("-per-", " per ", str_replace("_", " ", $converterArr[0]));
			$toMetricTitle 	= str_replace("-per-", " per ", str_replace("_", " ", $converterArr[1]));
			
			$this->fromMetricTitle	= ucfirst($fromMetricTitle);
			$this->toMetricTitle 	= ucfirst($toMetricTitle);
			
		}
		
		private function getLeftNav(){
			$nav = array();
			$links = null;
			foreach(self::$METRICS as $activeMetric){

				$nav[$activeMetric] = array(
					"title" => preg_replace("/\//"," Per ", $activeMetric) . " Converter",
					"links" => array()
				);
				$links = &$nav[$activeMetric]["links"];
				foreach(self::$METRICS as $metric){
					if($metric == $activeMetric){
						continue;
					}
					$convertFrom = preg_replace("/(\s)+/","-",strtolower($activeMetric));
					$convertFrom = preg_replace("/\//","-per-",strtolower($convertFrom));
					$convertTo = preg_replace("/\s/","-",strtolower($metric));
					$convertTo = preg_replace("/\//","-per-",strtolower($convertTo));
					
					$links[] = array(
						"link" => LiteFrame::BuildFriendlyActionUrl(LiteFrame::getActiveAction(), array("converter" => $convertFrom . "-to-" . $convertTo)),
						"title" => preg_replace("/\//"," per ",$activeMetric) . " to " . preg_replace("/\//"," per ", $metric)
					);
				}
			}
			return $nav;
		}
		
	}
?>
