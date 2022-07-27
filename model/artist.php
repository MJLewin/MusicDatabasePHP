<?php
class Artist {
    private $artistID, $stageName, $birthName, $homeTown, $birthDate, $deathDate, $artistFunFact;

    public function __construct() {
        $this->artistID = 0;
        $this->stageName = '';
		$this->birthName = '';
		$this->homeTown = '';
		$this->birthDate = null;
		$this->deathDate = null;
		$this->artistFunFact = '';
    }

    public function getArtistID() {
        return $this->artistID;
    }

    public function setArtistID($value) {
        $this->artistID = $value;
    }

    public function getStageName() {
        return $this->stageName;
    }

    public function setStageName($value) {
        $this->stageName = $value;
    }
	
	public function getBirthName() {
        return $this->birthName;
    }

    public function setBirthName($value) {
        $this->birthName = $value;
    }
	
	public function getHomeTown() {
        return $this->homeTown;
    }

    public function setHomeTown($value) {
        $this->homeTown = $value;
    }
	
	public function getBirthDate() {
        return $this->birthDate;
    }
	
	public function getBirthDate_f() {
		$birthDate = $this->birthDate;
		$date = new DateTime($birthDate);
		$now = new DateTime();
		$interval = $now->diff($date);
		$birthDate_f = $interval->y;
		return $birthDate_f;
	}

    public function setBirthDate($value) {
        $this->birthDate = $value;
    }
	
	public function getDeathDate() {
        return $this->deathDate;
    }
	
	public function getDeathDate_f() {
		$deathDate = $this->deathDate;
		if($deathDate == '0000-00-00') {
			$deathDate_f = "N/A";
		} else {
			$deathDate_f = $deathDate;
		}
		return $deathDate_f;
	}

    public function setDeathDate($value) {
        $this->deathDate = $value;
    }
	
	public function getArtistFunFact() {
        return $this->artistFunFact;
    }

    public function setArtistFunFact($value) {
        $this->artistFunFact = $value;
    }
	
}
?>