<div class="modal-header">
    <h4 class="modal-title mt-0">Upload Photo</h4>
    <button type="button" class="close" data-dismiss="modal"
            aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" class="dropzone" id="mydropzonephoto">
                {{ csrf_field() }}
            </form>

        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
