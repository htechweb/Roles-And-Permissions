

<h1 align="center">
	<a href="https://www.htechcorp.net/" target="_blank"><img src="https://www.htechcorp.net/images/logo_small.png" alt="Htechcorp"></a>
	<br>
	Htech Roles And Permissions
	<br>
</h1>

# Installation
```
	composer require htech/roles-and-permissions
```
# Usage
No documentation yet. But we created some examples. Run in CLI.
```
	php artisan vendor:publish 
```
Then choose the number of the package
then run migration and seeder

You are free to modify the published files.
For the routes. Just override it if you want to modify. Here are the list of the routes.

```
	Route::get('roles-and-permissions', 'RolesAndPermissionsController@index');
    
    Route::post('roles-and-permissions/add-role', 'RolesAndPermissionsController@addRole');
    Route::post('roles-and-permissions/edit-role', 'RolesAndPermissionsController@editRole');
    Route::get('roles-and-permissions/roles/delete/{role_id}', 'RolesAndPermissionsController@deleteRole');
   
    Route::post('roles-and-permissions/add-permission', 'RolesAndPermissionsController@addPermission');
    Route::post('roles-and-permissions/edit-permission', 'RolesAndPermissionsController@editPermission');
    Route::get('roles-and-permissions/permissions/delete/{role_id}', 'RolesAndPermissionsController@deletePermission');

    Route::post('roles-and-permissions/update-role-permissions/{role_id}', 'RolesAndPermissionsController@updateRolePermissions');
```
### Troubleshooting
- If you have problems in installing with lower versions of PHP. Try adding params `ignore-platform-reqs` in composer require
```
	composer require htech/roles-and-permissions --ignore-platform-reqs 
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The GNU General Public License v3.0 (GNU GPLv3). Please see [License File](LICENSE.md) for more information.

#### Author
Zik M.