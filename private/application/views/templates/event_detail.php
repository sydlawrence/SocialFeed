<?php if (isset($header)) echo $header; ?>

<p><a href="/events">Back</a></p>

<h1><?=$event->title?></h1>
<h2><?=$event->get_date('dS M Y')?></h2>


<?= zest::render_image($event->media, array('width'=>100,'height'=>100)) ?>

<?=$event->description?>





<p>Venue: <?=$event->venue?></p>


<h2>Attendees (<?=count($attendees)?>)</h2>
<?php
foreach ($attendees as $person) {
	echo '<li>'.$person->get_full_name().'</li>';
}
?>

<?php
foreach ($event->medias as $m) {
	echo zest::render_image($m, array('width'=>50,'height'=>50,'thickbox'=>true));
}

?>


<?php if (isset($footer)) echo $footer; ?>
