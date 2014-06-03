
<div id="page-container" class="row">

	<div class='.col-md-12'>
		<div class="btn-group pull-right">
				<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $this->Form->value('Group.id')), array('class' => 'icon-trash btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('Group.id'))); ?>
				<?php echo $this->Html->link(__(''), array('action' => 'index'), array('class' => 'btn icon-undo')); ?>
		</div><!-- /.btn-group pull-right -->
		<h2><?php echo __('Admin Edit Group'); ?></h2>
	</div>

	<div class="groups form">
	
		<?php echo $this->Form->create('Group', array('type'=> 'file', 'role' => 'form', 
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
					
					<?php echo $this->Form->input('slug', array('class' => 'form-control')); ?>
					
					<?php //echo $this->Form->input('type', array('class' => 'form-control')); ?>
					<div class="form-group"><label for="type" class="col-sm-2 control-label no-padding-right">Type</label><div class="col-xs-5">
						<select name="data[Group][type]" class="form-control" type="text" id="type">
							<option value="0" <?php echo ($this->request['data']['Group']['type']=='0')?'selected="selected"':'' ?>>public</option>
							<option value="1" <?php echo ($this->request['data']['Group']['type']=='1')?'selected="selected"':'' ?>>private</option>
						</select>
					</div></div>
					
					<?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
					
					<?php echo $this->Form->input('focus_id', array('class' => 'form-control')); ?>
					
					<?php echo $this->Form->hidden('file_cover_dir', array('class' => 'form-control')); ?>
					
					<?php echo $this->Form->hidden('file_cover', array('class' => 'form-control')); ?>
					
					<?php echo $this->Form->hidden('file_profile_dir', array('class' => 'form-control')); ?>
					
					<?php echo $this->Form->hidden('file_profile', array('class' => 'form-control')); ?>

					<?php echo $this->Form->input('file_cover_dir_tmp', array('class' => 'form-control', 'type'=>'file')); ?>
					
					<?php echo $this->Form->input('file_profile_dir_tmp', array('class' => 'form-control', 'type'=>'file')); ?>
					
					<div class="form-group">
							<?php echo $this->Form->input('Question');?>
					
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
