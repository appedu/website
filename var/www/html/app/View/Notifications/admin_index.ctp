
<div id="page-container" class="row">

	<div class="notifications index">
		<div class='.col-md-12'>
			<div class="btn-group pull-right">
				<?php echo $this->Html->link(__(' '), array('action' => 'add'), array('class' => 'btn btn-primary icon-plus')); ?>			</div>
			<h2><?php echo __('Notifications'); ?></h2>
		</div>
		
		<div class="table-responsive">
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
				<thead>
					<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('description'); ?></th>
					<th><?php echo $this->Paginator->sort('type'); ?></th>
					<th><?php echo $this->Paginator->sort('isChecked'); ?></th>
					<th><?php echo $this->Paginator->sort('isPushed'); ?></th>
					<th><?php echo $this->Paginator->sort('user_id'); ?></th>
					<th><?php echo $this->Paginator->sort('init_user_id'); ?></th>
					<th><?php echo $this->Paginator->sort('question_id'); ?></th>
					<th><?php echo $this->Paginator->sort('group_id'); ?></th>
					<th><?php echo $this->Paginator->sort('created'); ?></th>
					<th><?php echo $this->Paginator->sort('modified'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($notifications as $notification): ?>
	<tr>
		<td><?php echo h($notification['Notification']['id']); ?>&nbsp;</td>
		<td><?php echo h($notification['Notification']['description']); ?>&nbsp;</td>
		<td><?php echo h($notification['Notification']['type']); ?>&nbsp;</td>
		<td><?php echo h($notification['Notification']['isChecked']); ?>&nbsp;</td>
		<td><?php echo h($notification['Notification']['isPushed']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($notification['User']['username'], array('controller' => 'users', 'action' => 'view', $notification['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($notification['InitUser']['username'], array('controller' => 'users', 'action' => 'view', $notification['InitUser']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($notification['Question']['title'], array('controller' => 'questions', 'action' => 'view', $notification['Question']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($notification['Group']['name'], array('controller' => 'groups', 'action' => 'view', $notification['Group']['id'])); ?>
		</td>
		<td><?php echo h($notification['Notification']['created']); ?>&nbsp;</td>
		<td><?php echo h($notification['Notification']['modified']); ?>&nbsp;</td>
		<td class="actions">
                                <div class='btn-group'>			
                                    <?php echo $this->Html->link(__(''), array('action' => 'view', $notification['Notification']['id']), array('class' => 'btn btn-success icon-eye-open')); ?>
			<?php echo $this->Html->link(__(''), array('action' => 'edit', $notification['Notification']['id']), array('class' => 'btn btn-warning icon-edit')); ?>
			<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $notification['Notification']['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $notification['Notification']['id'])); ?>
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
