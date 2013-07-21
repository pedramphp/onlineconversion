<?php 

	class Urls extends SiteObject {
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
		
			
			$siteUrls = array();
			$siteUrls["about"] = LiteFrame::BuildActionUrl( "about" );
			$siteUrls["contact"] = LiteFrame::BuildActionUrl( "contact" );
			
			$external = array();
			$external["mexoinc"] = "http://www.mexoinc.com";
			$external["facebook"] = "https://facebook.com";
			$external["twitter"] = "https://twitter.com";
			$external["googleplus"] = "https://plus.google.com";
			
			$globalUrls = array();
			$globalUrls["tel_number"] = "+1-888-756-4666";
			
			$this->results = array(
				"site" 		=> $siteUrls,
				"external"	=> $external,
				"globalUrl"	=> $globalUrls
			);
		}
		
		
		public static function getProfileUrl($userId){
			return LiteFrame::BuildActionUrl( "profile", array("user_id" => $userId));
		}
		
		public static function getUserReviewsUrl($userId){
			return LiteFrame::BuildActionUrl( "user-reviews", array("user_id" => $userId));
		}
		
		public static function getUserLikesUrl($userId){
			return LiteFrame::BuildActionUrl( "user-likes", array("user_id" => $userId));
		}
				
		public static function getUserOwnsUrl($userId){
			return LiteFrame::BuildActionUrl( "user-owns", array("user_id" => $userId));
		}
						
		public static function getUserWishesUrl($userId){
			return LiteFrame::BuildActionUrl( "user-wishes", array("user_id" => $userId));
		}
		
		public static function getProductUrl($productId){
			return LiteFrame::BuildActionUrl( "product", array("product_id" => $productId));
		}
		
		public static function getProductReviewsUrl($productId){
			return LiteFrame::BuildActionUrl( "product-reviews", array("product_id" => $productId));
		}
		
		public static function getUserFollowingsUrl($productId){
			return LiteFrame::BuildActionUrl( "followings", array("user_id" => $productId));
		}
		
		public static function getUserFollowersUrl($productId){
			return LiteFrame::BuildActionUrl( "followers", array("user_id" => $productId));
		}
		
	}
?>