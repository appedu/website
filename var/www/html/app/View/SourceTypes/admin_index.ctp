
<div id="page-container" class="row">

	<div class="sourceTypes index">
		<div class='.col-md-12'>
			<div class="btn-group pull-right">
				<?php echo $this->Html->link(__(' '), array('action' => 'add'), array('class' => 'btn btn-primary icon-plus')); ?>			</div>
			<h2><?php echo __('Source Types'); ?></h2>
		</div>
		
		<div class="table-responsive">
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
				<thead>
					<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th><?php echo $this->Paginator->sort('description'); ?></th>
					<th><?php echo $this->Paginator->sort('created'); ?></th>
					<th><?php echo $this->Paginator->sort('modified'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($sourceTypes as $sourceType): ?>
	<tr>
		<td><?php echo h($sourceType['SourceType']['id']); ?>&nbsp;</td>
		<td><?php echo h($sourceType['SourceType']['name']); ?>&nbsp;</td>
		<td><?php echo h($sourceType['SourceType']['description']); ?>&nbsp;</td>
		<td><?php echo h($sourceType['SourceType']['created']); ?>&nbsp;</td>
		<td><?php echo h($sourceType['SourceType']['modified']); ?>&nbsp;</td>
		<td class="actions">
<div class='btn-group'>			<?php echo $this->Html->link(__(''), array('action' => 'view', $sourceType['SourceType']['id']), array('class' => 'btn btn-success icon-eye-open')); ?>
			<?php echo $this->Html->link(__(''), array('action' => 'edit', $sourceType['SourceType']['id']), array('class' => 'btn btn-warning icon-edit')); ?>
			<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $sourceType['SourceType']['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $sourceType['SourceType']['id'])); ?>
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
