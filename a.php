<HTML>
<HEAD>
<meta charset="utf-8">
<title> Rezrwacja pokoju</title>
</HEAD>
<BODY>
<div class="arrow" id="content">
<script language = "Javascript" type="text/javascript">
		/* <![CDATA[ */
			function echeck(myVar) {
				var str = myVar.value;
				var at="@"
				var dot="."
				var lat=str.indexOf(at)
				var lstr=str.length
				var ldot=str.indexOf(dot)
				if (str.indexOf(at)==-1){
				   alert('Podaj poprawny adres email.')
				   myVar.focus();
				   return false
				}

				if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
				   alert('Podaj poprawny adres email.')
				   myVar.focus();
				   return false
				}

				if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
				    alert('Podaj poprawny adres email.')
				    myVar.focus();
				    return false
				}

				 if (str.indexOf(at,(lat+1))!=-1){
				    alert('Podaj poprawny adres email.')
				    myVar.focus();
				    return false
				 }

				 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
				    alert('Podaj poprawny adres email.')
				    myVar.focus();
				    return false
				 }


				 if (str.indexOf(dot,(lat+2))==-1){
				    alert('Podaj poprawny adres email.')
				    myVar.focus();
				    return false
				 }

				 if (str.indexOf(" ")!=-1){
				    alert('Podaj poprawny adres email.')
				    myVar.focus();
				    return false
				 }

			 		 return true
			}

			function isNumber(myVar){

				var checkOK = "0123456789";
				var checkStr = myVar.value;
				var allValid = true;
				var allNum = "";
				for (i = 0;  i < checkStr.length;  i++){
					ch = checkStr.charAt(i);
					for (j = 0;  j < checkOK.length;  j++)
						if (ch == checkOK.charAt(j))
					break;
					if (j == checkOK.length){
						allValid = false;
						break;
					}
					if (ch != ",")
						allNum += ch;
				}
				if (!allValid || myVar.value == ''){
				alert(myVar.id + ' wpisz cyfrę');
				myVar.focus();
				return (false);
				}
				return true
			}
			function notEmpty(myVar){
				if (myVar.value == ''){
					alert(myVar.id + ' brak wpisu-wypełnij!')
					myVar.focus();
					return false
				}
				return true
			}


			function ValidateForm(fields){
				for(i=0;i<fields['email'].length;i++){
					myVar = document.getElementById(fields['email'][i]);
					if (!echeck(myVar)) return false;
				}
				for(i=0;i<fields['number'].length;i++){
					myVar = document.getElementById(fields['number'][i]);
					if (!isNumber(myVar)) return false;
				}
				for(i=0;i<fields['mandatory'].length;i++){
					myVar = document.getElementById(fields['mandatory'][i]);
					if (!notEmpty(myVar)) return false;
				}


			 }
			/* ]]> */
			/*document.getElementById('wyslij').onclick = ValidateForm*/
		</script>

<h1 style="font-family:arial;font-size:20px;text-align:center">Formularz rezerwacji</h1>
<form name="FormularzRezerwacji" id="FormularzRezerwacji" method="post" action="rezerwacja.php"  onsubmit="return ValidateForm(fields);">
<table width="100%" border="0" cellpadding="2" cellspacing="2" >
<tr>
<td align="right" valign="top">Imię *</td>
<td width="20"></td>
<td valign="top"><input type="text" name="imie" value="" id="imie"  /></td>
<td valign="top"></td>
</tr><tr>

<td align="right" valign="top">Nazwisko *</td>
<td width="20"></td>
<td valign="top"><input type="text" name="nazwisko" value="" id="nazwisko"  /></td>
<td valign="top"></td>
</tr><tr>
<td align="right" valign="top">Telefon *</td>
<td width="20"></td>
<td valign="top"><input type="text" name="telefon" value="" id="telefon"  /></td>
<td valign="top"></td>
</tr><tr>
<td align="right" valign="top">Email *</td>
<td width="20"></td>
<td valign="top"><input type="text" name="email" value="" id="email"  /></td>
<td valign="top"></td>
</tr><tr>
<td align="right" valign="top">Rodzaj pokoju</td>
<td width="20"></td>
<!--
<select>
     <?php foreach ($options as $option): ?>
         <option value="<?php echo $option; ?>"<?php if ($row['rodzaj'] == $option): ?> selected="selected"<?php endif; ?>>
             <?php echo $option; ?>
         </option>
     <?php endforeach; ?>
 </select>
-->

<td valign="top">
<select name="rodzaj"  id="rodzaj" >
	<option value="Pokój 1 osobowy">Pokój 1 osobowy</option>
	<option value="Pokój 2 osobowy">Pokój 2 osobowy</option>
	<option value="Pokój 3 osobowy">Pokój 3 osobowy</option>
	<option value="Pokój 4 osobowy">Pokój 4 osobowy</option>
	<option value="apartament">Apartament</option>
</select></td>

<td valign="top"></td>
</tr><tr>
<td align="right" valign="top">Data przyjazdu</td>
<td width="20"></td>
<td valign="top"><input id="kalendarzprzyjazd" name="kalendarzprzyjazd" value="" size="15" maxlength="10"/>
			<input class="button" value="..." onclick="return showCalendar('kalendarzprzyjazd', 'Y-m-d');" type="button"/></td>
<td valign="top"></td>
</tr><tr>
<td align="right" valign="top">Data wyjazdu:</td>
<td width="20"></td>
<td valign="top"><input id="kalendarzwyjazd" name="kalendarzwyjazd" value="" size="15" maxlength="10"/>
			<input class="button" value="..." onclick="return showCalendar('kalendarzwyjazd', 'Y-m-d');" type="button"/></td>
<td valign="top"></td>
</tr><tr>
<td align="right" valign="top">Ilość osób</td>
<td width="20"></td>
<td valign="top"><input type="text" name="osoby" value="" id="osoby"  /></td>
<td valign="top"></td>
</tr><tr>
<td align="right" valign="top">Uwagi:</td>
<td width="20"></td>
<td valign="top"><textarea name="uwagi" id="uwagi" style="high:500 px;"></textarea></td>
<td valign="top"></td>
</tr><tr>
<td align="right" valign="top"></td>
<td width="20"></td>
<td valign="top"><input type="submit" name="wyslij" onclick="action" value="Wyślij" id="wyslij" style="width:80px;" /></td>
<td valign="top"></td>
</tr>
</table>
</form>
<script language="javascript" type="text/javascript">
/* <![CDATA[ */
fields = new Array();fields['email'] = new Array();
fields['number'] = new Array();
fields['mandatory'] = new Array();
fields['email'][0] = 'email';
fields['number'][0] = 'telefon';
fields['mandatory'][0] = 'imie';
fields['mandatory'][1] = 'adres';
/* ]]> */
</script>
</div>
</BODY>
</HTML>