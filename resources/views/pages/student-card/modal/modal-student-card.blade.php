<div class="modal student-card-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="modal-student-card-title"></h4>
            </div>
            <form method="POST" class="form-horizontal form-label-left input_mask">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">NIM*</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="text" name="nim" class="form-control" minlength="8" maxlength="15" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Full Name*</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" name="name" class="form-control" minlength="3" maxlength="255" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Program Study*</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select name="prodi_id" id="prodi_id_area" class="form-control"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Place of Birth*</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" name="place_of_birth" class="form-control" minlength="3" maxlength="255" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Date of Birth*</label>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <input type="date" name="date_of_birth" class="form-control" minlength="3" maxlength="255" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Address*</label>
                                <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                                    <textarea name="address" class="form-control" rows="2" maxlength="255" required="required"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">City*</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" name="city" class="form-control" minlength="3" maxlength="255" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Phone</label>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <input type="number" name="phone" class="form-control" min="0" minlength="10" maxlength="15">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Etc</label>
                                <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                                    <textarea name="etc" class="form-control" rows="2" maxlength="255"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Photo Image</label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input type="file" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Photo Number</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="number" name="photo_number" min="0" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Card Status*</label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <select name="card_status" id="card_status" class="form-control">
                                        <option value="0">First Time</option>
                                        <option value="1">Second Time (or more)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Admin</label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input type="text" id="admin" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Created At</label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input type="text" id="created_at" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Print Status*</label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <select name="print_status" id="print_status" class="form-control">
                                        <option value="0">Not Printed</option>
                                        <option value="1">Printed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Taken Status*</label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <select name="taken_status" id="taken_status" class="form-control">
                                        <option value="0">Have Not Taken</option>
                                        <option value="1">Taken</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Admin Taken</label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input type="text" id="admin_taken" class="form-control" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Taken At</label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input type="text" id="taken_at" class="form-control" readonly="readonly">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" id="modal-student-card-button">
                </div>
            </form>
        </div>
    </div>
</div>