<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('Route');

Router::scope('/', function ($routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    //$routes->connect('/', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/', ['controller' => 'Main', 'action' => 'index']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    //$routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `InflectedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'InflectedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'InflectedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('InflectedRoute');
});

    //Blogs
    Router::connect(
        '/blog_list',
        array('controller' => 'Blogs', 'action' => 'front_listing')
    ); 
    Router::connect(
        '/blogs/:id/:slug/*',
        array('controller' => 'Blogs', 'action' => 'front_view'),
        array(
            'pass' => array('id', 'slug'),
            'slug' => '[a-zA-Z0-9_-]+',
            'id' => '[0-9]+'
        )
    
    );
    Router::connect(
        '/blog_category/:id/:slug/*',
        array('controller' => 'Blogs', 'action' => 'category_front_listing'),
        array(
            'pass' => array('id', 'slug'),
            'slug' => '[a-zA-Z0-9_-]+',
            'id' => '[0-9]+'
        )
    );

    //Job Opportunities    
    Router::connect(
        '/job_list',
        array('controller' => 'Opportunities', 'action' => 'front_listing')
    );

    Router::connect(
        '/job_application/:id/:slug/*',
        array('controller' => 'Opportunities', 'action' => 'front_apply'),
        array(
            'pass' => array('id', 'slug'),
            'slug' => '[a-zA-Z0-9_-]+',
            'id' => '[0-9]+'
        )
    
    );

    Router::connect(
        '/job_list/advance_search',
        array('controller' => 'Opportunities', 'action' => 'advance_search')
    );

    Router::connect(
        '/job_list/search',
        array('controller' => 'Opportunities', 'action' => 'search')
    );

    Router::connect(
        '/submit_resume',
        array('controller' => 'Candidates', 'action' => 'send_resume')
    );

    Router::connect(
        '/job_list/search_result',
        array('controller' => 'Opportunities', 'action' => 'search_result')
    );

    Router::connect(
        '/job_view/:id/:slug/*',
        array('controller' => 'Opportunities', 'action' => 'front_view'),
        array(
            'pass' => array('id', 'slug'),
            'slug' => '[a-zA-Z0-9_-]+',
            'id' => '[0-9]+'
        )
    
    );
    
    //Pages
    //slug Pages - about-us
    Router::connect(
    '/about_us/',
    array('controller' => 'Pages', 'action' => 'about_us'),
    array('pass' => array('id', 'slug'),
    'id' => '[0-9]+')
    );

    Router::connect(
    '/why_us/',
    array('controller' => 'Pages', 'action' => 'why_us'),
    array('pass' => array('id', 'slug'),
    'id' => '[0-9]+')
    );

    Router::connect(
    '/privacy_policy/',
    array('controller' => 'Pages', 'action' => 'frontview', 4),
    array('pass' => array('id', 'slug'),
    'id' => '[0-9]+')
    );

    Router::connect(
    '/employers/',
    array('controller' => 'Pages', 'action' => 'frontview', 2),
    array('pass' => array('id', 'slug'),
    'id' => '[0-9]+')
    );

    Router::connect(
        '/contact_us',
        array('controller' => 'Pages', 'action' => 'contact_us')
    ); 
/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
