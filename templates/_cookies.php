<?php

$_cookies_name = "Rehabilitaciones Evan SL";
$_cookies_link = "cookies";

$_Cookies_text["ca"]   = "$_cookies_name utilitza “COOKIES” per a poder oferir-te correctament totes les funcionalitats de aquesta pàgina web; elaborar estadístiques que permetin analitzar l'ús i funcionament del servei i per al compliment de les nostres obligacions legals. Pot acceptar que utilitzem totes les cookies prement el botó “Totes”, pot acceptar que utilitzem només les cookies essencials prement el botó “Essencials” o pot rebutjar-les prement a “Rebutjar”. Rebutjar-les no implica l'ús de les cookies imprescindibles per al funcionament de la web. Pot obtenir més informació a la nostra <a href='" . construct_url($_cookies_link, $_Lang) . "'>política de cookies</a> a peu de pàgina.";
$_Cookies_text["es"]   = "$_cookies_name utiliza “COOKIES” para poder ofrecerte correctamente todas las funcionalidades de esta página web; elaborar estadísticas que permitan analizar el uso y funcionamiento del servicio y para el cumplimiento de nuestras obligaciones legales. Puede aceptar que utilicemos todas las cookies pulsando el botón “Todas”, puede aceptar que utilicemos solo las cookies esenciales pulsando el botón “Esenciales” o puede rechazarlas pulsando en “Rechazar”. Rechazarlas no implica el uso de las cookies imprescindibles para el funcionamiento de la web. Puede obtener más información en nuestra <a href='" . construct_url($_cookies_link, $_Lang) . "'>política de cookies</a> a pie de página.";
$_Cookies_text["en"]   = "$_cookies_name uses “COOKIES” to be able to correctly offer you all the functionalities of this website; prepare statistics that allow analysing the use and operation of the service to comply with our legal obligations. You can accept that we use all cookies by clicking the “All” button, you can accept that we use only essential cookies by clicking the “Essential” button or you can reject them by clicking on “Reject”. Rejecting them does not imply the use of cookies that are essential for the functioning of the website. You can get more information in our <a href='" . construct_url($_cookies_link, $_Lang) . "'>cookie policy</a> at the bottom of the page.";
$_Cookies_text["fr"]   = "$_cookies_name utilise des “COOKIES” pour pouvoir vous proposer correctement toutes les fonctionnalités de ce site Internet; préparer des statistiques qui permettent d'analyser l'utilisation et le fonctionnement du service pour respecter nos obligations légales. Vous pouvez accepter que nous utilisions tous les cookies en cliquant sur le bouton “Tous”, vous pouvez accepter que nous utilisions uniquement les cookies essentiels en cliquant sur le bouton “Essentiel” ou vous pouvez les refuser en cliquant sur “Rejeter”. Leur refus n'implique pas l'utilisation de cookies indispensables au fonctionnement du site. Vous pouvez obtenir plus d'informations dans notre <a href='" . construct_url($_cookies_link, $_Lang) . "'>politique de cookies</a> au bas de la page.";

$_Cookies_button1["ca"] = "Totes";
$_Cookies_button1["es"] = "Todas";
$_Cookies_button1["en"] = "All";
$_Cookies_button1["fr"] = "toutes";

$_Cookies_button3["ca"] = "Rebutjar";
$_Cookies_button3["es"] = "Rechazar";
$_Cookies_button3["en"] = "Decline";
$_Cookies_button3["fr"] = "Déclin";

$_Cookies_button2["ca"] = "Essencials";
$_Cookies_button2["es"] = "Esenciales";
$_Cookies_button2["en"] = "Essential";
$_Cookies_button2["fr"] = "Essentiel";

?>


<?php

$ShowAnalytics = true;

/* Han aceptado todas las cookies. Ponemos las Cookies de analytics */
if (isset($_COOKIE["cookie_ok"]) || isset($_COOKIE["cookie_essentials"])) $ShowAnalytics = true;

/* Primera vez : sin aceptar nada */
if (!isset($_COOKIE["cookie_ok"]) && !isset($_COOKIE["cookie_nok"]) && !isset($_COOKIE["cookie_essentials"])) $ShowAnalytics = true;

?>

<?php if ($ShowAnalytics && $_cookies_is_header) { ?>

<?php } ?>


<?php
if (!isset($_COOKIE["cookie_ok"]) && !isset($_COOKIE["cookie_nok"]) && !isset($_COOKIE["cookie_essentials"]) && !$_cookies_is_header) {
?>
	<script>
		/* aquí guardamos la variable de que se ha aceptado el uso de cookies así no mostraremos el mensaje de nuevo */
		function guardarCookies(cookieType) {
			cajacookies.style.display = 'none';
			document.cookie = cookieType + "=yes; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/;domain=<?= HostURL() ?>";
		}
	</script>

	<div id="cajacookies">
		<p>
			<?= $_Cookies_text[$_Lang] ?>
		</p>
		<div class="cookies_buttons">
			<button onclick="guardarCookies('cookie_ok')" class="pull-right" id="button3"><?= $_Cookies_button1[$_Lang] ?></button>
			<button onclick="guardarCookies('cookie_essentials')" class="pull-right" id="button2"><?= $_Cookies_button2[$_Lang] ?></button>
			<button onclick="guardarCookies('cookie_nok')" class="pull-right" id="button1"><?= $_Cookies_button3[$_Lang] ?></button>
		</div>
	</div>

<?php } ?>