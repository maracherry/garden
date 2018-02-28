<?php
include 'db.php';
$defaultdb="gardenDB";

function create_table_post()
{
	$link = db_connect();
	$query = "CREATE TABLE `post` (
  `postId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `contents` text NOT NULL,
  `sticky` int(11) DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`postId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ";
	mysqli_query($link,$query);
}

function create_table_settings()
{
        $link = db_connect();
	$query = "CREATE TABLE `settings` (
  `settingId` int(11) NOT NULL AUTO_INCREMENT,
  `settingName` varchar(128) NOT NULL,
  `settingValue` varchar(256) NOT NULL,
  `is_visible` int(11) DEFAULT '1',
  PRIMARY KEY (`settingId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4";
        mysqli_query($link,$query);
}
function create_table_user()
{
	$link = db_connect();
	$query = "CREATE TABLE `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `type` int(11) DEFAULT '0',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4";
	mysqli_query($link,$query);
}

function create_table_textInfo()
{
	$link = db_connect();
	$query = "CREATE TABLE `textInfo` (
  `textId` int(11) NOT NULL AUTO_INCREMENT,
  `textName` varchar(64) NOT NULL,
  `textValue` text,
  `modifiedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`textId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4";
	mysqli_query($link,$query);
}
?>
