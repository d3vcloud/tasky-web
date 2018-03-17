<div class="modal-header">
    <h4 class="modal-title mt-0">Add Users</h4>
    <button type="button" class="close" data-dismiss="modal"
            aria-hidden="true">×</button>
</div>


<div class="modal-body">
    <form id="FormInvitation" method="POST">
        <input type="hidden" name="id" class="id"/>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="emails" class="control-label">Enter emails for invitation</label>
                    <div class="tags-default">
                        <input type="text" data-role="tagsinput" name="emails" id="emails" placeholder="Add Emails" autofocus/>

                    </div>
                    <span class="help-block">Press "enter" after write a email for add other.</span>
                </div>
            </div>
        </div>
        <button type="button" id="send" class="btn btn-info waves-effect waves-light">Send</button>
        <div style="float:right;display: none;" id="loading">
            <img src="{{ asset('img/loading2.gif') }}" alt="loading" width="50px" height="40px" />
        </div>
    </form>
        <hr>
    <form id="FormAddUser" method="POST">
        <input type="hidden" name="id" class="id"/>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">Add User</label>
                    <select id="listMembers" name="members" multiple data-style="btn-white">

                    </select>
                </div>
            </div>
        </div>
        <button type="button" id="addUser" class="btn btn-info waves-effect waves-light">Save</button>
    </form>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect"
            data-dismiss="modal">Close</button>

</div>
