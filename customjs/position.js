$( document ).on( "click", ".open-Profile", function () {
    var id = $( this ).data( 'id' );
    var url = "jsonobject/json.php?tables=tblposition&&id=" + id;
    $.getJSON( url, function ( result ) {
        console.log( result );
        $.each( result, function ( i, field ) {
            var positionTitle = field.PositionTitle;
            var positionDesc = field.PositionDesc;
            $("#positionid").val(id);
            $( "#txtpositiontitle" ).val( positionTitle );
            $( "#txtpositiondesc" ).val( positionDesc );
        } );
    } );




} );




    $( document ).on( "click", ".close-Profile", function () {
    var id = $( this ).data( 'id' );
        
        
        var myData = 'positionid=' + encodeURIComponent(id);
        jQuery.ajax( {
            type: "POST",
            url: "response/position.php?TypeID=DeleteData",
            dataType: "text",
            data: myData,
            success: function ( response ) {
                setTimeout( function () {
                        DeleteMessage();
                }, 10 );
            
                    setTimeout( function () {
                    window.location.href='position.php';
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
        
        var myData = 'txtpositiontitle=' + encodeURIComponent( $( "#txtpositiontitle" ).val() ) +
            '&txtpositiondesc=' + encodeURIComponent( $( "#txtpositiondesc" ).val() ) +
            '&positionid=' + encodeURIComponent( $( "#positionid" ).val() );
        
        jQuery.ajax( {
            type: "POST",
            url: "response/position.php?TypeID=UpdateData",
            dataType: "text",
            data: myData,
            success: function ( response ) {
                setTimeout( function () {
                    PopupMessage();
                }, 10 );
            
                    setTimeout( function () {
                    window.location.href='position.php';
                    //$("#lol").html(response);
                }, 1500 );

                //$("#test").html(response);
                
                    
            },

            error: function ( xhr, ajaxOptions, thrownError ) {
                alert( thrownError );
            }

        } );
        
    }




$( '#saveform' ).submit( function ( event ) {
    SavePosition();

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

    function SavePosition() {
        
        var myData = 'txtpositiontitle2=' + encodeURIComponent( $( "#txtpositiontitle2" ).val() ) +
        '&txtpositiondesc2=' + encodeURIComponent( $( "#txtpositiondesc2" ).val() );
        jQuery.ajax( {
            type: "POST",
            url: "response/position.php?TypeID=SaveData",
            dataType: "text",
            data: myData,
            success: function ( response ) {
                setTimeout( function () {
                    PopupMessage();
                }, 10 );
            
                    setTimeout( function () {
                    window.location.href='position.php';
                }, 1500 );
                
                    
            },

            error: function ( xhr, ajaxOptions, thrownError ) {
                alert( thrownError );
            }

        } );
        
    }