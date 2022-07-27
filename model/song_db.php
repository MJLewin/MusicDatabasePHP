<?php
class SongDB {

	public function getAllSongs($sort = "songtitle", $order = "Asc") {
        $db = Database::getDB();
        $query = "SELECT * FROM songs
                  ORDER BY $sort
				  $order";
        $result = $db->query($query);
        $songs = array();
        foreach ($result as $row) {
            $song = new Song();
            $song->setSongID($row['songID']);
            $song->setSongTitle($row['songTitle']);
			$song->setAlbumID($row['albumID']);
			$song->setSongLength($row['songLength']);
			$song->setSongWriter($row['songWriter']);
			$song->setTopRank($row['topRank']);
			$song->setRankDate($row['rankDate']);
			$song->setUserComment($row['userComment']);
            $songs[] = $song;
        }
        return $songs;
    }
	
	public function getAllSongsSortedByAlbum($order) {
		$db = Database::getDB();
        $query = "SELECT * FROM songs
					JOIN albums ON songs.albumID = albums.albumID
                  ORDER BY albums.albumTitle
				  $order";
        $result = $db->query($query);
        $songs = array();
        foreach ($result as $row) {
            $song = new Song();
            $song->setSongID($row['songID']);
            $song->setSongTitle($row['songTitle']);
			$song->setAlbumID($row['albumID']);
			$song->setSongLength($row['songLength']);
			$song->setSongWriter($row['songWriter']);
			$song->setTopRank($row['topRank']);
			$song->setRankDate($row['rankDate']);
			$song->setUserComment($row['userComment']);
            $songs[] = $song;
        }
        return $songs;
	}
	
	public function getSongsFromAlbum($albumID, $sort = "songTitle", $order = "Asc") {
		$db = Database::getDB();
		$query = "SELECT * FROM songs
				  WHERE albumID = $albumID
				  ORDER BY $sort
				  $order";
		$result = $db->query($query);
		$songs = array();
		foreach ($result as $row) {
			$song = new Song();
            $song->setSongID($row['songID']);
            $song->setSongTitle($row['songTitle']);
			$song->setAlbumID($row['albumID']);
			$song->setSongLength($row['songLength']);
			$song->setSongWriter($row['songWriter']);
			$song->setTopRank($row['topRank']);
			$song->setRankDate($row['rankDate']);
			$song->setUserComment($row['userComment']);
            $songs[] = $song;
		}
		return $songs;
	}
	
	public function getRankedSongsFromAlbum($albumID, $order) {
		$db = Database::getDB();
		$query = "SELECT * FROM songs
				  WHERE albumID = $albumID
				  AND topRank != 0
				  ORDER BY topRank
				  $order";
		$result = $db->query($query);
		$ratedSongs = array();
		foreach ($result as $row) {
			$song = new Song();
            $song->setSongID($row['songID']);
            $song->setSongTitle($row['songTitle']);
			$song->setAlbumID($row['albumID']);
			$song->setSongLength($row['songLength']);
			$song->setSongWriter($row['songWriter']);
			$song->setTopRank($row['topRank']);
			$song->setRankDate($row['rankDate']);
			$song->setUserComment($row['userComment']);
            $ratedSongs[] = $song;
		}
		return $ratedSongs;
	}
	
	public function getUnrankedSongsFromAlbum($albumID) {
		$db = Database::getDB();
		$query = "SELECT * FROM songs
				  WHERE albumID = $albumID
				  AND topRank = 0
				  ORDER BY songTitle";
		$result = $db->query($query);
		$unrankedSongs = array();
		foreach ($result as $row) {
			$song = new Song();
            $song->setSongID($row['songID']);
            $song->setSongTitle($row['songTitle']);
			$song->setAlbumID($row['albumID']);
			$song->setSongLength($row['songLength']);
			$song->setSongWriter($row['songWriter']);
			$song->setTopRank($row['topRank']);
			$song->setRankDate($row['rankDate']);
			$song->setUserComment($row['userComment']);
            $unrankedSongs[] = $song;
		}
		return $unrankedSongs;
	}
	
	public function mergeRankedAndUnrankedSongs($rankedSongs, $unrankedSongs, $order) {
		$songs = array();
		if($order == "Desc") {
			$songs = array_merge($unrankedSongs, $rankedSongs);
		} else {
			$songs = array_merge($rankedSongs, $unrankedSongs);
		}
		return $songs;
	}
	
