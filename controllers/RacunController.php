<?php

class RacunController
{
	function dohvatiSve()
	{
		echo "RacunController - dohvatiSve";
	}

	function unesi($sifra_racuna, $id_konobara, $id_stola, $ukupan_iznos)
	{
		Racun::unesi($sifra_racuna, $id_konobara, $id_stola, $ukupan_iznos);
	}

	function dohvatiIdPrekoSifre($sifra)
	{
		echo $id = Racun::dohvatiIdPrekoSifre($sifra) ? json_encode(array(array("id" => Racun::dohvatiIdPrekoSifre($sifra)))) : json_encode(array(array("error" => "Nema rezultata!")));
	}
}