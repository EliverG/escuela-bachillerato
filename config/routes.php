<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * This file is loaded in the context of the `Application` class.
 * So you can use `$this` to reference the application class instance
 * if required.
 */
return static function (RouteBuilder $builder): void {
    $builder->setRouteClass(DashedRoute::class);

    // 👇 Esta línea hace que / cargue nuestro dashboard
    $builder->connect('/', ['controller' => 'Home', 'action' => 'index']);

    // Rutas de tus controladores CRUD
    $builder->connect('/carreras', ['controller' => 'Carreras', 'action' => 'index']);
    $builder->connect('/alumnos', ['controller' => 'Alumnos', 'action' => 'index']);
    $builder->connect('/cursos', ['controller' => 'Cursos', 'action' => 'index']);
    $builder->connect('/semestres', ['controller' => 'Semestres', 'action' => 'index']);
    $builder->connect('/secciones', ['controller' => 'Secciones', 'action' => 'index']);
    $builder->connect('/cursos-aprobados', ['controller' => 'CursosAprobados', 'action' => 'index']);

    $builder->connect('/reporteria', ['controller' => 'Reporteria', 'action' => 'index']);
$builder->connect('/reporteria/pdf-alumnos', ['controller' => 'Reporteria', 'action' => 'pdfAlumnosPorCarrera']);
$builder->connect('/reporteria/pdf-notas', ['controller' => 'Reporteria', 'action' => 'pdfNotasPorCarreraCursoSeccion']);





    // Fallbacks
    $builder->fallbacks();
};
