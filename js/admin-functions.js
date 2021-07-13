(function($){

    'use strict';

    $( document ).on( 'click', '.sydney-update-fontawesome', function(e){
        e.preventDefault();

        if( confirm( sydneyadm.fontawesomeUpdate.confirmMessage ) ) {
            $.ajax({
                type: 'post',
                url: ajaxurl,
                data: {
                    action: 'sydney_update_fontawesome_callback',
                    nonce: $(this).data('nonce')
                },
                success: function (response) {
                    if( response.success ) {
                        window.location.reload();
                    } else {
                        alert( sydneyadm.fontawesomeUpdate.errorMessage );
                    }
                }
            });
        }
        
    } );
}(jQuery));