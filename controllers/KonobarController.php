<?php

class KonobarController
{
	function dohvatiSve()
	{
		echo "KonobarController - dohvatiSve";
	}

	function dohvatiPrekoUsernameIPassword($username, $password)
	{
		echo $konobar = Konobar::dohvatiPrekoUsernameIPassword($username, $password) ? json_encode(array(Konobar::dohvatiPrekoUsernameIPassword($username, $password))) : json_encode(array(array("error" => "Nema rezultata!")));
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

	function login($username,$password)
	{
		echo $isOk = Konobar::login($username,$password) ? json_encode(array(array("success" => "Usjpesno ste ulogirani!"))) : json_encode(array(array("error" => "Greska prilikom logiranja!")));
	}
}