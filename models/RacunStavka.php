<?php

class RacunStavka implements \JsonSerializable
{
	private $id;
	private $kolicina;
	private $id_pica;
	private $id_racuna;
	private $cijena_stavke;

	public function RacunStavka($kolicina,$id_pica,$id_racuna,$cijena_stavke)
	{
		$this->id = 0;
		$this->kolicina = $kolicina;
		$this->id_pica = $id_pica;
		$this->id_racuna = $id_racuna;
		$this->cijena_stavke = $cijena_stavke;
	}


	public function jsonSerialize()
	{
		$var = get_object_vars($this);
		return $var;
	}

	public static function fromStdClass(\stdClass $rs)
	{
		$me = new RacunStavka($rs->kolicina,$rs->id_pica,$rs->id_racuna,$rs->cijena_stavke);
		$me->setId($rs->id);
		return $me;
	}

	public static function unesi($kolicina, $id_pica, $id_racuna, $cijena_stavke)
	{
		$db = new DB();
		$db->Query("INSERT INTO racun_stavke(kolicina, id_pica, id_racuna, cijena_stavke) VALUES(?,?,?,?)",
				    [$kolicina, $id_pica, $id_racuna, $cijena_stavke]);
	}

	// getteri
	public function getId(){ return $this->id; }
	public function getKolicina(){ return $this->kolicina; }
	public function getIdPica(){ return $this->id_pica; }
	public function getIdRacuna(){ return $this->id_racuna; }
	public function getCijenaStavke(){ return $this->cijena_stavke; }

	// setteri
	public function setId($id){ $this->id = $id; }
	public function setKolicina($kolicina){ $this->kolicina = $kolicina; }
	public function setIdPica($id_pica){ $this->id_pica = $id_pica; }
	public function setIdRacuna($id_racuna){ $this->id_racuna = $id_racuna; }
	public function setCijenaStavke($cijena_stavke){ $this->cijena_stavke = $cijena_stavke; }
}