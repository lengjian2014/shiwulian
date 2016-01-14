$(function(){
	$(document).on("click", ".content-loading", function(){
		var url = $(this).attr("next-url");
		if(url != ""){
			var self = this;
			$.ajax( {
                url: url,
                type: "GET",
                success: function(data) {
                	$(self).parents(".main-content:first").append(data);
                	$(self).parents(".row:first").remove();
                }
            });
		}
		
	});
})