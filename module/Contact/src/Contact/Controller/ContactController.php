<?php
namespace Contact\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController
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
		$subjects = $this->getSubjectTable()->fetchAll();
		$this->layout()->subjects = $subjects;
		
		return new ViewModel();
	}
}

