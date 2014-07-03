<?php
namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProductGroupController extends AbstractActionController
{
	protected $productGroupTable;
	
	public function getProductGroupTable()
	{
		if(!$this->productGroupTable){
			$sm = $this->getServiceLocator();
			$this->productGroupTable = $sm->get('Product\Model\ProductGroupTable');
		}
		return $this->productGroupTable;
	}
	
	public function indexAction()
	{
		$productGroups = $this-> getProductGroupTable()->fetchAll();
		return new ViewModel(array('productGroups'=>$productGroups));
	}
	
	// public function viewAction()
	// {
		// $productId = $this->params()->fromRoute('id');
		// $product = $this->getProductTable()->getProduct($productId);
		// return new ViewModel(array('product'=>$product));
	// }
}

