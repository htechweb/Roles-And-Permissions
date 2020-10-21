<p>Click the role to manage its permissions</p>
<ul class="list-group bg-inherit ">
	@forelse ($roles as $roleKey => $role)
	<li class="list-group-item roles-li {{request('role_id') ==  $role->id ? "active" : ""}}">
		<a href="{{url()->current() . '?role_id=' . $role->id}}" class="roles cursor-pointer float-left">
			<i class="icon wb-user " aria-hidden="true"></i><span class="role-name">{{$role->name}}</span>
		</a>
		<div class="btn-group float-right">
			<button class="btn btn-icon btn-sm btn-pure edit-role-btn" data-id="{{$role->id}}" data-name="{{$role->name}}" data-toggle="tooltip" data-title="Change role name">
				<i class="icon wb-edit" aria-hidden="true"></i>
			</button>
			
			<a class="btn btn-icon btn-sm btn-pure delete-role-btn" href="{{ url('res/roles-and-permissions/roles/delete/' . $role->id) }}">
				<i class="icon wb-trash" aria-hidden="true"></i>
			</a>
		</div>
		</li>
	@empty
	<p>No roles found</p>
	@endforelse
</ul>