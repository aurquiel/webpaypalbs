$(function() {

    $("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var namePaypal = document.getElementById("namePaypal").value;
            var emailPaypal = document.getElementById("emailPaypal").value;
            var dolaresPaypal = document.getElementById("dolaresPaypal").value;
           
            $.ajax({
                url: "././mail/dolares.php",
                type: "POST",
                data: {
                	  namePaypal: namePaypal,
						  emailPaypal: emailPaypal,
                    dolaresPaypal: dolaresPaypal                    
                },
                cache: false,
                success: function() {
                    // Success message

                },
                error: function() {
                    // Fail message

                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

function calculoDolaresPaypal() {
	var dolaresPaypal = document.getElementById("dolaresPaypal").value;
	document.getElementById('paypalComision').innerHTML = (dolaresPaypal * 0.054) + 0.3;
	document.getElementById('nuestraComisionPaypal').innerHTML = dolaresPaypal * 0.07;
	
	if (dolaresPaypal <= 0)
	{
        document.getElementById('bolivaresPaypal').innerHTML = 0;
        document.getElementById('paypalComision').innerHTML = 0;
	}    
   else
        document.getElementById('bolivaresPaypal').innerHTML = (dolaresPaypal - ((dolaresPaypal * 0.054) + 0.3 + (dolaresPaypal * 0.07)) ) * 261000;
	
}
