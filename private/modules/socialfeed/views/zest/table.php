
<table class="full-width" cellpadding="0" cellspacing="0">
	<tr>
		<?php
		foreach ($columns as $title => $width):
			echo "<th width='$width'>$title</th>";
		endforeach
		?>
		<!-- 
		<th width="50" class="align-center">Modify</th>
		-->
	</tr>
	<?php
	foreach ($rows as $row):
		

	?>
	<tr>
		<?php
		foreach ($row as $entry):
		?>
		<td>
			<?php echo $entry ?>
		</td>
		
		<?php
		endforeach
		?>
	</tr>
	<?php	
	endforeach
	?>
	</tr>
</table>

