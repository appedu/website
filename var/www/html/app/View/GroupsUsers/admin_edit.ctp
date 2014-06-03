
<div id="page-container" class="row">

	<div class='.col-md-12'>
		<div class="btn-group pull-right">
				<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $this->Form->value('GroupsUser.id')), array('class' => 'icon-trash btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('GroupsUser.id'))); ?>
				<?php echo $this->Html->link(__(''), array('action' => 'index'), array('class' => 'btn icon-undo')); ?>
		</div><!-- /.btn-group pull-right -->
		<h2><?php echo __('Admin Edit Groups User'); ?></h2>
	</div>

	<div class="groupsUsers form">
	
		<?php echo $this->Form->create('GroupsUser', array('role' => 'form', 
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
					
					<?php //echo $this->Form->input('status', array('class' => 'form-control')); ?>
					<div class="form-group"><label for="status" class="col-sm-2 control-label no-padding-right">Status</label><div class="col-xs-5">
						<select name="data[GroupsUser][status]" class="form-control" type="text" id="status">
							<option value="PENDING" <?php echo ($this->request['data']['GroupsUser']['status']=='PENDING')?'selected="selected"':'' ?>>PENDING</option>
							<option value="JOINED" <?php echo ($this->request['data']['GroupsUser']['status']=='JOINED')?'selected="selected"':'' ?>>JOINED</option>
							<option value="ADMIN" <?php echo ($this->request['data']['GroupsUser']['status']=='ADMIN')?'selected="selected"':'' ?>>ADMIN</option>
						</select>
					</div></div>

					<?php echo $this->Form->input('group_id', array('class' => 'form-control')); ?>
					
					<?php echo $this->Form->input('user_id', array('class' => 'form-control')); ?>
					

					<div class='clear-fix form-action'>
						<div class='col-md-offset-6 col-md-7'>
							<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
						</div>
					</div>

			</fieldset>

			<?php echo $this->Form->end(); ?>

	</div><!-- /.form -->
		
</div><!-- /#page-container .row-fluid -->
