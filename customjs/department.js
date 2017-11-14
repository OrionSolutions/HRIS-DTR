$( document ).on( "click", ".open-Profile", function () {
    var id = $( this ).data( 'id' );
    var url = "jsonobject/json.php?tables=tbldepartment&&id=" + id;
    $.getJSON( url, function ( result ) {
        console.log( result );
        $.each( result, function ( i, field ) {
            var departmentName = field.DepartmentName;
            var departmentDesc = field.DepartmentDesc;
            $("#departmentid").val(id);
            $( "#txtdepartmentname" ).val( departmentName );
            $( "#txtdepartmentdesc" ).val( departmentDesc );
        } );
    } );




} );




    $( document ).on( "click", ".close-Profile", function () {
    var id = $( this ).data( 'id' );
        
        
        var myData = 'departmentid=' + encodeURIComponent(id);
        jQuery.ajax( {
            type: "POST",
            url: "response/department.php?TypeID=DeleteData",
            dataType: "text",
            data: myData,
            success: function ( response ) {
                setTimeout( function () {
                        DeleteMessage();
                }, 10 );
            
                    setTimeout( function () {
                    window.location.href='department.php';
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
        
        var myData = 'txtdepartmentname=' + encodeURIComponent( $( "#txtdepartmentname" ).val() ) +
            '&txtdepartmentdesc=' + encodeURIComponent( $( "#txtdepartmentdesc" ).val() ) +
            '&departmentid=' + encodeURIComponent( $( "#departmentid" ).val() );
        
        jQuery.ajax( {
            type: "POST",
            url: "response/department.php?TypeID=UpdateData",
            dataType: "text",
            data: myData,
            success: function ( response ) {
                setTimeout( function () {
                    PopupMessage();
                }, 10 );
            
                    setTimeout( function () {
                    window.location.href='department.php';
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
        
        var myData = 'txtdepartmentname2=' + encodeURIComponent( $( "#txtdepartmentname2" ).val() ) +
        '&txtdepartmentdesc2=' + encodeURIComponent( $( "#txtdepartmentdesc2" ).val() );
        jQuery.ajax( {
            type: "POST",
            url: "response/department.php?TypeID=SaveData",
            dataType: "text",
            data: myData,
            success: function ( response ) {
                setTimeout( function () {
                    PopupMessage();
                }, 10 );
            
                    setTimeout( function () {
                    $('#lol').html(response);
                    window.location.href='department.php';
                }, 1500 );
                
                    
            },

            error: function ( xhr, ajaxOptions, thrownError ) {
                alert( thrownError );
            }

        } );
        
    }