		public function getSongsByArtist($artistID) {
		$db = Database::getDB();
		$query = "SELECT * FROM songs
					JOIN artistsongs on songs.songID = artistsongs.songID
					JOIN artists on artists.artistID = artistsongs.artistID
				  WHERE artists.artistID = '$artistID'";
		$result = $db->query($query);
		$songs = array();
		foreach($result as $row) {
			$songID = $row['songID'];
			$songTitle = $row['songTitle'];
			$songs[$songID] = $songTitle;
		}
		natcasesort($songs);
		return $songs;
	}
	
	public function getNumberOfSongs($artistID) {
		$db = Database::getDB();
		$query = "SELECT * FROM songs
					JOIN artistsongs on songs.songID = artistsongs.songID
					JOIN artists on artists.artistID = artistsongs.artistID
				  WHERE artists.artistID = '$artistID'";
		$result = $db->query($query);
		$count = 0;
		foreach($result as $row) {
			$count++;
		}
		return $count;
	}
	
	public function getSong($songID) {
		$db = Database::getDB();
		$query = "SELECT * FROM songs
				  WHERE songID = '$songID'";
		$statement = $db->query($query);
        $row = $statement->fetch();
        $song = new Song();
        $song->setSongID($row['songID']);
        $song->setSongTitle($row['songTitle']);
		$song->setAlbumID($row['albumID']);
		$song->setSongLength($row['songLength']);
		$song->setSongWriter($row['songWriter']);
		$song->setTopRank($row['topRank']);
		$song->setRankDate($row['rankDate']);
		$song->setUserComment($row['userComment']);
        return $song;
	}
	
	public function addSongToDB($songTitle, $albumID, $songLength, $songWriter, $topRank, $rankDate, $userComment) {
		$db = Database::getDB();
		$query = "INSERT INTO songs
					(songID, songTitle, albumID, songLength, songWriter, topRank rankDate, userComment)
				  VALUES 
					(:songID, :songTitle, :albumID, :songLength, :songWriter, :topRank, :rankDate, :userComment)";
		$statement = $db->prepare($query);
		if ($statement == false) {
			$error = "Failed to add song.";
			include('errors/error.php');
		}
		$statement->bindValue(':songID', 'DEFAULT');
		$statement->bindValue(':songTitle', $songTitle);
		$statement->bindValue(':albumID', $albumID);
		$statement->bindValue(':songLength', $songLength);
		$statement->bindValue(':songWriter', $songWriter);
		$statement->bindValue(':topRank', $topRank);
		$statement->bindValue(':rankDate', $rankDate);
		$statement->bindValue(':userComment', $userComment);
		$success = $statement->execute();
		if ($success) {
			$statement->closeCursor();
			$message = "Song Added Successfully";
			include('errors/success.php');
		} else {
			$error = "Failed to add song.";
			include('errors/error.php');
		}
	}
	
	public function deleteSongFromDB($songID) {
		$db = Database::getDB();
		$query = "DELETE FROM songs
				  WHERE songID = :songID";
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':songID', $songID);
			$rowCount = $statement->execute();
			$statement->closeCursor();
			$message = "Song Deleted Successfully";
			include('errors/success.php');
		} catch (PDOException $e) {
			$error = $e->getMessage();
			include('errors/error.php');
		}
	}
	
	public function updateSong($songID, $songTitle, $albumID, $songLength, $songWriter, $topRank, $rankDate, $userComment) {
		$db = Database::getDB();
		$query = "UPDATE songs
				  SET songTitle = :songTitle,
					albumID = :albumID,
					songLength = :songLength,
					songWriter = :songWriter,
					topRank = :topRank,
					rankDate = :rankDate,
					userComment = :userComment
				  WHERE songID = :songID";
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':songID', $songID);
			$statement->bindValue(':songTitle', $songTitle);
			$statement->bindValue(':albumID', $albumID);
			$statement->bindValue(':songLength', $songLength);
			$statement->bindValue(':songWriter', $songWriter);
			$statement->bindValue(':topRank', $topRank);
			$statement->bindValue(':rankDate', $rankDate);
			$statement->bindValue(':userComment', $userComment);
			$row_count = $statement->execute();
			$statement->closeCursor();
			$message = "Song updated successfully.";
			include('errors/success.php');
		} catch (PDOException $e) {
			$error = $e->getMessage();
			include('errors/error.php');
		}
	}
}
?>