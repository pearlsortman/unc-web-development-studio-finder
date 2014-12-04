<?php
require_once('space.php');

function renderSpace($t) {
  if (is_null($t)) {
    print("No such space.");
  } else {
?>
<ul>
    <li>spaceID = <?php print($t->getSpaceID())?></li>
    <li>name = <?php print($t->getName())?></li>
    <li>type = <?php print($t->getType())?></li>
    <li>street = <?php print($t->getStreet())?></li>
    <li>city = <?php print($t->getCity())?></li>
    <li>state = <?php print($t->getState())?></li>
    <li>zip = <?php print($t->getZip())?></li>
    <li>description = <?php print($t->getDescription())?></li>
    <li>website = <?php print($t->getWebsite())?></li>
    <li>numberSeats = <?php print($t->getNumberSeats())?></li>
    <li>hasWifi = <?php print($t->getHasWifi())?></li>
    <li>hasParking = <?php print($t->getHasParking())?></li>
    <li>hasDesk = <?php print($t->getHasDesk())?></li>
    <li>hasBreakroom = <?php print($t->getHasBreakroom())?></li>
    <li>hasPrinting = <?php print($t->getHasPrinting())?></li>
    <li>hasStorage = <?php print($t->getHasStorage())?></li>
</ul>
<?php
      }
}

?>
<h1>Space Test</h1>

<h2>Retrieving by ID</h2>
<?php

$t = Space::findByID(1);
?>
<p>
$t = Space::findByID(1);
<blockquote>
	<?php renderSpace($t); ?>
</blockquote>

<?php
$s = Space::findByID(1);
$s->setHasParking(0);
echo "PARKING SET TO 0";
?>
<p>
$s = Space::findByID(1);<br>
<blockquote>
	<?php renderSpace($s); ?>
</blockquote>

<?php
$s = Space::findByID(1);
$s->setWifi(0);
echo "WIFI SET TO 0";
?>
<p>
$s = Space::findByID(1);<br>
<blockquote>
	<?php renderSpace($s); ?>
</blockquote>

<?php
$s = Space::findByID(1);
$s->setDescription("David's a genious!!!");
echo "DESCRIPTION UPDATED";
?>
<p>
$s = Space::findByID(1);<br>
<blockquote>
	<?php renderSpace($s); ?>
</blockquote>