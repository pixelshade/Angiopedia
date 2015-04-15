<h1>Tagovací Quiz</h1>
<!--<h3><a href="./tag/">Tagovanie</a></h3>-->
<p>Vyber si časť, ktorú si chceš skúsiť otagovať :)</p>
<?php

foreach ($veins as $vein) {
	echo '<a href="/quiz/tag/'.$vein->slug.'">'.$vein->name.'</a><br>';
}


?>