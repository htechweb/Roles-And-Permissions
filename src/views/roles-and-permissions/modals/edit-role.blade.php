<!-- Modal -->
<div class="modal fade" id="editRoleModal" aria-hidden="false" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" >Edit Role Name</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="{{url('res/roles-and-permissions/edit-role')}}">
                    @csrf
                    <input type="hidden" name="role_id" value="">
                    <div class="form-group">
                        <label class="form-control-label" for="role_name">Role Name</label>
                        <input type="text" class="form-control" name="role_name" placeholder="Role Name" required="">
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
