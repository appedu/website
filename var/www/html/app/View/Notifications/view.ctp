
<div id="page-container" class="row">


	
	<div class="notifications view">
		<div class='.col-md-12'>
			<div class="btn-group pull-right">		
						<?php echo $this->Html->link(__(''), array('action' => 'edit', $notification['Notification']['id']), array('class' => 'icon-edit btn btn-warning')); ?>
		<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $notification['Notification']['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $notification['Notification']['id'])); ?>
		<?php echo $this->Html->link(__(''), array('action' => 'add'), array('class' => 'btn btn-primary icon-plus')); ?>
		<?php echo $this->Html->link(__(''), array('action' => 'index'), array('class' => 'btn btn-default icon-undo')); ?>
	
			</div><!-- /.btn-group pull-right-->
			<h2><?php  echo __('Notification'); ?></h2>
		</div><!-- /.col-md-12-->
		
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tbody>
					<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($notification['Notification']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Description'); ?></strong></td>
		<td>
			<?php echo h($notification['Notification']['description']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Type'); ?></strong></td>
		<td>
			<?php echo h($notification['Notification']['type']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('IsChecked'); ?></strong></td>
		<td>
			<?php echo h($notification['Notification']['isChecked']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('IsPushed'); ?></strong></td>
		<td>
			<?php echo h($notification['Notification']['isPushed']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($notification['User']['username'], array('controller' => 'users', 'action' => 'view', $notification['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Init User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($notification['InitUser']['username'], array('controller' => 'users', 'action' => 'view', $notification['InitUser']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Question'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($notification['Question']['title'], array('controller' => 'questions', 'action' => 'view', $notification['Question']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Group'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($notification['Group']['name'], array('controller' => 'groups', 'action' => 'view', $notification['Group']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($notification['Notification']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($notification['Notification']['modified']); ?>
			&nbsp;
		</td>
</tr>				</tbody>
			</table><!-- /.table table-striped table-bordered -->
		</div><!-- /.table-responsive -->
		
	</div><!-- /.view -->

	
</div><!-- /#page-container .row-fluid -->
