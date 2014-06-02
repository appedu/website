
<div id="page-container" class="row">



    <div class="users view">
        <div class='.col-md-12'>
            <div class="btn-group pull-right">		
                <?php echo $this->Html->link(__(''), array('action' => 'edit', $User['User']['id']), array('class' => 'icon-edit btn btn-warning')); ?>
                <?php echo $this->Form->postLink(__(''), array('action' => 'delete', $User['User']['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $User['User']['id'])); ?>
                <?php echo $this->Html->link(__(''), array('action' => 'add'), array('class' => 'btn btn-primary icon-plus')); ?>
                <?php echo $this->Html->link(__(''), array('action' => 'index'), array('class' => 'btn btn-default icon-undo')); ?>

            </div><!-- /.btn-group pull-right-->
            <h2><?php echo __('User'); ?></h2>
        </div><!-- /.col-md-12-->

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['id']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('Username'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['username']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('Slug'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['slug']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('Password'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['password']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('Password Token'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['password_token']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['email']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('Email Verified'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['email_verified']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('Email Token'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['email_token']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('Email Token Expires'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['email_token_expires']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('Tos'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['tos']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('Active'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['active']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('Last Login'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['last_login']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('Role'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['role']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['created']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['modified']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('Dob'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['dob']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('Form And Class'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['form_and_class']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('Gender'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['gender']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('School'); ?></strong></td>
                        <td>
                            <?php echo $this->Html->link($User['School']['name'], array('controller' => 'schools', 'action' => 'view', $User['School']['id']), array('class' => '')); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('File Profile'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['file_profile']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('File Profile Dir'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['file_profile_dir']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('File Cover'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['file_cover']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('File Cover Dir'); ?></strong></td>
                        <td>
                            <?php echo h($User['User']['file_cover_dir']); ?>
                            &nbsp;
                        </td>
                    </tr>				</tbody>
            </table><!-- /.table table-striped table-bordered -->
        </div><!-- /.table-responsive -->

    </div><!-- /.view -->


    <div class="related">

        <h3><?php echo __('Related Answers'); ?></h3>

        <?php if (!empty($user['Answer'])): ?>

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
                        foreach ($user['Answer'] as $answer):
                            ?>
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
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Answer'), array('controller' => 'answers', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>			</div><!-- /.actions -->

    </div><!-- /.related -->


    <div class="related">

        <h3><?php echo __('Related Comments'); ?></h3>

<?php if (!empty($user['Comment'])): ?>

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
                        foreach ($user['Comment'] as $comment):
                            ?>
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
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Comment'), array('controller' => 'comments', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>			</div><!-- /.actions -->

    </div><!-- /.related -->


    <div class="related">

        <h3><?php echo __('Related Attachments'); ?></h3>

<?php if (!empty($user['Attachment'])): ?>

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
                        foreach ($user['Attachment'] as $attachment):
                            ?>
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
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Attachment'), array('controller' => 'attachments', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>			</div><!-- /.actions -->

    </div><!-- /.related -->


    <div class="related">

        <h3><?php echo __('Related Questions'); ?></h3>

<?php if (!empty($user['Question'])): ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo __('Id'); ?></th>
                            <th><?php echo __('Title'); ?></th>
                            <th><?php echo __('Description'); ?></th>
                            <th><?php echo __('IsAnonymous'); ?></th>
                            <th><?php echo __('IsPublic'); ?></th>
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
    foreach ($user['Question'] as $question):
        ?>
                            <tr>
                                <td><?php echo $question['id']; ?></td>
                                <td><?php echo $question['title']; ?></td>
                                <td><?php echo $question['description']; ?></td>
                                <td><?php echo $question['isAnonymous']; ?></td>
                                <td><?php echo $question['isPublic']; ?></td>
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
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Question'), array('controller' => 'questions', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>			</div><!-- /.actions -->

    </div><!-- /.related -->


    <div class="related">

        <h3><?php echo __('Related Ratings'); ?></h3>

<?php if (!empty($user['Rating'])): ?>

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
    foreach ($user['Rating'] as $rating):
        ?>
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
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Rating'), array('controller' => 'ratings', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>			</div><!-- /.actions -->

    </div><!-- /.related -->


    <div class="related">

        <h3><?php echo __('Related Groups Users'); ?></h3>

<?php if (!empty($user['GroupsUser'])): ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo __('Id'); ?></th>
                            <th><?php echo __('Status'); ?></th>
                            <th><?php echo __('Group Id'); ?></th>
                            <th><?php echo __('User Id'); ?></th>
                            <th><?php echo __('Created'); ?></th>
                            <th><?php echo __('Modified'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
    $i = 0;
    foreach ($user['GroupsUser'] as $groupsUser):
        ?>
                            <tr>
                                <td><?php echo $groupsUser['id']; ?></td>
                                <td><?php echo $groupsUser['status']; ?></td>
                                <td><?php echo $groupsUser['group_id']; ?></td>
                                <td><?php echo $groupsUser['user_id']; ?></td>
                                <td><?php echo $groupsUser['created']; ?></td>
                                <td><?php echo $groupsUser['modified']; ?></td>
                                <td class="actions">
        <?php echo $this->Html->link(__(''), array('controller' => 'groups_users', 'action' => 'view', $groupsUser['id']), array('class' => 'btn btn-success icon-eye-open')); ?>
        <?php echo $this->Html->link(__(''), array('controller' => 'groups_users', 'action' => 'edit', $groupsUser['id']), array('class' => 'btn btn-warning icon-edit')); ?>
        <?php echo $this->Form->postLink(__(''), array('controller' => 'groups_users', 'action' => 'delete', $groupsUser['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $groupsUser['id'])); ?>
                                </td>
                            </tr>
    <?php endforeach; ?>
                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

<?php endif; ?>


        <div class="actions">
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Groups User'), array('controller' => 'groups_users', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>			</div><!-- /.actions -->

    </div><!-- /.related -->


</div><!-- /#page-container .row-fluid -->
