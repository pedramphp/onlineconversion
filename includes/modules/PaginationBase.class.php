<?php

	class PaginationBase{
		public static $START = "start";
		private $pageSize;
		private $activePageNum;
		private $total;
		private $baseUrl;
		private $parameters;
		private $links = array();

		public static $LOOP_GAP = 3;
		public function __construct($pagesize = 0, $activePageNum = 0, $total = 0, $baseUrl = "", $parameters = array()){
			$args = func_get_args(); 
			if(empty($args)){
				return;
			}
			$this->setActivePageNum($activePageNum);
			$this->setPageSize($pagesize);
			$this->setTotal($total);
			$this->setBaseUrl($baseUrl);
			$this->setParameters($parameters);
			$this->buildPagination();
		}
		
		public function setBaseUrl($baseUrl){
			$this->baseUrl = $baseUrl;
		}
		
		public function getBaseUrl(){
			return $this->baseUrl;
		}
		
		public function setParameters($parameters){
			$this->parameters = $parameters;
		}
		
		public function getParamters(){
			return $this->parameters;
		}
		
		public function setPageSize($pagesize){
			$this->pageSize = $pagesize;
		}
		
		public function getPageSize(){
			return $this->pageSize;
		}
		
		public function getActivePageNum(){
			return $this->activePageNum; 
		}
		
		public function setActivePageNum($activePageNum){
			$this->activePageNum = $activePageNum;
		}
		
		public function getTotal(){
			return $this->total; 
		}
		
		public function setTotal($total){
			$this->total = $total;
		}
		
		public function buildPagination(){
			if(!empty($this->links)){
				return $this->getLinks();
			}
			$active = false;
			$pages = array();
			$this->links = array();
			$totalPages = ceil($this->total / $this->pageSize);
			
			if( $this->activePageNum <= self::$LOOP_GAP){
				$loopStart = 1;	
				$loopSize = min($totalPages,self::$LOOP_GAP * 2 +1);
			}else if( $totalPages - $this->activePageNum <= self::$LOOP_GAP){
				$loopStart = $totalPages - self::$LOOP_GAP * 2;
				$loopSize = min($totalPages, $loopStart + (self::$LOOP_GAP * 2));
				
			}else{
				$loopStart = $this->activePageNum - self::$LOOP_GAP;
				$loopSize = min($totalPages,$loopStart + (self::$LOOP_GAP * 2));
			}
			
			if($loopStart < 1){
				$loopStart = 1;
			}

			for( $i = $loopStart; $i <= $loopSize; $i++){
				$pages[] = $this->buildLink($i, $i,  ( $i == $this->activePageNum) ? true : false);
			}
			$this->links["prev"] =  $this->buildLink( $this->activePageNum == 1 ?  1 : ($this->activePageNum - 1), "prev",  false, $this->activePageNum == 1 );
			$this->links["next"] =  $this->buildLink( $this->activePageNum == $totalPages ?  $totalPages : ($this->activePageNum + 1), "next",  false, $this->activePageNum == $totalPages );
			$this->links["first"] =  $this->buildLink( 1, "first",  false, $this->activePageNum == 1 );
			$this->links["last"]  =  $this->buildLink( $totalPages, "last",  false, $this->activePageNum == $totalPages );
			$this->links["pages"] = $pages;
			$this->links["activePageNmber"] = $this->activePageNum;
			$this->links["totalPages"] = $totalPages;
			
			return $this->links;
			
		}
		
		private function buildLink($pageNum, $pageTitle, $active, $disable = false){
				$link = array();
				$link["active"] = $active;
				$link["pageNum"] = $pageNum;
				$link["pageTitle"] = $pageTitle;
				$qORamp = "&amp;";
				if(strrpos($this->baseUrl , '?') === false){
					$qORamp = "?";
				}
				
				$link["link"] = $this->baseUrl . $qORamp . self::$START . "=" . (($pageNum-1) *($this->pageSize)+1) . "&amp;" . http_build_query($this->parameters,'', '&amp;');
				$link["disable"] = $disable;
				return $link;
		}
		
		public function getLinks(){
			return $this->links;
		}
		
	}


?>