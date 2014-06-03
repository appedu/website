
<div id="page-container" class="row">


	
	<div class="questions view">
		<div class='.col-md-12'>
			<div class="btn-group pull-right">		
						<?php echo $this->Html->link(__(''), array('action' => 'edit', $question['Question']['id']), array('class' => 'icon-edit btn btn-warning')); ?>
		<?php echo $this->Form->postLink(__(''), array('action' => 'delete', $question['Question']['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?>
		<?php echo $this->Html->link(__(''), array('action' => 'add'), array('class' => 'btn btn-primary icon-plus')); ?>
		<?php echo $this->Html->link(__(''), array('action' => 'index'), array('class' => 'btn btn-default icon-undo')); ?>
	
			</div><!-- /.btn-group pull-right-->
			<h2><?php  echo __('Question'); ?></h2>
		</div><!-- /.col-md-12-->
		
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tbody>
					<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($question['Question']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Title'); ?></strong></td>
		<td>
			<?php echo h($question['Question']['title']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Description'); ?></strong></td>
		<td>
			<?php echo h($question['Question']['description']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('IsAnonymous'); ?></strong></td>
		<td>
			<?php echo h($question['Question']['isAnonymous']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('IsPublic'); ?></strong></td>
		<td>
			<?php echo h($question['Question']['isPublic']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Score'); ?></strong></td>
		<td>
			<?php echo h($question['Question']['score']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($question['User']['username'], array('controller' => 'users', 'action' => 'view', $question['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Topic'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($question['Topic']['abbr'], array('controller' => 'topics', 'action' => 'view', $question['Topic']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Source Type'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($question['SourceType']['name'], array('controller' => 'source_types', 'action' => 'view', $question['SourceType']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('School'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($question['School']['name'], array('controller' => 'schools', 'action' => 'view', $question['School']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($question['Question']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($question['Question']['modified']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Slug'); ?></strong></td>
		<td>
			<?php echo h($question['Question']['slug']); ?>
			&nbsp;
		</td>
</tr>				</tbody>
			</table><!-- /.table table-striped table-bordered -->
		</div><!-- /.table-responsive -->
		
	</div><!-- /.view -->

			
		<div class="related">

			<h3><?php echo __('Related Answers'); ?></h3>
			
			<?php if (!empty($question['Answer'])): ?>
				
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
										<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('IsAnonymous'); ?></th>
		<th><?php echo __('Score'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Question Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
								<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
								<?php
									$i = 0;
									foreach ($question['Answer'] as $answer): ?>
		<tr>
			<td><?php echo $answer['id']; ?></td>
			<td><?php echo $answer['description']; ?></td>
			<td><?php echo $answer['isAnonymous']; ?></td>
			<td><?php echo $answer['score']; ?></td>
			<td><?php echo $answer['user_id']; ?></td>
			<td><?php echo $answer['question_id']; ?></td>
			<td><?php echo $answer['created']; ?></td>
			<td><?php echo $answer['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__(''), array('controller' => 'answers', 'action' => 'view', $answer['id']), array('class' => 'btn btn-success icon-eye-open')); ?>
				<?php echo $this->Html->link(__(''), array('controller' => 'answers', 'action' => 'edit', $answer['id']), array('class' => 'btn btn-warning icon-edit')); ?>
				<?php echo $this->Form->postLink(__(''), array('controller' => 'answers', 'action' => 'delete', $answer['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $answer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
						</tbody>
					</table><!-- /.table table-striped table-bordered -->
				</div><!-- /.table-responsive -->
				
			<?php endif; ?>

			
			<div class="actions">
				<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Answer'), array('controller' => 'answers', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>			</div><!-- /.actions -->
			
		</div><!-- /.related -->

			
		<div class="related">

			<h3><?php echo __('Related Attachments'); ?></h3>
			
			<?php if (!empty($question['Attachment'])): ?>
				
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
									foreach ($question['Attachment'] as $attachment): ?>
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

			<h3><?php echo __('Related Groups'); ?></h3>
			
			<?php if (!empty($question['Group'])): ?>
				
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
										<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Focus Id'); ?></th>
		<th><?php echo __('File Cover Dir'); ?></th>
		<th><?php echo __('File Cover'); ?></th>
		<th><?php echo __('File Profile Dir'); ?></th>
		<th><?php echo __('File Profile'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
								<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
								<?php
									$i = 0;
									foreach ($question['Group'] as $group): ?>
		<tr>
			<td><?php echo $group['id']; ?></td>
			<td><?php echo $group['name']; ?></td>
			<td><?php echo $group['type']; ?></td>
			<td><?php echo $group['description']; ?></td>
			<td><?php echo $group['focus_id']; ?></td>
			<td><?php echo $group['file_cover_dir']; ?></td>
			<td><?php echo $group['file_cover']; ?></td>
			<td><?php echo $group['file_profile_dir']; ?></td>
			<td><?php echo $group['file_profile']; ?></td>
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

			
		<div class="related">

			<h3><?php echo __('Related Tags'); ?></h3>
			
			<?php if (!empty($question['Tag'])): ?>
				
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
										<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
								<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
								<?php
									$i = 0;
									foreach ($question['Tag'] as $tag): ?>
		<tr>
			<td><?php echo $tag['id']; ?></td>
			<td><?php echo $tag['name']; ?></td>
			<td><?php echo $tag['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__(''), array('controller' => 'tags', 'action' => 'view', $tag['id']), array('class' => 'btn btn-success icon-eye-open')); ?>
				<?php echo $this->Html->link(__(''), array('controller' => 'tags', 'action' => 'edit', $tag['id']), array('class' => 'btn btn-warning icon-edit')); ?>
				<?php echo $this->Form->postLink(__(''), array('controller' => 'tags', 'action' => 'delete', $tag['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $tag['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
						</tbody>
					</table><!-- /.table table-striped table-bordered -->
				</div><!-- /.table-responsive -->
				
			<?php endif; ?>

			
			<div class="actions">
				<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Tag'), array('controller' => 'tags', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>			</div><!-- /.actions -->
			
		</div><!-- /.related -->

			
		<div class="related">

			<h3><?php echo __('Related Users'); ?></h3>
			
			<?php if (!empty($question['User'])): ?>
				
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
		<th><?php echo __('File Cover'); ?></th>
		<th><?php echo __('File Cover Dir'); ?></th>
								<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
								<?php
									$i = 0;
									foreach ($question['ArchiveUser'] as $user): ?>
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
			<td><?php echo $user['file_cover']; ?></td>
			<td><?php echo $user['file_cover_dir']; ?></td>
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

		<div class="related">

			<h3><?php echo __('Related Follow Users'); ?></h3>
			
			<?php if (!empty($question['FollowUser'])): ?>
				
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
		<th><?php echo __('File Cover'); ?></th>
		<th><?php echo __('File Cover Dir'); ?></th>
								<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
								<?php
									$i = 0;
									foreach ($question['FollowUser'] as $user): ?>
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
			<td><?php echo $user['file_cover']; ?></td>
			<td><?php echo $user['file_cover_dir']; ?></td>
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
