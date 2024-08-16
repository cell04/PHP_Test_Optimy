<?php

namespace Repositories;

use App\Services\GeneratorService;
use Repositories\BaseRepository;
use Utils\CommentManager;

class CommentRepository extends BaseRepository
{
  	public function __construct(protected CommentManager $comment, protected GeneratorService $service) 
  	{
     	parent::__construct($this->comment);
  	}
}