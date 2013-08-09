$(document).ready(function(){

	converter.init();
	
	$(".main-nav li:has(ul)").on("hover", function(){
		$(this).children("a").toggleClass("hovered");
		$(this).find("ul").toggle();
	})
	

});

var converter = function(){

	var $leftMetricInput 	= $("#metric-input-left"),
		$leftMetricType 	= $("#metric-type-left"),
		$rightMetricInput	= $("#metric-input-right"),
		$rightMetricType 	= $("#metric-type-right"),
		leftMetricVal,
		rightMetricVal,
		actionName 			= MBOX.getVar("action").replace(/-([a-z]*)$/,"").replace(/-([a-z])/g, function (g) { return g[1].toUpperCase() }),
		siteData			= MBOX.getActionVars().SiteData,
		conversionData		= siteData[actionName+"Page"],
		CONVERSIONS 		= conversionData.conversionTable,
		converterTitle		= conversionData.converterTitle;
	
	
	var onlineConverter = {
		convert: function(fromType, toType, value){

			var toType, fromType;

			if(value <= 0){
				return 0;
			}
			
			toType 	 = toType.toUpperCase().replace("/","-PER-");
			fromType = fromType.toUpperCase().replace("/","-PER-");
			if(toType == fromType){
				return value;
			}
			if(actionName == "temperature"){
				result = this.convertTemperature(toType, fromType, value);
			}else{
				result = CONVERSIONS[toType][fromType] * value;
			}
			return result;
		},
		
		convertTemperature: function(toType, fromType, value){
			var result;
			if(toType == "FAHRENHEIT" && fromType == "KELVIN"){
				
				result = 9/5 * (value - 273) + 32;
			
			}else if(toType == "FAHRENHEIT" && fromType == "CELSIUS"){
				
				result = 9/5 * (value) + 32;
			
			}else if(toType == "KELVIN" && fromType == "FAHRENHEIT"){
				
				result = 5/9 * ( value - 32) + 273;
			
			}else if(toType == "KELVIN" && fromType == "CELSIUS"){
				
				result = value + 273;
			
			}else if(toType == "CELSIUS" && fromType == "KELVIN"){
			
				result = value - 273;
			
			}else if(toType == "CELSIUS" && fromType == "FAHRENHEIT"){
			
				result = (value - 32) * 5/9;
			
			}
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


			$leftMetricInput.trigger("keyup");

			$(".swap-icon").on("click", $.proxy(this.swap, this));
			
			$(".converts-list li h2").on("click", function(){
				$(this).find("a").toggleClass("active");
				$(this).next("nav").toggle();
			});

			$(".side-nav .title a").on("click", function(){
				$(".side-nav .title a").text(function(index, text){
					if("(Collapse all)" == text){
						text ="(Expand all)";
						$(".converts-list li h2").find("a")
							.removeClass("active")
							.end().next("nav").hide();
					}else{
						text ="(Collapse all)";
						$(".converts-list li h2").find("a")
							.addClass("active")
							.end().next("nav").show();
					}


					return text;
				});
			});

		},

		swap: function(e){
			e.preventDefault();
			leftMetricType = $leftMetricType.find("option:selected").val();
			rightMetricType = $rightMetricType.find("option:selected").val();

			leftMetricVal = parseFloat($leftMetricInput.val()) || 0;

			rightMetricVal = parseFloat($rightMetricInput.val()) || 0;

			$rightMetricType.find("[value='"+leftMetricType+"']").attr("selected", true);
			$leftMetricType.find("[value='"+rightMetricType+"']").attr("selected", true);
			$rightMetricInput.val(leftMetricVal);
			$leftMetricInput.val(rightMetricVal);
			this.convertAll();

		},

		convert: function(e){
			if(e.keyCode == 9){
				return; //ignore tab
			}
			leftMetricType = $leftMetricType.find("option:selected").val();
			rightMetricType = $rightMetricType.find("option:selected").val();
		
			if($(e.currentTarget).is($leftMetricInput)){
				leftMetricVal = parseFloat($leftMetricInput.val()) || 0;

				rightMetricVal = onlineConverter.convert(leftMetricType, rightMetricType, leftMetricVal);
				$rightMetricInput.val(rightMetricVal || "");
			}else{	
				rightMetricVal = parseFloat($rightMetricInput.val()) || 0;
				leftMetricVal = onlineConverter.convert(rightMetricType, leftMetricType, rightMetricVal);
				$leftMetricInput.val(leftMetricVal || "");
			}

			$(".result-box p").html(leftMetricVal + " " + this.getVisualType(leftMetricType) + "<span> is equal to </span>" + rightMetricVal + " " + this.getVisualType(rightMetricType));
			this.convertAll();
			this.changeWikiHtml(leftMetricType, rightMetricType);
			
			var from = leftMetricType.replace(/_/," ").replace(/\//," per ");
			var to = rightMetricType.replace(/_/," ").replace(/\//," per ");
			$(".middle-content h1").html(converterTitle + " - " + from + " to " + to);

		},

		convertAll: function(){
			var rows = "",
				result,
				leftMetricType = $leftMetricType.find("option:selected").val(),
				leftMetricVal = parseFloat($leftMetricInput.val()) || 0,
				counter = 0,
				trClass = "";
			
			rows += "<tr><td rowspan='10' class='main-metric'>" + leftMetricVal + " " + this.getVisualType(leftMetricType) + " =</td></tr>";
			for(var toType in CONVERSIONS[leftMetricType.toUpperCase().replace("/","-PER-")]){
				trClass = counter % 2 == 0 ? " class='colored'" : "";
				result = onlineConverter.convert(leftMetricType, toType, leftMetricVal);
				rows += "<tr"+trClass+"><td><span>" + result + "</span><span>" + this.getVisualType(toType) + "</span></td></tr>";
				counter++;
			}

			$(".result-box table").html(rows);
		},

		capitaliseFirstLetter: function(string){
			string = string.toLowerCase();
    		return string.charAt(0).toUpperCase() + string.slice(1);
		},

		getVisualType: function(type){
			return this.capitaliseFirstLetter(type).replace(/_/," ").replace(/-per-/,"/");
		},

		changeWikiHtml: function(leftMetricType, rightMetricType){
			$.ajax({
				type: "POST",
				data:{
					from: leftMetricType.toLowerCase().replace("/","-per-"),
					to: rightMetricType.toLowerCase().replace("/","-per-")
				},
				url: MBOX.getVars().applicationPath + "?action=converter-ajax",
				success: function(data){
					var $data = $("<div />").html(data);
					$(".additional-info").html($data);
				}
			});
		}
	})
}();
