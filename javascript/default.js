$(document).ready(function(){

	converter.init();

});

var converter = function(){

	var $leftMetricInput 	= $("#metric-input-left"),
		$leftMetricType 	= $("#metric-type-left"),
		$rightMetricInput	= $("#metric-input-right"),
		$rightMetricType 	= $("#metric-type-right"),
		leftMetricVal,
		rightMetricVal;

	var CONVERSIONS = {
		POUND:{
			KILOGRAM: 	2.20462,
			METRIC_TON: 2204.62,
			GRAM: 		0.00220462,
			MILLIGRAM: 	2.2046e-6,
			MCG: 		2.2046e-9,
			LONG_TON: 	2240,
			SHORT_TON: 	2000, 
			STONE: 		14,
			OUNCE: 		0.0625 
		},
		
		KILOGRAM:{
			POUND: 	2.20462,
			METRIC_TON: 2204.62,
			GRAM: 		0.00220462,
			MILLIGRAM: 	2.2046e-6,
			MCG: 		2.2046e-9,
			LONG_TON: 	2240,
			SHORT_TON: 	2000, 
			STONE: 		14,
			OUNCE: 		0.0625 
		},

		METRIC_TON:{
			POUND: 	2.20462,
			KILOGRAM: 2204.62,
			GRAM: 		0.00220462,
			MILLIGRAM: 	2.2046e-6,
			MCG: 		2.2046e-9,
			LONG_TON: 	2240,
			SHORT_TON: 	2000, 
			STONE: 		14,
			OUNCE: 		0.0625 
		},

		GRAM:{
			POUND: 	2.20462,
			KILOGRAM: 2204.62,
			METRIC_TON: 0.00220462,
			MILLIGRAM: 	2.2046e-6,
			MCG: 		2.2046e-9,
			LONG_TON: 	2240,
			SHORT_TON: 	2000, 
			STONE: 		14,
			OUNCE: 		0.0625 
		},

		MILLIGRAM:{
			POUND: 	2.20462,
			KILOGRAM: 2204.62,
			METRIC_TON: 0.00220462,
			GRAM: 		2.2046e-6,
			MCG: 		2.2046e-9,
			LONG_TON: 	2240,
			SHORT_TON: 	2000, 
			STONE: 		14,
			OUNCE: 		0.0625 
		},

		MCG:{
			POUND: 	2.20462,
			KILOGRAM: 2204.62,
			METRIC_TON: 0.00220462,
			GRAM: 		2.2046e-6,
			MILLIGRAM: 		2.2046e-9,
			LONG_TON: 	2240,
			SHORT_TON: 	2000, 
			STONE: 		14,
			OUNCE: 		0.0625 
		},	

		LONG_TON:{
			POUND: 	2.20462,
			KILOGRAM: 2204.62,
			METRIC_TON: 0.00220462,
			GRAM: 		2.2046e-6,
			MILLIGRAM: 		2.2046e-9,
			MCG: 	2240,
			SHORT_TON: 	2000, 
			STONE: 		14,
			OUNCE: 		0.0625 
		},		

		SHORT_TON:{
			POUND: 	2.20462,
			KILOGRAM: 2204.62,
			METRIC_TON: 0.00220462,
			GRAM: 		2.2046e-6,
			MILLIGRAM: 		2.2046e-9,
			MCG: 	2240,
			LONG_TON: 	2000, 
			STONE: 		14,
			OUNCE: 		0.0625 
		},	

		STONE:{
			POUND: 	2.20462,
			KILOGRAM: 2204.62,
			METRIC_TON: 0.00220462,
			GRAM: 		2.2046e-6,
			MILLIGRAM: 		2.2046e-9,
			MCG: 	2240,
			LONG_TON: 	2000, 
			SHORT_TON: 		14,
			OUNCE: 		0.0625 
		},	

		OUNCE:{
			POUND: 	2.20462,
			KILOGRAM: 2204.62,
			METRIC_TON: 0.00220462,
			GRAM: 		2.2046e-6,
			MILLIGRAM: 		2.2046e-9,
			MCG: 	2240,
			LONG_TON: 	2000, 
			SHORT_TON: 		14,
			STONE: 		0.0625 
		}		
	};

	var weightConvertor = {
		convert: function(fromType, toType, value){

			//console.log(arguments);
			var toType, fromType;

			if(value <= 0){
				return 0;
			}
			
			toType 	 = toType.toUpperCase();
			fromType = fromType.toUpperCase();
			if(toType == fromType){
				return value;
			}
			result = CONVERSIONS[toType][fromType] * value;
			return result;
		}
	};

	return({

		init: function(){

			this.registerEvents()

		},

		registerEvents: function(){

			$leftMetricInput
				.add($rightMetricInput)
				.on("keyup", $.proxy(this.convert, this));

			$leftMetricType.on("change", function(){
				$leftMetricInput.trigger("keyup");
			});

			$rightMetricType.on("change", function(){
				$rightMetricInput.trigger("keyup");
			});


		},

		convert: function(e){

			leftMetricType = $leftMetricType.find("option:selected").val();
			rightMetricType = $rightMetricType.find("option:selected").val();
		
			if($(e.currentTarget).is($leftMetricInput)){
				leftMetricVal = parseFloat($leftMetricInput.val()) || 0;
				rightMetricVal = weightConvertor.convert(leftMetricType, rightMetricType, leftMetricVal);
				$rightMetricInput.val(rightMetricVal);
			}else{	
				rightMetricVal = parseFloat($rightMetricInput.val()) || 0;
				leftMetricVal = weightConvertor.convert(rightMetricType, leftMetricType, rightMetricVal);
				$leftMetricInput.val(leftMetricVal);
			}
		}

	})
}();