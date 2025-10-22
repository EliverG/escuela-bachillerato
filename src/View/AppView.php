<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/5/en/views.html#the-app-view
 */
class AppView extends View
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like adding helpers.
     *
     * e.g. `$this->addHelper('Html');`
     *
     * @return void
     */
    public function initialize(): void
{
    parent::initialize();

    $this->loadHelper('Html');
    $this->loadHelper('Form');
    $this->loadHelper('Flash');

    // ✅ Paginator con Bootstrap 5
    $this->loadHelper('Paginator', [
        'templates' => [
            'number'        => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'current'       => '<li class="page-item active" aria-current="page"><span class="page-link">{{text}}</span></li>',
            'ellipsis'      => '<li class="page-item disabled"><span class="page-link">&hellip;</span></li>',

            'first'         => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'last'          => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',

            'prevActive'    => '<li class="page-item"><a class="page-link" rel="prev" href="{{url}}">{{text}}</a></li>',
            'prevDisabled'  => '<li class="page-item disabled"><span class="page-link">{{text}}</span></li>',

            'nextActive'    => '<li class="page-item"><a class="page-link" rel="next" href="{{url}}">{{text}}</a></li>',
            'nextDisabled'  => '<li class="page-item disabled"><span class="page-link">{{text}}</span></li>',
        ]
    ]);
}

}
