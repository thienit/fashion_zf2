<?php
namespace Product\Model;

use Zend\Db\TableGateway\TableGateway;

class ProductTable extends TableGateway
{
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	
	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}
	
	public function getSingle($productId)
	{
		$resultSet = $this->tableGateway->select(array('product_id' => $productId));
		$row = $resultSet->current();
		if (!$row) 
		{
			throw new \Exception("Could not find now $productId");
		}
		return $row;
	}
	
	public function getProductsInGroup($groupId)
	{
		$resultSet = $this->tableGateway->select(array('group_id' => $groupId));
		return $resultSet;
	}
	
	public function getProductsInSubject($subjectId)
	{
		$resultSet = $this->tableGateway->select(array('subject_id' => $subjectId));
		return $resultSet;
	}
}











