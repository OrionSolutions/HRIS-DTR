 $("#btngenerate").click(function () {
	$("#LoadingImages").show();
	$("#btngenerate").attr('disabled',true);
	$("#btngenerate").attr('disabled',true).css({'background-color':'grey'});	
	$("#fileupload").attr('disabled',true);
	$('div#froala-editor').froalaEditor('edit.off');
		var myData = 'bodydescription_txt=' + bodydescription 
		+ '&file_sim=' + encodeURIComponent($("#files").text())
		+ '&subject_txt=' + encodeURIComponent($("#txtsubject").val());
		jQuery.ajax({
		type: "POST", // HTTP method POST or GET
		url: "response.php?TypeID=SendingEmail", //Where to make Ajax calls
		dataType:"text", // Data type, HTML, json etc.
		data:myData,
		success:function(response){
			$("#datavalue").html(response);
			//$("#datavalue").show();
			$("#btngenerate").show(); //show submit button
			$("#LoadingImages").hide(); //hide loading image
			$("#btngenerate").removeAttr('disabled').css({'background-color':'#3498db'});
			$("#txtsubject").removeAttr('disabled');
			$("#fileupload").removeAttr('disabled')
			$('div#froala-editor').froalaEditor('edit.on');
			alert('Email Sent Successfully');
		},
		error:function (xhr, ajaxOptions, thrownError){
			//$("#datavalue").show(); //show submit button
			$("#LoadingImages").hide(); //hide loading image
			$("#btngenerate").removeAttr('disabled');
			alert(thrownError);
		}
		}); 
});