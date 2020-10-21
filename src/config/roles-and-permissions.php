<?php

return [
	'route-prefix' 			=> env('HRAP_ROUTE_PREFIX','res'),
	'main-layout'			=> env('HRAP_MAIN_LAYOUT','admin.layouts.layout'),
	'controller-namespace'	=> env('HRAP_CONTROLLER_NAMESPACE','App\Http\Controllers'),
	'route-guard'			=> ['auth:web'],
];