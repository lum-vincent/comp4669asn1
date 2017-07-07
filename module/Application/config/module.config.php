<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\HomeController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'homeSeg' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/home',
                    'defaults' => [
                        'controller' => Controller\HomeController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
           'gallery' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/gallery',
                    'defaults' => [
                        'controller' => Controller\GalleryController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'details' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/details[/]',
                    'defaults' => [
                        'controller' => Controller\GalleryController::class,
                        'action'     => 'details',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
          Controller\HomeController::class => InvokableFactory::class,
          Controller\GalleryController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => false,
        'display_exceptions'       => false,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'application/home/index'  => __DIR__ . '/../view/application/home/index.phtml',
            'application/gallery/index' => __DIR__ . '/../view/application/gallery/gallery.phtml',
            'application/gallery/details' => __DIR__ . '/../view/application/gallery/details.phtml',
            'error/404'               => __DIR__ . '/../view/error/notFound.phtml',
            'error/index'             => __DIR__ . '/../view/error/notFound.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
