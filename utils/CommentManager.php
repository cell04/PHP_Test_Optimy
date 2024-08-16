<?php

namespace Utils;

use Class\Comment;
use Utils\DB;

class CommentManager
{
	private static $instance = null;

	private function __construct(protected DB $db, protected Comment $comment)
	{
		// require_once(ROOT . '/utils/DB.php');
		// require_once(ROOT . '/class/Comment.php');
	}

	public static function getInstance()
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	public function all()
	{
		$db = $this->db->getInstance();
		$rows = $db->select('SELECT * FROM `comment`');

		$comments = [];
		foreach($rows as $row) {
			// $n = new Comment();
			$comments[] = $this->comment->setId($row['id'])
			  ->setBody($row['body'])
			  ->setCreatedAt($row['created_at'])
			  ->setNewsId($row['news_id']);
		}

		return $comments;
	}

	public function create($body, $newsId)
	{
		$db = $this->db->getInstance();
		$sql = "INSERT INTO `comment` (`body`, `created_at`, `news_id`) VALUES('". $body . "','" . date('Y-m-d') . "','" . $newsId . "')";
		$db->exec($sql);
		return $db->lastInsertId($sql);
	}

	public function delete($id)
	{
		$db = $this->db->getInstance();
		$sql = "DELETE FROM `comment` WHERE `id`=" . $id;
		return $db->exec($sql);
	}
}