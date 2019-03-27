//$("#mydata").hide();
 $("#btngenerate").click(function () { 
	$("#mydata").hide();
	$("#LoadingImages").show();
	$("#btngenerate").attr('disabled',true);
	$("#btngenerate").attr('disabled',true).css({'background-color':'grey'});	
	$("#fileupload").attr('disabled',true);
	var d = $("#files").text();
			$("#btngenerate").show(); //show submit button
			$("#btngenerate").removeAttr('disabled').css({'background-color':'#3498db'});
			$("#txtsubject").removeAttr('disabled');
			$("#fileupload").removeAttr('disabled')
			/*setTimeout(() => {
			
			}, 3000);*/

		var myData = 'filepath=' + encodeURIComponent(d);
		
		jQuery.ajax( {
			type: "POST",
			url: "response/generatedtr.php?TypeID=UploadData",
			dataType: "text",
			data: myData,
			success: function ( response ) {
				$("#mydata").show(2000);
				$("#LoadingImages").hide(); //hide loading image			
			},

			error: function ( xhr, ajaxOptions, thrownError ) {
				alert( thrownError );
			}

		} );

});