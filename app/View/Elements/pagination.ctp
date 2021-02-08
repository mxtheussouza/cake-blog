<div class="bottompagination">
	<span class="navigation">
		<ul>
			<?php
				if ($this->Paginator->hasPrev()) {
					echo $this->Paginator->prev('<i class="fa fa-angle-double-left"></i>', ['tag' => 'li', 'escape' => false], '<a href="#"></a>', ['class' => 'prev disabled', 'tag' => 'li', 'escape' => false]);
				}

				echo $this->Paginator->numbers(['separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a']);

				if ($this->Paginator->hasNext()) {
					echo $this->Paginator->next('<i class="fa fa-angle-double-right"></i>', ['tag' => 'li', 'escape' => false], '<a href="#"></a>', ['class' => 'prev disabled', 'tag' => 'li', 'escape' => false]);
				}
			?>
		</ul>
	</span>
</div>
