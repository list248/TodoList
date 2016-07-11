<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Post</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="task-name">Name</label>
                        <input type="text" name="name" id="task-name-modal" class="form-control" ><br>
                        <label for="task-desc">Description</label>
                        <textarea class="form-control" name="post-body" id="task-desc-modal" rows="5"></textarea><br>
                        <label for="task-status">Status</label><br>
                        <input type="checkbox" name="my-checkbox" id="task-status-modal">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"  id="modal-update">Update</button>
                <button type="button" class="btn btn-danger"  id="modal-delete">Delete</button>
                <button type="button" class="btn btn-default" id="modal-close">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->