<?php 

global $_Lang;

/***************************************************************************************************************/
/******************************************** Parámetres avisos legals *****************************************/
/***************************************************************************************************************/

$Alta_Web                  = "2022-12-20"; // Formato AAAA-MM-DD
$domain                    = HostURL();
$name                      = "Nombre de la web";
$nif                       = "B02905909";
$address                   = "C\ Volta de Garrofer, 61 - 08340 - Vilassar de Mar";
$mail                      = "mail#domain.com";
$treatmentResponsible      = "Nombre de la web";
$treatmentResponsiblePhone = "60 065 35 86";
$treatmentResponsibleMail  = "mail#domain.com";
$cookiesURL                = "cookies";
$contactURL                = construct_url("contacto",$_Lang);

/***************************************************************************************************************/
/************************************************ Parámetres Mesos *********************************************/
/***************************************************************************************************************/

$MonthArray1 = $MonthArray2 = array();

$MonthArray1["es"] = [ 1=> "#day# de enero de #year#", 2=> "#day# de febrero de #year#", 3=> "#day# de marzo de #year#", 4=> "#day# de abril de #year#", 5=> "#day# de mayo de #year#", 6=> "#day# de junio de #year#", 7=> "#day# de julio de #year#", 8=> "#day# de agosto de #year#", 9=> "#day# de setiembre de #year#", 10=> "#day# de octubre de #year#", 11=> "#day# de noviembre de #year#", 12=> "#day# de diciembre de #year#"];
$MonthArray1["ca"] = [ 1=> "#day# de gener de #year#", 2=> "#day# de febrer de #year#", 3=> "#day# de març de #year#", 4=> "#day# de abril de #year#", 5=> "#day# de maig de #year#", 6=> "#day# de juny de #year#", 7=> "#day# de juliol de #year#", 8=> "#day# de agost de #year#", 9=> "#day# de setembre de #year#", 10=> "#day# de octubre de #year#", 11=> "#day# de novembre de #year#", 12=> "#day# de decembre de #year#"];
$MonthArray1["en"] = [ 1=> "on January #day#, #year#", 2=> "on February #day#, #year#", 3=> "on March #day#, #year#", 4=> "on April #day#, #year#", 5=> "on May #day#, #year#", 6=> "on June #day#, #year#", 7=> "on July #day#, #year#", 8=> "on August #day#, #year#", 9=> "on September #day#, #year#", 10=> "on October #day#, #year#", 11=> "on November #day#, #year#", 12=> "on December #day#, #year#"];

$MonthArray2["es"] = [ 1=> "enero de #year#", 2=> "febrero de #year#", 3=> "marzo de #year#", 4=> "abril de #year#", 5=> "mayo de #year#", 6=> "junio de #year#", 7=> "julio de #year#", 8=> "agosto de #year#", 9=> "setiembre de #year#", 10=> "octubre de #year#", 11=> "noviembre de #year#", 12=> "diciembre de #year#"];
$MonthArray2["ca"] = [ 1=> "gener de #year#", 2=> "febrer de #year#", 3=> "març de #year#", 4=> "abril de #year#", 5=> "maig de #year#", 6=> "juny de #year#", 7=> "juliol de #year#", 8=> "agost de #year#", 9=> "setembre de #year#", 10=> "octubre de #year#", 11=> "novembre de #year#", 12=> "decembre de #year#"];
$MonthArray2["en"] = [ 1=> "January #year#", 2=> "February #year#", 3=> "March #year#", 4=> "April #year#", 5=> "May #year#", 6=> "June #year#", 7=> "July #year#", 8=> "August #year#", 9=> "September #year#", 10=> "October #year#", 11=> "November #year#", 12=> "December #year#"];

/***************************************************************************************************************/
/******************************************** Parámetres Accessibilitat ****************************************/
/***************************************************************************************************************/

$_Alta_Year                          = substr($Alta_Web,0,4);
$_Alta_Month                         = substr($Alta_Web,5,2);
$_Alta_Day                           = substr($Alta_Web,8,2);
$_Accessibility_SL                   = $name;
$_Accessibility_Web                  = $domain;
$_Accessibility_mail_accesibility    = $mail;
$_Accessibility_phone_accesibility   = $treatmentResponsiblePhone;
$_Accessibility_ministerio           = "Ministerio de Asuntos Económicos y Transformación Digital";
$_Accessibility_Date_Preparation     = ml($MonthArray1[$_Lang][(int) $_Alta_Month],"day->$_Alta_Day|year->$_Alta_Year");
$_Accessibility_Date_Last_Revision   = ml($MonthArray1[$_Lang][(int) $_Alta_Month],"day->$_Alta_Day|year->$_Alta_Year");
$_Accessibility_Date_Alta_Web        = ml($MonthArray2[$_Lang][(int) $_Alta_Month],"day->$_Alta_Day|year->$_Alta_Year");

/***************************************************************************************************************/
/******************************************************** Calculs **********************************************/
/***************************************************************************************************************/
// Calculo fecha revisión

$Today              = date("Y-m-d");
$Fecha_rev          = $Alta_Web;
$Fecha_rev_DateTime = new DateTime($Fecha_rev);
$fecha_hoy_DateTime = new DateTime($Today);
$diff_days          = $fecha_hoy_DateTime->diff($Fecha_rev_DateTime);
$diff_days          = $diff_days->days;

while ($diff_days > 340) {
    $Fecha_rev          = date("Y-m-d",strtotime($Fecha_rev."+ 340 days"));
    $Fecha_rev_DateTime = new DateTime($Fecha_rev);
    $diff_days          = $fecha_hoy_DateTime->diff($Fecha_rev_DateTime);
    $diff_days          = $diff_days->days;
}

$_Rev_Year    = substr($Fecha_rev,0,4);
$_Rev_Month   = substr($Fecha_rev,5,2);
$_Rev_Day     = substr($Fecha_rev,8,2);

$_Accessibility_Date_Last_Revision = ml($MonthArray1[$_Lang][(int) $_Rev_Month],"day->$_Rev_Day|year->$_Rev_Year");;

///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////// CATALAN /////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

$dicl['ca']['AccessibilityTitle']             = "Declaració d'accessibilitat";
$dicl['ca']['AccessibilityMetaDescription']   = "Declaració d'Accessibilitat: Declaració d'Accessibilitat de la web $domain";

$dicl['ca']['AdviseTitle']             = "Avís legal";
$dicl['ca']['CookiesTitle']            = "Política de cookies";
$dicl['ca']['PrivacityTitle']          = "Informació sobre Protecció de Dades";


$dicl['ca']['AdviseDescription']       = "

<h3>1.	Objecte i acceptació</h3>
<p>
El present avís legal regula l'ús del nostre lloc web, del qual és titular <strong>$name</strong> . La navegació pel lloc web de <strong>$name</strong> atribueix la condició d'usuari del mateix i implica l'acceptació plena i sense reserves de totes i cadascuna de les disposicions incloses en aquest Avís Legal, que poden sofrir modificacions. Vostè s'obliga a fer un ús correcte del lloc web de conformitat amb les lleis, la bona fe, l'ordre públic, els usos del trànsit i el present Avís Legal. El vostè respondrà enfront de <strong>$name</strong> o enfront de tercers, de qualssevol danys i perjudicis que poguessin causar-li com a conseqüència de l'incompliment d'aquesta obligació.
</p>

<h3>2.	Identificació i comunicacions</h3>
<strong>$name</strong>, en compliment de la Llei 34/2002, d'11 de juliol, de serveis de la societat de la informació i de comerç electrònic, l'informa que:
<ul>
<li>La seva denominació social és: <strong>$name</strong></li>
<li>El seu CIF és: $nif</li>
<li>El seu domicili social està en: $address</li>
</ul>
Per a comunicar-se amb nosaltres, posem a la seva disposició diferents mitjans de contacte especificats en la política de privacitat.
<p>Totes les notificacions i comunicacions que realitzi amb <strong>$name</strong> es consideraran eficaces, amb caràcter general, sempre que es realitzin pels mitjans especificats anteriorment
</p>

<h3>3.	Condicions d'accés i utilització</h3>
<p>
El lloc web i els seus serveis són d'accés lliure, no obstant això, <strong>$name</strong> condiciona la utilització d'alguns dels serveis oferts en el seu web al previ emplenament del corresponent formulari.
</p><p>Vostè garanteix l'autenticitat i actualitat de totes aquelles dades que comuniqui a <strong>$name</strong> i serà l'únic responsable de les manifestacions falses o inexactes que realitzi.
</p><p>Vostè es compromet expressament a fer un ús adequat dels continguts i serveis del <strong>$name</strong> i a no emprar-los per a, entre altres:
<ul>
<li>Difondre continguts, delictius, violents, pornogràfics, racistes, xenòfob, ofensius, d'apologia del terrorisme o, en general, contraris a la llei o a l'ordre públic.</li>
<li>Introduir en la xarxa virus informàtics o realitzar actuacions susceptibles d'alterar, espatllar, interrompre o generar errors o danys en els documents electrònics, dades o sistemes físics i lògics de <strong>$name</strong> o de terceres persones; així com obstaculitzar l'accés d'altres usuaris al lloc web i als seus serveis mitjançant el consum massiu dels recursos informàtics a través dels quals <strong>$name</strong> presta els seus serveis.</li>
<li>Intentar accedir dades d'altres persones o a àrees restringides dels sistemes informàtics de <strong>$name</strong> o de tercers i, si escau, extreure informació.</li>
<li>Vulnerar els drets de propietat intel·lectual o industrial, així com violar la confidencialitat de la informació de <strong>$name</strong> o de tercers.</li>
<li>Suplantar la identitat d'un altre usuari, de les administracions públiques o d'un tercer.</li>
<li>Reproduir, copiar, distribuir, posar a disposició o de qualsevol altra forma comunicar públicament, transformar o modificar els continguts, tret que es compti amb l'autorització del titular dels corresponents drets o això resulti legalment permès.</li>
<li>Recaptar dades amb finalitat publicitària i de remetre publicitat de qualsevol classe i comunicacions amb finalitats de venda o unes altres de naturalesa comercial sense que mediï la seva prèvia sol·licitud o consentiment.</li>
</ul>
Tots els continguts del lloc web, com a textos, fotografies, gràfics, imatges, icones, tecnologia, programari, així com el seu disseny gràfic i codis font, constitueixen una obra la propietat de la qual pertany a <strong>$name</strong>, sense que puguin entendre's com cedits cap dels drets d'explotació sobre els mateixos més enllà de l'estrictament necessari per al correcte ús de la web.
<p>En definitiva, vostè que accedeix a aquest lloc web, pot visualitzar els continguts i efectuar, si escau, còpies privades autoritzades sempre que els elements reproduïts no siguin cedits posteriorment a tercers, ni s'instal·lin a servidors connectats a xarxes, ni siguin objecte de cap mena d'explotació.
</p><p>Així mateix, totes les marques, noms comercials o signes distintius de qualsevol classe que apareixen en el lloc web són propietat de <strong>$name</strong>, sense que pugui entendre's que l'ús o accés al mateix li atribueixi dret algun sobre aquests.
</p><p>La distribució, modificació, cessió o comunicació pública dels continguts i qualsevol altre acte que no hagi estat expressament autoritzat pel titular dels drets d'explotació queden prohibits.
</p><p>L'establiment d'un hipervincle no implica en cap cas l'existència de relacions entre <strong>$name</strong> i el propietari del lloc web en la qual s'estableixi, ni l'acceptació i aprovació per part <strong>de $name</strong> dels seus continguts o serveis. Aquelles persones que es proposin establir un hipervincle prèviament hauran de sol·licitar autorització per escrit a <strong>$name</strong>. En tot cas, el hipervincle únicament permetrà l'accés a la homepage o pàgina d'inici del nostre lloc web, així mateix haurà d'abstenir-se de realitzar manifestacions o indicacions falses, inexactes o incorrectes sobre <strong>$name</strong>, o incloure continguts il·lícits, contraris als bons costums i a l'ordre públic.
</p><p><strong>$name</strong> no es responsabilitza de l'ús que cada usuari li doni als materials posats a disposició en aquest lloc web ni de les actuacions que realitzi sobre la base d'aquests.
</p>

<h3>4.	Exclusió de garanties i de responsabilitat</h3>
<p>
<strong>$name</strong> exclou, fins on permet l'ordenament jurídic, qualsevol responsabilitat pels danys i perjudicis de tota naturalesa derivats de:
</p><p><ul>
<li>La impossibilitat d'accés al lloc web o la falta de veracitat, exactitud, exhaustivitat i/o actualitat dels continguts, així com l'existència de vicis i defectes de tota classe dels continguts transmesos, difosos, emmagatzemats, posats a disposició als quals s'hagi accedit a través del lloc web o dels serveis que s'ofereixen.</li>
<li>La presència de virus o d'altres elements en els continguts que puguin produir alteracions en els sistemes informàtics, documents electrònics o dades dels usuaris.</li>
<li>L'incompliment de les lleis, la bona fe, l'ordre públic, els usos del trànsit i el present avís legal com a conseqüència de l'ús incorrecte del lloc web. En particular, i a manera exemplificativa, <strong>$name</strong> no es fa responsable de les actuacions de tercers que vulnerin drets de propietat intel·lectual i industrial, secrets empresarials, drets a l'honor, a la intimitat personal i familiar i a la pròpia imatge, així com la normativa en matèria de competència deslleial i publicitat il·lícita.</li>
</ul>
<p>Així mateix, <strong>$name</strong> declina qualsevol responsabilitat respecte a la informació que es trobi fora d'aquesta web i no sigui gestionada directament pel nostre webmaster. La funció dels links que apareixen en aquesta web és exclusivament la d'informar l'usuari sobre l'existència d'altres fonts susceptibles d'ampliar els continguts que ofereix aquest lloc web. <strong>$name</strong> no garanteix ni es responsabilitza del funcionament o accessibilitat dels llocs enllaçats; ni suggereix, convida o recomana la visita a aquests, per la qual cosa tampoc serà responsable del resultat obtingut. <strong>$name</strong> no es responsabilitza de l'establiment de hipervincles per part de tercers.
</p>

<h3>5.	Procediment en cas de realització d'activitats de caràcter il·lícit</h3>
<p>
En el cas que vostè o un tercer consideri que existeixen fets o circumstàncies que revelin el caràcter il·lícit de la utilització de qualsevol contingut i/o de la realització de qualsevol activitat en les pàgines web incloses o accessibles a través del lloc web, haurà de posar-se en contacte amb <strong>$name</strong> identificant-se degudament, especificant les suposades infraccions i declarant expressament i sota la seva responsabilitat que la informació proporcionada en la notificació és exacta.
</p><p>Per a tota qüestió litigiosa que incumbeixi al lloc web de <strong>$name</strong>, serà aplicable la legislació espanyola, sent competents els Jutjats i Tribunals més pròxims a la seu de (Espanya).
</p>

<h3>6.	Publicacions</h3>
<p>
La informació administrativa facilitada a través del lloc web no substitueix la publicitat legal de les lleis, normatives, plans, disposicions generals i actes que hagin de ser publicats formalment als diaris oficials de les administracions públiques, que constitueixen l'únic instrument que dóna fe de la seva autenticitat i contingut. La informació disponible en aquest lloc web ha d'entendre's com una guia sense propòsit de validesa legal.
</p>
";

$dicl['ca']['CookiesDescription']      = "

<h3>Informació General de les cookies</h3>
<p>
La confiança de l'usuari és important per a nosaltres, i per tant, en <strong>$name</strong> ens preocupa protegir la seva privacitat. Un aspecte important d'això és proporcionar-li tota la informació possible sobre com utilitzem les teves dades de caràcter personal, fins i tot com utilitzem l'emmagatzematge local de dades i tecnologia similar
</p><p>L'emmagatzematge local de dades implica emmagatzemar diferents tipus de dades localment en el seu dispositiu a través del seu navegador web. Les dades emmagatzemades localment poden, per exemple, contenir la configuració de l'usuari, informació sobre com navega pel nostre lloc web, quin navegador web utilitza, quins anuncis s'han mostrat, i el comportament similar en llocs web amb els quals col·laborem. Les dades emmagatzemades localment poden ser utilitzats per a personalitzar el contingut i les funcions en els nostres serveis de manera que les seves visites siguin més còmodes i tinguin més sentit.
</p><p>Un mètode d'emmagatzematge local de dades són les cookies. Les cookies són petits arxius de text que s'emmagatzemen en el seu dispositiu (PC, telèfon mòbil o tauleta) que ens permeten reconèixer el seu navegador web. Les cookies contenen informació principalment sobre el seu navegador web i sobre qualsevol activitat que s'ha produït en ell. Ens ajuden a garantir la seguretat i el funcionament òptim del nostre lloc web, una vegada surt de la nostra web aquestes són eliminades (cookies de seguretat i cookies de sessió) i recullen informació sobre els productes que els interessen a les nostres visites d'internet i sobre com naveguen a través del nostre lloc web perquè les nostres ofertes online siguin més atractives per als usuaris (cookies de seguiment).
</p>


<h3>Informació complementària de la cookies</h3>
Utilitzem l'emmagatzematge local de dades per a una sèrie de finalitats, tals com: permetre'ns realitzar els nostres serveis; aportar-te contingut pertinent, personalitzat quan visites els nostres llocs web; mesurar i analitzar el trànsit en el nostre lloc web; millorar els nostres serveis; i dirigir publicitat específica. A continuació, s'ofereixen més detalls sobre aquests temes:
<ul class='spacer'>
<li>
<strong>Per a la nostra publicitat</strong>
Utilitzem l'emmagatzematge local de dades en relació amb les activitats publicitàries. Això ens permet saber si i amb freqüència l'usuari ha vist un anunci o determinat tipus d'anunci, i quant temps fa que ho va veure.
També utilitzem l'emmagatzematge local de dades per a construir segments i grups objectiu amb finalitats de màrqueting i per a dirigir anuncis específics.
</li>
<li>
<strong>Per a analitzar i millorar els nostres serveis</strong>
Utilitzem diverses eines de mesurament que ens proporcionen estadístiques i anàlisis relatives als nostres serveis. Aquestes eines ens permeten reconèixer el navegador web al llarg del temps i esbrinar si l'usuari ha visitat el lloc web anteriorment i si és així amb quina freqüència. Aquestes eines ens ofereixen la possibilitat d'aconseguir una visió general de quants usuaris únics tenim i com utilitzen els nostres serveis.
Així mateix, utilitzem la informació que hem recollit i analitzat per a desenvolupar i millorar els nostres serveis; per exemple, esbrinant quins serveis generen molt trànsit o veient si un servei està funcionant de manera òptima.
</li>
<li>
<strong>Per a lliurar i adaptar els serveis al seu ús</strong>
Es requereix i és necessari l'emmagatzematge local de dades amb la finalitat de permetre't utilitzar els nostres serveis, tals com informació sobre la seva configuració, que ens diu com han de presentar-se els serveis en el teu navegador web.
També utilitzem l'emmagatzematge local de dades per a adaptar els nostres serveis al seu ús tan bé com sigui possible.
</li>
</ul>


<h3>Gestió de les cookies</h3>
<p>
Pot desactivar les cookies o configurar el seu navegador perquè li avisi quan t'envien una cookie.
</p><p>La configuració en el seu navegador web normalment mostra una llista de totes les cookies que han estat emmagatzemades per a proporcionar-li una visió general i, si ho desitja, per a eliminar les cookies no desitjades. Normalment, pot indicar que accepta l'emmagatzematge de cookies dels llocs web que visites o de tercers afiliats a aquests llocs web. També pot triar ser notificat cada vegada que s'emmagatzema una nova cookie. Se li proporciona a continuació orientació sobre com fer això en diferents navegadors web. El seu navegador web emmagatzema normalment cookies en una carpeta específica en el seu disc dur, de manera que pugui examinar també el contingut amb més detall.
</p><p>No obstant això, les cookies que estan presents en el lloc web canvien amb freqüència, i no totes les cookies són igual d'importants. Per tant, si <strong>$name</strong> canvia l'ús de les cookies de seguiment, se li notificarà amb un missatge.
</p><p>Així mateix, hi ha disponibles serveis que han estat desenvolupats especialment per a proporcionar als usuaris una llista actualitzada de cookies i altres mecanismes de seguiment.
</p><p>Tingui en compte que si vostè les desactiva, és possible que no pugui gaudir de totes les funcionalitats del nostre lloc web
</p><p>A continuació, se li presenta un resum de com les dades emmagatzemades localment poden ser gestionats en diferents navegadors web. Tingui en compte que aquest procés pot canviar i que les descripcions donades aquí poden no estar actualitzades.
</p>


