<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link http://cakephp.org CakePHP(tm) Project
 * @package Cake.Console.Templates.default.views
 * @since CakePHP(tm) v 1.2.0.5234
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<div id="page-container" class="row">

	<div class='.col-md-12'>
		<div class="btn-group pull-right">
<?php
	if (strpos($action, 'add') === false) {
		echo "\t\t\t\t<?php echo \$this->Form->postLink(__(''), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), array('class' => 'icon-trash btn btn-danger'), __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>\n";
	}
    	
    	echo "\t\t\t\t<?php echo \$this->Html->link(__(''), array('action' => 'index'), array('class' => 'btn icon-undo')); ?>\n";
?>
		</div><!-- /.btn-group pull-right -->
		<h2><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></h2>
	</div>

	<div class="<?php echo $pluralVar; ?> form">
	
		<?php echo "<?php echo \$this->Form->create('{$modelClass}', array('role' => 'form', 
			'inputDefaults' => array(
				'div' => array(
					'class' => 'form-group'
				), 'label' => array(
					'class' => 'col-sm-2 control-label no-padding-right'
				),
				'between' => '<div class=\'col-xs-5\'>',
				'after' => '</div>',
				'format' => array('before', 'label', 'between', 'input', 'after', 'error')
			), 'class' => 'form-horizontal')); ?>\n"; ?>

			<fieldset>

<?php
	foreach ($fields as $field) {
		if (strpos($action, 'add') !== false && $field == $primaryKey) {
			continue;
		} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
			if ($field == 'created' || $field == 'modified'){
				echo "\t\t\t\t\t<?php echo \$this->Form->input('{$field}'); ?>\n";	
			} else if (0 === strpos($field, 'is')){
				echo "\t\t\t\t\t<?php echo \$this->Form->input('{$field}', array(
						'class' => 'ace ace-switch',
						'between' => '<div class=\'col-xs-5\'><label>',
						'after' => '<span class=\'lbl\'></span></label></div>',
					)); ?>\n";	
			} else {
				echo "\t\t\t\t\t<?php echo \$this->Form->input('{$field}', array('class' => 'form-control')); ?>\n";
			}
			echo "\t\t\t\t\t\n";
		}
	}
	if (!empty($associations['hasAndBelongsToMany'])) {
		foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
			echo "\t\t\t\t\t<div class=\"form-group\">\n";
			echo "\t\t\t\t\t\t\t<?php echo \$this->Form->input('{$assocName}');?>\n";
			echo "\t\t\t\t\t\n";
		}
	}
	echo "\n";

	echo "\t\t\t\t\t<div class='clear-fix form-action'>\n";
	echo "\t\t\t\t\t\t<div class='col-md-offset-6 col-md-7'>\n";
	echo "\t\t\t\t\t\t\t<?php echo \$this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>\n";
	echo "\t\t\t\t\t\t</div>\n";
	echo "\t\t\t\t\t</div>\n";
?>

			</fieldset>

<?php echo "\t\t\t<?php echo \$this->Form->end(); ?>\n";?>

	</div><!-- /.form -->
		
</div><!-- /#page-container .row-fluid -->
