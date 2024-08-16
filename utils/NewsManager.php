<?php

namespace Utils;

use Class\Comment;
use Class\News;
use Utils\CommentManager;
use Utils\DB;

class NewsManager
{
	private static $instance = null;

	private function __construct(protected DB $db, protected CommentManager $comment, protected News $news)
	{
		// require_once(ROOT . '/utils/DB.php');
		// require_once(ROOT . '/utils/CommentManager.php');
		// require_once(ROOT . '/class/News.php');
	}

	public static function getInstance()
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	/**
	* list all news
	*/
	public function all()
	{
		$db = $this->db->getInstance();
		$rows = $db->select('SELECT * FROM `news`');

		$news = [];
		foreach($rows as $row) {
			// $n = new News();
			$news[] = $this->news->setId($row['id'])
			  ->setTitle($row['title'])
			  ->setBody($row['body'])
			  ->setCreatedAt($row['created_at']);
		}

		return $news;
	}

	/**
	* add a record in news table
	*/
	public function create($title, $body)
	{
		$db = $this->db->getInstance();
		$sql = "INSERT INTO `news` (`title`, `body`, `created_at`) VALUES('". $title . "','" . $body . "','" . date('Y-m-d') . "')";
		$db->exec($sql);
		return $db->lastInsertId($sql);
	}

	/**
	* deletes a news, and also linked comments
	*/
	public function delete($id)
	{
		$comments = $this->comment->getInstance()->listComments();
		$idsToDelete = [];

		foreach ($comments as $comment) {
			if ($comment->getNewsId() == $id) {
				$idsToDelete[] = $comment->getId();
			}
		}

		foreach($idsToDelete as $id) {
			$this->comment->getInstance()->deleteComment($id);
		}

		$db = $this->db->getInstance();
		$sql = "DELETE FROM `news` WHERE `id`=" . $id;
		return $db->exec($sql);
	}
}