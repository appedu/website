
<div id="page-container" class="row">


	
	<div class="answers view">
		<div class='.col-md-12'>
			<div class="btn-group pull-right">		
						<?php echo $this->Html->link(__(''), array('action' => 'edit', $answer['Answer']['id']), array('class' => 'icon-edit btn btn-warning')); ?>
		<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $answer['Answer']['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $answer['Answer']['id'])); ?>
		<?php echo $this->Html->link(__(''), array('action' => 'add'), array('class' => 'btn btn-primary icon-plus')); ?>
		<?php echo $this->Html->link(__(''), array('action' => 'index'), array('class' => 'btn btn-default icon-undo')); ?>
	
			</div><!-- /.btn-group pull-right-->
			<h2><?php  echo __('Answer'); ?></h2>
		</div><!-- /.col-md-12-->
		
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tbody>
					<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($answer['Answer']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Description'); ?></strong></td>
		<td>
			<?php echo h($answer['Answer']['description']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('IsAnonymous'); ?></strong></td>
		<td>
			<?php echo h($answer['Answer']['isAnonymous']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Score'); ?></strong></td>
		<td>
			<?php echo h($answer['Answer']['score']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($answer['User']['username'], array('controller' => 'users', 'action' => 'view', $answer['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Question'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($answer['Question']['title'], array('controller' => 'questions', 'action' => 'view', $answer['Question']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($answer['Answer']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($answer['Answer']['modified']); ?>
			&nbsp;
		</td>
</tr>				</tbody>
			</table><!-- /.table table-striped table-bordered -->
		</div><!-- /.table-responsive -->
		
	</div><!-- /.view -->

			
		<div class="related">

			<h3><?php echo __('Related Comments'); ?></h3>
			
			<?php if (!empty($answer['Comment'])): ?>
				
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
										<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('IsAnonymous'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Answer Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
								<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
								<?php
									$i = 0;
									foreach ($answer['Comment'] as $comment): ?>
		<tr>
			<td><?php echo $comment['id']; ?></td>
			<td><?php echo $comment['description']; ?></td>
			<td><?php echo $comment['isAnonymous']; ?></td>
			<td><?php echo $comment['user_id']; ?></td>
			<td><?php echo $comment['answer_id']; ?></td>
			<td><?php echo $comment['created']; ?></td>
			<td><?php echo $comment['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__(''), array('controller' => 'comments', 'action' => 'view', $comment['id']), array('class' => 'btn btn-success icon-eye-open')); ?>
				<?php echo $this->Html->link(__(''), array('controller' => 'comments', 'action' => 'edit', $comment['id']), array('class' => 'btn btn-warning icon-edit')); ?>
				<?php echo $this->Form->postLink(__(''), array('controller' => 'comments', 'action' => 'delete', $comment['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $comment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
						</tbody>
					</table><!-- /.table table-striped table-bordered -->
				</div><!-- /.table-responsive -->
				
			<?php endif; ?>

			
			<div class="actions">
				<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Comment'), array('controller' => 'comments', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>			</div><!-- /.actions -->
			
		</div><!-- /.related -->

			
		<div class="related">

			<h3><?php echo __('Related Attachments'); ?></h3>
			
			<?php if (!empty($answer['Attachment'])): ?>
				
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
										<th><?php echo __('Id'); ?></th>
		<th><?php echo __('File Name'); ?></th>
		<th><?php echo __('File Path'); ?></th>
		<th><?php echo __('File Ext'); ?></th>
		<th><?php echo __('File Size'); ?></th>
		<th><?php echo __('Raw Name'); ?></th>
		<th><?php echo __('Original Name'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Seq'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Question Id'); ?></th>
		<th><?php echo __('Answer Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('File Dir'); ?></th>
								<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
								<?php
									$i = 0;
									foreach ($answer['Attachment'] as $attachment): ?>
		<tr>
			<td><?php echo $attachment['id']; ?></td>
			<td><?php echo $attachment['file_name']; ?></td>
			<td><?php echo $attachment['file_path']; ?></td>
			<td><?php echo $attachment['file_ext']; ?></td>
			<td><?php echo $attachment['file_size']; ?></td>
			<td><?php echo $attachment['raw_name']; ?></td>
			<td><?php echo $attachment['original_name']; ?></td>
			<td><?php echo $attachment['type']; ?></td>
			<td><?php echo $attachment['seq']; ?></td>
			<td><?php echo $attachment['user_id']; ?></td>
			<td><?php echo $attachment['question_id']; ?></td>
			<td><?php echo $attachment['answer_id']; ?></td>
			<td><?php echo $attachment['created']; ?></td>
			<td><?php echo $attachment['modified']; ?></td>
			<td><?php echo $attachment['file_dir']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__(''), array('controller' => 'attachments', 'action' => 'view', $attachment['id']), array('class' => 'btn btn-success icon-eye-open')); ?>
				<?php echo $this->Html->link(__(''), array('controller' => 'attachments', 'action' => 'edit', $attachment['id']), array('class' => 'btn btn-warning icon-edit')); ?>
				<?php echo $this->Form->postLink(__(''), array('controller' => 'attachments', 'action' => 'delete', $attachment['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $attachment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
						</tbody>
					</table><!-- /.table table-striped table-bordered -->
				</div><!-- /.table-responsive -->
				
			<?php endif; ?>

			
			<div class="actions">
				<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Attachment'), array('controller' => 'attachments', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>			</div><!-- /.actions -->
			
		</div><!-- /.related -->

			
		<div class="related">

			<h3><?php echo __('Related Ratings'); ?></h3>
			
			<?php if (!empty($answer['Rating'])): ?>
				
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
										<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Answer Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
								<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
								<?php
									$i = 0;
									foreach ($answer['Rating'] as $rating): ?>
		<tr>
			<td><?php echo $rating['id']; ?></td>
			<td><?php echo $rating['type']; ?></td>
			<td><?php echo $rating['user_id']; ?></td>
			<td><?php echo $rating['answer_id']; ?></td>
			<td><?php echo $rating['created']; ?></td>
			<td><?php echo $rating['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__(''), array('controller' => 'ratings', 'action' => 'view', $rating['id']), array('class' => 'btn btn-success icon-eye-open')); ?>
				<?php echo $this->Html->link(__(''), array('controller' => 'ratings', 'action' => 'edit', $rating['id']), array('class' => 'btn btn-warning icon-edit')); ?>
				<?php echo $this->Form->postLink(__(''), array('controller' => 'ratings', 'action' => 'delete', $rating['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $rating['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
						</tbody>
					</table><!-- /.table table-striped table-bordered -->
				</div><!-- /.table-responsive -->
				
			<?php endif; ?>

			
			<div class="actions">
				<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Rating'), array('controller' => 'ratings', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>			</div><!-- /.actions -->
			
		</div><!-- /.related -->

	
</div><!-- /#page-container .row-fluid -->
