<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Corrlinks Message Manager</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="vendor/twbs/bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="vendor/twbs/bootstrap/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="vendor/twbs/bootstrap/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->    
	</head>

<body>
    <div class="container">
    	<?php include $template_name; ?>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="vendor/components/jquery/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="vendor/twbs/bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>    
    <script>

function reload_form() {
            $('#ajax_loader').show();
            var form_data = $('#ajax_table_form').serializeArray();
            var doc_url = window.location.href;
            $.post( doc_url,
                    form_data,
                    function( data ) {
                        $('#table_content').html(data);
                        $('#ajax_loader').hide();
                    });    
}

    $( document ).ready(function() {

        $('.container').on('change', '#cc_acct', function(event){
            $('#page').val(1);
            reload_form();

        });

//-------Pagination-------------------
$('.container').on('click','.pagination a', function (event) {
    event.preventDefault();
    var pag_link = $(this).attr('href');
    var page = pag_link.substring(1);
    $('#page').val(page);
    reload_form();
   
    return false;
});


//checkbox
$('.container').on('change','#cb_select_all', function() {
 
        if($(this).is(":checked")) {
            $('.checkbox_processed').each(function(){ this.checked = true; });
        } else {
            $('.checkbox_processed').each(function(){ this.checked = false; });
        }
    });


//update checked as processed

$('.container').on('click','#update_checked', function (event) {
    event.preventDefault();
    var form_data = $('#ajax_list_form').serializeArray();
    var doc_url = window.location.href;
            $.post( doc_url,
                    form_data,
                    function( data ) {
                        if(data == "ok") {
                            alert("Updated");
                            reload_form();
                        } else {
                            alert(data);
                        }

                    });    

    return false;
});


//-------Reg Number Click-------------------
$('.container').on('click','.reg_number', function (event) {
    event.preventDefault();
    var reg_num = $(this).text();

    $('#pm_table_content').html('');
    $('#pm_title_im_num').html(reg_num);
    $('#pm_ajax_loader').show();
    $('#past_messages_popup').modal('show');

    return false;
});



    });
    </script>
</body>
</html>
