<?php

namespace Repositories;

use Repositories\BaseRepository;
use Utils\NewsManager;

class NewsRepository extends BaseRepository
{
  	public function __construct(protected NewsManager $news, protected GeneratorService $service) 
  	{
     	parent::__construct($this->news);
  	}
}