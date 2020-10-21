<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Htech\RolesAndPermissions\Models\Role;
use Htech\RolesAndPermissions\Models\Permission;
use DB;

class RolesAndPermissionsController extends Controller
{
	private $auth_guard = null;
	
	public function __construct(){
		$guard = config('roles-and-permissions.guard');
		
		$this->guard = $guard ;
	}

	public function index(Request $request)
    {
		$roles = Role::notSuperAdmin()->get();
		$permissions = collect();
		$role_permissions = collect();
		if($request->has('role_id')){
			$permissions 		= Permission::get();
			$role 				=  Role::notSuperAdmin()->find($request->role_id);
			$role_permissions 	= $role->getAllPermissions()->map(function($item,$key){
				return $item->id;
			});
		}
		return view('htech.roles-and-permissions.roles',compact('roles','permissions','role_permissions'));
    }

    public function addRole(Request $request){
    	try{
    		$roleData = $this->formatData($request->role_name);
			
			$role = Role::create($roleData);
			$this->resetCache();
			$this->flashMessage('Role added successfully.');
		} catch( \Exception $e){
			$this->flashMessage($e->getMessage(),false);
		}

		return redirect()->to(config('roles-and-permissions.route-prefix') .'/roles-and-permissions');
    }

    public function editRole(Request $request){
    	// dd($request->all());
    	try{
    		$roleData = $this->formatData($request->role_name);
			$role = Role::updateOrCreate(['id' => $request->role_id],$roleData);
			$this->resetCache();
			$this->flashMessage('Role updated successfully.');
		} catch( \Exception $e){
			$this->flashMessage($e->getMessage(),false);
		}

		return redirect()->to(config('roles-and-permissions.route-prefix') .'/roles-and-permissions');	
    }

    public function deleteRole($role_id = null){
    	try{
			$role = Role::find($role_id);
			if($role !== null){
				$role->syncPermissions([]);
				$role->delete();
			}
			$this->resetCache();
			$this->flashMessage('Role deleted successfully.');
		} catch( \Exception $e){
			$this->flashMessage($e->getMessage(),false);
		}

		return redirect()->to(config('roles-and-permissions.route-prefix') .'/roles-and-permissions');		
    }

    public function addPermission(Request $request){
    	try{
    		$permissionData = $this->formatData($request->permission_name);

			$permission = Permission::create($permissionData);
			$this->resetCache();
			$this->flashMessage('Permission added successfully.');
		} catch( \Exception $e){
			$this->flashMessage($e->getMessage(),false);
		}

		return redirect()->to(config('roles-and-permissions.route-prefix') .'/roles-and-permissions');
    }

    public function editPermission(Request $request){
    	// dd($request->all());
    	try{
    		$permissionData = $this->formatData($request->permission_name);
			$permission = Permission::updateOrCreate(['id' => $request->permission_id],$permissionData);
			$this->resetCache();
			$this->flashMessage('Permission updated successfully.');
		} catch( \Exception $e){
			$this->flashMessage($e->getMessage(),false);
		}

		return redirect()->to(config('roles-and-permissions.route-prefix') .'/roles-and-permissions');	
    }

    public function deletePermission($role_id = null){
    	try{
			$permission = Permission::find($role_id);
			if($permission !== null){
				$permission->delete();
			}
			$this->resetCache();
			$this->flashMessage('Permission deleted successfully.');
		} catch( \Exception $e){
			$this->flashMessage($e->getMessage(),false);
		}

		return redirect()->to(config('roles-and-permissions.route-prefix') .'/roles-and-permissions');		
    }

    public function updateRolePermissions(Request $request,$role_id = null){
    	try{
    		$role = Role::find($role_id);
    		if($role){
    			$role->syncPermissions($request->permissions);
    		}
    		$this->flashMessage('Permission deleted successfully.');
    	}catch(\Exception $e){
    		$this->flashMessage($e->getMessage(),false);	
    	}

    	return redirect()->to(config('roles-and-permissions.route-prefix') .'/roles-and-permissions');		
    }

    private  function flashMessage($message, $success = true){
		session()->flash('msg', $message);
		if($success === true){
			session()->flash('msgClass', 'success');
		}else{
			session()->flash('msgClass', 'danger');
		}
	}

	private function formatData($name,$guard = null){
		$data = [
			'name' => $name
		];

		if(isset($this->guard) || isset($guard)){
			$data['guard_name'] = $this->guard ?? $guard;
		}

		return $data;
	}

	private function resetCache(){
		return app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
	}
}
