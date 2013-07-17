<?php 
	
	class Title extends SiteObject {
		
		public function __construct(){
			parent::__construct();	
		}
		
		
		public function process(){
			
			$title = "Page Title";
			
			switch(LiteFrame::getActiveAction()){
					case "homepage":
						$title = "Find Products, Like Products, Wish Products"; 
						break;	
			}
			$this->results = $title;
			
		}
		
	}


?>