
<div id="page-container" class="row">

	<div class="users index">
		<div class='.col-md-12'>
			<div class="btn-group pull-right">
				<?php echo $this->Html->link(__(' '), array('action' => 'add'), array('class' => 'btn btn-primary icon-plus')); ?>			</div>
			<h2><?php echo __('Users'); ?></h2>
		</div>
		
		<div class="table-responsive">
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
				<thead>
					<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('username'); ?></th>
					<th><?php echo $this->Paginator->sort('slug'); ?></th>
					<th><?php echo $this->Paginator->sort('password'); ?></th>
					<th><?php echo $this->Paginator->sort('password_token'); ?></th>
					<th><?php echo $this->Paginator->sort('email'); ?></th>
					<th><?php echo $this->Paginator->sort('email_verified'); ?></th>
					<th><?php echo $this->Paginator->sort('email_token'); ?></th>
					<th><?php echo $this->Paginator->sort('email_token_expires'); ?></th>
					<th><?php echo $this->Paginator->sort('tos'); ?></th>
					<th><?php echo $this->Paginator->sort('active'); ?></th>
					<th><?php echo $this->Paginator->sort('last_login'); ?></th>
					<th><?php echo $this->Paginator->sort('role'); ?></th>
					<th><?php echo $this->Paginator->sort('created'); ?></th>
					<th><?php echo $this->Paginator->sort('modified'); ?></th>
					<th><?php echo $this->Paginator->sort('dob'); ?></th>
					<th><?php echo $this->Paginator->sort('form_and_class'); ?></th>
					<th><?php echo $this->Paginator->sort('gender'); ?></th>
					<th><?php echo $this->Paginator->sort('school_id'); ?></th>
					<th><?php echo $this->Paginator->sort('file_profile'); ?></th>
					<th><?php echo $this->Paginator->sort('file_profile_dir'); ?></th>
					<th><?php echo $this->Paginator->sort('file_cover'); ?></th>
					<th><?php echo $this->Paginator->sort('file_cover_dir'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['slug']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['password_token']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email_verified']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email_token']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email_token_expires']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['tos']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['active']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['last_login']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['role']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['dob']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['form_and_class']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['gender']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['School']['name'], array('controller' => 'schools', 'action' => 'view', $user['School']['id'])); ?>
		</td>
		<td><?php echo h($user['User']['file_profile']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['file_profile_dir']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['file_cover']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['file_cover_dir']); ?>&nbsp;</td>
		<td class="actions">
<div class='btn-group'>			<?php echo $this->Html->link(__(''), array('action' => 'view', $user['User']['id']), array('class' => 'btn btn-success icon-eye-open')); ?>
			<?php echo $this->Html->link(__(''), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-warning icon-edit')); ?>
			<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
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
