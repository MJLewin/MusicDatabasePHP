<?php
require('model/database.php');
require('model/artist.php');
require('model/artist_db.php');
require('model/album.php');
require('model/album_db.php');
require('model/song.php');
require('model/song_db.php');

// create the DB objects
$artistDB = new ArtistDB();
$albumDB = new AlbumDB();
$songDB = new SongDB();

// get action to perform
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'view_home';
    }
}

// Page navigation - get required assets to populate each page  
if ($action == 'view_home') {
	include('home.php');

} else if ($action == 'change_sort') {
	// handles sorting functionality for each page
	$page = filter_input(INPUT_GET, 'page');
	$sort = filter_input(INPUT_GET, 'sort');
	$order = filter_input(INPUT_GET, 'order');
	if($page == "all_artists") {
		if ($sort == "numSongs") {
			$artists = $artistDB->getArtistByNumOfSongs($order);
		} else {
			$artists = $artistDB->getArtists($sort, $order);
		}
		include('view/all_artists_list.php');
	} else if($page == "all_albums") {
		if($sort == "stageName") {
			$albums = $albumDB->getAlbumsSortedByArtist($order);
		} else {
			$albums = $albumDB->getAlbums($sort, $order);
		}
		include('view/all_albums_list.php');
	} else if($page == "all_songs") {
		if($sort == "albumTitle") {
			$songs = $songDB->getAllSongsSortedByAlbum($order);
		} else {
			$songs = $songDB->getAllSongs($sort, $order);
		}
		include('view/all_songs_list.php');
	} else if($page == "indiv_album") {
		$album_id = filter_input(INPUT_GET, 'album',
			FILTER_VALIDATE_INT);
		$album = $albumDB->getAlbum($album_id);
		if($sort == "topRank") {
			$rankedSongs = $songDB->getRankedSongsFromAlbum($album_id, $order);
			$unrankedSongs = $songDB->getUnrankedSongsFromAlbum($album_id);
			$songs = $songDB->mergeRankedAndUnrankedSongs($rankedSongs, $unrankedSongs, $order);
		} else {
			$songs = $songDB->getSongsFromAlbum($album_id, $sort, $order);
		}
		include('view/indiv_album_view.php');
	}
// Page navigation continued
} else if ($action == 'all_artists') {
    $artists = $artistDB->getArtists();
    include('view/all_artists_list.php');
	
} else if ($action == 'view_artist') {
    $artists = $artistDB->getArtists();
    $artistID = filter_input(INPUT_GET, 'artist_id', 
            FILTER_VALIDATE_INT);   
    $artist = $artistDB->getArtist($artistID);
	$songs = $songDB->getSongsByArtist($artistID);
    include('view/indiv_artist_view.php');
	
} else if ($action == 'all_albums') {
    $albums = $albumDB->getAlbums();
    include('view/all_albums_list.php');
	
} else if ($action == 'view_album') {
    $albumID = filter_input(INPUT_GET, 'album_id', 
            FILTER_VALIDATE_INT);   
    $album = $albumDB->getAlbum($albumID);
	$songs = $songDB->getSongsFromAlbum($albumID);
    include('view/indiv_album_view.php');
	
} else if ($action == 'all_songs') {
    $songs = $songDB->getAllSongs();
    include('view/all_songs_list.php');
	
} else if ($action == 'view_song') {
    $songID = filter_input(INPUT_GET, 'song_id', 
            FILTER_VALIDATE_INT);   
    $song = $songDB->getSong($songID);
	$albumID = $song->getAlbumID();
	$album = $albumDB->getAlbum($albumID);
    include('view/indiv_song_view.php');
	
} else if ($action == 'add_artist') {
	include('view/add_artist.php');
	
} else if ($action == 'artist_add') {
	$stageName = filter_input(INPUT_POST, 'stageName');
	$birthName = filter_input(INPUT_POST, 'birthName');
	$homeTown = filter_input(INPUT_POST, 'homeTown');
	$birthDate = filter_input(INPUT_POST, 'birthDate');
	$deathDate = filter_input(INPUT_POST, 'deathDate');
	$artistFunFact = filter_input(INPUT_POST, 'artistFunFact');
	$message = $artistDB->addArtistToDB($stageName, $birthName, $homeTown, $birthDate, $deathDate, $artistFunFact);
	$artists = $artistDB->getArtists();
    include('view/all_artists_list.php');
	
} else if ($action == 'add_album') {
	$artists = $artistDB->getArtists();
	include('view/add_album.php');
	
} else if ($action == 'album_add') {
	$albumTitle = filter_input(INPUT_POST, 'albumTitle');
	$recordLabel = filter_input(INPUT_POST, 'recordLabel');
	$genre = filter_input(INPUT_POST, 'genre');
	$releaseDate = filter_input(INPUT_POST, 'releaseDate');
	$albumFunFact = filter_input(INPUT_POST, 'albumFunFact');
	$message = $albumDB->addAlbumToDB($albumTitle, $recordLabel, $genre, $releaseDate, $albumFunFact);
	$albums = $albumDB->getAlbums();
	include('view/all_albums_list.php');
	
	
} else if ($action == 'add_song') {
	$albumID = filter_input(INPUT_GET, 'album_id');
	$album = $albumDB->getAlbum($albumID);
	include('view/add_song.php');
	
} else if ($action =='song_add') {
	$songTitle = filter_input(INPUT_POST, 'songTitle');
	$albumID = filter_input(INPUT_GET, 'album_id');
	$songLength = filter_input(INPUT_POST, 'songLength');
	$songWriter = filter_input(INPUT_POST, 'songWriter');
	$topRank = filter_input(INPUT_POST, 'topRank');
	$rankDate = filter_input(INPUT_POST, 'rankDate');
	$userComment = filter_input(INPUT_POST, 'userComment');
	$message = $songDB->addSongToDB($songTitle, $albumID, $songLength, $songWriter, $topRank, $rankDate, $userComment);
	$album = $albumDB->getAlbum($albumID);
	$songs = $songDB->getSongsFromAlbum($albumID);
    include('view/indiv_album_view.php');
	
} else if ($action == 'delete_artist') {
	$artistID = filter_input(INPUT_GET, 'artist_id');
	$message = $artistDB->deleteArtistFromDB($artistID);
	$artists = $artistDB->getArtists();
    include('view/all_artists_list.php');
	
} else if ($action == 'delete_album') {
	$albumID = filter_input(INPUT_GET, 'album_id');
	$message = $albumDB->deleteAlbumFromDB($albumID);
	$albums = $albumDB->getAlbums();
    include('view/all_albums_list.php');
	
} else if ($action == 'delete_song') {
	$songID = filter_input(INPUT_GET, 'song_id');
	$albumID = filter_input(INPUT_GET, 'album_id');
	$message = $songDB->deleteSongFromDB($songID);
	$album = $albumDB->getAlbum($albumID);
	$songs = $songDB->getSongsFromAlbum($albumID);
    include('view/indiv_album_view.php');
	
} else if ($action == 'update_artist') {
	$artistID = filter_input(INPUT_GET, 'artist_id');
	$artist = $artistDB->getArtist($artistID);
	include('view/update_artist.php');
	
} else if ($action == 'artist_update') {
	$artistID = filter_input(INPUT_POST, 'artistID');
	$stageName = filter_input(INPUT_POST, 'stageName');
	$birthName = filter_input(INPUT_POST, 'birthName');
	$homeTown = filter_input(INPUT_POST, 'homeTown');
	$birthDate = filter_input(INPUT_POST, 'birthDate');
	$deathDate = filter_input(INPUT_POST, 'deathDate');
	$artistFunFact = filter_input(INPUT_POST, 'artistFunFact');
	$message = $artistDB->updateArtist($artistID, $stageName, $birthName, $homeTown, $birthDate, $deathDate, $artistFunFact);
	$artist = $artistDB->getArtist($artistID);
	$songs = $songDB->getSongsByArtist($artistID);
    include('view/indiv_artist_view.php');
	
} else if ($action == 'update_album') {
	$albumID = filter_input(INPUT_GET, 'album_id');
	$artists = $artistDB->getArtists();
	$album = $albumDB->getAlbum($albumID);
	include('view/update_album.php');
	
} else if ($action == 'album_update') {
	$albumID = filter_input(INPUT_POST, 'albumID');
	$artistID = filter_input(INPUT_POST, 'artist_id');
	$albumTitle = filter_input(INPUT_POST, 'albumTitle');
	$recordLabel = filter_input(INPUT_POST, 'recordLabel');
	$genre = filter_input(INPUT_POST, 'genre');
	$releaseDate = filter_input(INPUT_POST, 'releaseDate');
	$albumFunFact = filter_input(INPUT_POST, 'albumFunFact');
	$message = $albumDB->updateAlbum($albumID, $albumTitle, $recordLabel, $genre, $releaseDate, $albumFunFact);
	$album = $albumDB->getAlbum($albumID);
	$songs = $songDB->getSongsFromAlbum($albumID);
    include('view/indiv_album_view.php');
	
} else if ($action == 'update_song') {
	$songID = filter_input(INPUT_GET, 'song_id');
	$albumID = filter_input(INPUT_GET, 'album_id');
	$song = $songDB->getSong($songID);
	$album = $albumDB->getAlbumOfSong($songID);
	include('view/update_song.php');
	
} else if ($action == 'song_update') {
	$songID = filter_input(INPUT_GET, 'song_id');
	$songTitle = filter_input(INPUT_POST, 'songTitle');
	$albumID = filter_input(INPUT_GET, 'album_id');
	$songLength = filter_input(INPUT_POST, 'songLength');
	$songWriter = filter_input(INPUT_POST, 'songWriter');
	$topRank = filter_input(INPUT_POST, 'topRank');
	$rankDate = filter_input(INPUT_POST, 'rankDate');
	$userComment = filter_input(INPUT_POST, 'userComment');
	$message = $songDB->updateSong($songID, $songTitle, $albumID, $songLength, $songWriter, $topRank, $rankDate, $userComment);
	$song = $songDB->getSong($songID);
	$album = $albumDB->getAlbum($albumID);
    include('view/indiv_song_view.php');
}

?>