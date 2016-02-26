<form name="pm_table_list_form" id="ajax_pm_list_form" method="post">
<table class="table table-striped">
	<thead>
		<tr>
			<th>
				<a href="#" id="pm_message_sort_date">
					<span class="glyphicon <?php echo ($sort=='ASC')? 'glyphicon glyphicon-arrow-down': 'glyphicon glyphicon-arrow-up' ; ?>" aria-hidden="true"></span>
					Date
				</a>
			</th>
			<th>Subject</th>
			<th>Message</th>
			<th>Reply</th>
			<th>User</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($table as $row): ?>
		<tr>
			<td><?php echo $row->serverdate; ?></td>			
			<td><span title="<?php echo $row->subject; ?>"><?php echo substr($row->subject,0,20); ?></span></td>			
			<td><span title="<?php echo $row->message; ?>"><?php echo substr($row->message,0,20); ?></span></td>	
			<td><span title="<?php echo $row->reply; ?>"><?php echo substr($row->reply,0,20); ?></span></td>
			<td><?php echo $row->name; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
<input type="hidden" name="action" value="update_pm_list">
</form>
