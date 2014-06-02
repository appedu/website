
<div id="page-container" class="row">


	
	<div class="attachments view">
		<div class='.col-md-12'>
			<div class="btn-group pull-right">		
						<?php echo $this->Html->link(__(''), array('action' => 'edit', $attachment['Attachment']['id']), array('class' => 'icon-edit btn btn-warning')); ?>
		<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $attachment['Attachment']['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $attachment['Attachment']['id'])); ?>
		<?php echo $this->Html->link(__(''), array('action' => 'add'), array('class' => 'btn btn-primary icon-plus')); ?>
		<?php echo $this->Html->link(__(''), array('action' => 'index'), array('class' => 'btn btn-default icon-undo')); ?>
	
			</div><!-- /.btn-group pull-right-->
			<h2><?php  echo __('Attachment'); ?></h2>
		</div><!-- /.col-md-12-->
		
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tbody>
					<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($attachment['Attachment']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('File Name'); ?></strong></td>
		<td>
			<?php echo h($attachment['Attachment']['file_name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('File Path'); ?></strong></td>
		<td>
			<?php echo h($attachment['Attachment']['file_path']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('File Ext'); ?></strong></td>
		<td>
			<?php echo h($attachment['Attachment']['file_ext']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('File Size'); ?></strong></td>
		<td>
			<?php echo h($attachment['Attachment']['file_size']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Raw Name'); ?></strong></td>
		<td>
			<?php echo h($attachment['Attachment']['raw_name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Original Name'); ?></strong></td>
		<td>
			<?php echo h($attachment['Attachment']['original_name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Type'); ?></strong></td>
		<td>
			<?php echo h($attachment['Attachment']['type']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Seq'); ?></strong></td>
		<td>
			<?php echo h($attachment['Attachment']['seq']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($attachment['User']['username'], array('controller' => 'users', 'action' => 'view', $attachment['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Question'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($attachment['Question']['title'], array('controller' => 'questions', 'action' => 'view', $attachment['Question']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Answer'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($attachment['Answer']['description'], array('controller' => 'answers', 'action' => 'view', $attachment['Answer']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($attachment['Attachment']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($attachment['Attachment']['modified']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('File Dir'); ?></strong></td>
		<td>
			<?php echo h($attachment['Attachment']['file_dir']); ?>
			&nbsp;
		</td>
</tr>				</tbody>
			</table><!-- /.table table-striped table-bordered -->
		</div><!-- /.table-responsive -->
		
	</div><!-- /.view -->

	
</div><!-- /#page-container .row-fluid -->
