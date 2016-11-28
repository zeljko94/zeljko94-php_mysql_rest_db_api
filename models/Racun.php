<?php

class Racun implements \JsonSerializable
{
	private $id;
	private $sifra_racuna;
	private $datum_i_vrijeme;
	private $id_konobara;
	private $id_stola;
	private $ukupan_iznos;

	public function Racun($sifra_racuna,$datum_i_vrijeme,$id_konobara,$id_stola,$ukupan_iznos)
	{
		$this->id = 0;
		$this->sifra_racuna = $sifra_racuna;
		$this->datum_i_vrijeme = $datum_i_vrijeme;
		$this->id_konobara = $id_konobara;
		$this->id_stola = $id_stola;
		$this->ukupan_iznos = $ukupan_iznos;
	}


	public function jsonSerialize()
	{
		$var = get_object_vars($this);
		return $var;
	}

	public static function fromStdClass(\stdClass $r)
	{
		$me = new Racun($r->sifra_racuna, $r->datum_i_vrijeme,$r->id_konobara,$r->id_stola,$r->ukupan_iznos);
		$me->setId($r->id);
		return $me;
	}

	public static function unesi($sifra_racuna, $id_konobara, $id_stola, $ukupan_iznos)
	{
		$db = new DB();
		$db->Query("INSERT INTO racun(sifra_racuna, datum_i_vrijeme, id_konobara, id_stola, ukupan_iznos) VALUES(?,?,?,?,?)",
					[$sifra_racuna, $datum_i_vrijeme, $id_konobara, $id_stola, $ukupan_iznos]);
	}

	public static function dohvatiIdPrekoSifre($sifra)
	{
		$db = new DB();
		$db->Query("SELECT * FROM racun WHERE sifra_racuna=?", [$sifra]);

		if($db->getResult())
		{
			$r = $db->getResult()[0];
			return $r['id'];
		}
		else return false;
	}

	// GETTERI
	public function getId(){ return $this->id; }
	public function getSifraRacuna(){ return $this->sifra_racuna; }
	public function getDatumIVrijeme(){ return $this->datum_i_vrijeme; }
	public function getIdKonobara(){ return $this->id_konobara; }
	public function getIdStola(){ return $this->id_stola; }
	public function getUkupanIznos(){ return $this->ukupan_iznos; }

	// SETTERI
	public function setId($id){ $this->id = $id; }
	public function setSifraRacuna($sifra_racuna){ $this->sifra_racuna = $sifra_racuna; }
	public function setDatumIVrijeme($datum_i_vrijeme){ $this->datum_i_vrijeme = $datum_i_vrijeme; }
	public function setIdKonobara($id_konobara){ $this->id_konobara = $id_konobara; }
	public function setIdStola($id_stola){ $this->id_stola = $id_stola; }
	public function setUkupanIznos($ukupan_iznos){ $this->ukupan_iznos = $ukupan_iznos; }
}