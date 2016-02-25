<?php
include "corrlinks_mm.init.php";


$action = (isset($_POST['action'])) ? $_POST['action'] : "";


//Index page
if($action == "") {

	$data = array();
	$data['cl_acct'] = get_cl_accounts();

	view("index",$data);
}

//Get table through ajax
if($action == "get_list") {
	$cc_acct = isset($_POST['cc_acct']) ? $_POST['cc_acct'] : "";
	$order = isset($_POST['order']) ? $_POST['order'] : "";
	$sort = isset($_POST['sort']) ? $_POST['sort'] : "";
	$page = isset($_POST['page']) ? $_POST['page'] : "";

	$data = get_table_list($cc_acct,$order,$sort,$page);

	ajax_view("table",$data);

}



//Update table through ajax
if($action == "update_list") {
	$ids = isset($_POST['cl_message_id']) ? $_POST['cl_message_id'] : array();

	if(count($ids) > 0) {
		if(set_as_processed($ids)) {
			echo "ok";
		} else {
			echo "Error";
		}
	} else {
		echo "Nothing to do.";
	}
	exit;
}