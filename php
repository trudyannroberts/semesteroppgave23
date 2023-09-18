<?php
//EKSEMPEL 1
$postnr=$_POST ["postnr"];

$lovligPostnr=true;

if (!$postnr)  //postnr er ikke fyllt ut
{
    print("Postnr er ikke fyllt ut <br>");
    $lovligPostnr=false;
}
else if (strlen($postnr)!=4) //Postnr har ikke fire tegn. strlen (string length) forteller oss hvor mange tegn bruker has tastet inn. != betyr "ikke lik"
{
    print("Postnr har ikke fire tegn <br>");
    $lovligPostnr=false;
}
else if (!ctype_digit($postnr)) //hvis man skriver bokstaver i stedet for siffer. ctype_digit registrerer om det bare er sifre. Utropstegnet viser hvis det IKKE bare er siffer.
{
    print("Postnr skal kun ha siffre, ikke bokstaver");
    $lovligPostnr=false;
}
if($lovligPostnr) //postnr er korrekt fyllt ut. $lovligPostnr betyr $lovligPostnr==true.
{
    print("Postnr er korrekt fyllt ut");
    $lovligPostnr=true;
}
?>


<?php
//EKSEMPEL 2
$klassekode=$_POST["klassekode"];

$lovligKlassekode=true;

if(!$klassekode)
{
    print("Klassekode er ikke fyllt ut <br>");
    $lovligKlassekode=false;
}
else if (strlen($klassekode)!=3) //denne vises dersom det IKKE er tre tegn
{
    print("Klassekode har ikke tre tegn <br>");
    $lovligKlassekode=false;
}
else  //sjekke tegn for tegn
{
    $tegn1=$klassekode[0]; //første tegn i klassekode
    $tegn2=$klassekode[1];
    $tegn3=$klassekode[2];

    if(!ctype_alpha($tegn1)) //sjekker om @tegn ikke er en bokstav.
    {
        print("F&oslash;rste tegn er ikke en bokstav <br>");
        $lovligKlassekode=false;
    }
    if(!ctype_alpha($tegn2))
    {
        print("Andre tegn er ikke en bokstav <br>");
        $lovligKlassekode=false;
    }
    if(!ctype_digit($tegn3)) //tredje tegnet skal være et siffer, så her sjekker vi om det ikke er siffer med ctype_digit i stedet for ctype_alpha
    {
        print("Tredje tegn er ikke et siffer <br>");
        $lovligKlassekode=false;
    }
if($lovligKlassekode)
{
    print("Du har fyllt ut klassekode<br>");
    $lovligKlassekode=true;
}

}

?>

<?php

//EKSEMPEL 3
$emnekode=$_POST["emnekode"];

$lovligEmnekode=true;

if(!$emnekode)
{
    print("Emnekode er ikke fyllt ut <br>");
    $lovligEmnekode=false;
}
else if (strlen($emnekode)!=7) //denne vises dersom koden IKKE har syv tegn
{
    print("Emnekode har ikke syv tegn <br>");
    $lovligEmnekode=false;
}
else  //sjekke del for del (ikke tegn for tegn slik som eks 2). OBS: Husk at tegn 1 starter på 0!!
{
    $del1=substr($emnekode,0,3); //sjekker de første tre første tegnene i emnekode. substr sjekker en del av en streng. 0 viser hvor den skal lese fra og 3 viser hvor mange tegn den skal lese
    $del2=substr($emnekode,3,3); //sjekker tegn 4-6. substr henter fra 3 og skal sjekke tre tegn.
    $del3=substr($emnekode,6,1); //sjekker det siste tegnet. Henter det syvende tegnet (6) og sjekker ett tegn (1)

    if(!ctype_alpha($del1)) //her skriver man "if" og ikke "else if" fordi man kan skrive alle feil, så alle kan sjekkes samtidig.
    {
        print("Tegn 1-3 er skal bare ha bokstaver <br>");
        $lovligEmnekode=false;
    }
    if(!ctype_digit($del2))
    {
        print("Tegn 3-4 er skal bare ha siffer <br>");
        $lovligEmnekode=false;
    }
    if(!ctype_alpha($del3) and !ctype_digit($del3)) //hvis man ikke skriver inn bokstav eller siffer på siste tegn
    {
        print("Du m&oslash; skrive et siffer eller en bokstav");
        $lovligEmnekode=false;
    }
if ($lovligEmnekode)
{
    print("Du har fyllt ut emnekode<br>");
    $lovligEmnekode=true;
}
}

?>

<?php /* Oppgave 1 */

//EKSEMPEL 4
/*
/* Programmet mottar fra et HTML-skjema et fornavn og et etternavn
/* Programmet skriver data (fornavn og etternavn) til filen "navn.txt"
*/
$filnavn="filer/navn.txt"; /* filnavn angitt */
$navn=$_POST ["navn"];
$navn=trim($navn); //fjerner mellomrom i starten og slutten "trimmet" vekk

$filoperasjon="r";
print ("F&oslash;lgende personer passer til s&oslash;kekriteriet <br> ");
{
print ("Begge feltene må fylles ut");
}

$fil = fopen($filnavn,$filoperasjon); /* filen åpnet */

while ($linje=fgets($fil))
{
    if (linje !="")
    {
        $del=explode(";",$linje);
        $fornavn=trim($del[0]);
        $etternavn=trim($del[1]);

        if(strtoupper($navn)==strtoupper($fornavn) or strtoupper($navn)==strtoupper($etternavn)) //strtoupper = string to upper. Navnet er gjort om til store bokstaver
        {
            print("$fornavn $etternavn <br>");
        }
    }
}
fclose ($fil); /* filen lukket */
?>
