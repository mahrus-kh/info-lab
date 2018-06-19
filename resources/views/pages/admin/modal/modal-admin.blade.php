<div class="modal admin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-admin-title"></h4>
            </div>
            <form method="POST" class="form-horizontal form-label-left input_mask">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name*</label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <input type="text" name="name" class="form-control" minlength="3" maxlength="255" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Photo Image</label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input type="file" class="form-control" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone*</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <input type="number" name="phone" class="form-control" min="0" maxlength="15" minlength="10" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                        <div class="col-md-7 col-sm-7 col-xs-12 form-group">
                            <textarea name="address" class="form-control" rows="2" minlength="5" maxlength="255"></textarea>
                        </div>
                    </div>
                    <hr>
                    @if(auth('admin')->user()->id === 1)
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status*</label>
                            <div class="col-md-5 col-sm-7 col-xs-12">
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email*</label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <input type="email" name="email" class="form-control" maxlength="100" required="required">
                        </div>
                    </div>
                    <div id="password_area"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" id="modal-admin-btn">
                </div>
            </form>
        </div>
    </div>
</div>