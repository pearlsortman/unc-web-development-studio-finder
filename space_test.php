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
    <li>numberOfSeats = <?php print($t->getNumberOfSeats())?></li>
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
$t->setHasParking(1);
$t = Transaction::findByID(1);
?>
<p>
$t = Transaction::findByID(1);<br>
<blockquote>
	<?php renderTransaction($t); ?>
</blockquote>

<?php
$t->setDescription("David is the best ever.");
$t = Transaction::findByID(1);
?>
<p>
$t = Transaction::findByID(1);<br>
<blockquote>
	<?php renderTransaction($t); ?>
</blockquote>