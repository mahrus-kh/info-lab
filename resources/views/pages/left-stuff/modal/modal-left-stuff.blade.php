<div class="modal left-stuff-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-left-stuff-title"></h4>
            </div>
            <form method="POST" class="form-horizontal form-label-left input_mask">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Stuff Name*</label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <input type="text" name="stuff_name" class="form-control" maxlength="255" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Location*</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <select name="location_id" class="form-control" id="location_id_area"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Who Posted</label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <input type="text" name="who_posted" class="form-control" maxlength="255">
                        </div>
                    </div>
                    <div id="admin_posted_area"></div>
                    <div id="posted_at_area"></div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Etc</label>
                        <div class="col-md-7 col-sm-7 col-xs-12 form-group">
                            <textarea name="etc" class="form-control" rows="2" maxlength="255"></textarea>
                        </div>
                    </div>
                    <div id="status_area"></div>
                    <div id="who_taken_area"></div>
                    <div id="admin_taken_area"></div>
                    <div id="taken_at_area"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" id="modal-left-stuff-button">
                </div>
            </form>
        </div>
    </div>
</div>