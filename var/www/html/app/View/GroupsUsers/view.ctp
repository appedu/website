
<div id="page-container" class="row">


	
	<div class="groupsUsers view">
		<div class='.col-md-12'>
			<div class="btn-group pull-right">		
						<?php echo $this->Html->link(__(''), array('action' => 'edit', $groupsUser['GroupsUser']['id']), array('class' => 'icon-edit btn btn-warning')); ?>
		<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $groupsUser['GroupsUser']['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $groupsUser['GroupsUser']['id'])); ?>
		<?php echo $this->Html->link(__(''), array('action' => 'add'), array('class' => 'btn btn-primary icon-plus')); ?>
		<?php echo $this->Html->link(__(''), array('action' => 'index'), array('class' => 'btn btn-default icon-undo')); ?>
	
			</div><!-- /.btn-group pull-right-->
			<h2><?php  echo __('Groups User'); ?></h2>
		</div><!-- /.col-md-12-->
		
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tbody>
					<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($groupsUser['GroupsUser']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Status'); ?></strong></td>
		<td>
			<?php echo h($groupsUser['GroupsUser']['status']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Group'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($groupsUser['Group']['name'], array('controller' => 'groups', 'action' => 'view', $groupsUser['Group']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($groupsUser['User']['username'], array('controller' => 'users', 'action' => 'view', $groupsUser['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($groupsUser['GroupsUser']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($groupsUser['GroupsUser']['modified']); ?>
			&nbsp;
		</td>
</tr>				</tbody>
			</table><!-- /.table table-striped table-bordered -->
		</div><!-- /.table-responsive -->
		
	</div><!-- /.view -->

	
</div><!-- /#page-container .row-fluid -->
