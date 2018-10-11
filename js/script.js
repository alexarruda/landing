$(document).ready(function () {	
	$.getJSON('js/loadStates.json', function (data) {
		var items = [];
		var options = '<option value="">UF</option>';	

		$.each(data, function (key, val) {
			options += '<option value="' + val.sigla + '">' + val.sigla + '</option>';
		});	

		$("#state").html(options);				
		
		$("#state").change(function () {				
			var optionsCity = '';
			var str = "";					
			
			$("#state option:selected").each(function () {
				str += $(this).text();
			});
			
			$.each(data, function (key, val) {
				if(val.sigla == str) {							
					$.each(val.cidades, function (keyCity, valCity) {
						optionsCity += '<option value="' + valCity + '">' + valCity + '</option>';
					});							
				}
			});

			$("#city").html(optionsCity);
			
		}).change();		
	
	});

});