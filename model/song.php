<?php
class Song {
    private $songID, $songTitle, $albumID, $songLength, $songWriter, $topRank, $rankDate, $userComment;

    public function __construct() {
        $this->songID = 0;
        $this->songTitle = '';
		$this->albumID = 0;
		$this->songLength = 0;
		$this->songWriter = '';
		$this->topRank = 0;
		$this->rankDate = null;
		$this->userComment = '';
    }

    public function getSongID() {
        return $this->songID;
    }

    public function setSongID($value) {
        $this->songID = $value;
    }

    public function getSongTitle() {
        return $this->songTitle;
    }

    public function setSongTitle($value) {
        $this->songTitle = $value;
    }
	
	public function getAlbumID() {
        return $this->albumID;
    }

    public function setAlbumID($value) {
        $this->albumID = $value;
    }
	
	public function getSongLength() {
        return $this->songLength;
    }
	
	public function getSongLength_f() {
		$songLength = $this->songLength;
		$minutes = floor($songLength / 60);
		$seconds = $songLength % 60;
		if($seconds < 10) {
			$songLength_f = sprintf("%d:0%d", $minutes, $seconds);
		} else {
			$songLength_f = sprintf("%d:%d", $minutes, $seconds);
		}
		return $songLength_f;
	}

    public function setSongLength($value) {
        $this->songLength = $value;
    }
	
	public function getSongWriter() {
        return $this->songWriter;
    }

    public function setSongWriter($value) {
        $this->songWriter = $value;
    }
	
	public function getTopRank() {
		return $this->topRank;
	}
	
	public function getTopRank_f() {
		$topRank = $this->topRank;
		if($topRank == 0) {
			$topRank_f = "N/A";
		} else {
			$topRank_f = $topRank;
		}
		return $topRank_f;
	}
	
	public function setTopRank($value) {
		$this->topRank = $value;
	}
	
	public function getRankDate() {
        return $this->rankDate;
    }
	
	public function getRankDate_f() {
		$rankDate = $this->rankDate;
		if($rankDate == "0000-00-00") {
			$rankDate_f = "N/A";
		} else {
			$rankDate_f = $rankDate;
		}
		return $rankDate_f;
	}

    public function setRankDate($value) {
        $this->rankDate = $value;
    }
	
	public function getUserComment() {
        return $this->userComment;
    }

    public function setUserComment($value) {
        $this->userComment = $value;
    }
	
}
?>