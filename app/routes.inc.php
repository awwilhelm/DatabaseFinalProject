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
$route[$config['base_path'] . 'hello/(.*)'] = 'pages/hello.php';

$route[$config['base_path'] . 'portfolio'] = 'pages/portfolio.php';
$route[$config['base_path'] . 'portfolio/newPortfolio'] = 'pages/newPortfolio.php';

$route[$config['base_path'] . 'portfolio/([0-9]*)'] = 'pages/project.php';
$route[$config['base_path'] . 'portfolio/([0-9]*)/newProject'] = 'pages/newProject.php';
$route[$config['base_path'] . 'portfolio/([0-9]*)/editPortfolio'] = 'pages/editPortfolio.php';

$route[$config['base_path'] . 'portfolio/([0-9]*)/project/([0-9]*)'] = 'pages/milestones.php';
$route[$config['base_path'] . 'portfolio/([0-9]*)/project/([0-9]*)/newMilestone'] = 'pages/newMilestone.php';
$route[$config['base_path'] . 'portfolio/([0-9]*)/project/([0-9]*)/editProject'] = 'pages/editProject.php';

$route[$config['base_path'] . 'analytics/piechart'] = 'pages/piechart.php';
