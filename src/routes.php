<?php

Route::namespace(config('roles-and-permissions.controller-namespace'))
    ->prefix(config('roles-and-permissions.route-prefix'))
    ->group(function(){
    Route::get('roles-and-permissions', 'RolesAndPermissionsController@index');
    
    Route::post('roles-and-permissions/add-role', 'RolesAndPermissionsController@addRole');
    Route::post('roles-and-permissions/edit-role', 'RolesAndPermissionsController@editRole');
    Route::get('roles-and-permissions/roles/delete/{role_id}', 'RolesAndPermissionsController@deleteRole');
   
    Route::post('roles-and-permissions/add-permission', 'RolesAndPermissionsController@addPermission');
    Route::post('roles-and-permissions/edit-permission', 'RolesAndPermissionsController@editPermission');
    Route::get('roles-and-permissions/permissions/delete/{role_id}', 'RolesAndPermissionsController@deletePermission');

    Route::post('roles-and-permissions/update-role-permissions/{role_id}', 'RolesAndPermissionsController@updateRolePermissions');
    // Route::post('roles-and-permissions/assign-permissions', 'RolesAndPermissionController@assignPermissions');
    // Route::get('roles-and-permissions', 'RolesAndPermissionController@showRolesAndPermissionsPage');
    // Route::post('permissions-and-actions/assign-permissions', 'PermissionsAndRoutesController@assignPermissions');
});