<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
	'router' => array(
        'routes' => array(       
                    'product' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/product[/:action][/:id]',
                            'constraints' => array(
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            	'id'     => '[a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            	'controller' => 'Product\Controller\Product',
                            	'action'     => 'index',                            	
                            ),
                        ),
                    ),
					
					'product_view' => array(
						'type' => 'Zend\Mvc\Router\Http\Regex',
						'options' => array(
							'regex' => '/product/(?<id>[a-zA-Z0-9_-]+)(\.(?<format>(json|html|xml|rss)))?',
							'defaults' => array(
								'controller' => 'Product\Controller\Product',
								'action' => 'view',
								'format'     => 'html'
							),
							'spec' => '/product/%id%.%format%',
						),
					),
				),
    ),
    'controllers' => array(
        'invokables' => array(
            'Product\Controller\Product' => 'Product\Controller\ProductController',
        ),
    ),
    'view_manager' => array(

        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