<h4>Gestió de cookies en Google Chrome</h4>

<h5>Com eliminar cookies:</h5>
<ul>
<li>Veu a Configuració en el menú del seu navegador.</li>
<li>Fes clic a Mostrar configuració avançada.</li>
<li>Fes clic a Eliminar dades de navegació.</li>
<li>Selecciona el període de temps per al qual desitges eliminar la informació en el menú en la part superior. Si desitges eliminar totes les cookies en el navegador, fes clic en Des de l'origen dels temps.</li>
<li>Marca Cookies i altres dades de llocs i complements.</li>
<li>Fes clic a Esborrar dades de navegació.</li>
<li>Tanca la finestra.</li>
</ul>

<h5>Com evitar que les cookies s'emmagatzemin en el navegador web:</h5>
<ul>
<li>Veu a Configuració en el menú del teu navegador.</li>
<li>Fes clic a Mostrar configuració avançada i després fes clic en Configuració de contingut.</li>
<li>En Cookies, selecciona la teva opció preferida. Si desitja evitar que totes les cookies s'emmagatzemin, faci clic a No permetre que es guardin dades dels llocs.</li>
<li>Fes clic en Fet.</li>
<li>Tanca la finestra.</li>
</ul>

<h4>Gestió de cookies en Safari</h4>

<h5>Com eliminar cookies:</h5>
<ul>
<li>Anar a Preferències en el menú del seu navegador.</li>
<li>Fes clic en la pestanya Privacitat.</li>
<li>Fes clic a Eliminar totes les dades dels llocs web i després fes clic a Eliminar per a eliminar totes les cookies.</li>
<li>Tanca la finestra.</li>
</ul>

<h5>Com evitar que les cookies s'emmagatzemin en el seu navegador web:</h5>
<ul>
<li>Anar a Preferències en el menú del teu navegador</li>
<li>Fes clic en la pestanya Privacitat.</li>
<li>En Cookies i dades de llocs web selecciona la teva opció preferida. Si desitges evitar que totes les cookies s'emmagatzemin, fes clic a Bloquejar sempre.</li>
<li>Tanca la finestra.</li>
</ul>


<h4>Gestió de cookies en Mozilla Firefox</h4>

<h5>Com eliminar cookies:</h5>
<ul>
<li>Anar a Opcions en el menú del seu navegador.</li>
<li>Fes clic en la pestanya Privacitat.</li>
<li>Fes clic a Mostrar cookies.</li>
<li>Selecciona les cookies que desitges eliminar i fes clic a Eliminar seleccionades. Fes clic a Eliminar totes si desitges eliminar totes les cookies en el teu navegador web.</li>
<li>Tanca la finestra. Qualsevol canvi que hagis fet es guardarà automàticament.</li>
</ul>

<h5>Com evitar que les cookies s'emmagatzemin en el teu navegador web:</h5>
<ul>
<li>Anar a Configuració en el menú del teu navegador.</li>
<li>Selecciona la pestanya Privacitat.</li>
<li>En Historial, fes clic a Usar una configuració personalitzada per a l'historial.</li>
<li>Selecciona les teves opcions preferides a Permetre cookies de llocs web. Si desitges evitar que totes les cookies s'emmagatzemin, desactiva la casella Acceptar cookies de llocs web.</li>
<li>Tanca la finestra. Qualsevol canvi que hagis fet es guardarà automàticament.</li>
</ul>


<h4>Gestió de cookies en Internet Explorer</h4>

<h5>Com eliminar cookies:</h5>
<ul>
<li>Anar a Eines (icona de roda dentada) en el menú del teu navegador.</li>
<li>Fes clic en Propietats d'Internet.</li>
<li>En la pestanya General - Historial de navegació, fes clic a Eliminar.</li>
<li>Assegura't de marcar l'opció Cookies i dades de llocs web.</li>
<li>Fes clic a Eliminar.</li>
<li>Fes clic en OK.</li>
</ul>

<h5>Com evitar que les cookies s'emmagatzemin en el seu navegador web:</h5>
<ul>
<li>Anar a Eines (icona de roda dentada) en el menú del teu navegador.</li>
<li>Fes clic en Opcions d'Internet i després fes clic en la pestanya Privacitat.</li>
<li>Mou la barra lliscant al nivell desitjat. Si desitges evitar que totes les cookies s'emmagatzemin, selecciona el nivell Bloquejar totes les cookies.</li>
<li>Fes clic en OK.</li>
</ul>


<h4>Gestió de cookies en Opera</h4>

<h5>Com eliminar cookies:</h5>
<ul>
<li>Anar a Configuració en el menú del teu navegador.</li>
<li>Selecciona la pestanya de Privacitat i Seguretat.</li>
<li>Fes clic en Cookies i després fes clic en Totes les cookies i dades de llocs web.</li>
<li>Selecciona les cookies que desitges eliminar i fes clic a Eliminar. Fes clic a Eliminar totes si desitges eliminar totes les cookies en el teu navegador web.</li>
<li>Fes clic en Fet.</li>
<li>Tanca la finestra.</li>
</ul>

<h5>Com evitar que les cookies s'emmagatzemin en el seu navegador web:</h5>
<ul>
<li>Anar a Configuració en el menú del teu navegador.</li>
<li>Selecciona la pestanya de Privacitat i Seguridad.en Cookies, selecciona la teva opció preferida. Si desitges evitar que totes les cookies s'emmagatzemin, fes clic a No permetre que es guardin dades dels llocs.</li>
<li>Tanca la finestra.</li>
</ul>


<h3>Informació de contacte</h3>
<p>

Per a major transparència, si té alguna pregunta relativa a l'ús de l'emmagatzematge local del nostre lloc web, posi's en contacte amb nosaltres en <span class='mailcoded'>$mail</span>, indicant en l'assumpte 'Política de cookies'
</p>

";


$dicl['ca']['PrivacityDescription']      = "

<h3>1.	Dades relatives al Responsable</h3>

<strong>Responsable Tractament</strong>
<ul class='mailcoded'>
	<li>Entitat: $name</li>
	<li>CIF de l'entitat: $nif</li>
	<li>Direcció de l'entitat: $address</li>
	<li>Email de l'entitat: <span style='text-transform:uppercase'>$mail</span></li>
	<li>Responsable del tractament : <span style='text-transform:uppercase'>$treatmentResponsible</span></li>
	<li>Telèfon del Responsable del tractament : <span style='text-transform:uppercase'>$treatmentResponsiblePhone</span></li>
	<li>Direcció email del Responsable del tractament : <span style='text-transform:uppercase'>$treatmentResponsibleMail</span></li>
</ul>

<h3>2.	Finalitats</h3>

<p>
En compliment del que es disposa en el Reglament Europeu 2016/679 General de Protecció de Dades i la Llei orgànica 3/2018 de Protecció de Dades Personals i Garantia de Drets Digitals, l'informem que, depenent de la relació que tingui amb nosaltres, en <strong>$name </strong>tractem les dades que ens facilita per a alguna, o totes, les següents finalitats:
</p>

<ul>
	<li>Compra/venda de béns i serveis.</li>
	<li>Compra/venda de material</li>
	<li>Coordinació d'activitats empresarials</li>
	<li>Creació de contractes, confecció de nòmines i altres tasques relacionades</li>
	<li>Formació</li>
	<li>Gestió comptable, administrativa, de facturació i gestió de cobraments.</li>
	<li>Gestió comptable, administrativa, de facturació, de cobraments i pagaments</li>
	<li>Manteniment de la relació laboral i contra-prestació pels treballs realitzats</li>
	<li>Prestar-los un servei</li>
	<li>Realització de cobrament mitjançant TPV</li>
	<li>Realitzar un procés de selecció de personal en funció de les capacitats, aptituds i altres dades d'interès inclosos en el currículum</li>
	<li>Recepció de la prestació d'un servei</li>
	<li>Seguretat de l'entitat.</li>
	<li>Tramitació d'altes i baixes per malaltia comuna o accident laboral</li>
	<li>Tramitació de pressupostos</li>
</ul>

<h3>3.	Termini de conservació de les dades</h3>

<p>
Les seves dades seran conservades mentre duri la relació contractual, comercial o d'un altre tipus amb la nostra entitat, sol·liciti la seva supressió, així com el temps necessari per a complir les obligacions legals.
</p>

<h3>4.	Legitimació</h3>

La base legal per al tractament de les teves dades radica per:
<ul>
	<li>Consentiment inequívoc</li>
	<li>Execució d'un contracte</li>
	<li>Interès legítim per part del responsable del tractament</li>
</ul>


<h3>5.	Destinataris</h3>


Les seves dades personals seran comunicats a tercers en els següents suposats:
<ul>
	<li>A altres responsables del tractament</li>
	<li>Administració tributària</li>
	<li>Bancs i entitats financeres</li>
	<li>Cossos i forces de seguretat de l'estat</li>
	<li>Entitats de Consultoria/Auditoria</li>
	<li>Gestoria/Assessoria</li>
	<li>Seguretat social</li>
	<li>Servei de Prevenció de Riscos Laborals</li>
</ul>


<h3>6.	Drets</h3>

<p>Té dret a obtenir confirmació sobre si en <strong>$name </strong>estem tractant dades personals que el concerneixin, o no.</p>
<p>Així mateix, té dret d'accés a les seves dades personals, així com a sol·licitar la rectificació de les dades inexactes o, si escau, sol·licitar la seva supressió quan, entre altres motius, les dades ja no siguin necessaris per a les finalitats que van ser recollits.
</p><p>En determinades circumstàncies, podrà sol·licitar la limitació del tractament de les seves dades, en aquest cas únicament els conservarem per a l'exercici o la defensa de reclamacions.
</p><p>Addicionalment, en determinades circumstàncies i per motius relacionats amb la teva situació particular, podrà exercir el dret d'oposició al tractament de les seves dades. <strong>$name </strong>deixarà de tractar les dades, excepte per motius legítims imperiosos, o l'exercici o la defensa de possibles reclamacions.
</p><p>Així mateix, pot exercir el dret a la portabilitat de les dades, així com retirar els consentiments facilitats en qualsevol moment, sense que això afecti la licitud del tractament basat en el consentiment previ a la seva retirada.
</p><p>Si desitja fer ús de qualsevol dels teus drets pot realitzar-los a través de l' enllaç de contacte que trobarà a continuació:

<ul>
<li>Per a exercir el seu dret d'Accés faci clic <a href='$contactURL'>aquí</a></li>
<li>Per a exercir el seu dret de Rectificació faci clic <a href='$contactURL'>aquí</a></li>
<li>Per a exercir el seu dret de Supressió (Oblit) faci clic <a href='$contactURL'>aquí</a></li>
<li>Per a exercir el seu dret de Limitació del Tractament faci clic <a href='$contactURL'>aquí</a></li>
<li>Per a exercir el seu dret d'Oposició faci clic <a href='$contactURL'>aquí</a></li>
<li>Per a exercir el seu dret de Portabilitat faci clic <a href='$contactURL'>aquí</a></li>
</ul>
<p>Alternativament, també pot dirigir-se a nosaltres mitjançant correu postal a la següent adreça: $address adjuntat una fotocòpia del DNI, per a la certesa de la seva identitat. Recordi facilitar la major informació possible sobre la seva sol·licitud: Nom i cognoms, adreça de correu electrònic que utilitza per al compte o portal objecte de la teva sol·licitud.
</p><p>Finalment, l'informem que pot dirigir-se davant l'Agència Espanyola de Protecció de Dades i altres organismes públics competents per a qualsevol reclamació derivada del tractament de les teves dades personals.
</p>


<h3>7.	Política de cookies</h3>

Per a conèixer les cookies que utilitzem en la nostra pàgina, recordi que pot accedir a la nostra Política de Cookies a través del següent enllaci <a href=".construct_url($cookiesURL,$_Lang).">política de cookies</a>.
";

$dicl['ca']['AccessibilityDescription']       = "

<h3>DECLARACIÓ D'ACCESSIBILITAT</h3>

<strong>$_Accessibility_SL</strong> s'ha compromès a fer accessible el seu lloc web, de conformitat amb el <a href='https://www.boe.es/buscar/act.php?id=BOE-A-2018-12699' target='_blank'>Reial decret 1112/2018, de 7 de setembre</a>, 
sobre accessibilitat dels llocs web i aplicacions per a dispositius mòbils del sector públic. <br><br>
La present declaració d'accessibilitat s'aplica al lloc web <strong>$_Accessibility_Web</strong> <br>

<h3>Situació de compliment</h3>

Aquest lloc web és <strong>parcialment conforme</strong> amb el Reial decret 1112/2018, de 7 de setembre, a causa de la falta de conformitat dels aspectes que s'indiquen a continuació.

<h3>Contingut no accessible</h3>

El contingut que es recull a continuació no és accessible pel següent: <br><br>

<ul>
<li><strong>Falta de conformitat amb el Reial decret 1112/2018, de 7 de setembre</strong>: podrien existir fallades puntuals d'edició en alguna pàgina web, tant en continguts HTML com en documents finals, publicats en data posterior al 20 de setembre de 2018 (data d'entrada en vigor del Reial decret 1112/2018, de 7 de setembre). Concretament pot haver-hi errors en aquells documents que contenen gràfics, taules complexes o contingut publicat mitjançant eines autogestionables. Així mateix poguessin existir errors en el control de les animacions HTML.</li>
<li><strong>Càrrega desproporcionada</strong>: no aplica.</li>
<li>El contingut <strong>no entra dins de l'àmbit de la legislació aplicable</strong>: no aplica.</li>
</ul>

<h3>Preparació de la present declaració d'accessibilitat</h3>

La present declaració va ser preparada el <strong>$_Accessibility_Date_Preparation</strong>. <br><br>

El mètode emprat per a preparar la declaració ha estat una autoavaluació duta a terme per l'empresa proveïdora de <strong>$_Accessibility_Web</strong>.

Última revisió de la declaració: <strong>$_Accessibility_Date_Last_Revision</strong>.

<h3>Observacions i dades de contacte</h3>

Pot realitzar <strong>comunicacions</strong> sobre requisits d'accessibilitat (article 10.2.a) del Reial decret 1112/2018, de 7 de setembre) com, per exemple: <br> <br>

<ul>
<li>Informar sobre qualsevol possible <strong>incompliment</strong> per part d'aquest lloc web.</li>
<li>Transmetre altres <strong>dificultats d'accés</strong> al contingut.</li>
<li>Formular qualsevol altra <strong>consulta o suggeriment de millora</strong> relativa a l'accessibilitat del lloc web.</li>
</ul>

<br> 
A través de les següents vies: <br><br>

<ul>
<li>Correu electrònic: <strong><span class='mailcoded'>$_Accessibility_mail_accesibility</span></strong>.</li>
<li>Telèfon: <strong>$_Accessibility_phone_accesibility</strong>.</li>
</ul>

<br>
Pot presentar :
<br><br>
<ul>
<li>Una <strong>Queixa</strong> relativa al compliment dels requisits del RD 1112/2018 o</li>
<li>Una <strong>Sol·licitud d'Informació accessible</strong> relativa a:</li>
<li><strong>continguts</strong> que estan <strong>exclosos</strong> de l'àmbit <strong> d'aplicació</strong> del RD 1112/2018 segons el que s'estableix per l'article 3, apartat 4</li>
<li>o continguts que estan <strong>exempts</strong> del compliment <strong></strong> dels requisits d'accessibilitat per imposar una <strong>càrrega desproporcionada.</strong></li>
</ul>
<br>

En la Sol·licitud d'informació accessible, s'ha de concretar, amb tota claredat, els fets, raons i petició que permetin constatar que es tracta d'una sol·licitud raonable i legítima. <br><br>
Les comunicacions, queixes i sol·licituds d'informació accessible seran rebudes i tractades per <strong>$_Accessibility_SL</strong>.

<h3>Procediment d'aplicació</h3>

Si una vegada realitzada una <strong>sol·licitud d'informació accessible o queixa</strong>, aquesta hagués estat <strong>desestimada</strong>, <strong>no</strong> s'estigués d'acord <strong> amb la decisió adoptada</strong>, o la <strong>resposta no complís els requisits</strong> contemplats en l'article 12.5, la persona interessada podrà iniciar una reclamació. Igualment es podrà iniciar una reclamació en el cas que hagi <strong>transcorregut el termini de vint dies hàbils</strong> sense haver obtingut <strong>resposta</strong>. <br><br>
La reclamació pot ser presentada través del de la Instància Genèrica de la Seu electrònica del Ministeri <strong>$_Accessibility_ministerio</strong>, així com en la resta d'opcions recollides en la Llei 39/ 2015, d'1 d'octubre, del Procediment Administratiu Comú de les Administracions Públiques. <br><br>
Les reclamacions seran rebudes i tractades per <strong>$_Accessibility_ministerio</strong>.

<h3>Contingut opcional</h3>

La versió actualment visible d'aquest lloc web és de <strong>$_Accessibility_Date_Alta_Web</strong> i en aquesta data es va fer la revisió del nivell d'accessibilitat vigent en aquell moment. <br><br>
A partir d'aquesta data es duen a terme revisions parcials diàries del contingut web nou o modificat, tant de les plantilles com de les pàgines i documents finals publicats, a fi d'assegurar el compliment dels requeriments d'accessibilitat de la Norma UNE-EN 301549:2019, considerant les excepcions del Reial decret 1112/2018, de 7 de setembre. <br><br>
Entre altres s'adopten les següents mesures per a facilitar l'accessibilitat: <br><br>
<ul>
<li>Utilització de text alternatiu en les imatges</li>
<li>Separar el contingut de la presentació mitjançant l'ús de fulles d'estil (CSS).</li>
<li>Estructurar i etiquetar correctament el contingut de les pàgines.</li>
<li>Realitzar una maquetació mitjançant CSS i amb un disseny líquid perquè s'adapti a qualsevol resolució de pantalla.</li>
<li>Utilitzar un text significatiu en els enllaços.</li>
<li>Evitar combinacions de colors de poc contrast, evitar transmetre informació només a través del color.</li>
<li>Evitar l'ús de JavaScript en la mesura del possible.</li>
<li>Evitar l'ús de marcs (frames).</li>
<li>Ús dels estàndards del W3C: HTML5, CSS 3.0, WAI AA.</li>
</ul>
";

///////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////// CASTELLANO ///////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

$dicl['es']['AccessibilityTitle']             = "Declaración de accesibilidad";
$dicl['es']['AccessibilityMetaDescription']   = "Declaración de Accesibilidad: Declaración de Accesibilidad de la web $domain";

$dicl['es']['AdviseTitle']             = "Aviso legal";
$dicl['es']['CookiesTitle']            = "Política de cookies";
$dicl['es']['PrivacityTitle']          = "Información sobre Protección de Datos";

$dicl['es']['AdviseDescription']       = "

<p>
<h3>1.	Objeto y aceptación</h3>
<p>
El presente aviso legal regula el uso de nuestro sitio web, del que es titular <strong>$name</strong> . La navegación por el sitio web de <strong>$name</strong> atribuye la condición de usuario del mismo e implica la aceptación plena y sin reservas de todas y cada una de las disposiciones incluidas en este Aviso Legal, que pueden sufrir modificaciones. Usted se obliga a hacer un uso correcto del sitio web de conformidad con las leyes, la buena fe, el orden público, los usos del tráfico y el presente Aviso Legal. El usted responderá frente a <strong>$name</strong> o frente a terceros, de cualesquiera daños y perjuicios que pudieran causarle como consecuencia del incumplimiento de dicha obligación.
</p>

