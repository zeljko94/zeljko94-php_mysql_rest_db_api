<?php

class RacunStavkaController
{
	function dohvatiSve()
	{
		echo "RacunStavkaController - dohvatiSve";
	}

	function unesi($kolicina, $id_pica, $id_racuna, $cijena_stavke)
	{
		RacunStavka::unesi($kolicina,$id_pica,$id_racuna,$cijena_stavke);
	}
}