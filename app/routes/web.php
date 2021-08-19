<?php
	
	$routes = [];

	$controller = '/UserController';

	$routes['user'] = [
		'index' => $controller.'/index',
		'create' => $controller.'/create',
		'show' => $controller.'/show',
		'edit' => $controller.'/edit',
		'editPassword' => $controller.'/editPassword',
		'editEmail' => $controller.'/editEmail',
		'login'     => $controller.'/login',
		'logout'     => $controller.'/logout',
	];

	$controller = '/ProjectController';

	$routes['project'] = [
		'index' => $controller.'/index',
		'create' => $controller.'/create',
		'show' => $controller.'/show',
		'edit' => $controller.'/edit',
	];

	$controller = '/IssueController';

	$routes['issue'] = [
		'index' => $controller.'/index',
		'create' => $controller.'/create',
		'show' => $controller.'/show',
		'edit' => $controller.'/edit',
	];

	$controller = '/IssueCycleController';

	$routes['cycle'] = [
		'index' => $controller.'/index',
		'create' => $controller.'/create',
		'show' => $controller.'/show',
		'edit' => $controller.'/edit',
	];

	$controller = '/DashboardController';

	$routes['dashboard'] = [
		'index' => $controller.'/index'
	];

	return $routes;
?>