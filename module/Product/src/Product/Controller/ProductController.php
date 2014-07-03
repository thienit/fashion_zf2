<?php
namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProductController extends AbstractActionController
{
	protected $subjectTable;
	protected $productTable;
	
	public function getSubjectTable()
	{
		if(!$this->subjectTable){
			$sm = $this->getServiceLocator();
			$this->subjectTable = $sm->get('Product\Model\SubjectTable');
		}
		return $this->subjectTable;
	}
	
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
		$subjects = $this->getSubjectTable()->fetchAll();
		$this->layout()->subjects = $subjects;
		
		$products = $this-> getProductTable()->fetchAll();
		return new ViewModel(array('products'=>$products));
	}
	
	public function viewAction()
	{
		$subjects = $this->getSubjectTable()->fetchAll();
		$this->layout()->subjects = $subjects;
		
		$productId = $this->params()->fromRoute('id');
		$product = $this->getProductTable()->getSingle($productId);
		return new ViewModel(array('product'=>$product));
	}
	
	public function showProductsAction()
	{
		$subjects = $this->getSubjectTable()->fetchAll();
		$this->layout()->subjects = $subjects;
		
		$subjectId = $this->params()->fromRoute('subject_id');
		$products = $this->getProductTable()->getProductsInSubject($subjectId);
		return new ViewModel(array('products'=>$products));
	}
}

