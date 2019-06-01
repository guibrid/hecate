<div class="modal fade bs-example-modal-lg" id="documentModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add documents</h4>
            </div>
            <div class="modal-body">
                <p><small>* indicates required field<br />Files size must be under 2Mb<br />File type allow: .xlsx, .xls, .jpg, .jpeg, .png, .gif, .pdf, .doc, .docx</small></p>
                <div class="row increment">
                    <div class="col-md-6 col-xs-12 nameInput">
                        <label>Document name *</label>
                        <div class="nameInput">
                        <input type="text" name="filenames[]" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 ">
                        <label>File *</label>
                        <div class="fileInput">
                        <input type="file" name="documents[]" class="form-control" onchange="ValidateFile(this)">
                        </div>

                    </div>
                </div>
                <div class="row clone hide">
                    <div class="filegroup">
                        
                        <div class="col-md-6 col-xs-12 nameInput">
                                <hr />
                            <label>Document name *</label>
                            <div class="nameInput">
                            <input type="text" name="filenames[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 ">
                                <hr />
                            <label>File *</label>
                            <div class="control-group input-group fileInput">
                                <input type="file" name="documents[]" class="form-control" onchange="ValidateFile(this)">
                                <div class="input-group-btn"> 
                                    <button class="btn btn-danger remove-fields" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>             
                </div>
                <br />
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-success" type="button" id="addDocument"><i class="glyphicon glyphicon-plus"></i>Add document</button>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="progress hide">
                        <div class="progress-bar progress-bar-success myprogress" role="progressbar" style="width:0%">0%</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary submitDocuments" id="submitDocuments">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>