<?php
namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SubjectController extends AbstractActionController
{
	protected $subjectTable;
	
	public function getSubjectTable()
	{
		if(!$this->subjectTable){
			$sm = $this->getServiceLocator();
			$this->subjectTable = $sm->get('Product\Model\SubjectTable');
		}
		return $this->subjectTable;
	}
	
	public function indexAction()
	{
		$subjects = $this-> getSubjectTable()->fetchAll();
		return new ViewModel(array('subjects'=>$subjects));
	}
}

