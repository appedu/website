
<div id="page-container" class="row">


	
	<div class="schools view">
		<div class='.col-md-12'>
			<div class="btn-group pull-right">		
						<?php echo $this->Html->link(__(''), array('action' => 'edit', $school['School']['id']), array('class' => 'icon-edit btn btn-warning')); ?>
		<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $school['School']['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $school['School']['id'])); ?>
		<?php echo $this->Html->link(__(''), array('action' => 'add'), array('class' => 'btn btn-primary icon-plus')); ?>
		<?php echo $this->Html->link(__(''), array('action' => 'index'), array('class' => 'btn btn-default icon-undo')); ?>
	
			</div><!-- /.btn-group pull-right-->
			<h2><?php  echo __('School'); ?></h2>
		</div><!-- /.col-md-12-->
		
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tbody>
					<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($school['School']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($school['School']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Description'); ?></strong></td>
		<td>
			<?php echo h($school['School']['description']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($school['School']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($school['School']['modified']); ?>
			&nbsp;
		</td>
</tr>				</tbody>
			</table><!-- /.table table-striped table-bordered -->
		</div><!-- /.table-responsive -->
		
	</div><!-- /.view -->

			
		<div class="related">

			<h3><?php echo __('Related Questions'); ?></h3>
			
			<?php if (!empty($school['Question'])): ?>
				
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
										<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('IsAnonymous'); ?></th>
		<th><?php echo __('Score'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Topic Id'); ?></th>
		<th><?php echo __('Source Type Id'); ?></th>
		<th><?php echo __('School Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
								<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
								<?php
									$i = 0;
									foreach ($school['Question'] as $question): ?>
		<tr>
			<td><?php echo $question['id']; ?></td>
			<td><?php echo $question['title']; ?></td>
			<td><?php echo $question['description']; ?></td>
			<td><?php echo $question['isAnonymous']; ?></td>
			<td><?php echo $question['score']; ?></td>
			<td><?php echo $question['user_id']; ?></td>
			<td><?php echo $question['topic_id']; ?></td>
			<td><?php echo $question['source_type_id']; ?></td>
			<td><?php echo $question['school_id']; ?></td>
			<td><?php echo $question['created']; ?></td>
			<td><?php echo $question['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__(''), array('controller' => 'questions', 'action' => 'view', $question['id']), array('class' => 'btn btn-success icon-eye-open')); ?>
				<?php echo $this->Html->link(__(''), array('controller' => 'questions', 'action' => 'edit', $question['id']), array('class' => 'btn btn-warning icon-edit')); ?>
				<?php echo $this->Form->postLink(__(''), array('controller' => 'questions', 'action' => 'delete', $question['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $question['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
						</tbody>
					</table><!-- /.table table-striped table-bordered -->
				</div><!-- /.table-responsive -->
				
			<?php endif; ?>

			
			<div class="actions">
				<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Question'), array('controller' => 'questions', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>			</div><!-- /.actions -->
			
		</div><!-- /.related -->

			
		<div class="related">

			<h3><?php echo __('Related Users'); ?></h3>
			
			<?php if (!empty($school['User'])): ?>
				
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
										<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Password Token'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Email Verified'); ?></th>
		<th><?php echo __('Email Token'); ?></th>
		<th><?php echo __('Email Token Expires'); ?></th>
		<th><?php echo __('Tos'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Last Login'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Dob'); ?></th>
		<th><?php echo __('Form And Class'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('School Id'); ?></th>
		<th><?php echo __('File Profile'); ?></th>
		<th><?php echo __('File Profile Dir'); ?></th>
								<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
								<?php
									$i = 0;
									foreach ($school['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['slug']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['password_token']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['email_verified']; ?></td>
			<td><?php echo $user['email_token']; ?></td>
			<td><?php echo $user['email_token_expires']; ?></td>
			<td><?php echo $user['tos']; ?></td>
			<td><?php echo $user['active']; ?></td>
			<td><?php echo $user['last_login']; ?></td>
			<td><?php echo $user['role']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td><?php echo $user['dob']; ?></td>
			<td><?php echo $user['form_and_class']; ?></td>
			<td><?php echo $user['gender']; ?></td>
			<td><?php echo $user['school_id']; ?></td>
			<td><?php echo $user['file_profile']; ?></td>
			<td><?php echo $user['file_profile_dir']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__(''), array('controller' => 'users', 'action' => 'view', $user['id']), array('class' => 'btn btn-success icon-eye-open')); ?>
				<?php echo $this->Html->link(__(''), array('controller' => 'users', 'action' => 'edit', $user['id']), array('class' => 'btn btn-warning icon-edit')); ?>
				<?php echo $this->Form->postLink(__(''), array('controller' => 'users', 'action' => 'delete', $user['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
						</tbody>
					</table><!-- /.table table-striped table-bordered -->
				</div><!-- /.table-responsive -->
				
			<?php endif; ?>

			
			<div class="actions">
				<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>			</div><!-- /.actions -->
			
		</div><!-- /.related -->

	
</div><!-- /#page-container .row-fluid -->
