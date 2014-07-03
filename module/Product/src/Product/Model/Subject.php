<?php
namespace Product\Model;

class Subject
{
	public $subject_id;
	public $subject_name;
	
	public function exchangeArray($data) 
	{
		$this->subject_id = (!empty($data['subject_id'])) ? $data['subject_id'] : null;
		$this->subject_name = (!empty($data['subject_name'])) ? $data['subject_name'] : null;
	}
	
	public function getArrayCopy()
	{
		return get_object_vars($this);
	}
}