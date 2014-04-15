<?php 
namespace Product;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Product\Model\Product;
use Product\Model\ProductTable;

class Module{
	
	public function getConfig(){
		return include __DIR__.'/config/module.config.php';
	}
	
	public  function getAutoloaderConfig()
	{
	    return array(
	    		'Zend\Loader\ClassMapAutoloader'=>array(__DIR__.'/autoload_classmap.php'),
	    		'Zend\Loader\StandardAutoloader'
	    		=>array('namespaces'=>array(__NAMESPACE__=>__DIR__.'/src/'.__NAMESPACE__),),
	    		);
	}
	
	public function getServiceConfig()
	{
		return array (
				'factories'	=> array(
						'Product\Model\ProductTable' => function($sm) {
							$tableGateway = $sm->get('ProductTableGageway');
							$table = new ProductTable ($tableGateway);
							return $table;
						},
						'ProductTableGageway' => function ($sm) {
							$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
							$resultSetPrototype = new ResultSet();
							$resultSetPrototype->setArrayObjectPrototype(new Product());
							return new TableGateway('product', $dbAdapter, null, $resultSetPrototype);
						},
				)
		);
	}
	
	
	
}