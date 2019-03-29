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
		jQuery.ajax( {
			type: "POST",
			url: "response/generatedtr.php?TypeID=UploadData",
			dataType: "text",
			data: myData,
			success: function ( response ) {
				$("#mydata").hide(2000);
				ImportedMessage();
				if($.trim(response==1)) {
					jQuery.ajax( {
						type: "POST",
						url: "response/generatedtr.php?TypeID=RecomputeDTR",
						dataType: "text",
						data: myData,
						success: function ( response ) {
							$("#mydata").show(2000);
							$("#LoadingImages").hide(); //hide loading image		
							ComputedMessage();
							setTimeout(() => {
								location.reload();		
							}, 5000);

						},
			
						error: function ( xhr, ajaxOptions, thrownError ) {
							alert( thrownError );
						}
			
					} );
				}			
			},

			error: function ( xhr, ajaxOptions, thrownError ) {
				alert( thrownError );
			}

		} );

});

function ImportedMessage() {
	swal( {
		title: "Imported Successfully!",
		text: "Data will now Auto Compute the regular and OT hours.",
		type: "success",
		timer: 5000
	} );
}


function ComputedMessage() {
	swal( {
		title: "Auto Compute Successfully!",
		text: "Page will now refresh in 3 seconds.",
		type: "success",
		timer: 3000
	} );
}