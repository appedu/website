
<div id="page-container" class="row">

	<div class="questions index">
		<div class='.col-md-12'>
			<div class="btn-group pull-right">
				<?php echo $this->Html->link(__(' '), array('action' => 'add'), array('class' => 'btn btn-primary icon-plus')); ?>			</div>
			<h2><?php echo __('Questions'); ?></h2>
		</div>
		
		<div class="table-responsive">
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
				<thead>
					<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('title'); ?></th>
					<th><?php echo $this->Paginator->sort('description'); ?></th>
					<th><?php echo $this->Paginator->sort('isAnonymous'); ?></th>
					<th><?php echo $this->Paginator->sort('isPublic'); ?></th>
					<th><?php echo $this->Paginator->sort('score'); ?></th>
					<th><?php echo $this->Paginator->sort('user_id'); ?></th>
					<th><?php echo $this->Paginator->sort('topic_id'); ?></th>
					<th><?php echo $this->Paginator->sort('source_type_id'); ?></th>
					<th><?php echo $this->Paginator->sort('school_id'); ?></th>
					<th><?php echo $this->Paginator->sort('created'); ?></th>
					<th><?php echo $this->Paginator->sort('modified'); ?></th>
					<th><?php echo $this->Paginator->sort('slug'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($questions as $question): ?>
	<tr>
		<td><?php echo h($question['Question']['id']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['title']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['description']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['isAnonymous']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['isPublic']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['score']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($question['User']['username'], array('controller' => 'users', 'action' => 'view', $question['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($question['Topic']['abbr'], array('controller' => 'topics', 'action' => 'view', $question['Topic']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($question['SourceType']['name'], array('controller' => 'source_types', 'action' => 'view', $question['SourceType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($question['School']['name'], array('controller' => 'schools', 'action' => 'view', $question['School']['id'])); ?>
		</td>
		<td><?php echo h($question['Question']['created']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['modified']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['slug']); ?>&nbsp;</td>
		<td class="actions">
<div class='btn-group'>			<?php echo $this->Html->link(__(''), array('action' => 'view', $question['Question']['id']), array('class' => 'btn btn-success icon-eye-open')); ?>
			<?php echo $this->Html->link(__(''), array('action' => 'edit', $question['Question']['id']), array('class' => 'btn btn-warning icon-edit')); ?>
			<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $question['Question']['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?>
</div>		</td>
	</tr>
<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->
		
		<p><small>
			<?php
				echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
			?>
		</small></p>

		<ul class="pagination">
			<?php
					echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
					echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
		</ul><!-- /.pagination -->
		
	</div><!-- /.index -->
	
</div><!-- /#page-container .row-fluid -->
