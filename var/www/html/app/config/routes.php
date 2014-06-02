<?php
/**
 * Routes configuration
 *
 * In this attachment, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of attachments must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view attachment
 * to use (in this case, /app/View/Pages/home.ctp)...
 */

	Router::parseExtensions('json');
	Router::connect('/', array('controller' => 'pages', 'popup' => ''));
	Router::connect('/group/:group_slug', array('controller' => 'pages', 'popup' => ''));
	Router::connect('/user/:user_slug', array('controller' => 'pages', 'action' => 'userdetail'));
	Router::connect('/groupadmin/:group_slug', array('controller' => 'pages', 'action'=>'groupadmin'));
	Router::connect('/myarchive', array('controller' => 'pages', 'myarchive'=>true));
	
        Router::connect('/student_subjects', array('controller' => 'students_subjects'));
        Router::connect('/tutor_subjects', array('controller' => 'tutors_subjects'));
	Router::connect('/page/:action', array('controller' => 'pages'));
        
        Router::connect('/visession/:action/*', array('controller' => 'visessions'));
        Router::connect('/tutor/:action', array('controller' => 'tutors'));
        Router::connect('/tutor/:action/*', array('controller' => 'tutors'));
        
	Router::connect('/questions/:slug_id', array('controller' => 'pages', 'action' => 'questions'), array('slug_id' => '[0-9]+'));
	Router::connect('/questions/:slug_id/:slug', array('controller' => 'pages', 'action' => 'questions'), array('slug' => '[a-zA-Z0-9_-]+', 'slug_id' => '[0-9]+'));
	// Router::connect('/login', array('controller' => 'pages', 'popup' => 'login'));
	// Router::connect('/users/login', array('plugin' => 'users', 'controller' => 'users', 'action' => 'login'));
	// Router::connect('/users/logout', array('plugin' => 'users', 'controller' => 'users', 'action' => 'logout'));
	// Router::connect('/register', array('controller' => 'pages', 'popup' => 'register'));
	Router::connect('/admin/:controller', array('prefix' => 'admin', 'admin' => true));
	Router::connect('/admin/:controller/:action/*', array('prefix' => 'admin', 'admin' => true));
        Router::connect('/tos', array('controller'=>'pages', 'action'=>'tos'));
        
        
        
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */

	// Router::connect('/users/index/*', array('plugin' => 'users', 'controller' => 'users'));
	// Router::connect('/users/:action/*', array('plugin' => 'users', 'controller' => 'users'));
	// Router::connect('/users/users/:action/*', array('plugin' => 'users', 'controller' => 'users'));
	// Router::connect('/login/*', array('plugin' => 'users', 'controller' => 'users', 'action' => 'login'));
	// Router::connect('/logout/*', array('plugin' => 'users', 'controller' => 'users', 'action' => 'logout'));
	// Router::connect('/register/*', array('plugin' => 'users', 'controller' => 'users', 'action' => 'add'));

	// Router::connect('/categories', array('controller' => 'categories', 'action' => 'index'));
	// Router::connect('/categories/:action/*', array('controller' => 'categories'));

	// Router::connect('/subjects', array('controller' => 'subjects', 'action' => 'index'));
	// Router::connect('/subjects/:action/*', array('controller' => 'subjects'));
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

//	Router::redirect('/*', '/');
/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	//require CAKE . 'Config' . DS . 'routes.php';
