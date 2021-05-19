$( document ).ready(function() {
	var screen = $( window ).width();
	if (screen < 916) {
		$('#dynamic-table_info, #dynamic-table_paginate').parent().removeClass('col-xs-6').addClass('col-xs-12'); 	
	}
	
	else{
		$('#dynamic-table_info, #dynamic-table_paginate').parent().removeClass('col-xs-12').addClass('col-xs-6');
	}
	
});


$( window ).resize(function() {
	var screen = $( window ).width();
	if (screen < 916) {
		$('#dynamic-table_info, #dynamic-table_paginate').parent().removeClass('col-xs-6').addClass('col-xs-12'); 	
	 }

	else{
		$('#dynamic-table_info, #dynamic-table_paginate').parent().removeClass('col-xs-12').addClass('col-xs-6');
	}

});