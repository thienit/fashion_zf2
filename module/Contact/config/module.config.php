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
                    'contact' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/contact[/:action][/:id]',
                            'constraints' => array(
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            	'id'     => '[a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            	'controller' => 'Contact\Controller\Contact',
                            	'action'     => 'index',                            	
                            ),
                        ),
                    ),
				),
    ),
    'controllers' => array(
        'invokables' => array(
            'Contact\Controller\Contact' => 'Contact\Controller\ContactController',
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
