<?php

class StolController
{
	function dohvatiSve()
	{
		echo $stolovi = Stol::dohvatiSve() ? json_encode(Stol::dohvatiSve()) : json_encode(array(array("error" => "Nema rezultata!")));
	}

	function dohvatiPrekoId($id)
	{

	}

	function unesi()
	{
	}

	function brisiPrekoId($id)
	{
		
	}
}