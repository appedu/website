
<div id="page-container" class="row">



    <div class="studentssubjects view">
        <div class='.col-md-12'>
            <div class="btn-group pull-right">		
                <?php echo $this->Html->link(__(''), array('action' => 'edit', $StudentsSubject['StudentsSubject']['id']), array('class' => 'icon-edit btn btn-warning')); ?>
                <?php echo $this->Form->postLink(__(''), array('action' => 'delete', $StudentsSubject['StudentsSubject']['id']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', $StudentsSubject['StudentsSubject']['id'])); ?>
                <?php echo $this->Html->link(__(''), array('action' => 'add'), array('class' => 'btn btn-primary icon-plus')); ?>
                <?php echo $this->Html->link(__(''), array('action' => 'index'), array('class' => 'btn btn-default icon-undo')); ?>

            </div><!-- /.btn-group pull-right-->
            <h2><?php echo __('Subjects Studying'); ?></h2>
        </div><!-- /.col-md-12-->

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                        <td>
                            <?php echo h($StudentsSubject['StudentsSubject']['id']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
                        <td>
                            <?php echo h($StudentsSubject['User']['username']); ?>
                            &nbsp;
                        </td>
                    </tr><tr>		<td><strong><?php echo __('Description'); ?></strong></td>
                        <td>
                            <?php echo h($StudentsSubject['Subject']['description']); ?>
                            &nbsp;
                        </td>
                    </tr>				</tbody>
            </table><!-- /.table table-striped table-bordered -->
        </div><!-- /.table-responsive -->

    </div><!-- /.view -->

</tbody>
</div><!-- /.table-responsive -->

