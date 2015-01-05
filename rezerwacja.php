<?php
require 'header.php';
include 'mc.php';
session_start();
//zmienne
$imie=$_POST['imie'];
$nazwisko=$_POST['nazwisko'];
$email=$_POST['email'];
$telefon=$_POST['telefon'];
$rodzaj=$_POST['rodzaj'];
$kalendarzprzyjazd=$_POST['kalendarzprzyjazd'];
$kalendarzwyjazd=$_POST['kalendarzwyjazd'];
$osoby=$_POST['osoby'];
$uwagi=$_POST['uwagi'];

$imie=addslashes($imie);
$nazwisko=addslashes($nazwisko);
$email=addslashes($email);
$telefon=addslashes($telefon);
$rodzaj=addslashes($rodzaj);
$kalendarzprzyjazd=addslashes($kalendarzprzyjazd);
$kalendarzwyjazd=addslashes($kalendarzwyjazd);
$osoby=addslashes($osoby);
$uwagi=addslashes($uwagi);

/*
$db = new mysql;
$db->wpisz_dane();
$db->polacz();
*/
$db=mysqli_connect("localhost","dkobylinski","kasztan2","dkobylinski_baza");
	//zwraca roznice dni w sekundach dlatego trzeba podzielic przez 86400
	date_default_timezone_set('Europe/Warsaw');
	$result=round((strtotime($kalendarzwyjazd)-strtotime($kalendarzprzyjazd))/86400); 
	
	$a="select * from pokoj where pokoj.rodzaj='$rodzaj'";
	$b=mysqli_query($db,$a);
	
	if(mysqli_num_rows($b) > 0) {
    /* jeżeli wynik jest pozytywny, to wyświetlamy dane */
    echo "<table cellpadding=\"2\" border=1>";
    while($r = mysqli_fetch_assoc($b)) {
        echo "<tr>";
        echo "<td>".$r['numer']."</td>";
        echo "<td>".$r['wielkosc']."</td>";
		echo "<td>".$r['rodzaj']."</td>";
        echo "</tr>";
    }
    echo "</table>";
} 
	
	$zapytanie= "insert into klient(imie,nazwisko,telefon,email,login,haslo) values ('$imie','$nazwisko','$telefon','$email','$login','".sha1($haslo)."')";
	$zapytanie2="insert into rezerwacja(poczatek_rezerwacji,koniec_rezerwacji,koszt_calkowity,id_pokoj,id_pracownik,id_klient)
		values ('$kalendarzprzyjazd','$kalendarzwyjazd','$result','1','1','1')";
	$wynik=$db->query($zapytanie);
	$wynik2=$db->query($zapytanie2);
	if($result>=0)
	{
		if($wynik2)
			echo 'poprawnie<br>';
		else echo 'Błąd. Sprawdź czy wypełniłeś poprawnie pola.<br>';
		if($wynik)
			echo $db->affected_rows.' uzytkownik dodany <br>', $imie;
		else echo 'Błąd! Użytkownik niedodany';
	}
	
	else echo '<span style="color:red;">Data przyjazdu jest większa niż data wyjazdu.<br></span>';
require 'footer.php';
?>