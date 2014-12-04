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