$( document ).on( "click", ".open-Profile", function () {
			var id = $( this ).data( 'id' );
			var url = "jsonobject/json.php?tables=tblemployee&&id=" + id;
			$.getJSON( url, function ( result ) {
				console.log( result );
				$.each( result, function ( i, field ) {
					var EmployeeCode = field.EmployeeCode;
					var Lastname = field.Lastname;
					var Firstname = field.Firstname;
					var Middlename = field.Middlename;
					var CivilStatus = field.CivilStatus;
					var MobileNumber = field.ContactNumber;
					var Birthdate = field.Birthdate;
					var Address = field.Address;
					var Gender = field.Gender;
					var PositionID = field.PositionID;
					var TimeID = field.TimeID;
					var Department = field.DepartmentID;
					var DepartmentCode = field.DepartmentCode;
					$("#txtaccountid").val(id);
					$( "#txtemployeecode" ).val( EmployeeCode );
					$( "#txtlastname" ).val( Lastname );
					$( "#txtfirstname" ).val( Firstname );
					$( "#txtmiddlename" ).val( Middlename );
					$( "#cbocivilstatus" ).val( CivilStatus );
					$( "#txtmobilenumber" ).val( MobileNumber );
					$( "#txtbirthdate" ).val( Birthdate );
					$("#txtaddress").val(Address);
					$("#cbogender").val(Gender).attr('selected','selected');
					$("#cboposition").val(PositionID).attr('selected','selected');
					$("#cbodepartment").val(DepartmentCode).attr('selected','selected');
					$("#cbotime").val(TimeID).attr('selected','selected');;
				} );
			} );




		} );
		
		
		
		
			$( document ).on( "click", ".close-Profile", function () {
			var id = $( this ).data( 'id' );
				
				
				var myData = 'txtaccountid=' + encodeURIComponent(id);
				jQuery.ajax( {
					type: "POST",
					url: "response/employee.php?TypeID=DeleteData",
					dataType: "text",
					data: myData,
					success: function ( response ) {
						setTimeout( function () {
								DeleteMessage();
						}, 10 );
					
							setTimeout( function () {
							window.location.href='employee.php';
						}, 1500 );
						
							
					},

					error: function ( xhr, ajaxOptions, thrownError ) {
						alert( thrownError );
					}

				} );
			

		} );
		
		function DeleteMessage() {
				swal( {
					title: "Deleted!",
					text: "Deleted Data Successfully",
					type: "error",
					timer: 1000
				} );

			
			}
		
		
		
		
				$( '#updateform' ).submit( function ( event ) {
				UpdateAccount();

				event.preventDefault();
			} );

			function PopupMessage() {
				swal( {
					title: "Updated!",
					text: "Data Updated Successfully",
					type: "success",
					timer: 1000
				} );

			
			}

			function UpdateAccount() {
				
				var myData = 'txtemployeecode=' + encodeURIComponent( $( "#txtemployeecode" ).val() ) +
					'&txtlastname=' + encodeURIComponent( $( "#txtlastname" ).val() ) +
					'&txtfirstname=' + encodeURIComponent( $( "#txtfirstname" ).val() ) +
					'&txtmiddlename=' + encodeURIComponent( $( "#txtmiddlename" ).val() ) +
					'&cbocivilstatus=' + encodeURIComponent( $( "#cbocivilstatus" ).val() ) +
					'&txtmobilenumber=' + encodeURIComponent( $( "#txtmobilenumber" ).val() ) +
					'&txtbirthdate=' + encodeURIComponent( $( "#txtbirthdate" ).val() ) +
					'&txtaddress=' + encodeURIComponent( $( "#txtaddress" ).val() ) +
					'&cbogender=' + encodeURIComponent( $( "#cbogender" ).val() ) +
					'&cboposition=' + encodeURIComponent( $( "#cboposition" ).val() ) +
					'&txtaccountid=' + encodeURIComponent( $( "#txtaccountid" ).val() ) +
					'&cbotime=' + encodeURIComponent( $( "#cbotime" ).val() ) +
					'&cbodepartment=' + encodeURIComponent( $( "#cbodepartment" ).val() );
				
				jQuery.ajax( {
					type: "POST",
					url: "response/employee.php?TypeID=UpdateData",
					dataType: "text",
					data: myData,
					success: function ( response ) {
						setTimeout( function () {
							PopupMessage();
						}, 10 );
					
							setTimeout( function () {
							window.location.href='employee.php';
						}, 1500 );

						//$("#test").html(response);
						
							
					},

					error: function ( xhr, ajaxOptions, thrownError ) {
						alert( thrownError );
					}

				} );
				
			}
		



		$( '#saveform' ).submit( function ( event ) {
			SaveAccount();

				event.preventDefault();
			} );

			function PopupMessage() {
				swal( {
					title: "Saved!",
					text: "Data Saved Successfully",
					type: "success",
					timer: 1000
				} );

			
			}

			function SaveAccount() {
				
				var myData = 'txtemployeecode2=' + encodeURIComponent( $( "#txtemployeecode2" ).val() ) +
				'&txtlastname2=' + encodeURIComponent( $( "#txtlastname2" ).val() ) +
				'&txtfirstname2=' + encodeURIComponent( $( "#txtfirstname2" ).val() ) +
				'&txtmiddlename2=' + encodeURIComponent( $( "#txtmiddlename2" ).val() ) +
				'&cbocivilstatus2=' + encodeURIComponent( $( "#cbocivilstatus2" ).val() ) +
				'&txtmobilenumber2=' + encodeURIComponent( $( "#txtmobilenumber2" ).val() ) +
				'&txtbirthdate2=' + encodeURIComponent( $( "#txtbirthdate2" ).val() ) +
				'&txtaddress2=' + encodeURIComponent( $( "#txtaddress2" ).val() ) +
				'&cbogender2=' + encodeURIComponent( $( "#cbogender2" ).val() ) +
				'&cboposition2=' + encodeURIComponent( $( "#cboposition2" ).val() ) +
				'&cbotime2=' + encodeURIComponent( $( "#cbotime2" ).val() ) +
				'&cbodepartment2=' + encodeURIComponent( $( "#cbodepartment2" ).val() );
				jQuery.ajax( {
					type: "POST",
					url: "response/employee.php?TypeID=SaveData",
					dataType: "text",
					data: myData,
					success: function ( response ) {
						setTimeout( function () {
							PopupMessage();
						}, 10 );
					
							setTimeout( function () {
							window.location.href='employee.php';
						}, 1500 );
						
							
					},

					error: function ( xhr, ajaxOptions, thrownError ) {
						alert( thrownError );
					}

				} );
				
			}