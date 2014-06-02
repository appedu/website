<!--start of April 28, 2014-->
<script type="text/javascript">
window.onload=function(){
	document.getElementById('Student').style.display = 'none';
	document.getElementById('Tutor').style.display = 'none';
};

</script>

<script type="text/javascript">
function newfields() {
    if (document.getElementById('UserRole').value == 'STUDENT') {
        document.getElementById('Student').style.display = 'block';
        document.getElementById('Tutor').style.display = 'none';
    } 
    else if (document.getElementById('UserRole').value == 'TUTOR'){
        document.getElementById('Student').style.display = 'none';
        document.getElementById('Tutor').style.display = 'block';
    }
    else{
    	document.getElementById('Student').style.display = 'none';
	document.getElementById('Tutor').style.display = 'none';

    }
    
}	
</script>

<!--end of April 28, 2014-->

<div id="page-container" class="row">

	<div class='.col-md-12'>
		<div class="btn-group pull-right">
				<?php echo $this->Html->link(__(''), array('action' => 'index'), array('class' => 'btn icon-undo')); ?>
		</div><!-- /.btn-group pull-right -->
		<h2><?php echo __('Admin Add User'); ?></h2>
	</div>

	<div class="users form">
	
		<?php echo $this->Form->create('User', array('type'=>'file', 'role' => 'form', 
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
                                        <?php echo $this->Form->input('role', array('class' => 'form-control',
                                                        'onclick'=> 'newfields()',

                                                'type' => 'select',
                                                'options' => array(
                                                    'STUDENT' => 'Student',
                                                    'TUTOR' => 'Tutor',
                                                    'ADMIN' => 'Admin',
                                                ),
                                                'empty' => 'choose a Role',
					
                                                )
                                        ); 
					
                                        echo $this->Form->input('first_name', array('class' => 'form-control'));
                                        echo $this->Form->input('last_name', array('class' => 'form-control'));
                                        echo $this->Form->input('username', array('class' => 'form-control'));
                                        echo $this->Form->input('email', array('class' => 'form-control'));
                                        echo $this->Form->input('password', array('class' => 'form-control'));
                                        echo $this->Form->input('confirm_password', array('class' => 'form-control','type'=>'password'));
                                        echo $this->Form->input('phone_number', array('class' => 'form-control'));
                                        ?>
					
<!--temporary divider-->
<!--<hr style="border-top: 1px solid #ccc;">
<!--end of temporary divider-->
                                        <span id="Student">
                                        <?php
                                        echo $this->Form->input('school', array('class' => 'form-control'));
					
                                        echo $this->Form->input('form', array('class' => 'form-control',
                                                'type' => 'select',
                                                'options' => array(
                                                    '1' => '1',
                                                    '2' => '2',
                                                    '3' => '3',
                                                    '4' => '4',
                                                    '5' => '5',
                                                    '6' => '6',
                                                ),
                                                'empty' => 'choose a Form',
                                                )
                                        );
					
                                        echo $this->Form->input('class', array('class' => 'form-control',
                                                'type' => 'select',
                                                'options' => array(
                                                    'A' => 'A',
                                                    'B' => 'B',
                                                    'C' => 'C',
                                                    'D' => 'D',
                                                    'E' => 'E',
                                                    'F' => 'F',
                                                    'G' => 'G',
                                                ),
                                                'empty' => 'choose a Class',
                                                )
                                        );
					
                                        echo $this->Form->input('dob', array('class' => 'form'));
					
                                        echo $this->Form->input('gender', array('class' => 'form-control',
                                                'type' => 'select',
                                                'options' => array(
                                                    'Male' => 'Male',
                                                    'Female' => 'Female',
                                                ),
                                                'empty' => 'choose a Gender',
                                                )
                                        );
					
                                        echo "<div class='clear-fix form-action'>";
                                        echo"<div class='col-md-offset-6 col-md-7'>";
                                        echo $this->Form->button(
                                        'Subjects Studying', 
                                        array(
                                        'formaction' => Router::url(
                                       array('class' => 'btn btn-large btn-primary','controller' => 'students_subjects','action' => 'index')
                                        )
                                        )
                                        );
                                        echo"</div>";
                                        echo"</div>";
                                        ?>
                                        </span>
					
                                        <span id="Tutor">
                                        <?php
                                        echo $this->Form->input('latest_university_qualification', array('class' => 'form-control',
                                                'type' => 'select',
                                                'options' => array(
					
                                                ),
                                                'empty' => 'choose a Qualification',
                                                )
                                        );
					
                                        echo $this->Form->input('degree', array('class' => 'form-control',
                                                'type' => 'select',
                                                'options' => array(
					
                                                ),
                                                'empty' => 'choose a Degree',
                                                )
                                        );
                                        echo $this->Form->input('major', array('class' => 'form-control',
                                                'type' => 'select',
                                                'options' => array(
					
                                                ),
                                                'empty' => 'choose a Major',
                                                )
                                        );
                                        echo $this->Form->input('year_of_studies', array('class' => 'form-control'));
                                        echo $this->Form->input('upload_certificate', array('class' => 'form-control', 'type'=>'file'));
                                        echo $this->Form->input('upload_HKID', array('class' => 'form-control', 'type'=>'file')); 
                                        echo $this->Form->input('upload_exam_certificates', array('class' => 'form-control', 'type'=>'file'));
                                        ?>
                                        </span>
					
					<div class='clear-fix form-action'>
						<div class='col-md-offset-6 col-md-7'>
							<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
						</div>
					</div>
			</fieldset>

            <hr style="border-top: 1px solid #ccc;">
			<?php echo $this->Form->end(); ?>

	</div><!-- /.form -->
		
</div><!-- /#page-container .row-fluid -->
