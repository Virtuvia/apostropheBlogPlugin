<?php
  // Compatible with sf_escaping_strategy: true
  $a_event = isset($a_event) ? $sf_data->getRaw('a_event') : null;
?>
<ul class="a-ui a-event-date-range block">
	<?php if ($a_event->getStartDate() != $a_event->getEndDate()): ?>
		<li class="start_date">
			<span>Start</span>
			<?php echo false !== strtotime($a_event->getStartDate()) ? format_date($a_event->getStartDate(), "f") : '&nbsp;' ?>
		</li>
		<li class="end_date">
			<span>End</span>
			<?php echo false !== strtotime($a_event->getEndDate()) ? format_date($a_event->getEndDate(), "f") : '&nbsp;' ?>
		</li>
	<?php else: ?>
		<li class="start_date">
			<?php echo false !== strtotime($a_event->getStartDate()) ? format_date($a_event->getStartDate(), "f") : '&nbsp;' ?>
		</li>			
	<?php endif ?>
</ul>