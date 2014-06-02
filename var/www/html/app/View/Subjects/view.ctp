
<div id="page-container" class="row">


	
	<div class="subjects view">
		<div class='.col-md-12'>
			<div class="btn-group pull-right">		
						<?php echo $this->Html->link(__(''), array('action' => 'edit', $subject['Subject']['id']), array('class' => 'icon-edit btn btn-warning')); ?>
		<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $subject['Subject']['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $subject['Subject']['id'])); ?>
		<?php echo $this->Html->link(__(''), array('action' => 'add'), array('class' => 'btn btn-primary icon-plus')); ?>
		<?php echo $this->Html->link(__(''), array('action' => 'index'), array('class' => 'btn btn-default icon-undo')); ?>
	
			</div><!-- /.btn-group pull-right-->
			<h2><?php  echo __('Subject'); ?></h2>
		</div><!-- /.col-md-12-->
		
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tbody>
					<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($subject['Subject']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Abbr'); ?></strong></td>
		<td>
			<?php echo h($subject['Subject']['abbr']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Description'); ?></strong></td>
		<td>
			<?php echo h($subject['Subject']['description']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($subject['Subject']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($subject['Subject']['modified']); ?>
			&nbsp;
		</td>
</tr>				</tbody>
			</table><!-- /.table table-striped table-bordered -->
		</div><!-- /.table-responsive -->
		
	</div><!-- /.view -->

			
		<div class="related">

			<h3><?php echo __('Related Topics'); ?></h3>
			
			<?php if (!empty($subject['Topic'])): ?>
				
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
										<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Abbr'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Subject Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
								<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
								<?php
									$i = 0;
									foreach ($subject['Topic'] as $topic): ?>
		<tr>
			<td><?php echo $topic['id']; ?></td>
			<td><?php echo $topic['abbr']; ?></td>
			<td><?php echo $topic['description']; ?></td>
			<td><?php echo $topic['subject_id']; ?></td>
			<td><?php echo $topic['created']; ?></td>
			<td><?php echo $topic['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__(''), array('controller' => 'topics', 'action' => 'view', $topic['id']), array('class' => 'btn btn-success icon-eye-open')); ?>
				<?php echo $this->Html->link(__(''), array('controller' => 'topics', 'action' => 'edit', $topic['id']), array('class' => 'btn btn-warning icon-edit')); ?>
				<?php echo $this->Form->postLink(__(''), array('controller' => 'topics', 'action' => 'delete', $topic['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $topic['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
						</tbody>
					</table><!-- /.table table-striped table-bordered -->
				</div><!-- /.table-responsive -->
				
			<?php endif; ?>

			
			<div class="actions">
				<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Topic'), array('controller' => 'topics', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>			</div><!-- /.actions -->
			
		</div><!-- /.related -->

	
</div><!-- /#page-container .row-fluid -->
