<?php

	class WeightLeftNav{


		public function __construct(){
		}

		public function getResult(){
			$metrics = array();
			$metrics[] = "Pound";
			$metrics[] = "Metric ton";
			$metrics[] = "Kilogram";
			$metrics[] = "Gram";
			$metrics[] = "Milligram";
			$metrics[] = "Mcg";
			$metrics[] = "Long ton";
			$metrics[] = "Short ton";
			$metrics[] = "Stone";
			$metrics[] = "Ounce";

			$nav = array();
			$links = null;
			foreach($metrics as $activeMetric){

				$nav[$activeMetric] = array(
					"title" => $activeMetric . " Converter",
					"links" => array()
				);
				$links = &$nav[$activeMetric]["links"];
				foreach($metrics as $metric){
					if($metric == $activeMetric){
						continue;
					}
					$links[] = array(
						"link" => LiteFrame::BuildActionUrl( "weight-converter", array("converter" => str_replace(" ","-",strtolower($activeMetric)) . "-to-" . str_replace(" ","-",strtolower($metric)))),
						"title" => $activeMetric . " to " . $metric
					);
				}
			}
			return $nav;

		}
	};

?>