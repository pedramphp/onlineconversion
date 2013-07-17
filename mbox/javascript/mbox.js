if (!window.MBOX) {
    window.MBOX = {};
}

// implement JSON.stringify serialization
JSON.stringify = JSON.stringify || function (obj) {
	var t = typeof (obj);
	if (t != "object" || obj === null) {
		// simple data type
		if (t == "string") obj = '"'+obj+'"';
		return String(obj);
	}
	else {
		// recurse array or object
		var n, v, json = [], arr = (obj && obj.constructor == Array);
		for (n in obj) {
			v = obj[n]; t = typeof(v);
			if (t == "string") v = '"'+v+'"';
			else if (t == "object" && v !== null) v = JSON.stringify(v);
			json.push((arr ? "" : '"' + n + '":') + String(v));
		}
		return (arr ? "[" : "{") + String(json) + (arr ? "]" : "}");
	}
};


(function(mbox){
	
	var mboxVars = {};
	
	mbox.init = function(){
		
		mbox.setVariables();
		
	};

	mbox.setVariables = function(){
		mboxVars.applicationPath		= mbox.applicationPath;	
		mboxVars.javascriptPath			= mbox.javascriptPath;
		mboxVars.javascriptLibraryPath	= mbox.javascriptLibraryPath;
		mboxVars.javascriptModulePath	= mbox.javascriptModulePath;
		mboxVars.stylePath				= mbox.stylePath;
		mboxVars.styleLibraryPath		= mbox.styleLibraryPath;
		mboxVars.imagePath				= mbox.imagePath;
		mboxVars.action					= mbox.action;
		mboxVars.actionVars				= $.extend({},mbox.yActionJson);
		delete(mbox.applicationPath);
		delete(mbox.javascriptPath);
		delete(mbox.javascriptLibraryPath);
		delete(mbox.javascriptModulePath);
		delete(mbox.stylePath);
		delete(mbox.styleLibraryPath);
		delete(mbox.imagePath);
		delete(mbox.action);
		delete(mbox.yActionJson);
		
		
	};
			
	mbox.getVars = function(){ return mboxVars; }
	
	mbox.getVar = function(key){ return mboxVars[key]; }

	mbox.getActionVars = function(){ 
		return mboxVars.actionVars; 
	}
	
	mbox.getUrl = function( action, parameters ){
		var path = this.getVar('applicationPath');
		if(action){
			path += '?action='+action;
		}
		for( var property in parameters){
			path += '&'+property+'='+parameters[property]
		}
		return path;
	}; 
	
	mbox.getQueryStringObj = function(){

		var params = window.location.search.split("?"),
			queryStringObj = {},
			splittedParam =[];
		
		if(params.length > 1){
			params = params[1].split("&");
			for(var i = 0; i < params.length; i++){
				splittedParam = params[i].split("=");
				queryStringObj[splittedParam[0]] = splittedParam[1];
			}
		}
		return queryStringObj;
		
	};
	

	
	mbox.jsonRPC = function( config ){
			var base = {
				context: config.scope || document.body,
				data:{
					api: config.api,
					method: config.method,
					config: JSON.stringify(config.data)
				},
				dataType: 'json',
				type: 'POST',
				context: config.scope || document.body,
				url: this.getUrl('jsonrpc')
			};
			delete config.context;
			delete config.api;
			delete config.method;
			delete config.data;
			$.ajax($.extend({},base, config));
	};

})(MBOX);
MBOX.init();
/*
MBOX.jsonRPC({
	api: 'Mahdi',
	method: 'run',
	data: { test: "asdsd" }
});
*/
