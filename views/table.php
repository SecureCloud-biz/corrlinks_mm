<?php if($got_list): ?>
<form name="table_list_form" id="ajax_list_form" method="post">
<table class="table table-striped">
	<thead>
		<tr>
			<th><span title="Select All"><input id="cb_select_all" type="checkbox" value=""></span></th>
			<th>IM Name</th>
			<th>Reg #</th>
			<th>Subject</th>
			<th>Message</th>
			<th>Date</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($table as $row): ?>
		<tr>
			<td><input class="checkbox_processed" type="checkbox" name="cl_message_id[]" value="<?php echo $row->id; ?>"></td>
			<td><?php echo $row->name; ?></td>
			<td><a href="#" class="reg_number"><?php echo $row->inmatenumber; ?></a></td>			
			<td><span title="<?php echo $row->subject; ?>"><?php echo substr($row->subject,0,20); ?></span></td>			
			<td><span title="<?php echo $row->body; ?>"><?php echo substr($row->body,0,20); ?></span></td>	
			<td><?php echo $row->serverdate; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="6"><button type="button" id="update_checked" class="btn btn-primary btn-xs">Update checked as processed</button></td>
		</tr>
	</tfoot>
</table>
<nav style="margine: -30px 0px 0px 0px;"><?php echo $paginator; ?></nav>
<input type="hidden" name="action" value="update_list">
</form>



<?php endif; ?>