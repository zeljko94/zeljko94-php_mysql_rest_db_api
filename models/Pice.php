<?php

class Pice implements \JsonSerializable
{
	private $id;
	private $sifra_pica;
	private $naziv_pica;
	private $cijena;
	private $kolicina;
	private $kategorija;

	public function Pice($sifra_pica,$naziv_pica,$cijena,$kolicina,$kategorija)
	{
		$this->id = 0;
		$this->sifra_pica = $sifra_pica;
		$this->naziv_pica = $naziv_pica;
		$this->cijena = $cijena;
		$this->kolicina = $kolicina;
		$this->kategorija = $kategorija;
	}

	public function jsonSerialize()
	{
		$var = get_object_vars($this);
		return $var;
	}

	public static function fromStdClass(\stdClass $p)
	{
		$me = new Pice($p->sifra_pica,$p->naziv_pica,$p->cijena,$p->kolicina,$p->kategorija);
		$me->setId($p->id);
		return $me;
	}

	// public metode

	public static function dohvatiPrekoId($id)
	{
		$db = new DB();
		$db->Query("SELECT * FROM pica WHERE id=?", [$id]);

		if($db->getResult())
		{
			$r = $db->getResult()[0];
			$pice = new Pice($r['sifra_pica'], $r['naziv_pica'], $r['cijena'], $r['kolicina'], $r['kategorija']);
			$pice->setId($r['id']);
			return $pice;
		}
		else return false;
	}

	public static function dohvatiSve()
	{
		$db = new DB();
		$db->Query("SELECT * FROM pica");

		$pica = [];
		foreach($db->getResult() as $p)
		{
			$pice = new Pice($p['sifra_pica'], $p['naziv_pica'], $p['cijena'], $p['kolicina'], $p['kategorija']);
			$pice->setId($p['id']);
			array_push($pica, $pice);
		}
		return $pica;
	}

	public static function dohvatiKategorije()
	{
		$db = new DB();
		$db->Query("SELECT DISTINCT kategorija FROM pica");

		$kategorije = [];
		foreach($db->getResult() as $r)
		{
			$kategorija = $r['kategorija'];
			array_push($kategorije, $kategorija);
		}
		return $kategorije;
	}

	public static function dohvatiPrekoKategorije($kategorija)
	{
		$db = new DB();
		$db->Query("SELECT * FROM pica WHERE kategorija=?", [$kategorija]);

		$pica = [];
		foreach($db->getResult() as $p)
		{
			$pice = new Pice($p['sifra_pica'], $p['naziv_pica'], $p['cijena'], $p['kolicina'], $p['kategorija']);
			$pice->setId($p['id']);
			array_push($pica, $pice);
		}
		return $pica;
	}
	// GETTERI
	public function getId(){ return $this->id; }
	public function getSifraPica(){ return $this->sifra_pica; }
	public function getNazivPica(){ return $this->naziv_pica; }
	public function getCijena(){ return $this->cijena; }
	public function getKolicina(){ return $this->kolicina; }
	public function getKategorija(){ return $this->kategorija; }

	// SETTERI
	public function setId($id){ $this->id = $id; }
	public function setSifraPica($sifra_pica){ $this->sifra_pica = $sifra_pica; }
	public function setNazivPica($naziv_pica){ $this->naziv_pica = $naziv_pica; }
	public function setCijena($cijena){ $this->cijena = $cijena; }
	public function setKolicina($kolicina){ $this->kolicina = $kolicina; }
	public function setKategorija($kategorija){ $this->kategorija = $kategorija; }
}