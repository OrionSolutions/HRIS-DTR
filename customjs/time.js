$( document ).on( "click", ".open-Profile", function () {
    var id = $( this ).data( 'id' );
    var url = "jsonobject/json.php?tables=tbltimeconfiguration&&id=" + id;
    $.getJSON( url, function ( result ) {
        console.log( result );
        $.each( result, function ( i, field ) {
            var morningIn = field.MorningIn;
            var morningOut = field.MorningOut;
            var afternoonIn = field.AfternoonIn;
            var afternoonOut = field.AfternoonOut;
            var overtimeIn = field.Overtimein;
            var overtimeOut = field.Overtimeout;
            $("#timeid").val(id);
            $("#txtmorningin").val(morningIn);
            $("#txtafternoonout").val(afternoonOut);
            $("#txtafternoonin").val(afternoonIn); 
            $("#txtovertimein").val(overtimeIn); 
            $("#txtovertimeout").val(overtimeOut);
            $("#txtmorningout").val(morningOut);
            

        } );
    } );
} );


    $( document ).on( "click", ".close-Profile", function () {
    var id = $( this ).data( 'id' );
        
        
        var myData = 'timeid=' + encodeURIComponent(id);
        jQuery.ajax( {
            type: "POST",
            url: "response/time.php?TypeID=DeleteData",
            dataType: "text",
            data: myData,
            success: function ( response ) {
                setTimeout( function () {
                        DeleteMessage();
                }, 10 );
            
                    setTimeout( function () {
                    window.location.href='time.php';
                    //$('#lols').html(response);
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
       
        var myData = 'txtmorningin=' + encodeURIComponent( $( "#txtmorningin" ).val() ) +
        '&txtafternoonout=' + encodeURIComponent( $( "#txtafternoonout" ).val() ) +
        '&txtafternoonin=' + encodeURIComponent( $( "#txtafternoonin" ).val() ) +
        '&txtovertimein=' + encodeURIComponent( $( "#txtovertimein" ).val() ) +
        '&txtovertimeout=' + encodeURIComponent( $( "#txtovertimeout" ).val() ) +
        '&timeid=' + encodeURIComponent( $( "#timeid" ).val() ) +
        '&txtmorningout=' + encodeURIComponent( $( "#txtmorningout" ).val() );
        

        jQuery.ajax( {
            type: "POST",
            url: "response/time.php?TypeID=UpdateData",
            dataType: "text",
            data: myData,
            success: function ( response ) {
                setTimeout( function () {
                    PopupMessage();
                }, 10 );
            
                    setTimeout( function () {
                    window.location.href='time.php';
                    //$("#lols").html(response);
                }, 1500 );

                //$("#test").html(response);
                
                    
            },

            error: function ( xhr, ajaxOptions, thrownError ) {
                alert( thrownError );
            }

        } );
        
    }




$( '#saveform' ).submit( function ( event ) {
    SaveTime();

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

    function SaveTime() {
        
        var myData = 'txtmorningin2=' + encodeURIComponent( $( "#txtmorningin2" ).val() ) +
            '&txtafternoonout2=' + encodeURIComponent( $( "#txtafternoonout2" ).val() ) +
            '&txtafternoonin2=' + encodeURIComponent( $( "#txtafternoonin2" ).val() ) +
            '&txtovertimein2=' + encodeURIComponent( $( "#txtovertimein2" ).val() ) +
            '&txtovertimeout2=' + encodeURIComponent( $( "#txtovertimeout2" ).val() ) +
            '&txtmorningout2=' + encodeURIComponent( $( "#txtmorningout2" ).val() );

        jQuery.ajax( {
            type: "POST",
            url: "response/time.php?TypeID=SaveData",
            dataType: "text",
            data: myData,
            success: function ( response ) {
                setTimeout( function () {
                    PopupMessage();
                }, 10 );
            
                    setTimeout( function () {
                    window.location.href='time.php';
                    //$('#lols').html(response);
                }, 1500 );
                
                    
            },

            error: function ( xhr, ajaxOptions, thrownError ) {
                alert( thrownError );
            }

        } );
        
    }