$(document).ready(function() {

    // process the form
    $('form').submit(function(event) {
        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text
        // var filename = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '');

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'tiltle'             : $('input[name=tiltle]').val(),
            'content'              : $('#w3review').val(),
            'image'    : $('input[name=image]').val().replace(/C:\\fakepath\\/i, '')
            
 

        };
        
        

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'process.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
                        encode          : true
        })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data);

                // here we will handle errors and validation messages
                if ( ! data.success) {

                    // handle errors for name ---------------
                    if (data.errors.tiltle) {
                        $('#tiltle-group').addClass('has-error'); // add the error class to show red input
                        $('#tiltle-group').append('<div class="help-block">' + data.errors.tiltle + '</div>'); // add the actual error message under our input
                    }
        
                    // handle errors for email ---------------
                    if (data.errors.content) {
                        $('#content-group').addClass('has-error'); // add the error class to show red input
                        $('#content-group').append('<div class="help-block">' + data.errors.content + '</div>'); // add the actual error message under our input
                    }
        
                    // handle errors for superhero alias ---------------
                    if (data.errors.image) {
                        $('#image-group').addClass('has-error'); // add the error class to show red input
                        $('#image-group').append('<div class="help-block">' + data.errors.image + '</div>'); // add the actual error message under our input
                    }
        
                } else {
                  // ALL GOOD! just show the success message!
                  $('form').html('<div class="alert alert-success">' + data.message + '</div>');
                }
        
        
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});