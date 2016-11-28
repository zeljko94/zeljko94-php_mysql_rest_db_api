<?php

class Stol implements \JsonSerializable
{
	private $id;
	private $broj_stola;

	public function Stol($broj_stola)
	{
		$this->id = 0;
		$this->broj_stola = $broj_stola;
	}

	public function jsonSerialize()
	{
		$var = get_object_vars($this);
		return $var;
	}

	public static function fromStdClass(\stdClass $s)
	{
		$me = new Stol($s->broj_stola);
		$me->setId($s->id);
		return $me;
	}

	// PUBLIC METODE

	public static function dohvatiSve()
	{
		$db = new DB();
		$db->Query("SELECT * FROM stolovi");

		$stolovi = [];
		foreach($db->getResult() as $s)
		{
			$stol = new Stol($s['broj_stola']);
			$stol->setId($s['id']);
			array_push($stolovi, $stol);
		}
		return $stolovi;
	}

	public function unesi()
	{
		$db = new DB();
		$db->Query("INSERT INTO stolovi(broj_stola) VALUES(?)", [$this->broj_stola]);
	}

	// GETTERI
	public function getBrojStola(){ return $this->broj_stola; }
	public function getId(){ return $this->id; }

	// SETTERI
	public function setBrojStola($broj_stola){ $this->broj_stola = $broj_stola; }
	public function setId($id){ $this->id = $id; }
}