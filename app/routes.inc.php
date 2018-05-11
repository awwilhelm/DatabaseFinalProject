<?php
if(!defined('INCLUDED')) exit('This file cannot be opened directly');

// ROOT route :)
$route['ROOT'] = 'pages/home.php';

// You can match simple routes
// $route['admin/albums'] = 'pages/admin/albums/index.php';
// That will match http://site.com/index.php/admin/albums and include 
// pages/admin/albums/index.php in the template's content placeholder

// You can use Regular Expressions
// $route['albums-by/(.*)'] = 'pages/albums-by.php';
// That will match "/albums-by/ANYTHING HERE", you can get the grouped 
// parameters using "_get" function, in this case _get(0) will get the first 
// group
//
// Here is a more complex regex
// $route['view-album/(.*?)(/page/(\d+))?'] = 'pages/view-album.php';
// That will match an optional /page/number part

// For caching you specify the route you want to cache, and the duration 
// in seconds, examples:
// $cache_route['ROOT'] =  60 * 60 * 24 * 7; // 1 week
// $cache_route['view-album/(.*?)(/page/(\d+))?'] =  60 * 60 * 2; // 2 hours

// Demo route
$route['hello/(.*)'] = 'pages/hello.php';
$route['login'] = 'pages/login.php';

$route['portfolio'] = 'pages/portfolio.php';
$route['portfolio/newCompany'] = 'pages/newCompany.php';

$route['portfolio/([0-9]*)'] = 'pages/company.php';
$route['portfolio/([0-9]*)/newProject'] = 'pages/newProject.php';
$route['portfolio/([0-9]*)/editCompany'] = 'pages/editCompany.php';

$route['portfolio/([0-9]*)/project/([0-9]*)'] = 'pages/project.php';
$route['portfolio/([0-9]*)/project/([0-9]*)/newMilestone'] = 'pages/newMilestone.php';
$route['portfolio/([0-9]*)/project/([0-9]*)/editProject'] = 'pages/editProject.php';

$route['portfolio/([0-9]*)/project/([0-9]*)/milestone/([0-9]*)'] = 'pages/milestone.php';
$route['portfolio/([0-9]*)/project/([0-9]*)/milestone/([0-9]*)/newSprint'] = 'pages/newSprint.php';
$route['portfolio/([0-9]*)/project/([0-9]*)/milestone/([0-9]*)/editMilestone'] = 'pages/editMilestone.php';

$route['portfolio/([0-9]*)/project/([0-9]*)/milestone/([0-9]*)/sprint/([0-9]*)'] = 'pages/sprint.php';
$route['portfolio/([0-9]*)/project/([0-9]*)/milestone/([0-9]*)/sprint/([0-9]*)/newTask'] = 'pages/newTask.php';
$route['portfolio/([0-9]*)/project/([0-9]*)/milestone/([0-9]*)/sprint/([0-9]*)/editSprint'] = 'pages/editSprint.php';

$route['portfolio/([0-9]*)/project/([0-9]*)/milestone/([0-9]*)/sprint/([0-9]*)/task/([0-9]*)'] = 'pages/task.php';

$route['analytics/piechart'] = 'pages/piechart.php';
