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

			var d1 = $("#txtStart").val();
			var d2 = $("#txtEnd").val();
			var myData = 'filepath=' + encodeURIComponent(d) +
			'&startDate=' + encodeURIComponent(d1) +
			'&endDate=' + encodeURIComponent(d2);
		alert(myData);
		jQuery.ajax( {
			type: "POST",
			url: "response/generatedtr.php?TypeID=UploadData",
			dataType: "text",
			data: myData,
			success: function ( response ) {
				alert(response);
				$("#mydata").show(2000);
				$("#LoadingImages").hide(); //hide loading image			
			},

			error: function ( xhr, ajaxOptions, thrownError ) {
				alert( thrownError );
			}

		} );

});