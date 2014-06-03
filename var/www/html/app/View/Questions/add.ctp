
<div id="page-container" class="row">

	<div class='.col-md-12'>
		<div class="btn-group pull-right">
				<?php echo $this->Html->link(__(''), array('action' => 'index'), array('class' => 'btn icon-undo')); ?>
		</div><!-- /.btn-group pull-right -->
		<h2><?php echo __('Add Question'); ?></h2>
	</div>

	<div class="questions form">
	
		<?php echo $this->Form->create('Question', array('role' => 'form', 
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

					<?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
					
					<?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
					
					<?php echo $this->Form->input('isAnonymous', array(
						'class' => 'ace ace-switch',
						'between' => '<div class=\'col-xs-5\'><label>',
						'after' => '<span class=\'lbl\'></span></label></div>',
					)); ?>
					
					<?php echo $this->Form->input('isPublic', array(
						'class' => 'ace ace-switch',
						'between' => '<div class=\'col-xs-5\'><label>',
						'after' => '<span class=\'lbl\'></span></label></div>',
					)); ?>
					
					<?php echo $this->Form->input('score', array('class' => 'form-control')); ?>
					
					<?php echo $this->Form->input('user_id', array('class' => 'form-control')); ?>
					
					<?php echo $this->Form->input('topic_id', array('class' => 'form-control')); ?>
					
					<?php echo $this->Form->input('source_type_id', array('class' => 'form-control')); ?>
					
					<?php echo $this->Form->input('school_id', array('class' => 'form-control')); ?>
					
					<?php echo $this->Form->input('slug', array('class' => 'form-control')); ?>
					
					<div class="form-group">
							<?php echo $this->Form->input('Group');?>
					
					<div class="form-group">
							<?php echo $this->Form->input('Tag');?>
					
					<div class="form-group">
							<?php echo $this->Form->input('User');?>
					

					<div class='clear-fix form-action'>
						<div class='col-md-offset-6 col-md-7'>
							<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
						</div>
					</div>

			</fieldset>

			<?php echo $this->Form->end(); ?>

	</div><!-- /.form -->
		
</div><!-- /#page-container .row-fluid -->

