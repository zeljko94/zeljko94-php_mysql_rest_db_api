<?php

class PiceController
{

	function index()
	{
		echo "PiceController index!</br>";
	}

	function dohvatiSve()
	{
		echo $pica = Pice::dohvatiSve() ? json_encode(Pice::dohvatiSve(), JSON_UNESCAPED_UNICODE) : json_encode(array(array("error" => "Nema rezultata!")));
	}
	
	function dohvatiPrekoKategorije($kategorija)
	{
		echo $pica = Pice::dohvatiPrekoKategorije($kategorija) ? json_encode(Pice::dohvatiPrekoKategorije($kategorija), JSON_UNESCAPED_UNICODE) : json_encode(array(array("error" => "Nema rezultata!")));
	}
	function dohvatiKategorije()
	{
		echo $kategorije = Pice::dohvatiKategorije() ? json_encode(Pice::dohvatiKategorije(), JSON_UNESCAPED_UNICODE) : json_encode(array(array("error" => "Nema rezultata!")));
	}

	function dohvatiPrekoId($id)
	{
		echo $pice = Pice::dohvatiPrekoId($id) ? json_encode(array(Pice::dohvatiPrekoId($id))) : json_encode(array(array("error" => "Nema rezultata!")));
	}

	function unesi()
	{

	}

	function brisiPrekoId($id)
	{
		
	}
}