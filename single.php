<?php include('header.php');?>
<main role="main" class="container">
<?php
$csv = array_map('str_getcsv', file('https://raw.githubusercontent.com/macarenapardo/csvtop10/master/top10.csv'));
      array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
      });
      array_shift($csv);

$aqui = $_GET['url'];

?>
<h1 class="mb-2"><?php print ($csv[$aqui]['name'])?></h1>
<img src="
	<?php if ($csv[$aqui]['image'] == NULL){
		print ("img/gris.png");
	} else {
		print ($csv[$aqui]['image']);
	};?>"

class="img-fluid">
<h3><?php print ($csv[$aqui]['date'])?></h3>
<p><?php print ($csv[$aqui]['description'])?></p>
</main>
<?php include('footer.php');?>