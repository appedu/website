
<div id="page-container" class="row">

	<div class="answers index">
		<div class='.col-md-12'>
			<div class="btn-group pull-right">
				<?php echo $this->Html->link(__(' '), array('action' => 'add'), array('class' => 'btn btn-primary icon-plus')); ?>			</div>
			<h2><?php echo __('Answers'); ?></h2>
		</div>
		
		<div class="table-responsive">
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
				<thead>
					<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('description'); ?></th>
					<th><?php echo $this->Paginator->sort('isAnonymous'); ?></th>
					<th><?php echo $this->Paginator->sort('score'); ?></th>
					<th><?php echo $this->Paginator->sort('user_id'); ?></th>
					<th><?php echo $this->Paginator->sort('question_id'); ?></th>
					<th><?php echo $this->Paginator->sort('created'); ?></th>
					<th><?php echo $this->Paginator->sort('modified'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($answers as $answer): ?>
	<tr>
		<td><?php echo h($answer['Answer']['id']); ?>&nbsp;</td>
		<td><?php echo h($answer['Answer']['description']); ?>&nbsp;</td>
		<td><?php echo h($answer['Answer']['isAnonymous']); ?>&nbsp;</td>
		<td><?php echo h($answer['Answer']['score']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($answer['User']['username'], array('controller' => 'users', 'action' => 'view', $answer['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($answer['Question']['title'], array('controller' => 'questions', 'action' => 'view', $answer['Question']['id'])); ?>
		</td>
		<td><?php echo h($answer['Answer']['created']); ?>&nbsp;</td>
		<td><?php echo h($answer['Answer']['modified']); ?>&nbsp;</td>
		<td class="actions">
<div class='btn-group'>			<?php echo $this->Html->link(__(''), array('action' => 'view', $answer['Answer']['id']), array('class' => 'btn btn-success icon-eye-open')); ?>
			<?php echo $this->Html->link(__(''), array('action' => 'edit', $answer['Answer']['id']), array('class' => 'btn btn-warning icon-edit')); ?>
			<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $answer['Answer']['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $answer['Answer']['id'])); ?>
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