<p>
<h3>2.	Identificación y comunicaciones</h3>
<strong>$name</strong>, en cumplimiento de la Ley 34/2002, de 11 de julio, de servicios de la sociedad de la información y de comercio electrónico, le informa de que:
<ul>
<li>Su denominación social es: <strong>$name</strong></li>
<li>Su CIF es: $nif</li>
<li>Su domicilio social está en: $address</li>
</ul>
<p>
Para comunicarse con nosotros, ponemos a su disposición diferentes medios de contacto especificados en la política de privacidad.
</p><p>Todas las notificaciones y comunicaciones que realice con <strong>$name</strong> se considerarán eficaces, a todos los efectos, siempre y cuando se realicen por los medios especificados anteriormente
</p>

<p>
<h3>3.	Condiciones de acceso y utilización</h3>
<p>
El sitio web y sus servicios son de acceso libre, no obstante, <strong>$name</strong> condiciona la utilización de algunos de los servicios ofrecidos en su web a la previa cumplimentación del correspondiente formulario.
</p><p>Usted garantiza la autenticidad y actualidad de todos aquellos datos que comunique a <strong>$name</strong> y será el único responsable de las manifestaciones falsas o inexactas que realice.
</p><p>Usted se compromete expresamente a hacer un uso adecuado de los contenidos y servicios de EL <strong>$name</strong> y a no emplearlos para, entre otros:
<ul>
<li>Difundir contenidos, delictivos, violentos, pornográficos, racistas, xenófobo, ofensivos, de apología del terrorismo o, en general, contrarios a la ley o al orden público.</li>
<li>Introducir en la red virus informáticos o realizar actuaciones susceptibles de alterar, estropear, interrumpir o generar errores o daños en los documentos electrónicos, datos o sistemas físicos y lógicos de <strong>$name</strong> o de terceras personas; así como obstaculizar el acceso de otros usuarios al sitio web y a sus servicios mediante el consumo masivo de los recursos informáticos a través de los cuales <strong>$name</strong> presta sus servicios.</li>
<li>Intentar acceder datos de otros personas o a áreas restringidas de los sistemas informáticos de <strong>$name</strong> o de terceros y, en su caso, extraer información.</li>
<li>Vulnerar los derechos de propiedad intelectual o industrial, así como violar la confidencialidad de la información de <strong>$name</strong> o de terceros.</li>
<li>Suplantar la identidad de otro usuario, de las administraciones públicas o de un tercero.</li>
<li>Reproducir, copiar, distribuir, poner a disposición o de cualquier otra forma comunicar públicamente, transformar o modificar los contenidos, a menos que se cuente con la autorización del titular de los correspondientes derechos o ello resulte legalmente permitido.</li>
<li>Recabar datos con finalidad publicitaria y de remitir publicidad de cualquier clase y comunicaciones con fines de venta u otras de naturaleza comercial sin que medie su previa solicitud o consentimiento.</li>
</ul>
<p>
Todos los contenidos del sitio web, como textos, fotografías, gráficos, imágenes, iconos, tecnología, software, así como su diseño gráfico y códigos fuente, constituyen una obra cuya propiedad pertenece a <strong>$name</strong>, sin que puedan entenderse como cedidos ninguno de los derechos de explotación sobre los mismos más allá de lo estrictamente necesario para el correcto uso de la web.
</p><p>En definitiva, usted que accede a este sitio web, puede visualizar los contenidos y efectuar, en su caso, copias privadas autorizadas siempre que los elementos reproducidos no sean cedidos posteriormente a terceros, ni se instalen a servidores conectados a redes, ni sean objeto de ningún tipo de explotación.
</p><p>Asimismo, todas las marcas, nombres comerciales o signos distintivos de cualquier clase que aparecen en el sitio web son propiedad de <strong>$name</strong>, sin que pueda entenderse que el uso o acceso al mismo le atribuya derecho alguno sobre los mismos.
</p><p>La distribución, modificación, cesión o comunicación pública de los contenidos y cualquier otro acto que no haya sido expresamente autorizado por el titular de los derechos de explotación quedan prohibidos.
</p><p>El establecimiento de un hiperenlace no implica en ningún caso la existencia de relaciones entre <strong>$name</strong> y el propietario del sitio web en la que se establezca, ni la aceptación y aprobación por parte de <strong>$name</strong> de sus contenidos o servicios. Aquellas personas que se propongan establecer un hiperenlace previamente deberán solicitar autorización por escrito a <strong>$name</strong>. En todo caso, el hiperenlace únicamente permitirá el acceso a la home-page o página de inicio de nuestro sitio web, asimismo deberá abstenerse de realizar manifestaciones o indicaciones falsas, inexactas o incorrectas sobre <strong>$name</strong>, o incluir contenidos ilícitos, contrarios a las buenas costumbres y al orden público.
</p><p><strong>$name</strong> no se responsabiliza del uso que cada usuario le dé a los materiales puestos a disposición en este sitio web ni de las actuaciones que realice en base a los mismos.
</p>

<p>
<h3>4.	Exclusión de garantías y de responsabilidad</h3>
<p>
<strong>$name</strong> excluye, hasta donde permite el ordenamiento jurídico, cualquier responsabilidad por los daños y perjuicios de toda naturaleza derivados de:
</p><p>
<ul>
<li>La imposibilidad de acceso al sitio web o la falta de veracidad, exactitud, exhaustividad y/o actualidad de los contenidos, así como la existencia de vicios y defectos de toda clase de los contenidos transmitidos, difundidos, almacenados, puestos a disposición a los que se haya accedido a través del sitio web o de los servicios que se ofrecen.</li>
<li>La presencia de virus o de otros elementos en los contenidos que puedan producir alteraciones en los sistemas informáticos, documentos electrónicos o datos de los usuarios.</li>
<li>El incumplimiento de las leyes, la buena fe, el orden público, los usos del tráfico y el presente aviso legal como consecuencia del uso incorrecto del sitio web. En particular, y a modo ejemplificativo, <strong>$name</strong> no se hace responsable de las actuaciones de terceros que vulneren derechos de propiedad intelectual e industrial, secretos empresariales, derechos al honor, a la intimidad personal y familiar y a la propia imagen, así como la normativa en materia de competencia desleal y publicidad ilícita.</li>
</ul>
<p>Asimismo, <strong>$name</strong> declina cualquier responsabilidad respecto a la información que se halle fuera de esta web y no sea gestionada directamente por nuestro webmaster. La función de los links que aparecen en esta web es exclusivamente la de informar al usuario sobre la existencia de otras fuentes susceptibles de ampliar los contenidos que ofrece este sitio web. <strong>$name</strong> no garantiza ni se responsabiliza del funcionamiento o accesibilidad de los sitios enlazados; ni sugiere, invita o recomienda la visita a los mismos, por lo que tampoco será responsable del resultado obtenido. <strong>$name</strong> no se responsabiliza del establecimiento de hipervínculos por parte de terceros.
</p>

<p>
<h3>5.	Procedimiento en caso de realización de actividades de carácter ilícito</h3>
<p>
En el caso de que usted o un tercero considere que existen hechos o circunstancias que revelen el carácter ilícito de la utilización de cualquier contenido y/o de la realización de cualquier actividad en las páginas web incluidas o accesibles a través del sitio web, deberá ponerse en contacto con <strong>$name</strong> identificándose debidamente, especificando las supuestas infracciones y declarando expresamente y bajo su responsabilidad que la información proporcionada en la notificación es exacta.
</p><p>Para toda cuestión litigiosa que incumba al sitio web de <strong>$name</strong>, será de aplicación la legislación española, siendo competentes los Juzgados y Tribunales más cercanos a la sede de (España).
</p>

<h3>6.	Publicaciones</h3>
<p>
La información administrativa facilitada a través del sitio web no sustituye la publicidad legal de las leyes, normativas, planes, disposiciones generales y actos que tengan que ser publicados formalmente a los diarios oficiales de las administraciones públicas, que constituyen el único instrumento que da fe de su autenticidad y contenido. La información disponible en este sitio web debe entenderse como una guía sin propósito de validez legal.
</p>

";

$dicl['es']['CookiesDescription']      = "

<p>
<h3>Información general de las cookies</h3>
<p>
La confianza del usuario es importante para nosotros, y por consiguiente, en <strong>$name</strong> nos preocupa proteger su privacidad. Un aspecto importante de esto es proporcionarle toda la información posible sobre cómo utilizamos tus datos de carácter personal, incluso cómo utilizamos el almacenamiento local de datos y tecnología similar
</p><p>El almacenamiento local de datos implica almacenar diferentes tipos de datos localmente en su dispositivo a través de su navegador web. Los datos almacenados localmente pueden, por ejemplo, contener la configuración del usuario, información sobre cómo navega por nuestro sitio web, qué navegador web utiliza, qué anuncios se han mostrado, y el comportamiento similar en sitios web con los que colaboramos. Los datos almacenados localmente pueden ser utilizados para personalizar el contenido y las funciones en nuestros servicios de forma que sus visitas sean más cómodas y tengan más sentido.
</p><p>Un método de almacenamiento local de datos son las cookies. Las cookies son pequeños archivos de texto que se almacenan en su dispositivo (PC, teléfono móvil o tableta) que nos permiten reconocer su navegador web. Las cookies contienen información principalmente sobre su navegador web y sobre cualquier actividad que se ha producido en él. Nos ayudan a garantizar la seguridad y el funcionamiento óptimo de nuestro sitio web, una vez sale de nuestra web estas son eliminadas (cookies de seguridad y cookies de sesión) y recogen información sobre los productos que les interesan a nuestras visitas de internet y sobre cómo navegan a través de nuestro sitio web para que nuestras ofertas online sean más atractivas para los usuarios (cookies de seguimiento).
</p>

<h3>Información complementaria de la cookies</h3>
<p>
Utilizamos el almacenamiento local de datos para una serie de fines, tales como: permitirnos realizar nuestros servicios; aportarte contenido pertinente, personalizado cuando visitas nuestros sitios web; medir y analizar el tráfico en nuestro sitio web; mejorar nuestros servicios; y dirigir publicidad específica. A continuación, se ofrecen más detalles sobre estos temas:
<ul class='spacer'>
<li>
<strong>Para nuestra publicidad</strong>
Utilizamos el almacenamiento local de datos en relación con las actividades publicitarias. Esto nos permite saber si y con frecuencia el usuario ha visto un anuncio o determinado tipo de anuncio, y cuánto tiempo hace que lo vio.
También utilizamos el almacenamiento local de datos para construir segmentos y grupos objetivo con fines de marketing y para dirigir anuncios específicos.
</li>
<li>
<strong>Para analizar y mejorar nuestros servicios</strong>
Utilizamos diversas herramientas de medición que nos proporcionan estadísticas y análisis relativos a nuestros servicios. Estas herramientas nos permiten reconocer el navegador web a lo largo del tiempo y averiguar si el usuario ha visitado el sitio web anteriormente y si es así con qué frecuencia. Estas herramientas nos ofrecen la posibilidad de lograr una visión general de cuántos usuarios únicos tenemos y cómo utilizan nuestros servicios.
Asimismo, utilizamos la información que hemos recogido y analizado para desarrollar y mejorar nuestros servicios; por ejemplo, averiguando qué servicios generan mucho tráfico o viendo si un servicio está funcionando de manera óptima.
</li>
<li>
<strong>Para entregar y adaptar los servicios a su uso</strong>
Se requiere y es necesario el almacenamiento local de datos con el fin de permitirte utilizar nuestros servicios, tales como información sobre su configuración, que nos dice cómo deben presentarse los servicios en tu navegador web.
También utilizamos el almacenamiento local de datos para adaptar nuestros servicios a su uso lo mejor posible.
</li>
</ul>

<h3>Gestión de las cookies</h3>

<p>
Puede desactivar las cookies o configurar su navegador para que le avise cuando te envían una cookie.
</p><p>La configuración en su navegador web normalmente muestra una lista de todas las cookies que han sido almacenadas para proporcionarle una visión general y, si lo desea, para eliminar las cookies no deseadas. Normalmente, puede indicar que acepta el almacenamiento de cookies de los sitios web que visitas o de terceros afiliados a dichos sitios web. También puede escoger ser notificado cada vez que se almacena una nueva cookie. Se le proporciona a continuación orientación sobre cómo hacer esto en diferentes navegadores web. Su navegador web almacena normalmente cookies en una carpeta específica en su disco duro, de forma que pueda examinar también el contenido con más detalle.
</p><p>Sin embargo, las cookies que están presentes en el sitio web cambian con frecuencia, y no todas las cookies son igual de importantes. Por consiguiente, si <strong>$name</strong> cambia el uso de las cookies de seguimiento, se le notificará con un mensaje.
</p><p>Asimismo, hay disponibles servicios que han sido desarrollados especialmente para proporcionar a los usuarios una lista actualizada de cookies y otros mecanismos de seguimiento.
</p><p>Tenga en cuenta que si usted las desactiva, es posible que no pueda disfrutar de todas las funcionalidades de nuestro sitio web
</p><p>A continuación, se le presenta un resumen de cómo los datos almacenados localmente pueden ser gestionados en diferentes navegadores web. Tenga en cuenta que este proceso puede cambiar y que las descripciones dadas aquí pueden no estar actualizadas.
</p>


<p>
<h4>Gestión de cookies en Google Chrome</h4>
<p>
<h5>Cómo eliminar cookies:</h5>
<ul>
<li>Ve a Configuración en el menú de su navegador.</li>
<li>Haz clic en Mostrar configuración avanzada.</li>
<li>Haz clic en Eliminar datos de navegación.</li>
<li>Selecciona el período de tiempo para el que deseas eliminar la información en el menú en la parte superior. Si deseas eliminar todas las cookies en el navegador, haz clic en Desde el origen de los tiempos.</li>
<li>Marca Cookies y otros datos de sitios y complementos.</li>
<li>Haz clic en Borrar datos de navegación.</li>
<li>Cierra la ventana.</li>
</ul>

<h5>Cómo evitar que las cookies se almacenen en el navegador web:</h5>
<ul>
<li>Ve a Configuración en el menú de tu navegador.</li>
<li>Haz clic en Mostrar configuración avanzada y después haz clic en Configuración de contenido.</li>
<li>En Cookies, selecciona tu opción preferida. Si desea evitar que todas las cookies se almacenen, haga clic en No permitir que se guarden datos de los sitios.</li>
<li>Haz clic en Hecho.</li>
<li>Cierra la ventana.</li>
</ul>


<p>
<h4>Gestión de cookies en Safari</h4>

<h5>Cómo eliminar cookies:</h5>
<ul>
<li>Ir a Preferencias en el menú de su navegador.</li>
<li>Haz clic en la pestaña Privacidad.</li>
<li>Haz clic en Eliminar todos los datos de los sitios web y después haz clic en Eliminar para eliminar todas las cookies.</li>
<li>Cierra la ventana.</li>
</ul>

<h5>Cómo evitar que las cookies se almacenen en su navegador web:</h5>
<ul>
<li>Ir a Preferencias en el menú de tu navegador</li>
<li>Haz clic en la pestaña Privacidad.</li>
<li>En Cookies y datos de sitios web selecciona tu opción preferida. Si deseas evitar que todas las cookies se almacenen, haz clic en Bloquear siempre.</li>
<li>Cierra la ventana.</li>
</ul>


<h4>Gestión de cookies en Mozilla Firefox</h4>

<h5>Cómo eliminar cookies:</h5>
<ul>
<li>Ir a Opciones en el menú de su navegador.</li>
<li>Haz clic en la pestaña Privacidad.</li>
<li>Haz clic en Mostrar cookies.</li>
<li>Selecciona las cookies que deseas eliminar y haz clic en Eliminar seleccionadas. Haz clic en Eliminar todas si deseas eliminar todas las cookies en tu navegador web.</li>
<li>Cierra la ventana. Cualquier cambio que hayas hecho se guardará automáticamente.</li>
</ul>

<h5>Cómo evitar que las cookies se almacenen en tu navegador web:</h5>
<ul>
<li>Ir a Configuración en el menú de tu navegador.</li>
<li>Selecciona la pestaña Privacidad.</li>
<li>En Historial, haz clic en Usar una configuración personalizada para el historial.</li>
<li>Selecciona tus opciones preferidas en Permitir cookies de sitios web. Si deseas evitar que todas las cookies se almacenen, desactiva la casilla Aceptar cookies de sitios web.</li>
<li>Cierra la ventana. Cualquier cambio que hayas hecho se guardará automáticamente.</li>
</ul>


<h4>Gestión de cookies en Internet Explorer</h4>

<h5>Cómo eliminar cookies:</h5>
<ul>
<li>Ir a Herramientas (icono de rueda dentada) en el menú de tu navegador.</li>
<li>Haz clic en Propiedades de Internet.</li>
<li>En la pestaña General - Historial de navegación, haz clic en Eliminar.</li>
<li>Asegurate de marcar la opción Cookies y datos de sitios web.</li>
<li>Haz clic en Eliminar.</li>
<li>Haz clic en OK.</li>
</ul>

<h5>Cómo evitar que las cookies se almacenen en su navegador web:</h5>
<ul>
<li>Ir a Herramientas (icono de rueda dentada) en el menú de tu navegador.</li>
<li>Haz clic en Opciones de Internet y después haz clic en la pestaña Privacidad.</li>
<li>Mueve la barra deslizante al nivel deseado. Si deseas evitar que todas las cookies se almacenen, selecciona el nivel Bloquear todas las cookies.</li>
<li>Haz clic en OK.</li>
</ul>

<h4>Gestión de cookies en Opera</h4>

<h5>Cómo eliminar cookies:</h5>
<ul>
<li>Ir a Configuración en el menú de tu navegador.</li>
<li>Selecciona la pestaña de Privacidad y Seguridad.</li>
<li>Haz clic en Cookies y después haz clic en Todas las cookies y datos de sitios web.</li>
<li>Selecciona las cookies que deseas eliminar y haz clic en Eliminar. Haz clic en Eliminar todas si deseas eliminar todas las cookies en tu navegador web.</li>
<li>Haz clic en Hecho.</li>
<li>Cierra la ventana.</li>
</ul>

<h5>Cómo evitar que las cookies se almacenen en su navegador web:</h5>
<ul>
<li>Ir a Configuración en el menú de tu navegador.</li>
<li>Selecciona la pestaña de Privacidad y Seguridad.En Cookies, selecciona tu opción preferida. Si deseas evitar que todas las cookies se almacenen, haz clic en No permitir que se guarden datos de los sitios.</li>
<li>Cierra la ventana.</li>
</ul>


<h3>Información de contacto</h3>


<p>
Para mayor transparencia, si tiene alguna pregunta relativa al uso del almacenamiento local de nuestro sitio web, póngase en contacto con nosotros en <span class='mailcoded'>$mail</span>, indicando en el asunto 'Política de cookies'
</p>

";


$dicl['es']['PrivacityDescription']      = "

<p>

<h3>1.	Datos relativos al Responsable</h3>
<strong>Responsable Tratamiento</strong>

<ul class='mailcoded'>
	<li>Entidad: $name</li>
	<li>CIF de la entidad: $nif</li>
	<li>Direccion de la entidad: $address</li>
	<li>Email de la entidad: <span style='text-transform:uppercase'>$mail</span></li>
	<li>Responsable del tratamiento : <span style='text-transform:uppercase'>$treatmentResponsible</span></li>
	<li>Teléfono del Responsable del tratamiento : <span style='text-transform:uppercase'>$treatmentResponsiblePhone</span></li>
	<li>Dirección email del Responsable del tratamiento : <span style='text-transform:uppercase'>$treatmentResponsibleMail</span></li>
</ul>

<p>

