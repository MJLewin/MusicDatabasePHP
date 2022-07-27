<?php
class ArtistDB {
	
    public function getArtists($sort = "stageName", $order = "Asc") {
        $db = Database::getDB();
        $query = "SELECT * FROM artists
                  ORDER BY $sort
				  $order";
        $result = $db->query($query);
        $artists = array();
        foreach ($result as $row) {
            $artist = new Artist();
            $artist->setArtistID($row['artistID']);
            $artist->setStageName($row['stageName']);
			$artist->setBirthName($row['birthName']);
			$artist->setHomeTown($row['homeTown']);
			$artist->setBirthDate($row['birthDate']);
			$artist->setDeathDate($row['deathDate']);
			$artist->setArtistFunFact($row['artistFunFact']);
            $artists[] = $artist;
        }
        return $artists;
    }
	
	public function getArtist($artistID) {
		$db = Database::getDB();
		$query = "SELECT * FROM artists
				  WHERE artistID = '$artistID'";
		$statement = $db->query($query);
        $row = $statement->fetch();
        $artist = new Artist();
        $artist->setArtistID($row['artistID']);
        $artist->setStageName($row['stageName']);
		$artist->setBirthName($row['birthName']);
		$artist->setHomeTown($row['homeTown']);
		$artist->setBirthDate($row['birthDate']);
		$artist->setDeathDate($row['deathDate']);
		$artist->setArtistFunFact($row['artistFunFact']);
        return $artist;
	}
	
	public function getArtistByNumOfSongs($order) {
		$db = Database::getDB();
        $query = "SELECT * FROM artists
					JOIN (SELECT artistID, COUNT(songs.songID) songCount FROM songs
							JOIN artistsongs on songs.songID = artistsongs.songID
							GROUP BY artistID) a on artists.artistID = a.artistID
					ORDER BY songCount
					$order";
        $result = $db->query($query);
        $artists = array();
        foreach ($result as $row) {
            $artist = new Artist();
            $artist->setArtistID($row['artistID']);
            $artist->setStageName($row['stageName']);
			$artist->setBirthName($row['birthName']);
			$artist->setHomeTown($row['homeTown']);
			$artist->setBirthDate($row['birthDate']);
			$artist->setDeathDate($row['deathDate']);
			$artist->setArtistFunFact($row['artistFunFact']);
            $artists[] = $artist;
        }
        return $artists;
	}
	
	public function getArtistOfAlbum ($albumID) {
		$db = Database::getDB();
		$query = "SELECT * FROM albums
					JOIN albumartists ON albums.albumID = albumartists.albumID
					JOIN artists on albumartists.artistID = artists.artistID
				  WHERE albums.albumID = '$albumID'";
		$statement = $db->query($query);
		$row = $statement->fetch();
		$artistName = $row['stageName'];
		return $artistName;
	}
	
	public function getArtistOfSong ($songID) {
		$db = Database::getDB();
		$query = "SELECT * FROM artists
					JOIN artistsongs ON artists.artistID = artistsongs.artistID
					JOIN songs ON artistsongs.songID = songs.songID
				  WHERE songs.songID = '$songID'";
		$statement= $db->query($query);
		$row = $statement->fetch();
		$artistName = $row['stageName'];
		return $artistName;
	}
	
	public function addArtistToDB($stageName, $birthName, $homeTown, $birthDate, $deathDate, $artistFunFact) {
		$db = Database::getDB();
		$query = "INSERT INTO artists
					(artistID, stageName, birthName, homeTown, birthDate, deathDate, artistFunFact)
				  VALUES 
					(:artistID, :stageName, :birthName, :homeTown, :birthDate, :deathDate, :artistFunFact)";
		$statement = $db->prepare($query);
		if ($statement == false) {
			$error = "Failed to add artist.";
			include('errors/error.php');
		}
		$statement->bindValue(':artistID', 'DEFAULT');
		$statement->bindValue(':stageName', $stageName);
		$statement->bindValue(':birthName', $birthName);
		$statement->bindValue(':homeTown', $homeTown);
		$statement->bindValue(':birthDate', $birthDate);
		$statement->bindValue(':deathDate', $deathDate);
		$statement->bindValue(':artistFunFact', $artistFunFact);
		$success = $statement->execute();
		if ($success) {
			$statement->closeCursor();
			$message = "Artist Added Successfully";
			include('errors/success.php');
		} else {
			$error = "Failed to add artist.";
			include('errors/error.php');
		}
	}
	
	public function deleteArtistFromDB($artistID) {
		$db = Database::getDB();
		$query = "DELETE FROM artists
				  WHERE artistID = :artistID";
		$statement = $db->prepare($query);
		$statement->bindValue(':artistID', $artistID);
		$success = $statement->execute();
		if ($success) {
			$statement->closeCursor();
			$message = "Artist Deleted Successfully";
			include('errors/success.php');
		} else {
			$error = "Failed to delete artist.";
			include('errors/error.php');
		}
	}
	
	public function updateArtist($artistID, $stageName, $birthName, $homeTown, $birthDate, $deathDate, $artistFunFact) {
		$db = Database::getDB();
		$query = "UPDATE artists
				  SET stageName = :stageName,
					birthName = :birthName,
					homeTown = :homeTown,
					birthDate = :birthDate,
					deathDate = :deathDate,
					artistFunFact = :artistFunFact
				  WHERE artistID = :artistID";
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':artistID', $artistID);
			$statement->bindValue(':stageName', $stageName);
			$statement->bindValue(':birthName', $birthName);
			$statement->bindValue(':homeTown', $homeTown);
			$statement->bindValue(':birthDate', $birthDate);
			$statement->bindValue(':deathDate', $deathDate);
			$statement->bindValue(':artistFunFact', $artistFunFact);
			$row_count = $statement->execute();
			$statement->closeCursor();
			$message = "Artist updated successfully.";
			include('errors/success.php');
		} catch (PDOException $e) {
			$error = $e->getMessage();
			include('errors/error.php');
		}
	}
}
?>