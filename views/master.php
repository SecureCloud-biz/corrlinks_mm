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

function reload_pm_form() {
            $('#pm_table_content').html('');
            $('#pm_ajax_loader').show();
            var form_data = $('#ajax_pm_table_control').serializeArray();
            var doc_url = window.location.href;
            $.post( doc_url,
                    form_data,
                    function( data ) {
                        $('#pm_ajax_loader').hide();
                        $('#pm_table_content').html(data);
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
    var acct_id = $('#cc_acct').val();
    $('#acct_id').val(acct_id);
    $('#pm_im_num').val(reg_num);
    $('#pm_table_content').html('');
    $('#pm_title_im_num').html(reg_num);
    $('#pm_ajax_loader').show();
    $('#past_messages_popup').modal('show');
    reload_pm_form();
    return false;
});




//-------Sort By Date-------------------
$('.container').on('click','#pm_message_sort_date', function (event) {
    event.preventDefault();
    var sort = $('#pm_form_sort').val();
    if(sort == 'ASC') {
        $('#pm_form_sort').val('DESC');
    } else {
        $('#pm_form_sort').val('ASC');
    }

    reload_pm_form();
    return false;
});


//popup to reply
$('.container').on('click','.run_popup_reply', function (event) {
    event.preventDefault();
    var message_id = $(this).data('id');
    $('#reply_ajax_loader').show();
    $('#reply_form_content').html('');

    $('#reply_popup').modal('show');


    var doc_url = window.location.href;
            $.post( doc_url,
                    {action: "get_form_for_reply", message_id: message_id },
                    function( data ) {

                        $('#reply_ajax_loader').hide();
                        $('#reply_form_content').html(data);

                    });    

    return false;
});



//end ready
});
    </script>
</body>
</html>
