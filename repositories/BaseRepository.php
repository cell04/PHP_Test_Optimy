<?php

namespace Repositories;

class BaseRepository
{
	protected $entity;

	private function __construct($entity)
	{
		$this->entity = $entity;
	}

	/**
	* retrieve all records
	*/
	public function all()
	{
		return $this->entity->all();
	}

	/**
	* create new records
	*/
	public function create($request)
	{
		return $this->entity->create($title, $body);
	}

	/**
	* delete records
	*/
	public function delete($id)
	{
		return $this->entity->delete($id);
	}

	/**
	* show records
	*/
	public function show($id)
	{
		return $this->entity->show($id);
	}

	/**
	* update records
	*/
	public function update($request, $id)
	{
		return $this->entity->update($id);
	}
}