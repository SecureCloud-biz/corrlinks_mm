<?php

function set_as_processed($ids) {
	$sql = "UPDATE
				`corrlinks_messages`
			SET `processed` = TRUE
			WHERE `id` IN (".implode(",", $ids).")";
	return DB::update($sql);
}

function get_cl_accounts() {
	$sql = "SELECT
				ca.id,
				cac.loginname,
				COUNT(*)AS `count`
			FROM 
				corrlinks_messages cm
				JOIN corrlinks_accounts ca ON (cm.corrlinks_accounts_id = ca.id)
				JOIN corrlinks_account_credentials cac ON (cac.loginname = ca.loginname)
			WHERE 
				cac.relay_type = 'support'
				AND cm.processed = TRUE
			GROUP BY cac.loginname
			ORDER BY COUNT DESC";
	return DB::select($sql);
}


function get_table_list($cc_acct,$order,$sort,$page) {

	$data = array();
	$per_page = 15;

	$limit_sql = "LIMIT ".(($page-1)*$per_page)." , ".($per_page);
	if($cc_acct != "") {
		$sql = "SELECT SQL_CALC_FOUND_ROWS 
					cm.id,
					cm.serverdate,
					cc.name,
					cc.inmatenumber,
					cm.subject,
					cm.body,
					ca.loginname
				FROM 
					corrlinks_messages cm
					JOIN corrlinks_message_contact cmc ON (cmc.message_id = cm.id)
					JOIN corrlinks_contacts cc ON (cmc.inmateid = cc.inmateid)
					JOIN corrlinks_accounts ca ON (ca.id = cm.corrlinks_accounts_id)
				WHERE
					cm.processed = FALSE
					AND message_type = 'inbox'
					AND cm.corrlinks_accounts_id = ?
				ORDER BY 
					inmatenumber,serverdate ASC ".$limit_sql;
		$results = DB::select($sql,array($cc_acct));
		$sql = 'SELECT FOUND_ROWS() as total';
		$res_total = \DB::select($sql);
		$data['table'] = $results;
		$data['total'] = $res_total[0]->total;
		$data['page'] = $page;
		$data['got_list'] = true;

		$totalItems = $data['total'];
		$itemsPerPage = $per_page;
		$currentPage = $page;
		$urlPattern = '#(:num)';
		$data['paginator'] = new JasonGrimes\Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

	} else {
		$data['got_list'] = false;
	}

	return $data;
}


function view($template_name,$data) {
	extract($data);
	$template_name = "views/".$template_name.".php";
	include "views/master.php";
	exit;
}


function ajax_view($template_name,$data) {
	extract($data);
	include "views/".$template_name.".php";
	exit;
}
