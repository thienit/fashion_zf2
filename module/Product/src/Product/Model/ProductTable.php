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
	
	public function getProduct($productId)
	{
		$rowset = $this->tableGateway->select(array('product_id' => $productId));
		$row = $rowset->current();
		if (!$row) 
		{
			throw new \Exception("Could not find now $productId");
		}
		return $row;
	}
}











