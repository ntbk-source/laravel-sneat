<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('menuIsActive')) {
	function menuIsActive($route)
	{
		return request()->routeIs($route) ? 'active' : '';
	}
}

if (!function_exists('menuIsOpen')) {
	function menuIsOpen($route)
	{
		return request()->routeIs($route) ? 'active open' : '';
	}
}

if (!function_exists('user')) {
	function user()
	{
		return Auth::user();
	}
}

if (!function_exists('actionBtn')) {
	function actionBtn($route, $btnClass, $icon, $attributes = [])
	{
		$a = '';
		foreach ($attributes as $t) {
			$a .= $t;
		}
		$result = "<a {$a} href='" . $route . "' class='btn btn-sm btn-" . $btnClass . "'><i class='bx bx-" . $icon . "'></i></a>";
		return $result;
	}
}


if (!function_exists('selectedOption')) {
	function selectedOption($index, $value)
	{
		return $index === $value ? 'selected' : '';
	}
}