<h3>2.	Finalidades</h3>
<p>
En cumplimiento de lo dispuesto en el Reglamento Europeo 2016/679 General de Protección de Datos y la Ley Orgánica 3/2018 de Protección de Datos Personales y Garantía de Derechos Digitales, le informamos de que, dependiendo de la relación que tenga con nosotros, en <strong>$name </strong>tratamos los datos que nos facilita para alguna, o todas, las siguientes finalidades:
</p>
<ul>
	<li>Compra/venta de bienes y servicios.</li>
	<li>Compra/venta de material</li>
	<li>Coordinación de actividades empresariales</li>
	<li>Creación de contratos, confección de nóminas y otras tareas relacionadas</li>
	<li>Formación</li>
	<li>Gestión contable, administrativa, de facturación y gestión de cobros.</li>
	<li>Gestión contable, administrativa, de facturación, de cobros y pagos</li>
	<li>Mantenimiento de la relación laboral y contra-prestación por los trabajos realizados</li>
	<li>Prestarles un servicio</li>
	<li>Realización de cobro mediante TPV</li>
	<li>Realizar un proceso de selección de personal en función de las capacidades, aptitudes y otros datos de interés incluidos en el currículum</li>
	<li>Recepción de la prestación de un servicio</li>
	<li>Seguridad de la entidad.</li>
	<li>Tramitación de altas y bajas por enfermedad común o accidente laboral</li>
	<li>Tramitación de presupuestos</li>
</ul>

<p>

<h3>3.	Plazo de conservación de los datos</h3>
<p>
Sus datos serán conservados mientras dure la relación contractual, comercial o de otro tipo con nuestra entidad, solicite su supresión, así como el tiempo necesario para cumplir las obligaciones legales.
</p>

<p>

<h3>4.	Legitimación</h3>
<p>
La base legal para el tratamiento de tus datos radica por:
</p>
<ul>
	<li>Consentimiento inequívoco</li>
	<li>Ejecución de un contrato</li>
	<li>Interés legítimo por parte del responsable del tratamiento</li>
</ul>
<h3>5.	Destinatarios</h3>

Sus datos personales serán comunicados a terceros en los siguientes supuestos:
<ul>
	<li>A otros responsables del tratamiento</li>
	<li>Administración tributaria</li>
	<li>Bancos y entidades financieras</li>
	<li>Cuerpos y fuerzas de seguridad del estado</li>
	<li>Entidades de Consultoría/Auditoría</li>
	<li>Gestoría/Asesoría</li>
	<li>Seguridad social</li>
	<li>Servicio de Prevención de Riesgos Laborales</li>
</ul>

<h3>6.	Derechos</h3>
<p>
Tiene derecho a obtener confirmación sobre si en <strong>$name </strong>estamos tratando datos personales que le conciernan, o no.
</p><p>Asimismo, tiene derecho de acceso a sus datos personales, así como a solicitar la rectificación de los datos inexactos o, en su caso, solicitar su supresión cuando, entre otros motivos, los datos ya no sean necesarios para los fines que fueron recogidos.
</p><p>En determinadas circunstancias, podrá solicitar la limitación del tratamiento de sus datos, en cuyo caso únicamente los conservaremos para el ejercicio o la defensa de reclamaciones.
</p><p>Adicionalmente, en determinadas circunstancias y por motivos relacionados con tu situación particular, podrá ejercer el derecho de oposición al tratamiento de sus datos. <strong>$name </strong>dejará de tratar los datos, salvo por motivos legítimos imperiosos, o el ejercicio o la defensa de posibles reclamaciones.
</p><p>Asimismo, puede ejercer el derecho a la portabilidad de los datos, así como retirar los consentimientos facilitados en cualquier momento, sin que ello afecte a la licitud del tratamiento basado en el consentimiento previo a su retirada.
</p><p>Si desea hacer uso de cualquiera de tus derechos puede realizarlos a través del enlace de contacto que encontrará a continuación:

<ul>
<li>Para ejercer su derecho de Acceso haga clic <a href='$contactURL'>aquí</a></li>
<li>Para ejercer su derecho de Rectificación haga clic <a href='$contactURL'>aquí</a></li>
<li>Para ejercer su derecho de Supresión (Olvido) haga clic <a href='$contactURL'>aquí</a></li>
<li>Para ejercer su derecho de Limitación del Tratamiento haga clic <a href='$contactURL'>aquí</a></li>
<li>Para ejercer su derecho de Oposición haga clic <a href='$contactURL'>aquí</a></li>
<li>Para ejercer su derecho de Portabilidad haga clic <a href='$contactURL'>aquí</a></li>
</ul>
<p>Alternativamente, también puede dirigirse a nosotros mediante correo postal a la siguiente dirección: $address adjuntado una fotocopia del DNI, para la certeza de su identidad. Recuerde facilitar la mayor información posible sobre su solicitud: Nombre y apellidos, dirección de correo electrónico que utiliza para la cuenta o portal objeto de tu solicitud.
</p><p>Por último, le informamos que puede dirigirse ante la Agencia Española de Protección de Datos y demás organismos públicos competentes para cualquier reclamación derivada del tratamiento de tus datos personales.
</p>

<h3>7.	Política de cookies</h3>
<p>
Para conocer las cookies que utilizamos en nuestra página, recuerde que puede acceder a nuestra Política de Cookies a través del siguiente enlace <a href=".construct_url($cookiesURL,$_Lang).">política de cookies</a>.

</p>
";

$dicl['es']['AccessibilityDescription']       = "

<h3>DECLARACIÓN DE ACCESIBILIDAD</h3>

<strong>$_Accessibility_SL</strong> se ha comprometido a hacer accesible su sitio web, de conformidad con el <a href='https://www.boe.es/buscar/act.php?id=BOE-A-2018-12699' target='_blank'>Real Decreto 1112/2018, de 7 de septiembre</a>, 
sobre accesibilidad de los sitios web y aplicaciones para dispositivos móviles del sector público. <br><br>
La presente declaración de accesibilidad se aplica al sitio web <strong>$_Accessibility_Web</strong> <br>

<h3>Situación de cumplimiento</h3>

Este sitio web es <strong>parcialmente conforme</strong> con el Real Decreto 1112/2018, de 7 de septiembre, debido a la falta de conformidad de los aspectos que se indican a continuación.

<h3>Contenido no accesible</h3>

El contenido que se recoge a continuación no es accesible por lo siguiente: <br><br>

<ul>
<li><strong>Falta de conformidad con el Real Decreto 1112/2018, de 7 de septiembre</strong>: podrían existir fallos puntuales de edición en alguna página web, tanto en contenidos HTML como en documentos finales, publicados en fecha posterior al 20 de septiembre de 2018 (fecha de entrada en vigor del Real Decreto 1112/2018, de 7 de septiembre). Concretamente puede haber errores en aquellos documentos que contienen gráficos, tablas complejas o contenido publicado mediante herramientas autogestionables. Así mismo pudieran existir errores en el control de las animaciones HTML.</li>
<li><strong>Carga desproporcionada</strong>: no aplica.</li>
<li>El contenido <strong>no entra dentro del ámbito de la legislación aplicable</strong>: no aplica.</li>
</ul>

<h3>Preparación de la presente declaración de accesibilidad</h3>

La presente declaración fue preparada el <strong>$_Accessibility_Date_Preparation</strong>. <br><br>

El método empleado para preparar la declaración ha sido una autoevaluación llevada a cabo por la empresa proveedora de <strong>$_Accessibility_Web</strong>.

Última revisión de la declaración: <strong>$_Accessibility_Date_Last_Revision</strong>.

<h3>Observaciones y datos de contacto</h3>

Puede realizar <strong>comunicaciones</strong> sobre requisitos de accesibilidad (artículo 10.2.a) del Real Decreto 1112/2018, de 7 de septiembre) como, por ejemplo: <br> <br> 

<ul>
<li>Informar sobre cualquier posible <strong>incumplimiento</strong> por parte de este sitio web.</li>
<li>Transmitir otras <strong>dificultades de acceso</strong> al contenido.</li>
<li>Formular cualquier otra <strong>consulta o sugerencia de mejora</strong> relativa a la accesibilidad del sitio web.</li>
</ul>

<br> 
A través de las siguientes vías: <br><br>

<ul>
<li>Correo electrónico: <strong><span class='mailcoded'>$_Accessibility_mail_accesibility</span></strong>.</li>
<li>Teléfono: <strong>$_Accessibility_phone_accesibility</strong>.</li>
</ul>

<br>
Puede presentar :
<br><br>
<ul>
<li>Una <strong>Queja</strong> relativa al cumplimiento de los requisitos del RD 1112/2018 o</li>
<li>Una <strong>Solicitud de Información accesible</strong> relativa a:</li>
<li><strong>contenidos</strong> que están <strong>excluidos</strong> del <strong>ámbito de aplicación</strong> del RD 1112/2018 según lo establecido por el artículo 3, apartado 4</li>
<li>o contenidos que están <strong>exentos</strong> del <strong>cumplimiento</strong> de los requisitos de accesibilidad por imponer una <strong>carga desproporcionada.</strong></li>
</ul>
<br>

En la Solicitud de información accesible, se debe concretar, con toda claridad, los hechos, razones y petición que permitan constatar que se trata de una solicitud razonable y legítima. <br><br>
Las comunicaciones, quejas y solicitudes de información accesible serán recibidas y tratadas por <strong>$_Accessibility_SL</strong>.

<h3>Procedimiento de aplicación</h3>

Si una vez realizada una <strong>solicitud de información accesible o queja</strong>, ésta hubiera sido <strong>desestimada</strong>, <strong>no</strong> se estuviera de <strong>acuerdo con la decisión adoptada</strong>, o la <strong>respuesta no cumpliera los requisitos</strong> contemplados en el artículo 12.5, la persona interesada podrá iniciar una reclamación. Igualmente se podrá iniciar una reclamación en el caso de que haya <strong>trascurrido el plazo de veinte días hábiles</strong> sin haber obtenido <strong>respuesta</strong>. <br><br>
La reclamación puede ser presentada través del de la Instancia Genérica de la Sede electrónica del Ministerio <strong>$_Accessibility_ministerio</strong>, así como en el resto de opciones recogidas en la Ley 39/ 2015, de 1 de octubre, del Procedimiento Administrativo Común de las Administraciones Públicas. <br><br>
Las reclamaciones serán recibidas y tratadas por <strong>$_Accessibility_ministerio</strong>. 

<h3>Contenido opcional</h3>

La versión actualmente visible de este sitio web es de <strong>$_Accessibility_Date_Alta_Web</strong> y en esa fecha se hizo la revisión del nivel de accesibilidad vigente en aquel momento. <br><br>
A partir de dicha fecha se llevan a cabo revisiones parciales diarias del contenido web nuevo o modificado, tanto de las plantillas como de las páginas y documentos finales publicados, a fin de asegurar el cumplimiento de los requerimientos de accesibilidad de la Norma UNE-EN 301549:2019, considerando las excepciones del Real Decreto 1112/2018, de 7 de septiembre. <br><br>
Entre otras se adoptan las siguientes medidas para facilitar la accesibilidad: <br><br>
<ul>
<li>Utilización de texto alternativo en las imágenes</li>
<li>Separar el contenido de la presentación mediante el uso de hojas de estilo (CSS).</li>
<li>Estructurar y etiquetar correctamente el contenido de las páginas.</li>
<li>Realizar una maquetación mediante CSS y con un diseño líquido para que se adapte a cualquier resolución de pantalla.</li>
<li>Utilizar un texto significativo en los enlaces.</li>
<li>Evitar combinaciones de colores de poco contraste, evitar transmitir información sólo a través del color.</li>
<li>Evitar el uso de JavaScript dentro de lo posible.</li>
<li>Evitar el uso de marcos (frames).</li>
<li>Uso de los estándares del W3C: HTML5, CSS 3.0, WAI AA.</li>
</ul>

";


/////////////////////////////////////////////////////////////////////////////////////////////// 
////////////////////////////////////////////// ANGLES /////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

$dicl['en']['AccessibilityTitle']             = "Declaration of Accessibility";
$dicl['en']['AccessibilityMetaDescription']   = "Declaration of Accessibility: Declaration of accessibility of the web $domain";

$dicl['en']['AdviseTitle']             = "Legal warning";
$dicl['en']['CookiesTitle']            = "Cookies policy";
$dicl['en']['PrivacityTitle']          = "Information on Data Protection";

$dicl['en']['AdviseDescription']       = "

<h3> 1. Purpose and acceptance </h3>
<p>
This legal notice regulates the use of our website, owned by <strong>$name</strong>. Browsing the <strong>$name</strong> website attributes the condition of user thereof and implies full and unreserved acceptance of each and every one of the provisions included in this Legal Notice, which may be modified. You are obliged to make correct use of the website in accordance with the laws, good faith, public order, traffic uses and this Legal Notice. You will be liable to <strong>$name</strong> or to third parties, for any damages that may be caused to you as a result of the breach of said obligation.
</p>

<h3> 2. Identification and communications </h3>
<p>
<strong>$name</strong>, in compliance with Law 34/2002, of July 11, on services of the information society and electronic commerce, informs you that:
</p>
<ul>
<li> Its corporate name is: <strong>$name</strong> </li>
<li> Your CIF is: $nif </li>
<li> Your registered office is at: $address </li>
</ul>
<p>
To communicate with us, we offer you different means of contact specified in the privacy policy.
</p> <p> All notifications and communications that you make with <strong>$name</strong> will be considered effective, for all purposes, as long as they are made by the means specified above

<h3> 3. Conditions of access and use </h3>
<p>
The website and its services are freely accessible, however, <strong>$name</strong> conditions the use of some of the services offered on its website upon prior completion of the corresponding form.
</p> <p> You guarantee the authenticity and timeliness of all the data that you communicate to <strong>$name</strong> and you will be solely responsible for any false or inaccurate statements you make.
</p> <p> You expressly agree to make appropriate use of the contents and services of EL <strong>$name</strong> and not to use them for, among others:
<ul>
<li> Disseminate content that is criminal, violent, pornographic, racist, xenophobic, offensive, apology for terrorism or, in general, contrary to the law or public order. </li>
<li> Introducing computer viruses into the network or performing actions that may alter, spoil, interrupt or generate errors or damage to electronic documents, data or physical and logical systems of <strong>$name</strong> or of third parties; as well as obstructing the access of other users to the website and its services through the massive consumption of computer resources through which <strong>$name</strong> provides its services. </li>
<li> Try to access data from other people or to restricted areas of the computer systems of <strong>$name</strong> or third parties and, where appropriate, extract information. </li>
<li> Violate the rights of intellectual or industrial property, as well as violate the confidentiality of the information of <strong>$name</strong> or of third parties. </li>
<li> Impersonate the identity of another user, public administrations or a third party. </li>
<li> Reproduce, copy, distribute, make available or in any other way publicly communicate, transform or modify the contents, unless you have the authorization of the holder of the corresponding rights or it is legally permitted. </li>
<li> Collect data for advertising purposes and send advertising of any kind and communications for sale or other commercial purposes without your prior request or consent. </li>
</ul>
All the contents of the website, such as texts, photographs, graphics, images, icons, technology, software, as well as its graphic design and source codes, constitute a work whose property belongs to <strong>$name</strong>, without None of the exploitation rights over them can be understood as transferred beyond what is strictly necessary for the correct use of the web.
<p> In short, you who access this website, can view the contents and make, where appropriate, authorized private copies provided that the reproduced elements are not subsequently transferred to third parties, nor are they installed on connected servers to networks, nor are they subject to any type of exploitation.
</p> <p> Likewise, all trademarks, trade names or distinctive signs of any kind that appear on the website are the property of <strong>$name</strong>, without it being understood that the use or access to the itself attributes any right to them.
</p> <p> The distribution, modification, assignment or public communication of the contents and any other act that has not been expressly authorized by the owner of the exploitation rights are prohibited.
</p> <p> The establishment of a hyperlink does not imply in any case the existence of relations between <strong>$name</strong> and the owner of the website on which it is established, nor the acceptance and approval by of <strong>$name</strong> of its contents or services. Those who intend to establish a hyperlink must previously request authorization in writing from <strong>$name</strong>. In any case, the hyperlink will only allow access to the home-page or home page of our website, and must also refrain from making false, inaccurate or incorrect statements or indications about <strong>$name</strong>, or include illegal content, contrary to good customs and public order.
</p><p> <strong>$name</strong> is not responsible for the use that each user gives to the materials made available on this website or for the actions carried out based on them.
</p>

<h3> 4. Exclusion of guarantees and responsibility </h3>
<p>
<strong>$name</strong> excludes, as far as the legal system allows, any liability for damages of any kind arising from:
</p><p> <ul>
<li> The inability to access the website or the lack of veracity, accuracy, completeness and / or timeliness of the content, as well as the existence of vices and defects of all kinds of the content transmitted, disseminated, stored, made available which have been accessed through the website or the services offered. </li>
<li> The presence of viruses or other elements in the content that may cause alterations in computer systems, electronic documents or user data. </li>
<li> Failure to comply with the laws, good faith, public order, traffic uses and this legal notice as a consequence of the incorrect use of the website. In particular, and as an example, <strong>$name</strong> is not responsible for the actions of third parties that violate intellectual and industrial property rights, business secrets, rights to honor, to personal and family privacy and to one's own image, as well as the regulations on unfair competition and illegal advertising. </li>
</ul>
<p> Likewise, <strong>$name</strong> declines any responsibility regarding the information that is found outside this website and is not managed directly by our webmaster. The function of the links that appear on this website is exclusively to inform the user about the existence of other sources capable of expanding the content offered by this website. <strong>$name</strong> does not guarantee or take responsibility for the operation or accessibility of the linked sites; nor does it suggest, invite or recommend a visit to them, so it will not be responsible for the result obtained. <strong>$name</strong> is not responsible for the establishment of hyperlinks by third parties.
</p>

<h3> 5. Procedure in case of illegal activities </h3>
<p>
In the event that you or a third party considers that there are facts or circumstances that reveal the illegal nature of the use of any content and / or the performance of any activity on the web pages included or accessible through the website, you must contact Contact <strong>$name</strong> by identifying yourself properly, specifying the alleged infractions and expressly declaring and under your responsibility that the information provided in the notification is accurate.
</p> <p> For any litigious matter that concerns the <strong>$name</strong> website, Spanish law will be applicable, with the Courts and Tribunals closest to the headquarters of (Spain) being competent.
</p>

<h3> 6. Publications </h3>
<p>
The administrative information provided through the website does not replace the legal publicity of the laws, regulations, plans, general provisions and acts that have to be formally published in the official gazettes of public administrations, which constitute the only instrument that attests to its authenticity and content. The information available on this website should be understood as a guide without the purpose of legal validity.
</p>

";

$dicl['en']['CookiesDescription']      = "

<h3> General information about cookies </h3>
<p>
User trust is important to us, and therefore <strong>$name</strong> is concerned about protecting your privacy. An important aspect of this is providing you with as much information as possible about how we use your personal data, including how we use local data storage and similar technology.
</p> <p> Local data storage involves storing different types of data locally on your device through your web browser. Locally stored data can, for example, contain user settings, information about how you navigate our website, what web browser you use, what ads have been displayed, and similar behavior on websites with which we collaborate. Locally stored data can be used to personalize the content and functions of our services so that your visits are more comfortable and make more sense.
</p> <p> One method of local data storage is cookies. Cookies are small text files that are stored on your device (PC, mobile phone or tablet) that allow us to recognize your web browser. Cookies contain information mainly about your web browser and about any activity that has occurred in it. They help us to guarantee the security and optimal functioning of our website, once you leave our website these are eliminated (security cookies and session cookies) and they collect information about the products that interest our internet visits and about how navigate through our website to make our online offers more attractive to users (tracking cookies).
</p>


<h3> Additional information about cookies </h3>
<p>
We use local data storage for a number of purposes, such as: to enable us to perform our services; provide you with relevant, personalized content when you visit our websites; measure and analyze the traffic on our website; improve our services; and direct targeted advertising. Here are more details on these topics:
<ul class = 'spacer'>
<li>
<strong> For our advertising </strong>
We use local data storage in connection with advertising activities. This allows us to know if and how often the user has seen an ad or a certain type of ad, and how long it has been since they saw it.
We also use local data storage to build target groups and segments for marketing purposes and to target specific ads.
</li>
<li>
<strong> To analyze and improve our services </strong>
We use various measurement tools that provide us with statistics and analysis relating to our services. These tools allow us to recognize the web browser over time and find out if the user has visited the website before and if so, how often. These tools offer us the ability to get an overview of how many unique users we have and how they use our services.
We also use the information we have collected and analyzed to develop and improve our services; for example, finding out which services are generating a lot of traffic or seeing if a service is performing optimally.
</li>
<li>
<strong> To deliver and adapt the services to your use </strong>
Local data storage is required and necessary in order to allow you to use our services, such as information about your settings, which tells us how the services should be presented in your web browser.
We also use local data storage to tailor our services to your use as best as possible.
</li>
</ul>


