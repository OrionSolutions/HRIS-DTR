$( document ).on( "click", ".open-Profile", function () {
			var AccountID = $( this ).data( 'id' );
			var url = "jsonobject/json.php?tables=tblaccount&&id=" + AccountID;
			$.getJSON( url, function ( result ) {
				console.log( result );
				$.each( result, function ( i, field ) {
					var AccountID = field.AccountID;
					var Lastname = field.Lastname;
					var Firstname = field.Firstname;
					var EmailAdd = field.EmailAdd;
					var MobileNumber = field.MobileNumber;
					var Gender = field.Gender;
					var Address = field.Address;
					var Username = field.Username;
					var Password = field.Password;
					var UserType = field.UserType;
					$( "#txtaccountid" ).val( AccountID );
					$( "#txtlastname" ).val( Lastname );
					$( "#txtfirstname" ).val( Firstname );
					$( "#txtemail" ).val( EmailAdd );
					$( "#txtmobilenumber" ).val( MobileNumber );
					$( "#txtaddress" ).val( Address );
					$( "#txtusername" ).val( Username );
					$("#cbogender").val(Gender);
					$("#cbousertype").val(UserType);
				} );
			} );




		} );
		
		
		
		
			$( document ).on( "click", ".close-Profile", function () {
			var AccountID = $( this ).data( 'id' );
				
				
				var myData = 'txtaccountid=' + encodeURIComponent(AccountID);
				jQuery.ajax( {
					type: "POST",
					url: "response/user-module.php?TypeID=DeleteData",
					dataType: "text",
					data: myData,
					success: function ( response ) {
				
						setTimeout( function () {
								DeleteMessage();
						}, 10 );
					
							setTimeout( function () {
							window.location.href='user-module.php';
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
				
				var myData = 'txtlastname=' + encodeURIComponent( $( "#txtlastname" ).val() ) +
					'&txtfirstname=' + encodeURIComponent( $( "#txtfirstname" ).val() ) +
					'&txtemail=' + encodeURIComponent( $( "#txtemail" ).val() ) +
					'&txtmobilenumber=' + encodeURIComponent( $( "#txtmobilenumber" ).val() ) +
					'&txtaddress=' + encodeURIComponent( $( "#txtaddress" ).val() ) +
					'&cbogender=' + encodeURIComponent( $( "#cbogender" ).val() ) +
					'&cbousertype=' + encodeURIComponent( $( "#cbousertype" ).val() ) +
					'&txtusername=' + encodeURIComponent( $( "#txtusername" ).val() ) +
					'&txtaccountid=' + encodeURIComponent( $( "#txtaccountid" ).val() ) +
					'&txtpassword=' + encodeURIComponent( $( "#txtpassword" ).val() );
				jQuery.ajax( {
					type: "POST",
					url: "response/user-module.php?TypeID=UpdateData",
					dataType: "text",
					data: myData,
					success: function ( response ) {
						setTimeout( function () {
							PopupMessage();
						}, 10 );
					
							setTimeout( function () {
							window.location.href='user-module.php';
						}, 1500 );
						
							
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
				
				var myData = 'txtlastname=' + encodeURIComponent( $( "#txtlastname2" ).val() ) +
					'&txtfirstname=' + encodeURIComponent( $( "#txtfirstname2" ).val() ) +
					'&txtemail=' + encodeURIComponent( $( "#txtemail2" ).val() ) +
					'&txtmobilenumber=' + encodeURIComponent( $( "#txtmobilenumber2" ).val() ) +
					'&txtaddress=' + encodeURIComponent( $( "#txtaddress2" ).val() ) +
					'&cbogender=' + encodeURIComponent( $( "#cbogender2" ).val() ) +
					'&cbousertype=' + encodeURIComponent( $( "#cbousertype2" ).val() ) +
					'&txtusername=' + encodeURIComponent( $( "#txtusername2" ).val() ) +
					'&txtpassword=' + encodeURIComponent( $( "#txtpassword2" ).val() );
				jQuery.ajax( {
					type: "POST",
					url: "response/user-module.php?TypeID=SaveData",
					dataType: "text",
					data: myData,
					success: function ( response ) {
						setTimeout( function () {
							PopupMessage();
						}, 10 );
					
							setTimeout( function () {
							window.location.href='user-module.php';
						}, 1500 );
						
							
					},

					error: function ( xhr, ajaxOptions, thrownError ) {
						alert( thrownError );
					}

				} );
				
			}