(function($) {

  // Export run
  $('button.custobar-export').on('click', function( e ) {

    e.preventDefault()

    var recordType = $(this).data('record-type')

    data = {
       action: 'custobar_export',
       recordType: recordType
     }
     $.post( ajaxurl, data, function( response ) {
       response = JSON.parse( response )
       var responseRow = $( '#custobar-export-wrap table tr.response' );
       if( responseRow.length ) {
         responseRow.find('td').html( response.message )
       } else {
         $('#custobar-export-wrap table').append('<tr class="response"><td colspan="6">' + response.message + '</td></tr>');
       }

       console.log( response )

     });

  })

  // API connection test
  $('#custobar-api-connection-test').on('click', function( e ) {

    e.preventDefault()

    data = {
       action: 'custobar_api_test'
     }
     $.post( ajaxurl, data, function( response ) {
       response = JSON.parse( response )
       $('#custobar-api-connection-test-wrap').append('<p>' + response.message + '</p>')
     });


    console.log('testing api...')
  })

})( jQuery );
