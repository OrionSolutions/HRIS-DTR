$( document ).on( "click", ".open-Profile", function () {
    var id = $( this ).data( 'id' );
    var url = "jsonobject/json.php?tables=tblaccount&&id=" + id;
    $.getJSON( url, function ( result ) {
        console.log( result );
        $.each( result, function ( i, field ) {
            var Username = field.Username;
            var Password = field.Password;
            var UserType = field.UserType;
            $("#accountid").val(id);
            $( "#txtusername" ).val( Username );
            $( "#txtpassword" ).val( Password );
            $( "#txtconfirmpassword" ).val( Password );
            $( "#cbousertype" ).val( UserType );
        } );
    } );




} );




    $( document ).on( "click", ".close-Profile", function () {
    var id = $( this ).data( 'id' );
        var myData = 'accountid=' + encodeURIComponent(id);
        jQuery.ajax( {
            type: "POST",
            url: "response/account.php?TypeID=DeleteData",
            dataType: "text",
            data: myData,
            success: function ( response ) {
                setTimeout( function () {
                        DeleteMessage();
                }, 10 );
            
                    setTimeout( function () {
                    window.location.href='account.php';
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
        if($("#txtpassword").val() == $("#txtconfirmpassword").val()){
            
        var myData = 'txtusername=' + encodeURIComponent( $( "#txtusername" ).val() ) +
            '&txtpassword=' + encodeURIComponent( $( "#txtpassword" ).val() ) +
            '&txtusertype=' + encodeURIComponent( $( "#cbousertype" ).val() ) +
            '&accountid=' + encodeURIComponent( $( "#accountid" ).val() );
        
        jQuery.ajax( {
            type: "POST",
            url: "response/account.php?TypeID=UpdateData",
            dataType: "text",
            data: myData,
            success: function ( response ) {
                setTimeout( function () {
                    PopupMessage();
                }, 10 );
            
                    setTimeout( function () {
                    window.location.href='account.php';
                    //$("#lol").html(response);
                }, 1500 );

                //$("#test").html(response);
                
                    
            },

            error: function ( xhr, ajaxOptions, thrownError ) {
                alert( thrownError );
            }

        } );
        }else{
            $("#mismatch").css("color","#e74c3c"); 
            $("#mismatch").css("text-align","center"); 
            $("#mismatch").html("Password mismatch!");
            $("#txtconfirmpassword").on("click",function(){
                $( "#txtconfirmpassword" ).val("");
            });
        }
        
    }




$( '#saveform' ).submit( function ( event ) {
    SaveDepartment();

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

    function SaveDepartment() {
        
        var myData = 'txtusername2=' + encodeURIComponent( $( "#txtusername2" ).val() ) +
        '&txtpassword2=' + encodeURIComponent( $( "#txtpassword2" ).val() ) +
        '&cbousertype2=' + encodeURIComponent( $( "#cbousertype2" ).val() );
        jQuery.ajax( {
            type: "POST",
            url: "response/account.php?TypeID=SaveData",
            dataType: "text",
            data: myData,
            success: function ( response ) {
                setTimeout( function () {
                    PopupMessage();
                }, 10 );
            
                    setTimeout( function () {
                    $('#lol').html(response);
                    window.location.href='account.php';
                }, 1500 );
                
                    
            },

            error: function ( xhr, ajaxOptions, thrownError ) {
                alert( thrownError );
            }

        } );
        
    }