<h3> Management of cookies </h3>
<p>
You can disable cookies or configure your browser to notify you when a cookie is being sent to you.
</p> <p> The settings in your web browser normally display a list of all the cookies that have been stored to provide you with an overview and, if you wish, to remove unwanted cookies. Normally, you can indicate that you accept the storage of cookies from the websites you visit or from third parties affiliated with those websites. You can also choose to be notified each time a new cookie is stored. Guidance on how to do this in different web browsers is provided below. Your web browser normally stores cookies in a specific folder on your hard drive, so that you can also examine the content in more detail.
</p> <p> However, the cookies that are present on the website change frequently, and not all cookies are equally important. Therefore, if <strong>$name</strong> changes the use of tracking cookies, you will be notified with a message.
</p> <p> There are also services available that have been specially developed to provide users with an up-to-date list of cookies and other tracking mechanisms.
</p> <p> Please note that if you disable them, you may not be able to enjoy all the features of our website
</p> <p> Here is an overview of how locally stored data can be managed in different web browsers. Please note that this process may change and that the descriptions given here may not be up to date.
</p>

<h4> Cookie management in Google Chrome </h4>

<h5> How to delete cookies: </h5>
<ul>
<li> Go to Settings in your browser menu. </li>
<li> Click Show advanced settings. </li>
<li> Click Clear browsing data. </li>
<li> Select the time period for which you want to delete the information from the menu at the top. If you want to delete all cookies in your browser, click From the beginning of time. </li>
<li> Mark Cookies and other data from sites and plugins. </li>
<li> Click Clear browsing data. </li>
<li> Close the window. </li>
</ul>

<h5> How to prevent cookies from being stored in the web browser: </h5>
<ul>
<li> Go to Settings in your browser menu. </li>
<li> Click Show advanced settings and then click Content settings. </li>
<li> In Cookies, select your preferred option. If you want to prevent all cookies from being stored, click Do not allow data from the sites to be saved. </li>
<li> Click Done. </li>
<li> Close the window. </li>
</ul>


<h4> Management of cookies in Safari </h4>

<h5> How to delete cookies: </h5>
<ul>
<li> Go to Preferences in your browser menu. </li>
<li> Click on the Privacy tab. </li>
<li> Click Delete all website data and then click Delete to delete all cookies. </li>
<li> Close the window. </li>
</ul>

<h5> How to prevent cookies from being stored in your web browser: </h5>
<ul>
<li> Go to Preferences in your browser menu </li>
<li> Click on the Privacy tab. </li>
<li> In Cookies and website data select your preferred option. If you want to prevent all cookies from being stored, click Always block. </li>
<li> Close the window. </li>
</ul>


<h4> Managing cookies in Mozilla Firefox </h4>

<h5> How to delete cookies: </h5>
<ul>
<li> Go to Options in your browser menu. </li>
<li> Click on the Privacy tab. </li>
<li> Click Show cookies. </li>
<li> Select the cookies you want to delete and click Delete selected. Click Delete all if you want to delete all cookies in your web browser. </li>
<li> Close the window. Any changes you have made will be saved automatically. </li>
</ul>

<h5> How to prevent cookies from being stored in your web browser: </h5>
<ul>
<li> Go to Settings in your browser menu. </li>
<li> Select the Privacy tab. </li>
<li> Under History, click Use custom settings for history. </li>
<li> Select your preferred options in Allow website cookies. If you want to prevent all cookies from being stored, uncheck the Accept cookies from websites box. </li>
<li> Close the window. Any changes you have made will be saved automatically. </li>
</ul>


<h4> Managing cookies in Internet Explorer </h4>

<h5> How to delete cookies: </h5>
<ul>
<li> Go to Tools (gear icon) in your browser menu. </li>
<li> Click Internet Properties. </li>
<li> On the General tab - Browsing history, click Delete. </li>
<li> Make sure to check the Cookies and website data option. </li>
<li> Click Delete. </li>
<li> Click OK. </li>
</ul>

<h5> How to prevent cookies from being stored in your web browser: </h5>
<ul>
<li> Go to Tools (gear icon) in your browser menu. </li>
<li> Click Internet Options and then click the Privacy tab. </li>
<li> Move the slider to the desired level. If you want to prevent all cookies from being stored, select the Block all cookies level. </li>
<li> Click OK. </li>
</ul>


<h4> Managing cookies in Opera </h4>

<h5> How to delete cookies: </h5>
<ul>
<li> Go to Settings in your browser menu. </li>
<li> Select the Privacy and Security tab. </li>
<li> Click Cookies and then click All cookies and website data. </li>
<li> Select the cookies you want to delete and click Delete. Click Delete all if you want to delete all cookies in your web browser. </li>
<li> Click Done. </li>
<li> Close the window. </li>
</ul>

<h5> How to prevent cookies from being stored in your web browser: </h5>
<ul>
<li> Go to Settings in your browser menu. </li>
<li> Select the Privacy and Security tab. In Cookies, select your preferred option. If you want to prevent all cookies from being stored, click Do not allow data from the sites to be saved. </li>
<li> Close the window. </li>
</ul>


<h3> Contact information </h3>
<p>


For greater transparency, if you have any questions regarding the use of local storage on our website, please contact us at <span class='mailcoded'>$mail</span>, indicating in the subject 'Cookies policy'
</p>

";


$dicl['en']['PrivacityDescription']      = "


<h3> 1. Data relating to the Responsible </h3>

<p>
<strong> Responsible for Treatment </strong>
<ul class='mailcoded'>
<li> Entity: $name </li>
<li> CIF of the entity: $nif </li>
<li> Entity address: $address </li>
<li> Entity email: <span style='text-transform:uppercase'>$mail</span> </li>
<li> Responsible for the treatment: <span style='text-transform:uppercase'> $treatmentResponsible </span> </li>
<li> Telephone of the person in charge of the treatment: <span style='text-transform:uppercase'> $treatmentResponsiblePhone </span> </li>
<li> Email address of the Data Controller: <span style='text-transform:uppercase'> $treatmentResponsibleMail </span> </li>
</ul>


<h3> 2. Purposes </h3>

<p>
In compliance with the provisions of European Regulation 2016/679 General Data Protection and Organic Law 3/2018 on Protection of Personal Data and Guarantee of Digital Rights, we inform you that, depending on the relationship you have with us, in <strong>$name</strong> we treat the data you provide us for some, or all, of the following purposes:

<ul>
<li> Purchase / sale of goods and services. </li>
<li> Purchase / sale of material </li>
<li> Coordination of business activities </li>
<li> Creation of contracts, preparation of payroll and other related tasks </li>
<li> Training </li>
<li> Accounting, administrative, billing and collection management. </li>
<li> Accounting, administrative, billing, collection and payment management </li>
<li> Maintenance of the employment relationship and compensation for the work performed </li>
<li> Provide a service </li>
<li> Payment through POS </li>
<li> Carry out a personnel selection process based on the capacities, aptitudes and other information of interest included in the curriculum </li>
<li> Receipt of the provision of a service </li>
<li> Entity security. </li>
<li> Processing of registrations and leave due to common illness or work accident </li>
<li> Processing of budgets </li>
</ul>


<h3> 3. Data retention period </h3>

<p>
Your data will be kept for the duration of the contractual, commercial or other relationship with our entity, request its deletion, as well as the time necessary to comply with legal obligations.
</p>


<h3> 4. Legitimation </h3>

<p>
The legal basis for the treatment of your data is based on:
<ul>
<li> Unambiguous consent </li>
<li> Execution of a contract </li>
<li> Legitimate interest on the part of the controller </li>
</ul>

<h3> 5. Recipients </h3>

<p>

Your personal data will be communicated to third parties in the following cases:
<ul>
<li> To other data controllers </li>
<li> Tax administration </li>
<li> Banks and financial entities </li>
<li> State security forces and bodies </li>
<li> Consulting / Auditing Entities </li>
<li> Management / Advisory </li>
<li> Social security </li>
<li> Occupational Risk Prevention Service </li>
</ul>


<h3> 6. Rights </h3>

<p>
You have the right to obtain confirmation on whether <strong>$name</strong> is treating personal data that concerns you, or not.
</p> <p> Likewise, you have the right of access to your personal data, as well as to request the rectification of inaccurate data or, where appropriate, request its deletion when, among other reasons, the data is no longer necessary for the ends that were collected.
</p> <p> In certain circumstances, you may request the limitation of the processing of your data, in which case we will only keep them for the exercise or defense of claims.
</p> <p> Additionally, in certain circumstances and for reasons related to your particular situation, you may exercise the right to object to the processing of your data. <strong>$name</strong> will stop processing the data, except for compelling legitimate reasons, or the exercise or defense of possible claims.
</p> <p> Likewise, you can exercise the right to data portability, as well as withdraw the consents provided at any time, without affecting the legality of the treatment based on the consent prior to its withdrawal.
</p> <p> If you want to make use of any of your rights, you can do so through the contact link that you will find below:

<ul>
<li> To exercise your right of Access click <a href='$contactURL'> here </a> </li>
<li> To exercise your right of Rectification click <a href='$contactURL'> here </a> </li>
<li> To exercise your right of Deletion (Forgetfulness) click <a href='$contactURL'> here </a> </li>
<li> To exercise your right to Limit Treatment click <a href='$contactURL'> here </a> </li>
<li> To exercise your right to object click <a href='$contactURL'> here </a> </li>
<li> To exercise your right to Portability click <a href='$contactURL'> here </a> </li>
</ul>
<p> Alternatively, you can also contact us by postal mail at the following address: $address attached a photocopy of the DNI, for the certainty of your identity. Remember to provide as much information as possible about your request: Name and surname, email address used for the account or portal that is the subject of your request.
</p> <p> Finally, we inform you that you can contact the Spanish Agency for Data Protection and other competent public bodies for any claim arising from the processing of your personal data.
</p>


<h3> 7. Cookies policy </h3>

<p>
To know the cookies we use on our page, remember that you can access our Cookies Policy through the following link <a href=".construct_url($cookiesURL,$_Lang)."> cookie policy </a>.
</p>
";


$dicl['en']['AccessibilityDescription']       = "

<h3>DECLARATION OF ACCESSIBILITY</h3>

<strong>$_Accessibility_SL</strong> has undertaken to make its website accessible, in accordance with <a href='https://www.boe.es/buscar/act.php?id=BOE-A-2018-12699' target='_blank'>Royal Decree 1112/2018, of September 7</a>,
on accessibility of websites and applications for mobile devices in the public sector. <br><br>
This accessibility statement applies to the <strong>$_Accessibility_Web</strong> website <br>

<h3>Compliance status</h3>

This website is <strong>partially compliant</strong> with Royal Decree 1112/2018, of September 7, due to the lack of compliance of the aspects indicated below.

<h3>Content not accessible</h3>

The content that is collected below is not accessible for the following reasons: <br><br>

<ul>
<li><strong>Lack of compliance with Royal Decree 1112/2018, of September 7</strong>: there could be specific editing errors on some web page, both in HTML content and in final documents, published at a later date to September 20, 2018 (date of entry into force of Royal Decree 1112/2018, of September 7). Specifically, there may be errors in those documents that contain graphics, complex tables or content published using self-manageable tools. Likewise, there could be errors in the control of HTML animations.</li>
<li><strong>Disproportionate burden</strong>: not applicable.</li>
<li>The content <strong>does not fall within the scope of applicable law</strong>: does not apply.</li>
</ul>

<h3>Preparation of this accessibility statement</h3>

This statement was prepared on <strong>$_Accessibility_Date_Preparation</strong>. <br><br>

The method used to prepare the declaration has been a self-assessment carried out by the company that provides <strong>$_Accessibility_Web</strong>.

Statement last revision: <strong>$_Accessibility_Date_Last_Revision</strong>.

<h3>Observations and contact details</h3>

You can make <strong>communications</strong> about accessibility requirements (article 10.2.a) of Royal Decree 1112/2018, of September 7) such as: <br> <br>

<ul>
<li>Report any possible <strong>breach</strong> by this website.</li>
<li>Convey other <strong>access difficulties</strong> to the content.</li>
<li>Formulate any other <strong>questions or suggestions for improvement</strong> regarding the accessibility of the website.</li>
</ul>

<br> 
Through the following channels: <br><br>

<ul>
<li>Email: <strong><span class='mailcoded'>$_Accessibility_mail_accesibility</span></strong>.</li>
<li>Phone: <strong>$_Accessibility_phone_accesibility</strong>.</li>
</ul>

<br>
You can present:
<br><br>
<ul>
<li>A <strong>Complaint</strong> regarding compliance with the requirements of RD 1112/2018 or</li>
<li>A <strong>Request for Accessible Information</strong> regarding:</li>
<li><strong>contents</strong> that are <strong>excluded</strong> from the <strong>scope of application</strong> of RD 1112/2018 as established by article 3, section 4</li >
<li>or content that is <strong>exempt</strong> from <strong>compliance</strong> with accessibility requirements for imposing a <strong>disproportionate burden.</strong></li>
</ul>
<br>

In the Request for accessible information, the facts, reasons and request that make it possible to verify that it is a reasonable and legitimate request must be clearly specified. <br><br>
Communications, complaints and requests for accessible information will be received and processed by <strong>$_Accessibility_SL</strong>.

<h3>Application procedure</h3>

If, once a <strong>request for accessible information or complaint</strong> has been made, it has been <strong>rejected</strong>, <strong>you</strong> do not agree with the decision adopted, or the <strong>response does not meet the requirements</strong> contemplated in article 12.5, the person concerned may initiate a claim. Likewise, a claim may be filed in the event that <strong>the twenty business day period has elapsed</strong> without having obtained a <strong>response</strong>. <br><br>
The claim can be submitted through the Generic Instance of the electronic Headquarters of the Ministry <strong>$_Accessibility_ministerio</strong>, as well as in the rest of the options included in Law 39/2015, of October 1, on Administrative Procedure Common for Public Administrations. <br><br>
Claims will be received and processed by <strong>$_Accessibility_ministerio</strong>.

<h3>Optional Content</h3>

The currently visible version of this website is <strong>$_Accessibility_Date_Alta_Web</strong> and on that date the accessibility level in force at that time was reviewed. <br><br>
As of said date, partial daily reviews of the new or modified web content are carried out, both of the templates and of the final pages and documents published, in order to ensure compliance with the accessibility requirements of the UNE-EN 301549 Standard. :2019, considering the exceptions of Royal Decree 1112/2018, of September 7. <br><br>
Among others, the following measures are adopted to facilitate accessibility: <br><br>
<ul>
<li>Using alt text on images</li>
<li>Separate the content from the presentation by using style sheets (CSS).</li>
<li>Structure and label the content of the pages correctly.</li>
<li>Make a layout using CSS and with a liquid design so that it adapts to any screen resolution.</li>
<li>Use meaningful text in links.</li>
<li>Avoid low-contrast color combinations, avoid conveying information through color alone.</li>
<li>Avoid the use of JavaScript whenever possible.</li>
<li>Avoid the use of frames.</li>
<li>Use of W3C standards: HTML5, CSS 3.0, WAI AA.</li>
</ul>

";

///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////// ALEMANY /////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

$dicl['de']['AdviseTitle']             = "Rechtliche Hinweise";
$dicl['de']['CookiesTitle']            = "Cookie-Richtlinie";
$dicl['de']['PrivacityTitle']          = "Informationen zum Datenschutz";

$dicl['de']['AdviseDescription']       = "

<p>
<h3> 1. Zweck und Akzeptanz </h3>
Diese rechtlichen Hinweise regeln die Nutzung unserer Webseite, die Eigentum von <strong>$name</strong> ist. Die Navigation auf der Webseite von <strong>$name</strong> verleiht den Status eines Nutzers derselben und impliziert die vollständige und vorbehaltlose Annahme jeder einzelnen der in diesem rechtlichen Hinweis enthaltenen Bestimmungen, die Änderungen unterliegen können. Sie stimmen zu, die Webseite in Übereinstimmung mit dem Gesetz, Treu und Glauben, der öffentlichen Ordnung, dem Verkehr und diesen rechtlichen Hinweisen ordnungsgemäß zu nutzen. Sie haften gegenüber <strong>$name</strong> oder Dritten für alle Schäden, die Ihnen aufgrund der Nichteinhaltung dieser Verpflichtung entstehen können.
</p>

<p>
<h3> 2. Identifizierung und Kommunikation </h3>
<strong>$name</strong> informiert Sie gemäß Gesetz 34/2002 vom 11. Juli über Dienstleistungen der Informationsgesellschaft und des elektronischen Handels über Folgendes:
<ul>
<li> Der Firmenname lautet: <strong>$name</strong> </li>
<li> Ihr CIF lautet: $nif </li>
<li> Ihr Sitz befindet sich unter: $address </li>
</ul>
Um mit uns zu kommunizieren, bieten wir Ihnen verschiedene Kontaktmöglichkeiten, die in den Datenschutzbestimmungen angegeben sind.
</p> <p> Alle Benachrichtigungen und Mitteilungen, die Sie mit <strong>$name</strong> vornehmen, gelten für alle Zwecke als wirksam, sofern sie mit den oben angegebenen Mitteln erfolgen.
</p>

