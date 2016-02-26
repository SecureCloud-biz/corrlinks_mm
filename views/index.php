<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    	<div class="navbar-brand">Corrlinks Account:</div>
    </div>
<form class="navbar-form navbar-left" id="ajax_table_form" method="post">
  <div class="form-group">
	<select class="form-control" name="cc_acct" id="cc_acct">
			<option selected value="">--select--</option>
		<?php foreach($cl_acct as $acc): ?>
  			<option value="<?php echo $acc->id; ?>">
  				<?php echo $acc->loginname."(".$acc->count.")";?>
  			</option>
  		<?php endforeach; ?>
	</select>    
  </div>
  <input type="hidden" name="action" value="get_list">
  <input type="hidden" name="sort" value="">
  <input type="hidden" name="order" value="">
  <input type="hidden" name="page" id="page" value="1">

  Unprocessed
</form>   

	<p class="navbar-text navbar-right" id="ajax_loader" style="display:none;">
		 <img src="pic/ajax-loader.gif"  width="25" height="25" alt="loading...">
	</p> 
  </div>
</nav>


<div id="table_content">
</div>




<!-- -----------pop up window ----------- -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="past_messages_popup">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Past Messages For IM# <span id="pm_title_im_num"></span>
        </h4>
      </div>


      <div class="modal-body">
          <p id="pm_ajax_loader" style="display:none;">
            <img src="pic/ajax-loader.gif"  width="25" height="25" alt="loading...">
          </p> 
          <form id="ajax_pm_table_control" method="post"> 
              <input type="hidden" name="acct_id" id="acct_id" value="">
              <input type="hidden" name="pm_im_num" id="pm_im_num" value="">
              <input type="hidden" name="action" value="get_pm_list">
              <input type="hidden" name="sort" value="">
              <input type="hidden" name="order" value="">
              <input type="hidden" name="page" id="page" value="1">
          </form>
          <div id="pm_table_content">
          </div>
      </div>

    </div>
  </div>
</div>