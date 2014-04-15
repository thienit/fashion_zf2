<?php
namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProductController extends AbstractActionController
{
	protected $productTable;
	
	public function getProductTable()
	{
		if(!$this->productTable){
			$sm = $this->getServiceLocator();
			$this->productTable = $sm->get('Product\Model\ProductTable');
		}
		return $this->productTable;
	}
	
	public function indexAction()
	{
		$products = $this-> getProductTable()->fetchAll();
		return new ViewModel(array('products'=>$products));
	}
	
	public function viewAction()
	{
		$productId = $this->params()->fromRoute('id');
		$product = $this->getProductTable()->getProduct($productId);
		return new ViewModel(array('product'=>$product));
	}
}