<p>
<h3> 3. Zugangs- und Nutzungsbedingungen </h3>
Die Webseite und ihre Dienste sind frei zugänglich. <strong>$name</strong> setzt jedoch die Nutzung einiger der auf ihrer Webseite angebotenen Dienste nach vorherigem Ausfüllen des entsprechenden Formulars voraus.
</p> <p> Sie garantieren die Authentizität und Aktualität aller Daten, die Sie an <strong>$name</strong> übermitteln, und Sie allein sind verantwortlich für falsche oder ungenaue Aussagen, die Sie machen.
</p> <p> Sie erklären sich ausdrücklich damit einverstanden, die Inhalte und Dienste von EL <strong>$name</strong> angemessen zu nutzen und unter anderem nicht zu verwenden für:
<ul>
<li> Die Verbreitung von Inhalten, die kriminell, gewalttätig, pornografisch, rassistisch, fremdenfeindlich, beleidigend, rechtfertigend für Terrorismus oder im Allgemeinen gegen das Gesetz oder die öffentliche Ordnung verstoßen. </li>
<li> Das Einschleusen von Computerviren in das Netzwerk oder das Ausführen von Handlungen, die geeignet sind, elektronische Dokumente, Daten oder physische und logische Systeme von <strong>$name</strong> oder Dritten zu verändern, zu beschädigen, zu unterbrechen oder Fehler oder Schäden zu erzeugen, und den Zugang anderer Nutzer zur Webseite und ihren Dienstleistungen durch den massiven Verbrauch von Computerressourcen, über die <strong>$name</strong> seine Dienstleistungen anbietet, zu behindern. </li>
<li> Der Versuch, auf Daten von anderen Personen oder auf eingeschränkte Bereiche der Computersysteme von <strong>$name</strong> oder von Dritten zuzugreifen und gegebenenfalls Informationen zu extrahieren. </li>
<li> Die Verletzung der Rechte an geistigem oder gewerblichem Eigentum sowie Verletzung der Vertraulichkeit der Informationen von <strong>$name</strong> oder von Dritten. </li>
<li> Der Identitätswechsel eines anderen Benutzers, einer öffentlichen Verwaltung oder eines Dritten. </li>
<li> Das Vervielfältigen, kopieren, verteilen, verfügbar machen oder auf andere Weise öffentlich kommunizieren, transformieren oder modifizieren von Inhalten, es sei denn, Sie haben die Genehmigung des Inhabers der entsprechenden Rechte oder es ist gesetzlich zulässig. </li>
<li> Das Sammeln von Daten für Werbezwecke und Versenden von Werbung jeglicher Art und Mitteilungen zum Verkauf oder für andere kommerzielle Zwecke ohne Ihre vorherige Anfrage oder Zustimmung. </li>
</ul>
Alle Inhalte der Webseite, wie Texte, Fotografien, Grafiken, Bilder, Icons, Technologie, Software, sowie ihr grafisches Design und ihre Quellcodes, stellen ein Eigentum von <strong>$name</strong> dar, und keines der Verwertungsrechte an ihnen ist so zu verstehen, dass sie über das für die korrekte Nutzung der Webseite unbedingt erforderliche Maß hinaus übertragen wurden.
</p> <p> Kurz gesagt, Sie, die Sie auf diese Webseite zugreifen, können die Inhalte einsehen und gegebenenfalls genehmigte private Kopien anfertigen, vorausgesetzt, dass die reproduzierten Elemente anschließend nicht an Dritte übertragen oder auf Servern installiert werden, die an Netzwerke angeschlossen sind, oder Gegenstand irgendeiner Art von Verwertung sind.
</p> <p> Ebenso sind alle Marken, Handelsnamen oder Logos jeglicher Art, die auf der Webseite erscheinen, Eigentum von <strong>$name</strong>, und es kann nicht davon ausgegangen werden, dass die Nutzung oder der Zugriff auf die Webseite irgendwelche Rechte an solchen Marken, Handelsnamen oder Logos gewährt.
</p> <p> Die Verbreitung, Änderung, Abtretung oder öffentliche Kommunikation der Inhalte und aller anderen Handlungen, die nicht ausdrücklich vom Eigentümer der Verwertungsrechte genehmigt wurden, ist untersagt.
</p> <p> Die Einrichtung eines Hyperlinks impliziert in keinem Fall das Bestehen einer Beziehung zwischen <strong>$name</strong> und dem Eigentümer der Webseite, auf der sie eingerichtet wurde, und auch nicht die Annahme und Billigung der Inhalte oder Dienstleistungen durch <strong>$name</strong>. Personen, die beabsichtigen, einen Hyperlink einzurichten, müssen zunächst die schriftliche Genehmigung von <strong>$name</strong> einholen. In jedem Fall wird der Hyperlink nur den Zugriff auf die Homepage unserer Webseite ermöglichen, muss auch davon Abstand nehmen, falsche, ungenaue oder missverständliche Aussagen auf <strong>$name</strong> zu machen oder rechtswidrige, gegen die guten Sitten und die öffentliche Ordnung verstoßende Inhalte aufzunehmen.
</p> <p> <strong>$name</strong> ist nicht verantwortlich für die Verwendung, die jeder Benutzer den auf dieser Webseite zur Verfügung gestellten Materialien gibt, oder für die darauf basierenden Aktionen.
</p>

<p>
<h3> 4. Ausschluss von Garantien und Verantwortung </h3>
<strong>$name</strong> schließt, soweit gesetzlich zulässig, jegliche Haftung für Schäden jeglicher Art aus:
</p> <p> <ul>
<li> Aus der Unmöglichkeit, auf die Webseite zuzugreifen, oder dem Mangel an Richtigkeit, Genauigkeit, Vollständigkeit und/oder Aktualität der Inhalte sowie dem Vorhandensein von Fehlern und Mängeln jeglicher Art in den übertragenen, verbreiteten, gespeicherten und denjenigen, die auf die Webseite oder die angebotenen Dienstleistungen zugegriffen haben, zur Verfügung gestellten Inhalten. </li>
<li> Das Vorhandensein von Viren oder anderen Elementen im Inhalt, die Änderungen an Computersystemen, elektronischen Dokumenten oder Benutzerdaten verursachen können. </li>
<li> Nichteinhaltung des Gesetzes, von Treu und Glauben, der öffentlichen Ordnung, der Nutzung des Datenverkehrs und dieses rechtlichen Hinweises als Folge der unsachgemäßen Nutzung der Webseite. Insbesondere und beispielhaft kann <strong>$name</strong> nicht für die Handlungen Dritter verantwortlich gemacht werden, die geistige und gewerbliche Eigentumsrechte, Geschäftsgeheimnisse, das Recht auf Ehre, die persönliche und familiäre Privatsphäre und das eigene Image sowie die Vorschriften über unlauteren Wettbewerb und illegale Werbung verletzen. </li> </ul>
</ul>
</p> <p> Ebenso lehnt <strong>$name</strong> jegliche Verantwortung für die Informationen ab, die außerhalb dieser Webseite gefunden und nicht direkt von unserem Webmaster verwaltet werden. Die Funktion der auf dieser Webseite angezeigten Links besteht ausschließlich darin, den Benutzer über das Vorhandensein anderer Quellen zu informieren, die den auf dieser Webseite angebotenen Inhalt erweitern können. <strong>$name</strong> übernimmt keine Garantie oder Verantwortung für den Betrieb oder die Zugänglichkeit der verlinkten Webseiten; noch schlägt sie den Besuch dort vor, lädt sie ein oder empfiehlt sie, so dass sie auch nicht für das erzielte Ergebnis verantwortlich ist. <strong>$name</strong> ist nicht verantwortlich für die Einrichtung von Hyperlinks durch Dritte.
</p>

<p>
<h3> 5. Verfahren bei illegalen Aktivitäten </h3>
Für den Fall, dass Sie oder ein Dritter der Ansicht sind, dass Fakten oder Umstände vorliegen, die die Rechtswidrigkeit der Nutzung von Inhalten und/oder die Durchführung von Aktivitäten auf den Webseiten, die auf der Webseite enthalten oder über die Webseite zugänglich sind, offenbaren, müssen Sie sich an <strong>$name</strong> wenden, indem Sie sich ordnungsgemäß identifizieren, die angeblichen Verstöße angeben und unter Ihrer Verantwortung ausdrücklich erklären, dass die in der Meldung angegebenen Informationen korrekt sind.
</p> <p> Für alle Rechtsstreitigkeiten, die die Webseite <strong>$name</strong> betreffen, gilt spanisches Recht, wobei die Gerichte, die dem Hauptsitz von (Spanien) am nächsten liegen, zuständig sind.
</p>

<h3> 6. Veröffentlichungen </h3>
Die Verwaltungsinformationen, die über die Webseite zur Verfügung gestellt werden, ersetzen nicht die rechtliche Publizität der Gesetze, Verordnungen, Pläne, allgemeinen Bestimmungen und Rechtsakte, die formell in den Amtsblättern der öffentlichen Verwaltungen veröffentlicht werden müssen, die als einzige ihre Echtheit und ihren Inhalt bescheinigen. Die auf dieser Webseite verfügbaren Informationen sind als Leitfaden zu verstehen, der keinen rechtsgültigen Zweck verfolgt.
</p>
";

$dicl['de']['CookiesDescription']      = "

<p>
<h3> Allgemeine Informationen zu Cookies </h3>
Das Vertrauen des Benutzers ist uns wichtig, und deshalb ist uns bei <strong>$name</strong> der Schutz Ihrer Privatsphäre ein wichtiges Anliegen. Ein wichtiger Aspekt dabei ist, Ihnen so viele Informationen wie möglich darüber zu liefern, wie wir Ihre persönlichen Daten verwenden, einschließlich der Verwendung lokaler Datenspeicher und ähnlicher Technologien.
</p> <p> Bei der lokalen Datenspeicherung werden verschiedene Datentypen lokal auf Ihrem Gerät über Ihren Webbrowser gespeichert. Lokal gespeicherte Daten können beispielsweise Benutzereinstellungen, Informationen darüber enthalten, wie Sie auf unserer Webseite navigieren, welchen Webbrowser Sie verwenden, welche Anzeigen geschaltet wurden und ähnliches Verhalten auf Webseites, mit denen wir zusammenarbeiten. Lokal gespeicherte Daten können verwendet werden, um den Inhalt und die Funktionen unserer Dienste so zu personalisieren, dass Ihre Besuche komfortabler und sinnvoller werden.
</p> <p> Eine Methode zur lokalen Datenspeicherung sind Cookies. Cookies sind kleine Textdateien, die auf Ihrem Gerät (PC, Mobiltelefon oder Tablet) gespeichert werden und die es uns ermöglichen, Ihren Webbrowser zu erkennen. Cookies enthalten Informationen hauptsächlich über Ihren Webbrowser und über alle darin aufgetretenen Aktivitäten. Sie helfen uns, die Sicherheit und das optimale Funktionieren unserer Webseite zu gewährleisten. Sie sammeln Informationen über die Produkte, die unsere Internetbesucher interessieren, und wie sie durch unsere Webseite navigieren, damit wir unsere Online-Angebote für Benutzer attraktiver zu machen können (Tracking-Cookies). Sobald Sie unsere Webseite verlassen, werden diese beseitigt (Sicherheits-Cookies und Sitzungs-Cookies).
</p>


<p>
<h3> Zusätzliche Informationen zu Cookies </h3>
Wir verwenden die lokale Datenspeicherung für eine Reihe von Zwecken, z. B.: Um unsere Dienstleistungen erbringen zu können; Bereitstellung relevanter, personalisierter Inhalte beim Besuch unserer Webseiten; den Verkehr auf unserer Webseite messen und analysieren; unsere Dienstleistungen verbessern; und direkte gezielte Werbung. 
Hier finden Sie weitere Details zu diesen Themen:

<ul class = 'spacer'>
<li>
<strong> Für unsere Werbung </strong>
Wir verwenden die lokale Datenspeicherung im Zusammenhang mit Werbeaktivitäten. Auf diese Weise können wir feststellen, ob und wie oft der Nutzer eine Anzeige oder einen bestimmten Anzeigentyp gesehen hat und wie lange es her ist.
Wir verwenden die lokale Datenspeicherung auch, um Zielgruppen und Segmente für Marketingzwecke zu erstellen und bestimmte Anzeigen auszurichten.
</li> </ul>
<li>
<strong> Analyse und Verbesserung unserer Dienstleistungen </strong>
Wir verwenden verschiedene Messinstrumente, die uns Statistiken und Analysen zu unseren Dienstleistungen liefern. Mit diesen Tools können wir den Webbrowser im Laufe der Zeit erkennen und herausfinden, ob und wie oft der Benutzer die Webseite bereits besucht hat. Diese Tools bieten uns die Möglichkeit, einen Überblick darüber zu erhalten, wie viele einzelne Benutzer wir haben und wie sie unsere Dienste nutzen.
Wir verwenden die von uns gesammelten und analysierten Informationen auch zur Entwicklung und Verbesserung unserer Dienstleistungen, beispielsweise um herauszufinden, welche Dienste viel Traffic erzeugen oder um zu sehen, ob ein Dienst optimal funktioniert.
</li> </ul>
<li>
<strong> Bereitstellung und Anpassung der Dienste an Ihre Nutzung </strong>
Lokale Datenspeicherung ist erforderlich, damit Sie unsere Dienste nutzen können, z. B. Informationen zu Ihren Einstellungen, aus denen hervorgeht, wie die Dienste in Ihrem Webbrowser dargestellt werden sollen.
Wir verwenden auch die lokale Datenspeicherung, um unsere Dienste so gut wie möglich auf Ihre Nutzung abzustimmen.
</li> </ul>
</ul>
</p>

<p>
<h3> Verwaltung von Cookies </h3>
Sie können Cookies deaktivieren oder Ihren Browser so konfigurieren, dass Sie benachrichtigt werden, wenn ein Cookie an Sie gesendet wird.
</p> <p> In den Einstellungen Ihres Webbrowsers wird normalerweise eine Liste aller gespeicherten Cookies angezeigt, um Ihnen einen Überblick zu verschaffen und unerwünschte Cookies zu entfernen. Normalerweise können Sie angeben, dass Sie die Speicherung von Cookies von den von Ihnen besuchten Webseites oder von mit diesen Webseiten verbundenen Dritten akzeptieren. Sie können auch festlegen, dass Sie jedes Mal benachrichtigt werden, wenn ein neues Cookie gespeichert wird. Anleitungen dazu finden Sie unten in verschiedenen Webbrowsern. Ihr Webbrowser speichert Cookies normalerweise in einem bestimmten Ordner auf Ihrer Festplatte, sodass Sie den Inhalt auch genauer untersuchen können.
</p> <p> Die auf der Webseite vorhandenen Cookies ändern sich jedoch häufig, und nicht alle Cookies sind gleich wichtig. Wenn <strong>$name</strong> die Verwendung von Tracking-Cookies ändert, werden Sie daher mit einer Nachricht benachrichtigt.
</p> <p> Es gibt auch Dienste, die speziell entwickelt wurden, um Benutzern eine aktuelle Liste von Cookies und anderen Verfolgungsmechanismen bereitzustellen.
</p> <p> Bitte beachten Sie, dass Sie möglicherweise nicht alle Funktionen unserer Webseite nutzen können, wenn Sie sie deaktivieren.
</p> <p> Hier finden Sie eine Übersicht darüber, wie lokal gespeicherte Daten in verschiedenen Webbrowsern verwaltet werden können. Bitte beachten Sie, dass sich dieser Vorgang ändern kann und die hier angegebenen Beschreibungen möglicherweise nicht aktuell sind.
</p>

<p>
<h4> Cookie-Verwaltung in Google Chrome </h4>

<h5> So ​​löschen Sie Cookies: </h5>
<ul>
<li> Gehen Sie in Ihrem Browser-Menü zu Einstellungen. </li>
<li> Klicken Sie auf Erweiterte Einstellungen anzeigen. </li>
<li> Klicken Sie auf Browserdaten löschen. </li>
<li> Wählen Sie den Zeitraum aus, für den Sie die Informationen aus dem Menü oben löschen möchten. Wenn Sie alle Cookies in Ihrem Browser löschen möchten, klicken Sie von Anfang an auf. </li>
<li> Markieren Sie Cookies und andere Daten von Webseiten und Plugins. </li>
<li> Klicken Sie auf Browserdaten löschen. </li>
<li> Schließen Sie das Fenster. </li>
</ul>

<h5> So ​​verhindern Sie, dass Cookies im Webbrowser gespeichert werden: </h5>
<ul>
<li> Gehen Sie in Ihrem Browser-Menü zu Einstellungen. </li>
<li> Klicken Sie auf Erweiterte Einstellungen anzeigen und dann auf Inhaltseinstellungen. </li>
<li> Wählen Sie unter Cookies Ihre bevorzugte Option aus. Wenn Sie verhindern möchten, dass alle Cookies gespeichert werden, klicken Sie auf Daten von den Webseiten nicht speichern lassen. </li>
<li> Klicken Sie auf Fertig. </li>
<li> Schließen Sie das Fenster. </li>
</ul>
</p>

<p>
<h4> Verwaltung von Cookies in Safari </h4>

<h5> So ​​löschen Sie Cookies: </h5>
<ul>
<li> Gehen Sie in Ihrem Browser-Menü zu Einstellungen. </li>
<li> Klicken Sie auf die Registerkarte Datenschutz. </li>
<li> Klicken Sie auf Alle Webseiten-Daten löschen und dann auf Löschen, um alle Cookies zu löschen. </li>
<li> Schließen Sie das Fenster. </li>
</ul>

<h5> So ​​verhindern Sie, dass Cookies in Ihrem Webbrowser gespeichert werden: </h5>
<ul>
<li> Gehen Sie in Ihrem Browser-Menü zu Einstellungen. </li>
<li> Klicken Sie auf die Registerkarte Datenschutz. </li>
<li> Wählen Sie unter Cookies und Webseiten-Daten Ihre bevorzugte Option aus. Wenn Sie verhindern möchten, dass alle Cookies gespeichert werden, klicken Sie auf Immer blockieren. </li>
<li> Schließen Sie das Fenster. </li>
</ul>
</p>

<p>
<h4> Verwalten von Cookies in Mozilla Firefox </h4>

<h5> So ​​löschen Sie Cookies: </h5>
<ul>
<li> Gehen Sie in Ihrem Browser-Menü zu Optionen. </li>
<li> Klicken Sie auf die Registerkarte Datenschutz. </li>
<li> Klicken Sie auf Cookies anzeigen. </li>
<li> Wählen Sie die Cookies aus, die Sie löschen möchten, und klicken Sie auf Ausgewählte löschen. Klicken Sie auf Alle löschen, wenn Sie alle Cookies in Ihrem Webbrowser löschen möchten. </li>
<li> Schließen Sie das Fenster. Alle von Ihnen vorgenommenen Änderungen werden automatisch gespeichert. </li>
</ul>

<h5> So ​​verhindern Sie, dass Cookies in Ihrem Webbrowser gespeichert werden: </h5>
<ul>
<li> Gehen Sie in Ihrem Browser-Menü zu Einstellungen. </li>
<li> Wählen Sie die Registerkarte Datenschutz. </li>
<li> Klicken Sie unter Verlauf auf Benutzerdefinierte Einstellungen für Verlauf verwenden. </li>
<li> Wählen Sie Ihre bevorzugten Optionen unter Webseiten-Cookies zulassen. Wenn Sie verhindern möchten, dass alle Cookies gespeichert werden, deaktivieren Sie das Kontrollkästchen Cookies von Webseiten akzeptieren. </li>
<li> Schließen Sie das Fenster. Alle von Ihnen vorgenommenen Änderungen werden automatisch gespeichert. </li>
</ul>
</p>


<p>
<h4> Verwalten von Cookies in Internet Explorer </h4>

<h5> So ​​löschen Sie Cookies: </h5>
<ul>
<li> Gehen Sie in Ihrem Browser-Menü zu Extras (Zahnradsymbol). </li>
<li> Klicken Sie auf Internet-Eigenschaften. </li>
<li> Klicken Sie auf der Registerkarte Allgemein - Browserverlauf auf Löschen. </li>
<li> Stellen Sie sicher, dass die Option Cookies und Webseiten-Daten aktiviert ist. </li>
<li> Klicken Sie auf Löschen. </li>
<li> Klicken Sie auf OK. </li>
</ul>

<h5> So ​​verhindern Sie, dass Cookies in Ihrem Webbrowser gespeichert werden: </h5>
<ul>
<li> Gehen Sie in Ihrem Browser-Menü zu Extras (Zahnradsymbol). </li>
<li> Klicken Sie auf Internetoptionen und dann auf die Registerkarte Datenschutz. </li>
<li> Bewegen Sie den Schieberegler auf die gewünschte Stufe. Wenn Sie verhindern möchten, dass alle Cookies gespeichert werden, wählen Sie die Stufe Alle Cookies blockieren. </li>
<li> Klicken Sie auf OK. </li>
</ul>
</p>


<p>
<h4> Verwalten von Cookies in Opera </h4>

<h5> So ​​löschen Sie Cookies: </h5>
<ul>
<li> Gehen Sie in Ihrem Browser-Menü zu Einstellungen. </li>
<li> Wählen Sie die Registerkarte Datenschutz und Sicherheit. </li>
<li> Klicken Sie auf Cookies und dann auf Alle Cookies und Webseiten-Daten. </li>
<li> Wählen Sie die Cookies aus, die Sie löschen möchten, und klicken Sie auf Löschen. Klicken Sie auf Alle löschen, wenn Sie alle Cookies in Ihrem Webbrowser löschen möchten. </li>
<li> Klicken Sie auf Fertig. </li>
<li> Schließen Sie das Fenster. </li>
</ul>

<h5> So ​​verhindern Sie, dass Cookies in Ihrem Webbrowser gespeichert werden: </h5>
<ul>
<li> Gehen Sie in Ihrem Browser-Menü zu Einstellungen. </li>
<li> Wählen Sie die Registerkarte Datenschutz und Sicherheit. Wählen Sie unter Cookies Ihre bevorzugte Option aus. Wenn Sie verhindern möchten, dass alle Cookies gespeichert werden, klicken Sie auf Daten von Webseiten nicht speichern lassen. </li>
<li> Schließen Sie das Fenster. </li>
</ul>
</p>

<p>
<h3> Kontaktinformationen </h3>


Für mehr Transparenz kontaktieren Sie uns bitte unter <span class='mailcoded'>$mail</span>, wenn Sie Fragen zur Verwendung des lokalen Speichers auf unserer Webseite haben. Geben Sie dies im Betreff 'Cookie-Richtlinie' an.
</p>

