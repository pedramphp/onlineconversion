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
		KILOGRAM: 2.20462,
		METRIC_TON: 2204.62,
		GRAM: 0.00220462,
		MILLIGRAM: 2.2046e-6,
		MCG: 2.2046e-9,
		LONG_TON: 2240,
		SHORT_TON: 2000, 
		STONE: 14,
		OUNCE: 0.0625 

	},

	KILOGRAM:{
		POUND: 0.453592,
		METRIC_TON:	1000,
		GRAM: 0.001,
		MILLIGRAM: 1e-6,
		MCG:   1e-9,
		LONG_TON: 1016.05,
		SHORT_TON: 907.185, 
		STONE: 6.35029,
		OUNCE: 0.0283495
	},

	METRIC_TON:{
		POUND:         0.000453592,
		KILOGRAM:      0.001,
		GRAM: 1e-6,
		MILLIGRAM: 1e-9,
		MCG: 1e-12,
		LONG_TON: 1.01605,
		SHORT_TON: 1.01605, 
		STONE: 0.00635029,
		OUNCE: 2.835e-5
	},

	GRAM:{
		POUND: 	         453.592,
		KILOGRAM:       1000,
		METRIC_TON:   1e+6,
		MILLIGRAM: 	 0.001,
		MCG: 	 1e-6,
		LONG_TON: 	 1.016e+6,
		SHORT_TON: 	 907185, 
		STONE: 	 6350.29,
		OUNCE: 	 28.3495
	},

	MILLIGRAM:{
		POUND: 	         453592,
		KILOGRAM:       1e+6,
		METRIC_TON:   1e+9,
		GRAM: 	 1000,
		MCG: 	 0.001,
		LONG_TON: 	 1.016e+9,
		SHORT_TON: 	 9.072e+8, 
		STONE: 	 6.35e+6,
		OUNCE: 	 6.35e+6 
	},

	MCG:{
		POUND: 	         4.536e+8,
		KILOGRAM:       1e+9,
		METRIC_TON:   1e+12,
		GRAM: 	 1e+6,
		MILLIGRAM: 	 1000,
		LONG_TON: 	 1.016e+12,
		SHORT_TON: 	 9.072e+11, 
		STONE: 	 6.35e+9,
		OUNCE: 	 2.835e+7 
	},

	LONG_TON:{
		POUND: 	         0.000446429,
		KILOGRAM:       0.000984207,
		METRIC_TON:   0.984207,
		GRAM: 	 9.8421e-7,
		MILLIGRAM:      9.8421e-10,
		MCG:           9.8421e-13,
		SHORT_TON: 	 0.892857, 
		STONE: 	 0.00625,
		OUNCE: 	 2.7902e-5 
	},

	SHORT_TON:{
		POUND: 	         0.0005,
		KILOGRAM:       0.00110231,
		METRIC_TON:   1.10231,
		GRAM: 	 1.1023e-6,
		MILLIGRAM:      1.1023e-9,
		MCG: 	         1.1023e-12,
		LONG_TON: 1.12, 
		STONE: 0.007,
		OUNCE: 3.125e-5 
	},

	STONE:{
		POUND: 	         0.0714286,
		KILOGRAM:       0.157473,
		METRIC_TON:   157.473,
		GRAM: 	 0.000157473,
		MILLIGRAM:      1.5747e-7,
		MCG: 	         1.5747e-10,
		LONG_TON:      160, 
		SHORT_TON: 142.857,
		OUNCE: 	 0.00446429 
	},

	OUNCE:{
		POUND:         16,
		KILOGRAM:      35.274,
		METRIC_TON:  35274,
		GRAM: 0.035274,
		MILLIGRAM: 3.5274e-5,
		MCG: 	         3.5274e-8,
		LONG_TON: 35840, 
		SHORT_TON: 32000,
		STONE: 224 
	}
};



	var weightConvertor = {
		convert: function(fromType, toType, value){

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

			this.registerEvents();

		},

		registerEvents: function(){

			$leftMetricInput
				.add($rightMetricInput)
				.on("keyup", $.proxy(this.convert, this));

			$leftMetricType.on("change", function(){
				$leftMetricInput.trigger("keyup");
			});

			$rightMetricType.on("change", function(){
				$leftMetricInput.trigger("keyup");
			});

			$("#btn-convert-all").on("click", $.proxy(this.convertAll, this));

		},

		convert: function(e){

			leftMetricType = $leftMetricType.find("option:selected").val();
			rightMetricType = $rightMetricType.find("option:selected").val();
		
			if($(e.currentTarget).is($leftMetricInput)){
				leftMetricVal = parseFloat($leftMetricInput.val()) || 0;
				rightMetricVal = weightConvertor.convert(leftMetricType, rightMetricType, leftMetricVal);
				$rightMetricInput.val(rightMetricVal || "");
			}else{	
				rightMetricVal = parseFloat($rightMetricInput.val()) || 0;
				leftMetricVal = weightConvertor.convert(rightMetricType, leftMetricType, rightMetricVal);
				$leftMetricInput.val(leftMetricVal || "");
			}

			$(".result-box p").html(leftMetricVal + " " + this.getVisualType(leftMetricType) + "<span> is eqaul to </span>" + rightMetricVal + " " + this.getVisualType(rightMetricType)).show();

		},

		convertAll: function(e){
			e.preventDefault();
			var rows = "",
				result,
				leftMetricType = $leftMetricType.find("option:selected").val(),
				leftMetricVal = parseFloat($leftMetricInput.val()) || 0,
				counter = 0,
				trClass = "";
			
			rows += "<tr><td rowspan='10' class='main-metric'>" + leftMetricVal + " " + this.getVisualType(leftMetricType) + " =</td></tr>";
			
			for(var toType in CONVERSIONS[leftMetricType.toUpperCase()]){
				trClass = counter % 2 == 0 ? " class='colored'" : "";
				result = weightConvertor.convert(leftMetricType, toType, leftMetricVal);
				rows += "<tr"+trClass+"><td><span>" + result + "</span><span>" + this.getVisualType(toType) + "</span></td></tr>";
				counter++;
			}

			$(".result-box table").html(rows).show().parent().show();
		},

		capitaliseFirstLetter: function(string){
			string = string.toLowerCase();
    		return string.charAt(0).toUpperCase() + string.slice(1);
		},

		getVisualType: function(type){
			return this.capitaliseFirstLetter(type).replace("_","");
		}



	})
}();