<div class="row">
	<div class="col-7 my-auto">
		<p class="m-0">Toggle permissions to activate.</p>
	</div>
	<div class="col-5">
		<select id="bulkActions" class="form-control">
			<option value="">-- Bulk Actions --</option>
			<option value="select-all">Select All</option>
			<option value="unselect-all">Unselect All</option>
		</select>
	</div>
</div>
<ul class="list-group bg-inherit ">
	@forelse ($permissions as $permissionKey => $permission)
	<li class="list-group-item roles-li">
		<a class="roles cursor-pointer float-left" data-id={{$permission->id}}>
			<i class="icon wb-user " aria-hidden="true"></i><span class="role-name">{{$permission->name}}</span>
		</a>
		<div class="btn-group float-right">
			<button type="button" class="btn btn-icon btn-sm btn-pure edit-permission-btn p-0" data-id="{{$permission->id}}" data-name="{{$permission->name}}" data-toggle="tooltip" data-title="Change permission name">
				<i class="icon wb-edit" aria-hidden="true"></i>
			</button>
			
			<a class="btn btn-icon btn-sm btn-pure delete-permission-btn" href="{{ url('res/roles-and-permissions/permissions/delete/' . $permission->id) }}">
				<i class="icon wb-trash" aria-hidden="true"></i>
			</a>
			<label class="switch">
			  <input type="checkbox" aria-label="Check to activate this permission" name="permissions[]" value="{{$permission->name}}" {{$role_permissions->contains($permission->id) ? 'checked' : ''}}>
			  <span class="slider round"></span>
			</label>
		</div>
	</li>
	@empty
	<p>No roles found</p>
	@endforelse
</ul>