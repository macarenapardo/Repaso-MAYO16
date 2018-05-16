<?php include('header.php');?>

<?php
$csv = array_map('str_getcsv', file('https://raw.githubusercontent.com/macarenapardo/csvtop10/master/top10.csv'));
      array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
      });
      array_shift($csv);
?>

<main role="main" class="container">
<h1 class="mb-4">MY TOP 10 MOVIES (ON NETFLIX)</h1>
<div class="row">

<div class="col-12">
    <p class="lead-3"><b>Macarena Pardo.</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in lorem sed risus bibendum efficitur. Etiam cursus magna rhoncus nisi semper, eu porttitor felis pharetra. Duis eu accumsan nunc, eu tristique sapien. Mauris a odio et ipsum ornare viverra. Donec non commodo lectus. Nunc consequat lacinia feugiat. Etiam sodales laoreet arcu et iaculis. Suspendisse pulvinar egestas risus, non suscipit est vehicula eu. Nullam blandit lorem quis felis auctor sodales. Aliquam dapibus nulla sit amet purus fermentum rhoncus at nec diam. Donec dapibus vitae nulla sed congue.</p>
</div>

<?php for($t = 0; $t < count($csv); $t++){?>
    <div class="col-sm-4 col-md-3 py-3">
    <h3 class="border-top pt-3"><?php print($csv[$t]['date'])?></h3>
    <a href="single.php?url=<?php print $t?>">    
    <figure style="height:120px; overflow:hidden;">
    <img src="
    <?php if ($csv[$t]['image'] == NULL){
        print ("img/gris.png");
    } else {
        print ($csv[$t]['image']);
    };?>" 

    class="img-fluid">
    </figure>

    <?php if ($csv[$t]['name'] == NULL){
        print '<h5><a href="'.($csv[$t]['link']).'">'.($csv[$t]['location']).'</a></h5>';
    } else {
        print '<h5><a href="'.($csv[$t]['link']).'">'.($csv[$t]['name']).'</a></h5>';
    }?>

    <p class="border-top pt-3"><?php print($csv[$t]['description'])?></p>
    <b><p class="border-top pt-3"><?php print($csv[$t]['length'])?></p></b>

    </div>
<?php };?>
</div>

</main>
<?php include('footer.php');?>