<!-- Modal -->
<div class="modal fade" id="editPermissionModal" aria-hidden="false" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" >Add Permission</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="{{url('res/roles-and-permissions/edit-permission')}}">
                     @csrf
                    <input type="hidden" name="permission_id" value="">
                    <div class="form-group">
                        <label class="form-control-label" for="permission_name">Permission Name</label>
                        <input type="text" class="form-control" name="permission_name" placeholder="Permission Name" required="">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="float-right">
                                <button class="btn btn-primary btn-outline" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
