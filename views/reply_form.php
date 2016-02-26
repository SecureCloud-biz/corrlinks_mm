<form class="form-horizontal">
  <div class="form-group">
    <label for="inputIMNumber" class="col-sm-2 control-label">IM Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputIMNumber" value="<?php echo $message->inmatenumber; ?>" readonly >
    </div>
  </div>

  <div class="form-group">
    <label for="inputIMName" class="col-sm-2 control-label">IM Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputIMName" value="<?php echo $message->name; ?>" readonly >
    </div>
  </div>

  <div class="form-group">
    <label for="inputSubject" class="col-sm-2 control-label">Subject</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputSubject" value="<?php echo $message->subject; ?>" readonly >
    </div>
  </div>

  <div class="form-group">
    <label for="inputMessage" class="col-sm-2 control-label">Message</label>
    <div class="col-sm-10">
      	<textarea class="form-control" id="inputMessage" rows="3" readonly ><?php echo $message->body; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputReply" class="col-sm-2 control-label">Reply</label>
    <div class="col-sm-10">
      	<textarea class="form-control" id="inputReply" rows="3" ></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button class="btn btn-default">Submit</button>
    </div>
  </div>

</form>