";


$dicl['de']['PrivacityDescription']      = "

<p>

<h3> 1. Daten in Bezug auf den Verantwortlichen </h3>

<strong> Verantwortlich für die Behandlung </strong>
Die Datenverarbeitung auf dieser Webseite erfolgt durch den Webseitenbetreiber, dessen Kontaktdaten Sie wie folgt entnehmen können:
<ul class='mailcoded'>
<li> Entität: $name </li>
<li> CIF der Entität: $nif </li>
<li> Entitätsadresse: $address </li>
<li> E-Mail der Entität: <span style='text-transform:uppercase'>$mail</span> </li>
<li> Verantwortlich für die Behandlung: <span style='text-transform:uppercase'> $treatmentResponsible </span> </li>
<li> Telefon der für die Behandlung verantwortlichen Person: <span style='text-transform:uppercase'> $treatmentResponsiblePhone </span> </li>
<li> E-Mail-Adresse des Datencontrollers: <span style='transform:uppercase'>$treatmentResponsibleMail</span> </li>
</ul>
</p>

<p>

<h3> 2. Zweck </h3>

In Übereinstimmung mit der Europäischen Verordnung 2016/679 Allgemeiner Datenschutz und dem Organgesetz 3/2018 über den Schutz personenbezogener Daten und die Gewährleistung digitaler Rechte informieren wir Sie, dass <strong>$name</strong> die von Ihnen zur Verfügung gestellten Daten in Abhängigkeit von Ihrer Beziehung zu uns für einige oder alle der folgenden Zwecke verarbeiten wird:
<ul>
<li> Kauf / Verkauf von Waren und Dienstleistungen </li>
<li> Kauf / Verkauf von Material </li> 
<li> Koordination der Geschäftstätigkeit </li>
<li> Erstellung von Verträgen, Vorbereitung der Gehaltsabrechnung und andere damit verbundene Aufgaben </li>
<li> Training </li> 
<li> Buchhaltung, Verwaltung, Abrechnung, Inkasso und Zahlungsmanagement </li>
<li> Aufrechterhaltung des Arbeitsverhältnisses und Entschädigung für die geleistete Arbeit </li>
<li> Fehlerfreie Bereitstellung der Webseite</li>
<li> Zahlung per POS </li> 
<li> Durchführung eines Auswahlverfahrens für Personal entsprechend den im Lehrplan enthaltenen Kapazitäten, Fähigkeiten und anderen Daten von Belang. </li>
<li> Erhalt der Bereitstellung der Dienstleistung</li> 
<li> Entitätssicherheit. </li>
<li> Bearbeitung von An- und Abmeldungen wegen allgemeiner Krankheit oder Arbeitsunfall </li>
<li> Budgetverarbeitung </li> 
</ul>
</p>

<p>

<h3> 3. Datenaufbewahrungszeitraum </h3>

Ihre Daten werden für die Dauer der vertraglichen, geschäftlichen oder sonstigen Beziehung mit unserem Unternehmen aufbewahrt, bis ihre Löschung beantragt wird, sowie für die Zeit, die erforderlich ist, um den gesetzlichen Verpflichtungen nachzukommen.
</p>

<p>

<h3> 4. Legitimation </h3>

Die Rechtsgrundlage für die Behandlung Ihrer Daten basiert auf:
<ul>
<li> Eindeutige Zustimmung </li>  
<li> Vertragserfüllung </li> 
<li> Berechtigtes Interesse des Verantwortlichen für die Verarbeitung </li>
</ul>
<p>

<h3> 5. Empfänger </h3>


Ihre persönlichen Daten werden in folgenden Fällen an Dritte weitergegeben:
<ul>
<li> Zu anderen Verantwortlichen für die Verarbeitung </li>
<li> Steuerverwaltung </li> 
<li> Banken und Finanzunternehmen </li> 
<li> Staatssicherheitskräfte und -gremien </li>
<li> Beratungs- / Prüfungsunternehmen </li> 
<li> Management / Beratung </li> 
<li> Soziale Sicherheit </li> 
<li> Dienst zur Verhütung von Arbeitsrisiken </li> 
</ul>
</p>

<p>

<h3> 6. Rechte </h3>

Sie haben jederzeit das Recht, bei unentgeltlich Auskunft über Herkunft, Empfänger und Zweck Ihrer gespeicherten personenbezogenen Daten von <strong>$name</strong> zu erhalten. 
</p> <p> Sie haben außerdem ein Recht, die Berichtigung, Sperrung oder Löschung dieser Daten zu verlangen. </p> <p> Unter bestimmten Umständen können Sie die Einschränkung der Verarbeitung Ihrer Daten beantragen. In diesem Fall werden wir sie nur zur Ausübung oder Verteidigung von Ansprüchen aufbewahren.
</p> <p> Wenn Sie die Verarbeitung Ihrer personenbezogenen Daten eingeschränkt haben, dürfen diese Daten – von ihrer Speicherung abgesehen – nur mit Ihrer Einwilligung oder zur Geltendmachung, Ausübung oder Verteidigung von Rechtsansprüchen oder zum Schutz der Rechte einer anderen natürlichen oder juristischen Person oder aus Gründen eines wichtigen öffentlichen Interesses der Europäischen Union oder eines Mitgliedstaats verarbeitet werden.<strong>$name</strong> stellt die Verarbeitung der Daten ein, sofern diese nicht zwingend zur Ausübung, Verteidigung oder Geltendmachung von Rechtsansprüchen benötigt werden.
</p> <p> Sie können auch das Recht auf Datenübertragungsfähigkeit ausüben und die erteilten Einwilligungen jederzeit widerrufen, ohne die Rechtmäßigkeit der Verarbeitung aufgrund der vor dem Widerruf erteilten Einwilligung zu beeinträchtigen.
</p> <p> Wenn Sie eines Ihrer Rechte nutzen möchten, können Sie dies über den unten angegebenen Kontaktlink tun:

<ul>
<li> Um Ihr Zugriffsrecht auszuüben, klicken Sie hier auf <a href='$contactURL'>Hier</a> </li>
<li> Um Ihr Recht auf Berichtigung auszuüben, klicken Sie hier auf <a href='$contactURL'>Hier</a> </li>
<li> Um Ihr Widerrufsrecht (Datenlöschung) auszuüben, klicken Sie hier auf <a href='$contactURL'>Hier</a> </li>
<li> Um von Ihrem Recht auf eingeschränkte Nutzung Gebrauch zu machen, klicken Sie hier auf <a href='$contactURL'>Hier</a> </li>
<li> Um Ihr Widerspruchsrecht auszuüben, klicken Sie hier auf <a href='$contactURL'>Hier</a> </li>
<li> Um Ihr Recht auf Datenübertragung geltend zu machen, klicken Sie hier auf <a href='$contactURL'>Hier</a> </li>
</ul>
</p> <p> Alternativ können Sie uns auch per Post unter folgender Adresse kontaktieren: $address beigefügt eine Fotokopie des DNI, um Ihre Identität sicherzustellen. Denken Sie daran, so viele Informationen wie möglich zu Ihrer Anfrage anzugeben: Vor- und Nachname, E-Mail-Adresse, die für das Konto oder das Portalobjekt Ihrer Anfrage verwendet wird.
</p> <p> Schließlich teilen wir Ihnen mit, dass Sie sich an die spanische Datenschutzbehörde und andere zuständige öffentliche Stellen wenden können, wenn Sie Ansprüche aus der Verarbeitung Ihrer personenbezogenen Daten geltend machen.
</p>

<p>

<h3> 7. Cookie-Richtlinie </h3>

Um die Cookies, die wir auf unserer Seite verwenden einzusehen, können Sie über den folgenden Link auf unsere Cookie-Richtlinie zugreifen: <a href=".construct_url($cookiesURL,$_Lang)."> Cookie-Richtlinie </a>.

</p>
";

///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////// FRANCÉS /////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

$dicl['fr']['AdviseTitle']             = "Avis juridique";
$dicl['fr']['CookiesTitle']            = "Politique de cookies";
$dicl['fr']['PrivacityTitle']          = "Informations sur la protection des données";
$dicl['fr']['AccessibilityTitle'] 	   = "Déclaration d'accessibilité";

$dicl['fr']['AdviseDescription']       = "

<p>
<h3> 1. Objectif et acceptation </h3>
Cet avis juridique régit l'utilisation de notre site Web, propriété de <b>$name</b>. La navigation sur le site <b>$name</b> attribue la condition d'utilisateur de celui-ci et implique l'acceptation pleine et sans réserve de chacune des dispositions incluses dans la présente Mention Légale, qui peut être modifiée. Vous êtes obligé d'utiliser correctement le site Web conformément aux lois, à la bonne foi, à l'ordre public, aux utilisations du trafic et au présent avis juridique. Vous serez responsable envers <b>$name</b> ou envers des tiers, de tout dommage qui pourrait vous être causé du fait du manquement à ladite obligation.
</p>

<p>
<h3> 2. Identification et communications </h3>
<b>$name</b>, conformément à la loi 34/2002 du 11 juillet sur les services de la société de l'information et du commerce électronique, vous informe que:
<ul>
<li> Sa dénomination sociale est: <b>$name</b> </li>
<li> Votre CIF est: $nif </li>
<li> Votre siège social est à: $address </li>
</ul>
Pour communiquer avec nous, nous mettons à votre disposition différents moyens de contact spécifiés dans la politique de confidentialité.
</p> <p> Toutes les notifications et communications que vous effectuez avec <b>$name</b> seront considérées comme efficaces, à toutes fins utiles, à condition qu'elles soient effectuées par les moyens spécifiés ci-dessus
</p>

<p>
<h3> 3. Conditions d'accès et d'utilisation </h3>
Le site Web et ses services sont librement accessibles, cependant, <b>$name</b> conditionne l'utilisation de certains des services proposés sur son site Web après avoir rempli au préalable le formulaire correspondant.
</p> <p> Vous garantissez l'authenticité et l'actualité de toutes les données que vous communiquez à <b>$name</b> et vous serez seul responsable de toute déclaration fausse ou inexacte que vous faites.
</p> <p> Vous acceptez expressément de faire un usage approprié des contenus et services de EL <b>$name</b> et de ne pas les utiliser pour, entre autres:
<ul>
<li> Diffuser du contenu à caractère criminel, violent, pornographique, raciste, xénophobe, offensant, apologie du terrorisme ou, en général, contraire à la loi ou à l'ordre public. </li>
<li> L'introduction de virus informatiques dans le réseau ou l'exécution d'actions susceptibles d'altérer, de gâcher, d'interrompre ou de générer des erreurs ou d'endommager des documents électroniques, des données ou des systèmes physiques et logiques de <b>$name</b> ou de tiers; ainsi que d'entraver l'accès d'autres utilisateurs au site Web et à ses services par la consommation massive de ressources informatiques par lesquelles <b>$name</b> fournit ses services. </li>
<li> Essayez d'accéder aux données d'autres personnes ou à des zones restreintes des systèmes informatiques de <b>$name</b> ou de tiers et, le cas échéant, extrayez des informations. </li>
<li> Violer les droits de propriété intellectuelle ou industrielle, ainsi que violer la confidentialité des informations de <b>$name</b> ou de tiers. </li>
<li> Usurper l'identité d'un autre utilisateur, des administrations publiques ou d'un tiers. </li>
<li> Reproduire, copier, distribuer, mettre à disposition ou de toute autre manière communiquer, transformer ou modifier publiquement le contenu, à moins que vous n'ayez l'autorisation du propriétaire des droits correspondants ou que cela ne soit légalement autorisé. </li>
<li> Collectez des données à des fins publicitaires et envoyez de la publicité de tout type et des communications à des fins de vente ou à d'autres fins commerciales sans votre demande ou votre consentement préalable. </li>
</ul>
Tous les contenus du site, tels que textes, photographies, graphismes, images, icônes, technologie, logiciels, ainsi que sa conception graphique et ses codes sources, constituent une œuvre dont la propriété appartient à <b>$name</b>, sans Aucun des droits d'exploitation sur ceux-ci ne peut être compris comme transféré au-delà de ce qui est strictement nécessaire pour l'utilisation correcte du Web.
</p> <p> En bref, vous qui accédez à ce site, pouvez visualiser le contenu et faire, le cas échéant, des copies privées autorisées à condition que les éléments reproduits ne soient pas ultérieurement transférés à des tiers, ni installés sur des serveurs connectés aux réseaux, ni soumis à aucun type d'exploitation.
</p> <p> De même, toutes les marques, noms commerciaux ou signes distinctifs de toute nature apparaissant sur le site sont la propriété de <b>$name</b>, sans qu'il soit entendu que l'utilisation ou l'accès au lui-même leur attribue un droit.
</p> <p> La distribution, la modification, la cession ou la communication publique du contenu et tout autre acte qui n'a pas été expressément autorisé par le propriétaire des droits d'exploitation sont interdits.
</p> <p> L'établissement d'un hyperlien n'implique en aucun cas l'existence de relations entre <b>$name</b> et le propriétaire du site sur lequel il est établi, ni l'acceptation et l'approbation par de <b>$name</b> de ses contenus ou services. Ceux qui ont l'intention d'établir un lien hypertexte doivent préalablement demander une autorisation par écrit à <b>$name</b>. Dans tous les cas, le lien hypertexte permettra uniquement d'accéder à la page d'accueil ou à la page d'accueil de notre site Web, et doit également s'abstenir de faire des déclarations ou des indications fausses, inexactes ou incorrectes sur <b>$name</b>, ou inclure contenu illégal, contraire aux bonnes mœurs et à l'ordre public.
</p> <p> <b>$name</b> n'est pas responsable de l'utilisation que chaque utilisateur donne aux matériaux mis à disposition sur ce site Web ou des actions effectuées en fonction de ceux-ci.
</p>

<p>
<h3> 4. Exclusion de garanties et de responsabilité </h3>
<b>$name</b> exclut, dans la mesure où le système juridique le permet, toute responsabilité pour les dommages de toute nature résultant:
</p> <p> <ul>
<li> L'impossibilité d'accéder au site Web ou le manque de véracité, d'exactitude, d'exhaustivité et / ou d'actualité du contenu, ainsi que l'existence de vices et de défauts de toutes sortes du contenu transmis, diffusé, stocké, mis à disposition qui ont été consultés via le site Web ou les services proposés. </li>
<li> La présence de virus ou d'autres éléments dans le contenu pouvant entraîner des altérations des systèmes informatiques, des documents électroniques ou des données des utilisateurs. </li>
<li> Non-respect des lois, de la bonne foi, de l'ordre public, des usages du trafic et de la présente notice légale en raison d'une mauvaise utilisation du site Web. En particulier, et à titre d'exemple, <b>$name</b> n'est pas responsable des actions de tiers qui violent les droits de propriété intellectuelle et industrielle, les secrets d'affaires, les droits à l'honneur, à la vie privée personnelle et familiale et à la sienne image, ainsi que la réglementation sur la concurrence déloyale et la publicité illégale. </li>
</ul>
</p> <p> De même, <b>$name</b> décline toute responsabilité concernant les informations qui se trouvent en dehors de ce site et ne sont pas gérées directement par notre webmaster. La fonction des liens qui apparaissent sur ce site Web est exclusivement d'informer l'utilisateur de l'existence d'autres sources capables d'élargir le contenu proposé par ce site. <b>$name</b> ne garantit ni n'assume la responsabilité du fonctionnement ou de l'accessibilité des sites liés; il ne leur suggère pas, n'invite ni ne recommande une visite à eux, il ne sera donc pas responsable du résultat obtenu. <b>$name</b> n'est pas responsable de la mise en place d'hyperliens par des tiers.
</p>

<p>
<h3> 5. Procédure en cas d'activités illégales </h3>
Dans le cas où vous ou un tiers considérez qu'il existe des faits ou des circonstances qui révèlent la nature illégale de l'utilisation de tout contenu et / ou de l'exécution de toute activité sur les pages Web incluses ou accessibles via le site Web, vous devez contacter contactez <b>$name</b> en vous identifiant correctement, en précisant les infractions alléguées et en déclarant expressément et sous votre responsabilité que les informations fournies dans la notification sont exactes.
</p> <p> Pour toute question litigieuse concernant le site Web <b>$name</b>, la loi espagnole sera applicable, les cours et tribunaux les plus proches du siège de (Espagne) étant compétents.
</p>

<p>
<h3> 6. Publications </h3>
Les informations administratives fournies via le site Web ne remplacent pas la publicité légale des lois, règlements, plans, dispositions générales et actes qui doivent être officiellement publiés dans les journaux officiels des administrations publiques, qui constituent le seul instrument qui atteste son authenticité et son contenu. Les informations disponibles sur ce site Web doivent être comprises comme un guide sans objet de validité juridique.
</p>

";

$dicl['fr']['CookiesDescription']      = "

<p>
<h3> Informations générales sur les cookies </h3>
La confiance des utilisateurs est importante pour nous, et par conséquent <b>$name</b> est soucieux de protéger votre vie privée. Un aspect important de ceci est de vous fournir autant d'informations que possible sur la façon dont nous utilisons vos données personnelles, y compris la façon dont nous utilisons le stockage de données local et des technologies similaires.
</p> <p> Le stockage de données local consiste à stocker différents types de données localement sur votre appareil via votre navigateur Web. Les données stockées localement peuvent, par exemple, contenir des paramètres utilisateur, des informations sur la façon dont vous naviguez sur notre site Web, le navigateur Web que vous utilisez, les publicités affichées et un comportement similaire sur les sites Web avec lesquels nous collaborons. Les données stockées localement peuvent être utilisées pour personnaliser le contenu et les fonctions de nos services afin que vos visites soient plus confortables et plus sensées.
</p> <p> Les cookies constituent une méthode de stockage local des données. Les cookies sont de petits fichiers texte stockés sur votre appareil (PC, téléphone portable ou tablette) qui nous permettent de reconnaître votre navigateur Web. Les cookies contiennent des informations principalement sur votre navigateur Web et sur toute activité qui s'y est produite. Ils nous aident à garantir la sécurité et le fonctionnement optimal de notre site Web, une fois que vous quittez notre site Web, ils sont éliminés (cookies de sécurité et cookies de session) et ils collectent des informations sur les produits qui intéressent nos visites sur Internet et sur la manière dont naviguer sur notre site Web pour rendre nos offres en ligne plus attrayantes pour les utilisateurs (cookies de suivi).
</p>


<p>
<h3> Informations supplémentaires sur les cookies </h3>
Nous utilisons le stockage de données local à plusieurs fins, telles que: pour nous permettre d'exécuter nos services; vous fournir un contenu pertinent et personnalisé lorsque vous visitez nos sites Web; mesurer et analyser le trafic sur notre site Web; améliorer nos services; et la publicité ciblée directe. Voici plus de détails sur ces sujets:
<ul class = 'spacer'>
<li>
<b> Pour notre publicité </b>
Nous utilisons le stockage de données local dans le cadre d'activités publicitaires. Cela nous permet de savoir si et à quelle fréquence l'utilisateur a vu une annonce ou un certain type d'annonce, et depuis combien de temps il l'a vu.
Nous utilisons également le stockage de données local pour créer des groupes et des segments cibles à des fins de marketing et pour cibler des publicités spécifiques.
</li>
<li>
<b> Pour analyser et améliorer nos services </b>
Nous utilisons différents outils de mesure qui nous fournissent des statistiques et des analyses relatives à nos services. Ces outils nous permettent de reconnaître le navigateur Web au fil du temps et de savoir si l'utilisateur a déjà visité le site Web et, le cas échéant, à quelle fréquence. Ces outils nous offrent la possibilité d'avoir une vue d'ensemble du nombre d'utilisateurs uniques que nous avons et de la manière dont ils utilisent nos services.
Nous utilisons également les informations que nous avons collectées et analysées pour développer et améliorer nos services; par exemple, découvrir quels services génèrent beaucoup de trafic ou voir si un service fonctionne de manière optimale.
</li>
<li>
<b> Pour fournir et adapter les services à votre utilisation </b>
Le stockage de données local est nécessaire et nécessaire pour vous permettre d'utiliser nos services, tels que des informations sur vos paramètres, qui nous indiquent comment les services doivent être présentés dans votre navigateur Web.
Nous utilisons également le stockage de données local pour adapter au mieux nos services à votre utilisation.
</li>
</ul>
</p>


