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
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<div id="page-container" class="row">

	<div class="<?php echo $pluralVar; ?> index">
		<div class='.col-md-12'>
			<div class="btn-group pull-right">
				<?php echo "<?php echo \$this->Html->link(__(' '), array('action' => 'add'), array('class' => 'btn btn-primary icon-plus')); ?>"; ?>
			</div>
			<h2><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h2>
		</div>
		
		<div class="table-responsive">
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
				<thead>
					<tr>
		<?php foreach ($fields as $field): ?>
			<th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
		<?php endforeach; ?>
			<th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
					</tr>
				</thead>
				<tbody>
<?php 
	echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
	echo "\t<tr>\n";
	foreach ($fields as $field) {
		$isKey = false;
		if (!empty($associations['belongsTo'])) {
			foreach ($associations['belongsTo'] as $alias => $details) {
				if ($field === $details['foreignKey']) {
					$isKey = true;
					echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
					break;
				}
			}
		}
		if ($isKey !== true) {
			echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
		}
	}

	echo "\t\t<td class=\"actions\">\n";
	echo "<div class='btn-group'>";
	echo "\t\t\t<?php echo \$this->Html->link(__(''), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-success icon-eye-open')); ?>\n";
	echo "\t\t\t<?php echo \$this->Html->link(__(''), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-warning icon-edit')); ?>\n";
	echo "\t\t\t<?php echo \$this->Form->postLink(__(''), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-danger icon-trash'), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
	echo "</div>";
	echo "\t\t</td>\n";
	echo "\t</tr>\n";

	echo "<?php endforeach; ?>\n";
?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->
		
		<p><small>
			<?php echo "<?php
				echo \$this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
			?>\n"; ?>
		</small></p>

		<ul class="pagination">
			<?php
				echo "<?php\n";
				echo "\t\t\t\t\techo \$this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));\n";
				echo "\t\t\t\t\techo \$this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));\n";
				echo "\t\t\t\t\techo \$this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));\n";
				echo "\t\t\t\t?>\n";
			?>
		</ul><!-- /.pagination -->
		
	</div><!-- /.index -->
	
</div><!-- /#page-container .row-fluid -->
