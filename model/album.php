<?php
class Album {
    private $albumID, $albumTitle, $recordLabel, $genre, $releaseDate, $albumFunFact;

    public function __construct() {
        $this->albumID = 0;
        $this->albumTitle = '';
		$this->recordLabel = '';
		$this->genre = '';
		$this->releaseDate = null;
		$this->albumFunFact = '';
    }

    public function getAlbumID() {
        return $this->albumID;
    }

    public function setAlbumID($value) {
        $this->albumID = $value;
    }

    public function getAlbumTitle() {
        return $this->albumTitle;
    }

    public function setAlbumTitle($value) {
        $this->albumTitle = $value;
    }
	
	public function getRecordLabel() {
        return $this->recordLabel;
    }

    public function setRecordLabel($value) {
        $this->recordLabel = $value;
    }
	
	public function getGenre() {
        return $this->genre;
    }

    public function setGenre($value) {
        $this->genre = $value;
    }
	
	public function getReleaseDate() {
        return $this->releaseDate;
    }

    public function setReleaseDate($value) {
        $this->releaseDate = $value;
    }

	public function getAlbumFunFact() {
        return $this->albumFunFact;
    }

    public function setAlbumFunFact($value) {
        $this->albumFunFact = $value;
    }
	
}
?>