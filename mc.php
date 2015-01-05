<?php
class mysql
{
/*
	define('DBHOST', 'localhost');
	define('DBUSER', 'dkobylinski');
	define('DBPASS', 'kasztan2');
	define('DBNAME', 'dkobylinski_baza');
*/
	public static $login;
	public static $haslo;
	public static $baza;
	public static $IP;
	public static $db;
	public static $wynik;
	public static $zapyt;
	
	
	
	public function wpisz_dane($login="dkobylinski",$haslo="kasztan2",$baza="dkobylinski_baza",$IP="localhost")
	{
		self::$login=$login;
		self::$haslo=$haslo;
		self::$baza=$baza;
		self::$IP=$IP;
	}
	public function polacz()
	{
		self::$db=mysqli_connect(self::$IP,self::$login,self::$haslo,self::$baza) or die('<h2>ERROR</h2> MySQL Server nie odpowiada.');
	}
	public function zapytanie($zapyt="")
	{
		self::$wynik=mysqli_query($zapyt);
		if(mysqli_num_rows(self::$wynik) == 0) 
		{
			return false;
		}
		else
		{
			echo self::$wynik;
			return self::$wynik;
		}
	}
}
/*
class kontroler extends mysql
{

	public function dodaj_uzyt()
	{
		
		this->zapytanie()
		$zapytanie="insert into UZYTKOWNICY(imie,nazwisko,email,login,haslo) values ('$imie','$nazwisko','$email','$login','".sha1($haslo)."')";
	}
	public usun_uzyt();
	public uaktualnij_uzyt();*/