<p>
<h3> Gestion des cookies </h3>
Vous pouvez désactiver les cookies ou configurer votre navigateur pour vous avertir lorsqu'un cookie vous est envoyé.
</p> <p> Les paramètres de votre navigateur Web affichent normalement une liste de tous les cookies qui ont été stockés pour vous fournir une vue d'ensemble et, si vous le souhaitez, pour supprimer les cookies indésirables. Normalement, vous pouvez indiquer que vous acceptez le stockage de cookies provenant des sites Web que vous visitez ou de tiers affiliés à ces sites Web. Vous pouvez également choisir d'être averti chaque fois qu'un nouveau cookie est stocké. Des conseils sur la manière de procéder dans différents navigateurs Web sont fournis ci-dessous. Votre navigateur Web stocke normalement les cookies dans un dossier spécifique sur votre disque dur, afin que vous puissiez également examiner le contenu plus en détail.
</p> <p> Cependant, les cookies présents sur le site Web changent fréquemment, et tous les cookies ne sont pas également importants. Par conséquent, si <b>$name</b> change l'utilisation des cookies de suivi, vous serez averti par un message.
</p> <p> Il existe également des services disponibles qui ont été spécialement développés pour fournir aux utilisateurs une liste à jour de cookies et d'autres mécanismes de suivi.
</p> <p> Veuillez noter que si vous les désactivez, vous ne pourrez peut-être pas profiter de toutes les fonctionnalités de notre site Web
</p> <p> Voici un aperçu de la façon dont les données stockées localement peuvent être gérées dans différents navigateurs Web. Veuillez noter que ce processus peut changer et que les descriptions données ici peuvent ne pas être à jour.
</p>


<p>
<h3> Gestion des cookies dans Google Chrome </h3>

<h5> Comment supprimer les cookies: </h5>
<ul>
<li> Accédez aux paramètres dans le menu de votre navigateur. </li>
<li> Cliquez sur Afficher les paramètres avancés. </li>
<li> Cliquez sur Effacer les données de navigation. </li>
<li> Sélectionnez la période pendant laquelle vous souhaitez supprimer les informations dans le menu en haut. Si vous souhaitez supprimer tous les cookies de votre navigateur, cliquez sur Depuis le début. </li>
<li> Marquer les cookies et autres données des sites et plugins. </li>
<li> Cliquez sur Effacer les données de navigation. </li>
<li> Fermez la fenêtre. </li>
</ul>

<h5> Comment empêcher l'enregistrement des cookies dans le navigateur Web: </h5>
<ul>
<li> Accédez aux paramètres dans le menu de votre navigateur. </li>
<li> Cliquez sur Afficher les paramètres avancés, puis sur Paramètres de contenu. </li>
<li> Dans Cookies, sélectionnez votre option préférée. Si vous souhaitez empêcher le stockage de tous les cookies, cliquez sur Ne pas autoriser l'enregistrement des données des sites. </li>
<li> Cliquez sur Terminé. </li>
<li> Fermez la fenêtre. </li>
</ul>
</p>

<p>
<h3> Gestion des cookies dans Safari </h3>

<h5> Comment supprimer les cookies: </h5>
<ul>
<li> Accédez à Préférences dans le menu de votre navigateur. </li>
<li> Cliquez sur l'onglet Confidentialité. </li>
<li> Cliquez sur Supprimer toutes les données du site Web, puis sur Supprimer pour supprimer tous les cookies. </li>
<li> Fermez la fenêtre. </li>
</ul>

<h5> Comment empêcher l'enregistrement de cookies dans votre navigateur Web: </h5>
<ul>
<li> Accédez aux préférences dans le menu de votre navigateur </li>
<li> Cliquez sur l'onglet Confidentialité. </li>
<li> Dans les cookies et les données du site Web, sélectionnez votre option préférée. Si vous souhaitez empêcher le stockage de tous les cookies, cliquez sur Toujours bloquer. </li>
<li> Fermez la fenêtre. </li>
</ul>
</p>

<p>
<h3> Gestion des cookies dans Mozilla Firefox </h3>

<h5> Comment supprimer les cookies: </h5>
<ul>
<li> Accédez aux Options dans le menu de votre navigateur. </li>
<li> Cliquez sur l'onglet Confidentialité. </li>
<li> Cliquez sur Afficher les cookies. </li>
<li> Sélectionnez les cookies que vous souhaitez supprimer et cliquez sur Supprimer la sélection. Cliquez sur Tout supprimer si vous souhaitez supprimer tous les cookies de votre navigateur Web. </li>
<li> Fermez la fenêtre. Toutes les modifications que vous avez apportées seront enregistrées automatiquement. </li>
</ul>

<h5> Comment empêcher l'enregistrement de cookies dans votre navigateur Web: </h5>
<ul>
<li> Accédez aux paramètres dans le menu de votre navigateur. </li>
<li> Sélectionnez l'onglet Confidentialité. </li>
<li> Sous Historique, cliquez sur Utiliser les paramètres personnalisés pour l'historique. </li>
<li> Sélectionnez vos options préférées dans Autoriser les cookies du site Web. Si vous souhaitez empêcher le stockage de tous les cookies, décochez la case Accepter les cookies des sites Web. </li>
<li> Fermez la fenêtre. Toutes les modifications que vous avez apportées seront enregistrées automatiquement. </li>
</ul>
</p>

<p>
<h3> Gestion des cookies dans Internet Explorer </h3>

<h5> Comment supprimer les cookies: </h5>
<ul>
<li> Accédez à Outils (icône d'engrenage) dans le menu de votre navigateur. </li>
<li> Cliquez sur Propriétés Internet. </li>
<li> Dans l'onglet Général - Historique de navigation, cliquez sur Supprimer. </li>
<li> Assurez-vous de cocher l'option Cookies et données de site Web. </li>
<li> Cliquez sur Supprimer. </li>
<li> Cliquez sur OK. </li>
</ul>

<h5> Comment empêcher l'enregistrement de cookies dans votre navigateur Web: </h5>
<ul>
<li> Accédez à Outils (icône d'engrenage) dans le menu de votre navigateur. </li>
<li> Cliquez sur Options Internet, puis sur l'onglet Confidentialité. </li>
<li> Déplacez le curseur au niveau souhaité. Si vous souhaitez empêcher le stockage de tous les cookies, sélectionnez le niveau Bloquer tous les cookies. </li>
<li> Cliquez sur OK. </li>
</ul>
</p>

<p>
<h3> Gestion des cookies dans Opera </h3>

<h5> Comment supprimer les cookies: </h5>
<ul>
<li> Accédez aux paramètres dans le menu de votre navigateur. </li>
<li> Sélectionnez l'onglet Confidentialité et sécurité. </li>
<li> Cliquez sur Cookies, puis sur Tous les cookies et données du site Web. </li>
<li> Sélectionnez les cookies que vous souhaitez supprimer et cliquez sur Supprimer. Cliquez sur Tout supprimer si vous souhaitez supprimer tous les cookies de votre navigateur Web. </li>
<li> Cliquez sur Terminé. </li>
<li> Fermez la fenêtre. </li>
</ul>

<h5> Comment empêcher l'enregistrement de cookies dans votre navigateur Web: </h5>
<ul>
<li> Accédez aux paramètres dans le menu de votre navigateur. </li>
<li> Sélectionnez l'onglet Confidentialité et sécurité. Dans Cookies, sélectionnez votre option préférée. Si vous souhaitez empêcher le stockage de tous les cookies, cliquez sur Ne pas autoriser l'enregistrement des données des sites. </li>
<li> Fermez la fenêtre. </li>
</ul>
</p>

<p>
<h3> Coordonnées </h3>


Pour plus de transparence, si vous avez des questions concernant l'utilisation du stockage local sur notre site Web, veuillez nous contacter à <span class='mailcoded'>$mail</span>, en indiquant dans le sujet «Politique de cookies»
</p>

";


$dicl['fr']['PrivacityDescription']      = "

<p>

<h3> 1. Données relatives au responsable </h3>

<b> Responsable du traitement </b>
<ul class='mailcoded'>
<li> Entité: $name </li>
<li> CIF de l'entité: $nif </li>
<li> Adresse de l'entité: $address </li>
<li> Adresse e-mail de l'entité: <span style='text-transform:uppercase'>$mail</span> </li>
<li> Responsable du traitement: <span style='text-transform:uppercase'> $treatmentResponsible </span> </li>
<li> Téléphone de la personne en charge du traitement: <span style='text-transform:uppercase'> $treatmentResponsiblePhone </span> </li>
<li> Adresse e-mail du contrôleur de données: <span style='text-transform:uppercase'> $treatmentResponsibleMail </span> </li>
</ul>
</p>

<p>

<h3> 2. Finalités </h3>

Conformément aux dispositions du règlement européen 2016/679 sur la protection des données générales et de la loi organique 3/2018 sur la protection des données personnelles et la garantie des droits numériques, nous vous informons que, en fonction de la relation que vous entretenez avec nous, en <b>$name</b> nous traitons les données que vous nous fournissez pour tout ou partie des finalités suivantes:

<ul>
<li> Achat / vente de biens et services. </li>
<li> Achat / vente de matériel </li>
<li> Coordination des activités commerciales </li>
<li> Création de contrats, préparation de la paie et autres tâches connexes </li>
<li> Formation </li>
<li> Gestion comptable, administrative, de facturation et de recouvrement </li>
<li> Gestion comptable, administrative, de facturation, de recouvrement et de paiement </li>
<li> Maintien de la relation de travail et rémunération du travail effectué </li>
<li> Fournir un service </li>
<li> Paiement via PDV </li>
<li> Effectuer un processus de sélection du personnel en fonction des capacités, aptitudes et autres informations d'intérêt incluses dans le programme </li>
<li> Réception de la fourniture d'un service </li>
<li> Sécurité de l'entité. </li>
<li> Traitement des inscriptions et des congés en raison d'une maladie courante ou d'un accident du travail </li>
<li> Traitement des budgets </li>
</ul>
</p>

<p>
<h3> 3. Durée de conservation des données </h3>

Vos données seront conservées pendant toute la durée de la relation contractuelle, commerciale ou autre avec notre entité, demander sa suppression, ainsi que le temps nécessaire pour se conformer aux obligations légales.
</p>

<p>

<h3> 4. Légitimation </h3>

La base juridique du traitement de vos données repose sur:
<ul>
<li> Consentement sans ambiguïté </li>
<li> Exécution d'un contrat </li>
<li> Intérêt légitime de la part du responsable du traitement </li>
</ul>
<p>

<h3> 5. Destinataires </h3>


Vos données personnelles seront communiquées à des tiers dans les cas suivants:
<ul>
<li> Aux autres responsables du traitement </li>
<li> Administration fiscale </li>
<li> Banques et entités financières </li>
<li> Forces et organes de sécurité de l'État </li>
<li> Entités de conseil / d'audit </li>
<li> Gestion / Conseil </li>
<li> Sécurité sociale </li>
<li> Service de prévention des risques professionnels </li>
</ul>
</p>

<p>

<h3> 6. Droits </h3>

Vous avez le droit d'obtenir la confirmation que <b>$name</b> traite ou non des données personnelles vous concernant.
</p> <p> De même, vous avez le droit d'accéder à vos données personnelles, ainsi que de demander la rectification de données inexactes ou, le cas échéant, de demander leur suppression lorsque, entre autres raisons, les données ne sont plus nécessaires pour les fins qui ont été recueillies.
</p> <p> Dans certaines circonstances, vous pouvez demander la limitation du traitement de vos données, auquel cas nous ne les conserverons que pour l'exercice ou la défense de réclamations.
</p> <p> De plus, dans certaines circonstances et pour des raisons liées à votre situation particulière, vous pouvez exercer le droit de vous opposer au traitement de vos données. <b>$name</b> cessera de traiter les données, sauf pour des raisons légitimes impérieuses, ou pour l'exercice ou la défense d'éventuelles réclamations.
</p> <p> De même, vous pouvez exercer le droit à la portabilité des données, ainsi que retirer les consentements fournis à tout moment, sans affecter la légalité du traitement basé sur le consentement avant son retrait.
</p> <p> Si vous souhaitez faire usage de l'un de vos droits, vous pouvez le faire via le lien de contact que vous trouverez ci-dessous:

<ul>
<li> Pour exercer votre droit d'accès, cliquez <a href='$contactURL'> ici </a> </li>
<li> Pour exercer votre droit de rectification, cliquez <a href='$contactURL'> ici </a> </li>
<li> Pour exercer votre droit de suppression (oubli), cliquez <a href='$contactURL'> ici </a> </li>
<li> Pour exercer votre droit de limiter le traitement, cliquez <a href='$contactURL'> ici </a> </li>
<li> Pour exercer votre droit d'opposition, cliquez <a href='$contactURL'> ici </a> </li>
<li> Pour exercer votre droit à la portabilité, cliquez <a href='$contactURL'> ici </a> </li>
</ul>
</p> <p> Alternativement, vous pouvez également nous contacter par courrier postal à l'adresse suivante: $address joint une photocopie du DNI, afin de garantir votre identité. N'oubliez pas de fournir le plus d'informations possible sur votre demande: Nom et prénom, adresse e-mail utilisée pour le compte ou objet portail de votre demande.
</p> <p> Enfin, nous vous informons que vous pouvez contacter l'Agence espagnole de protection des données et d'autres organismes publics compétents pour toute réclamation découlant du traitement de vos données personnelles.
</p>

<p>

<h3> 7. Politique de cookies </h3>

Pour connaître les cookies que nous utilisons sur notre page, n'oubliez pas que vous pouvez accéder à notre politique de cookies via le lien suivant <a href=".construct_url($cookiesURL,$_Lang)."> politique de cookies </a>.

</p>
";

$dicl['fr']['AccessibilityDescription'] = "

<h3>DÉCLARATION D'ACCESSIBILITÉ</h3>

<strong>$_Accessibility_SL</strong> s'est engagé à rendre son site web accessible, conformément au <a href='https://www.boe.es/buscar/act.php?id=BOE-A-2018-12699' target='_blank'>Décret Royal 1112/2018, du 7 septembre</a>, 
sur l'accessibilité des sites web et des applications mobiles du secteur public. <br><br>
La présente déclaration d'accessibilité s'applique au site web <strong>$_Accessibility_Web</strong> <br>

<h3>État de conformité</h3>

Ce site web est <strong>partiellement conforme</strong> au Décret Royal 1112/2018, du 7 septembre, en raison de la non-conformité des aspects indiqués ci-dessous.

<h3>Contenu non accessible</h3>

Le contenu ci-dessous n'est pas accessible pour les raisons suivantes : <br><br>

<ul>
<li><strong>Non-conformité avec le Décret Royal 1112/2018, du 7 septembre</strong> : il peut y avoir des erreurs ponctuelles de mise en page sur certaines pages web, tant dans les contenus HTML que dans les documents finaux, publiés après le 20 septembre 2018 (date d'entrée en vigueur du Décret Royal 1112/2018, du 7 septembre). Il peut y avoir des erreurs dans les documents contenant des graphiques, des tableaux complexes ou du contenu publié via des outils autogérés. De même, il peut y avoir des erreurs dans le contrôle des animations HTML.</li>
<li><strong>Charge disproportionnée</strong> : non applicable.</li>
<li>Le contenu <strong>ne relève pas du champ d'application</strong> de la législation applicable : non applicable.</li>
</ul>

<h3>Préparation de la présente déclaration d'accessibilité</h3>

La présente déclaration a été préparée le <strong>$_Accessibility_Date_Preparation</strong>. <br><br>

La méthode utilisée pour préparer la déclaration a été une auto-évaluation réalisée par l'entreprise prestataire de <strong>$_Accessibility_Web</strong>.

Dernière révision de la déclaration : <strong>$_Accessibility_Date_Last_Revision</strong>.

<h3>Observations et coordonnées</h3>

Vous pouvez faire des <strong>communications</strong> sur les exigences d'accessibilité (article 10.2.a) du Décret Royal 1112/2018, du 7 septembre) comme, par exemple : <br><br>

<ul>
<li>Informer de tout <strong>non-respect</strong> éventuel par ce site web.</li>
<li>Faire part d'autres <strong>difficultés d'accès</strong> au contenu.</li>
<li>Formuler toute autre <strong>demande ou suggestion d'amélioration</strong> relative à l'accessibilité du site web.</li>
</ul>

<br> 
Par les moyens suivants : <br><br>

<ul>
<li>Courriel : <strong><span class='mailcoded'>$_Accessibility_mail_accesibility</span></strong>.</li>
<li>Téléphone : <strong>$_Accessibility_phone_accesibility</strong>.</li>
</ul>

<br>
Vous pouvez déposer :
<br><br>
<ul>
<li>Une <strong>Plainte</strong> relative au respect des exigences du Décret Royal 1112/2018 ou</li>
<li>Une <strong>Demande d'information accessible</strong> relative à :</li>
<li><strong>contenus</strong> qui sont <strong>exclus</strong> du <strong>champ d'application</strong> du Décret Royal 1112/2018 selon l'article 3, paragraphe 4</li>
<li>ou contenus qui sont <strong>exemptés</strong> de <strong>respecter</strong> les exigences d'accessibilité en raison d'une <strong>charge disproportionnée.</strong></li>
</ul>
<br>

Dans la demande d'information accessible, il doit être clairement précisé les faits, raisons et requêtes permettant de vérifier qu'il s'agit d'une demande raisonnable et légitime. <br><br>
Les communications, plaintes et demandes d'information accessible seront reçues et traitées par <strong>$_Accessibility_SL</strong>.

<h3>Procédure d'application</h3>

Si une <strong>demande d'information accessible ou plainte</strong> a été <strong>rejetée</strong>, si la décision prise n'est <strong>pas satisfaisante</strong>, ou si la <strong>réponse ne respecte pas les exigences</strong> prévues à l'article 12.5, la personne intéressée peut déposer une réclamation. Une réclamation peut également être déposée si le délai de vingt jours ouvrables s'est écoulé sans réponse. <br><br>
La réclamation peut être présentée via l'Instance Générique du Siège électronique du Ministère <strong>$_Accessibility_ministerio</strong>, ainsi que par les autres moyens prévus dans la Loi 39/2015, du 1er octobre, sur la Procédure Administrative Commune des Administrations Publiques. <br><br>
Les réclamations seront reçues et traitées par <strong>$_Accessibility_ministerio</strong>. 

<h3>Contenu optionnel</h3>

La version actuellement visible de ce site web date de <strong>$_Accessibility_Date_Alta_Web</strong> et à cette date, le niveau d'accessibilité en vigueur a été vérifié. <br><br>
Depuis cette date, des révisions partielles quotidiennes du nouveau contenu web ou du contenu modifié sont effectuées, tant pour les modèles que pour les pages et documents finaux publiés, afin d'assurer la conformité aux exigences d'accessibilité de la Norme UNE-EN 301549:2019, en tenant compte des exceptions du Décret Royal 1112/2018, du 7 septembre. <br><br>
Parmi les mesures adoptées pour faciliter l'accessibilité, on peut citer : <br><br>
<ul>
<li>Utilisation de texte alternatif pour les images</li>
<li>Séparer le contenu de la présentation en utilisant des feuilles de style (CSS).</li>
<li>Structurer et étiqueter correctement le contenu des pages.</li>
<li>Réaliser une mise en page à l'aide de CSS avec un design liquide pour s'adapter à toutes les résolutions d'écran.</li>
<li>Utiliser un texte significatif dans les liens.</li>
<li>Éviter les combinaisons de couleurs à faible contraste, éviter de transmettre des informations uniquement par la couleur.</li>
<li>Éviter l'utilisation de JavaScript autant que possible.</li>
<li>Éviter l'utilisation de cadres (frames).</li>
<li>Utilisation des standards du W3C : HTML5, CSS 3.0, WAI AA.</li>
</ul>

";

$__l = $dicl[$_Lang];

unset ($dic);