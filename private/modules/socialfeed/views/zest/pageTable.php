<ul id="pages">
	<?php
	$previous_level = -1;
	$prev_id = 0;
	foreach ($pages as $tmp):
	
		$page = $tmp[0];
		$level = $tmp[1];
		$title = $page->title;
		$status = $page->status->title;
		$id = $page->id;
		
		$spacer = "";
		for ($i=0;$i < $level; $i++)
			$spacer .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		
		
		if ($level < $previous_level) {
			for($i = 0;$i<$previous_level-$level; $i++)
				echo "</ul></li>";
		}
		
		if ($level > $previous_level && $previous_level != -1)
			echo '<ul class="pages hide" id="pages'.$prev_id.'">';
	
		$status = $page->status_id;
		$x = "published";
		$y = "green";
		if ($status == 1) {
			$x = "unpublished";
			$y = "red";
		}
		if ($level == 0) {
					
			echo "<li class='page $x' id='page".$id."'><div class='sort-handle' onclick='$(\"#pages".$id."\").toggle()'><div class='right'>".$page->status->render($page)."&nbsp;&nbsp;&nbsp;&nbsp;".html::anchor('admin/pages/edit/'.$id,html::image('zest/images/icon_pencil.png'))."&nbsp;&nbsp;&nbsp;&nbsp;".html::anchor('admin/delete/page/'.$id,html::image('zest/images/delete.png'),array('class'=> 'ajax-button','rel'=>'delete'))."</div><span>".$title."</span></div>";
		}
		else {
			echo "<li class='sub-page $x'><div class='sort-handles' onclick='$(\"#pages".$id."\").toggle()'><div class='right'>".$page->status->render($page)."&nbsp;&nbsp;&nbsp;&nbsp;".html::anchor('admin/pages/edit/'.$id,html::image('zest/images/icon_pencil.png'))."&nbsp;&nbsp;&nbsp;&nbsp;".html::anchor('admin/delete/page/'.$id,html::image('zest/images/delete.png'),array('class'=> 'ajax-button','rel'=>'delete'))."</div><span>".$title."</span></div>";	
		}
		echo "\n";
    
    	$previous_level = $level;
    	$prev_id = $id;
	endforeach
	?>
	</ul>
	</li>
</ul>
<p>&nbsp;</p>
<p>You can change the order by dragging and dropping. To change the tree structure you must edit the individual page.</p>


