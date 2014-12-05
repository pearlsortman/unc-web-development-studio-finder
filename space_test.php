<?php
require_once('space.php');

function renderSpace($t) {
    if (is_null($t)) {
        print("No such space.");
  } else {

?>
<ul>
    <li>spaceID =       <?php print($t->getSpaceID())?></li>
    <li>name =          <?php print($t->getName())?></li>
    <li>type =          <?php print($t->getType())?></li>
    <li>street =        <?php print($t->getStreet())?></li>
    <li>city =          <?php print($t->getCity())?></li>
    <li>state =         <?php print($t->getState())?></li>
    <li>zip =           <?php print($t->getZip())?></li>
    <li>logo =          <?php print($t->getLogo())?></li>
    <li>description =   <?php print($t->getDescription())?></li>
    <li>website =       <?php print($t->getWebsite())?></li>
    <li>numberSeats =   <?php print($t->getNumberSeats())?></li>
    <li>hasWifi =       <?php print($t->getHasWifi())?></li>
    <li>hasParking =    <?php print($t->getHasParking())?></li>
    <li>hasDesk =       <?php print($t->getHasDesk())?></li>
    <li>hasBreakroom =  <?php print($t->getHasBreakroom())?></li>
    <li>hasPrinting =   <?php print($t->getHasPrinting())?></li>
    <li>hasStorage =    <?php print($t->getHasStorage())?></li>
</ul>
<?php
    }
}
?>
<h1>SPACE TEST</h1>
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
    $s->setZip(22222);
    echo "TYPE SET \n\n\n";
?>

<?php
    $s = Space::findByID(1);
    $s->setCity("Charlotte");
    echo "TYPE SET \n\n\n";
?>
<?php
    $s = Space::findByID(1);
    $s->setDescription("boo");
    echo "NAME SET \n\n\n";
?>

<?php
    $s = Space::findByID(1);
    $s->setStreet("kwon st 2");
    echo "ZIP SET \n\n\n";
?>

<?php
    // $s = Space::create("David's Space", "Cyberspace", "Hogwart Dr",
    //     "Charlotte", "NC", 24924, 0, "It's the best space there is!",
    //     "www.kwon.com", 13, 1, 1, 1, 1, 1, 0);
?>

<?php
    $s = Space::findByID(4);
    echo "FIND MINE \n\n\n";
    ?>
<p>
$s = Space::findByID(4);<br>
<blockquote>
    <?php renderSpace($s); ?>
</blockquote>