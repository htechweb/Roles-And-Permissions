@extends(config('roles-and-permissions.main-layout'))
@section('title')
  {{env('APP_NAME','')}}  | Roles And Permissions
@endsection
@push('styles')
	<link rel="stylesheet" type="text/css" href="{{asset('roles-and-permissions/css/style.css')}}">
@endpush
@section('page-body')
<div class="page-content">
	@include('htech.roles-and-permissions.components.alert')
	<div class="row">
		<div class="col">
			<div class="panel">
				<header class="panel-heading">
					<h3 class="panel-title">Roles</h3>
					<div class="panel-actions">
						<button class="btn btn-sm btn-outline btn-primary" id="add-role-btn" data-toggle="modal" data-target="#addRoleModal" aria-hidden="true">Add role</button>
					</div>
				</header>
				<div class="panel-body">
					@include('htech.roles-and-permissions.components.roles-container')
				</div>
			</div>
		</div>
		@if(request()->has('role_id'))
		<div class="col">
			<form method="POST" action="{{url('res/roles-and-permissions/update-role-permissions/' . request('role_id'))}}">
				<div class="panel">
					<header class="panel-heading">
						<h3 class="panel-title">Permissions</h3>
						<div class="panel-actions">
							<button type="button" class="btn btn-sm btn-outline btn-primary" data-toggle="modal" data-target="#addPermissionModal" aria-hidden="true">Add Permission</button>
							<button type="submit" class="btn btn-sm btn-outline btn-primary" data-toggle="tooltip" data-title="Save All toggled permissions" aria-hidden="true">Sync</button>
						</div>
					</header>
					<div class="panel-body">
						@include('htech.roles-and-permissions.components.permissions-container')
					</div>
				</div>
			</form>
		</div>
		@endif
	</div>
</div>
<!-- End Panel Basic -->
@include('htech.roles-and-permissions.modals.add-role')
@include('htech.roles-and-permissions.modals.edit-role')
@include('htech.roles-and-permissions.modals.add-permission')
@include('htech.roles-and-permissions.modals.edit-permission')
@include('htech.roles-and-permissions.modals.confirm')
@endsection
@push('scripts')
	<script src="{{asset('roles-and-permissions/js/roles-and-permissions.js')}}"></script>
@endpush
