
<div id="page-container" class="row">

	<div class='.col-md-12'>
		<div class="btn-group pull-right">
				<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $this->Form->value('Tag.id')), array('class' => 'icon-trash btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('Tag.id'))); ?>
				<?php echo $this->Html->link(__(''), array('action' => 'index'), array('class' => 'btn icon-undo')); ?>
		</div><!-- /.btn-group pull-right -->
		<h2><?php echo __('Admin Edit Tag'); ?></h2>
	</div>

	<div class="tags_class form">
	
		<?php echo $this->Form->create('Tag', array('role' => 'form', 
			'inputDefaults' => array(
				'div' => array(
					'class' => 'form-group'
				), 'label' => array(
					'class' => 'col-sm-2 control-label no-padding-right'
				),
				'between' => '<div class=\'col-xs-5\'>',
				'after' => '</div>',
				'format' => array('before', 'label', 'between', 'input', 'after', 'error')
			), 'class' => 'form-horizontal')); ?>

			<fieldset>

					<?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
					
					<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
					
					<div class="form-group">
							<?php echo $this->Form->input('Question');?>
					

					<div class='clear-fix form-action'>
						<div class='col-md-offset-6 col-md-7'>
							<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
						</div>
					</div>

			</fieldset>

			<?php echo $this->Form->end(); ?>

	</div><!-- /.form -->
		
</div><!-- /#page-container .row-fluid -->
