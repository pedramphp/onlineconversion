<?php

	class WeightLeftNav{


		public function __construct(){
		}

		public function getResult(){

			$nav = array();
			$links = null;
			foreach(WeightPage::$metrics as $activeMetric){

				$nav[$activeMetric] = array(
					"title" => $activeMetric . " Converter",
					"links" => array()
				);
				$links = &$nav[$activeMetric]["links"];
				foreach(WeightPage::$metrics as $metric){
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