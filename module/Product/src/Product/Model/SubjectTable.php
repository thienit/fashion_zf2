<?php
namespace Product\Model;

use Zend\Db\TableGateway\TableGateway;

class SubjectTable extends TableGateway
{
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	
	public function fetchALl()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}
	
	public function getSingle($subjectId)
	{
		$resultSet = $this->tableGateway->select(array('subject_id' => $subjectId));
		$row = $resultSet->current();
		return $row;
	}
}