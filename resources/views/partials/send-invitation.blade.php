<div class="modal-header">
    <h4 class="modal-title mt-0">Invite Users</h4>
    <button type="button" class="close" data-dismiss="modal"
            aria-hidden="true">×</button>
</div>


<div class="modal-body">
    <form id="FormInvitation" method="POST">
        <!--<input type="hidden" name="Id" id="Id" value>-->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="Tipo" class="control-label">Emails</label>
                    <div class="tags-default">
                        <input type="text" data-role="tagsinput" placeholder="Add Emails" autofocus/>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" id="send" class="btn btn-info waves-effect waves-light">Send</button>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect"
            data-dismiss="modal">Close</button>

</div>
