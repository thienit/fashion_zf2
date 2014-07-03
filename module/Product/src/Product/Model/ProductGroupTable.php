<?php
namespace Product\Model;

use Zend\Db\TableGateway\TableGateway;

class ProductGroupTable extends TableGateway
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
	
	public function getSingle($groupId)
	{
		$resultSet = $this->tableGateway->select(array('group_id' => $groupId));
		$row = $resultSet->current();
		if (!$row) 
		{
			throw new \Exception("Could not find now $groupId");
		}
		return $row;
	}
}











