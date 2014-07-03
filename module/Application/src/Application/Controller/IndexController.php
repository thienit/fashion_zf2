<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
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
        return new ViewModel(array('subjects' => $subjects));
    }
	
	
}
