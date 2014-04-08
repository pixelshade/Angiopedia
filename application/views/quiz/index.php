<h1>Quiz</h1>
<h3><a href="./tag/">Tagovanie</a></h3>
<?php

foreach ($veins as $vein) {
	echo '<a href="/quiz/tag/'.$vein->slug.'">'.$vein->name.'</a><br>';
}


?>