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
                        'type'    => 'Zend\Mvc\Router\Http\Literal',
                        'options' => array(
                            'route'    => '/product',
                            'defaults' => array(
                            	'controller' => 'Product\Controller\Product',
                            	'action'     => 'index',                            	
                            )
                        )
                    ),
					
					'product_view' => array(
						'type' => 'Zend\Mvc\Router\Http\Regex',
						'options' => array(
							//'regex' => '/product/(?<id>[a-zA-Z0-9_-]+)(\.(?<format>(json|html|xml|rss)))?',
							'regex' => '/product/(?<id>[a-zA-Z0-9_-]+).html',
							'defaults' => array(
								'controller' => 'Product\Controller\Product',
								'action' => 'view',
								'format'     => 'html'
							),
							'spec' => '/product/%id%.%format%',
						),
					),
					
					'products_in_subject' => array(
						'type' => 'Zend\Mvc\Router\Http\Regex',
						'options' => array(
							'regex' => '/product/(?<subject_id>[a-zA-Z0-9_-]+)',
							'defaults' => array(
								'controller' => 'Product\Controller\Product',
								'action' => 'showProducts'
							),
							'spec' => '/product/%subject_id%',
						)
					),
					
					'group' => array(
						'type'		=> 'Segment',
						'options'	=> array(
							'route'		=>'/group[/:action][/:id]',
							'constraints'=>array(
								'action'	=> '[a-zA-Z][a-zA-Z0-9_-]*',
								'id'		=> '[a-zA-Z0-9_-]*',
							),
							'defaults'	=> array(
								'controller' => 'Product\Controller\ProductGroup',
								'action'	 => 'index'
							)
						)
					),
					
					
				),
    ),
    'controllers' => array(
        'invokables' => array(
            'Product\Controller\Product' => 'Product\Controller\ProductController',
			'Product\Controller\ProductGroup' => 'Product\Controller\ProductGroupController',
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
