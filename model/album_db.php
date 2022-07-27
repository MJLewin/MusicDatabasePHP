<?php
class AlbumDB {
	public function getAlbums($sort = "albumTitle", $order = "Asc") {
		$db = Database::getDB();
		$query = "SELECT * FROM albums
				  ORDER BY $sort
				  $order";
		$result = $db->query($query);
        $albums = array();
        foreach ($result as $row) {
            $album = new Album();
            $album->setAlbumID($row['albumID']);
            $album->setAlbumTitle($row['albumTitle']);
			$album->setRecordLabel($row['recordLabel']);
			$album->setGenre($row['genre']);
			$album->setReleaseDate($row['releaseDate']);
			$album->setAlbumFunFact($row['albumFunFact']);
            $albums[] = $album;
        }
		return $albums;
	}
	
	public function getAlbumsSortedByArtist($order) {
		$db = Database::getDB();
		$query = "SELECT * FROM albums
					JOIN albumartists ON albums.albumID = albumartists.albumID
					JOIN artists on albumartists.artistID = artists.artistID
				  ORDER BY artists.stageName
				  $order";
		$result = $db->query($query);
        $albums = array();
        foreach ($result as $row) {
            $album = new Album();
            $album->setAlbumID($row['albumID']);
            $album->setAlbumTitle($row['albumTitle']);
			$album->setRecordLabel($row['recordLabel']);
			$album->setGenre($row['genre']);
			$album->setReleaseDate($row['releaseDate']);
			$album->setAlbumFunFact($row['albumFunFact']);
            $albums[] = $album;
        }
		return $albums;
	}
	
	public function getAlbum($albumID) {
		$db = Database::getDB();
		$query = "SELECT * FROM albums
				  WHERE albumID = '$albumID'";
		$statement = $db->query($query);
        $row = $statement->fetch();
        $album = new Album();
        $album->setAlbumID($row['albumID']);
        $album->setAlbumTitle($row['albumTitle']);
		$album->setRecordLabel($row['recordLabel']);
		$album->setGenre($row['genre']);
		$album->setReleaseDate($row['releaseDate']);
		$album->setAlbumFunFact($row['albumFunFact']);
        return $album;
	}
	
	public function getAlbumTitleOfSong($songID) {
		$db = Database::getDB();
		$query = "SELECT * from albums
					JOIN songs on albums.albumID = songs.albumID
				  WHERE songs.songID = '$songID'";
		$statement = $db->query($query);
		$row = $statement->fetch();
		$albumTitle = $row['albumTitle'];
		
		return $albumTitle;
	}
	
	public function getAlbumOfSong($songID) {
		$db = Database::getDB();
		$query = "SELECT * from albums
					JOIN songs on albums.albumID = songs.albumID
				  WHERE songs.songID = '$songID'";
		$statement = $db->query($query);
		$row = $statement->fetch();
        $album = new Album();
        $album->setAlbumID($row['albumID']);
        $album->setAlbumTitle($row['albumTitle']);
		$album->setRecordLabel($row['recordLabel']);
		$album->setGenre($row['genre']);
		$album->setReleaseDate($row['releaseDate']);
		$album->setAlbumFunFact($row['albumFunFact']);
        return $album;
	}
	
	public function addAlbumToDB($albumTitle, $recordLabel, $genre, $releaseDate, $albumFunFact) {
		$db = Database::getDB();
		$query = "INSERT INTO albums
					(albumID, albumTitle, recordLabel, genre, releaseDate, albumFunFact)
				  VALUES 
					(:albumID, :albumTitle, :recordLabel, :genre, :releaseDate, :albumFunFact)";
		$statement = $db->prepare($query);
		if ($statement == false) {
			$error = "Failed to add album.";
			include('errors/error.php');
		}
		$statement->bindValue(':albumID', 'DEFAULT');
		$statement->bindValue(':albumTitle', $albumTitle);
		$statement->bindValue(':recordLabel', $recordLabel);
		$statement->bindValue(':genre', $genre);
		$statement->bindValue(':releaseDate', $releaseDate);
		$statement->bindValue(':albumFunFact', $albumFunFact);
		$success = $statement->execute();
		if ($success) {
			$statement->closeCursor();
			$message = "Album Added Successfully";
			include('errors/success.php');
		} else {
			$error = "Failed to add album.";
			include('errors/error.php');
		}
	}
	
	public function relationshipExists($albumID) {
		$db - Database::getDB();
		$query = "SELECT * FROM albumartists
				  WHERE albumID = '$albumID'";
		$statement = $db->query($query);
		$row = $statement->fetch();
		
		return $row;
	}
	
	public function addAlbumToArtist($artistID, $albumID) {
		$db = Database::getDB();
		$query = "INSERT INTO albumartists
					(id, artistID, albumID)
				  VALUES
					(:id, :artistID, :albumID)";
		$statement = $db->prepare($query);
		if ($statement == false) {
			$error = "Failed to add album to artist.";
			include('errors/error.php');
		}
		$statement->bindValue(':id', 'DEFAULT');
		$statement->bindValue(':artistID', $artistID);
		$statement->bindValue(':albumID', $albumID);
		$success - $statement->execute();
		if ($success) {
			$statement->closeCursor();
			$message = "Album Added To Artist Successfully";
			include('errors/success.php');
		} else {
			$error = "Failed to add album to artist.";
			include('errors/error.php');
		}
	}
	
	public function deleteAlbumFromDB($albumID) {
		$db = Database::getDB();
		$query = "DELETE FROM albums
				  WHERE albumID = :albumID";
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':albumID', $albumID);
			$rowCount = $statement->execute();
			$statement->closeCursor();
			$message = "Album Deleted Successfully";
			include('errors/success.php');
		} catch (PDOException $e) {
			$error = $e->getMessage();
			include('errors/error.php');
		}
	}
	
	public function updateAlbum($albumID, $albumTitle, $recordLabel, $genre, $releaseDate, $albumFunFact) {
		$db = Database::getDB();
		$query = "UPDATE albums
				  SET albumTitle = :albumTitle,
					recordLabel = :recordLabel,
					genre = :genre,
					releaseDate = :releaseDate,
					albumFunFact = :albumFunFact
				  WHERE albumID = :albumID";
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':albumID', $albumID);
			$statement->bindValue(':albumTitle', $albumTitle);
			$statement->bindValue(':recordLabel', $recordLabel);
			$statement->bindValue(':genre', $genre);
			$statement->bindValue(':releaseDate', $releaseDate);
			$statement->bindValue(':albumFunFact', $albumFunFact);
			$row_count = $statement->execute();
			$statement->closeCursor();
			$message = "Album updated successfully.";
			include('errors/success.php');
		} catch (PDOException $e) {
			$error = $e->getMessage();
			include('errors/error.php');
		}
	}
}
?>