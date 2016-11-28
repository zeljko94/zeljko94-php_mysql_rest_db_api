<?php

class Konobar implements \JsonSerializable
{
	private $id;
	private $ime;
	private $prezime;
	private $username;
	private $password;
	private $broj_telefona;
	private $privilegije;

	public function Konobar($ime,$prezime,$username,$password,$broj_telefona,$privilegije)
	{
		$this->id = 0;
		$this->ime = $ime;
		$this->prezime = $prezime;
		$this->username = $username;
		$this->password = $password;
		$this->broj_telefona = $broj_telefona;
		$this->privilegije = $privilegije;
	}


	public function jsonSerialize()
	{
		$var = get_object_vars($this);
		return $var;
	}

	public static function fromStdClass(\stdClass $k)
	{
		$me = new Konobar($k->ime, $k->prezime, $k->username, $k->password, $k->broj_telefona, $k->privilegije);
		$me->setId($k->id);
		return $me;
	}

	public static function dohvatiPrekoUsernameIPassword($username, $password)
	{
		$db = new DB();
		$db->Query("SELECT * FROM konobari WHERE username=? AND password=?", [$username, $password]);

		if($db->getResult())
		{
			$r = $db->getResult()[0];
			$konobar = new Konobar($r['ime'], $r['prezime'], $r['username'], $r['password'], $r['broj_telefona'], $r['privilegije']);
			$konobar->setId($r['id']);
			return $konobar;
		}
		else return false;
	}

	public static function login($username, $password)
	{
		$db = new DB();
		$db->Query("SELECT * FROM konobari WHERE username=? AND password=?", [$username, $password]);
		if($db->getResult()) return true;
		else return false;
	}

	// GETTERI
	public function getId(){ return $this->id; }
	public function getIme(){ return $this->ime; }
	public function getPrezime(){ return $this->prezime; }
	public function getUsername(){ return $this->username; }
	public function getPassword(){ return $this->password; }
	public function getBrojTelefona(){ return $this->broj_telefona; }
	public function getPrivilegije(){ return $this->privilegije; }

	// SETTERI
	public function setId($id){ $this->id = $id; }
	public function setIme($ime){ $this->ime = $ime; }
	public function setPrezime($prezime){ $this->prezime = $prezime; }
	public function setUsername($username){ $this->username = $username; }
	public function setPassword($password){ $this->password = $password; }
	public function setBrojTelefona($broj_telefona){ $this->broj_telefona = $broj_telefona; }
	public function setPrivilegije($privilegije){ $this->privilegije = $privilegije; }
}