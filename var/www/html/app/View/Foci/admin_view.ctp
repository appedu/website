
<div id="page-container" class="row">


	
	<div class="foci view">
		<div class='.col-md-12'>
			<div class="btn-group pull-right">		
						<?php echo $this->Html->link(__(''), array('action' => 'edit', $focus['Focus']['id']), array('class' => 'icon-edit btn btn-warning')); ?>
		<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $focus['Focus']['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $focus['Focus']['id'])); ?>
		<?php echo $this->Html->link(__(''), array('action' => 'add'), array('class' => 'btn btn-primary icon-plus')); ?>
		<?php echo $this->Html->link(__(''), array('action' => 'index'), array('class' => 'btn btn-default icon-undo')); ?>
	
			</div><!-- /.btn-group pull-right-->
			<h2><?php  echo __('Focus'); ?></h2>
		</div><!-- /.col-md-12-->
		
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tbody>
					<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($focus['Focus']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Abbr'); ?></strong></td>
		<td>
			<?php echo h($focus['Focus']['abbr']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Description'); ?></strong></td>
		<td>
			<?php echo h($focus['Focus']['description']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($focus['Focus']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($focus['Focus']['modified']); ?>
			&nbsp;
		</td>
</tr>				</tbody>
			</table><!-- /.table table-striped table-bordered -->
		</div><!-- /.table-responsive -->
		
	</div><!-- /.view -->

			
		<div class="related">

			<h3><?php echo __('Related Groups'); ?></h3>
			
			<?php if (!empty($focus['Group'])): ?>
				
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
										<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Focus Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
								<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
								<?php
									$i = 0;
									foreach ($focus['Group'] as $group): ?>
		<tr>
			<td><?php echo $group['id']; ?></td>
			<td><?php echo $group['name']; ?></td>
			<td><?php echo $group['type']; ?></td>
			<td><?php echo $group['description']; ?></td>
			<td><?php echo $group['focus_id']; ?></td>
			<td><?php echo $group['created']; ?></td>
			<td><?php echo $group['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__(''), array('controller' => 'groups', 'action' => 'view', $group['id']), array('class' => 'btn btn-success icon-eye-open')); ?>
				<?php echo $this->Html->link(__(''), array('controller' => 'groups', 'action' => 'edit', $group['id']), array('class' => 'btn btn-warning icon-edit')); ?>
				<?php echo $this->Form->postLink(__(''), array('controller' => 'groups', 'action' => 'delete', $group['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $group['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
						</tbody>
					</table><!-- /.table table-striped table-bordered -->
				</div><!-- /.table-responsive -->
				
			<?php endif; ?>

			
			<div class="actions">
				<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Group'), array('controller' => 'groups', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>			</div><!-- /.actions -->
			
		</div><!-- /.related -->

	
</div><!-- /#page-container .row-fluid -->
