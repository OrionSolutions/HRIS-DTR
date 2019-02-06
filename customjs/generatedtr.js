$("#mydata").hide();
 $("#btngenerate").click(function () { 
	$("#LoadingImages").show();
	$("#btngenerate").attr('disabled',true);
	$("#btngenerate").attr('disabled',true).css({'background-color':'grey'});	
	$("#fileupload").attr('disabled',true);
	var d = $("#files").text();
	alert(d);
			$("#btngenerate").show(); //show submit button
			$("#btngenerate").removeAttr('disabled').css({'background-color':'#3498db'});
			$("#txtsubject").removeAttr('disabled');
			$("#fileupload").removeAttr('disabled')
			setTimeout(() => {
				$("#mydata").show(2000);
				$("#LoadingImages").hide(); //hide loading image
			}, 3000);

});