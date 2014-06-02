<?php
$ROOT = '__root';

$nodes = Configure::read('SideBar.Tree');

function iconOfTreenode($nodeName){
	$iconClass = Configure::read('SideBar.Icon');	

	if (array_key_exists($nodeName, $iconClass)) {
		return $iconClass[$nodeName];
	}

	return 'icon-table';
}

function nodesToHtml($nodes, $current, $cake, $parentNode = '__ROOT'){
	$result = '';
	foreach ($nodes as $key => $child) {
		$isCurrent = false;

		if(is_array($child)){
			if (in_array($current['controller'], $child)) {
				$isCurrent = true;
			}

			$liClass = '';

			if($isCurrent && (strpos($current['action'], 'index')!==false || strpos($current['action'], 'add')!==false)){
				$liClass =' class="active open"';
			}else if($isCurrent){
				$liClass = ' class="active"';
			}

			echo '<li'.$liClass.'>';
			echo $cake->Html->link($cake->Html->tag('i', '', array('class'=> iconOfTreenode($key))) . $cake->Html->tag('span', ucfirst($key), array('class'=>'menu-text')) . '<b class="arrow icon-angle-down"></b>', '#', array('escape' => false, 'class'=>'dropdown-toggle'));
				echo '<ul class="submenu">';

				nodesToHtml($child, $current, $cake, $key);

				echo '</ul>';

			echo '</li>';
		}else{
			if ($current['controller']==$child) {
				$isCurrent = true;
			}

			$liClass = '';

			if($isCurrent && (strpos($current['action'], 'index')!==false || strpos($current['action'], 'add')!==false)){
				$liClass =' class="active open"';
			}else if($isCurrent){
				$liClass = ' class="active"';
			}

			echo '<li'.$liClass.'>';

			echo $cake->Html->link($cake->Html->tag('i', '', array('class'=> iconOfTreenode($child))) . $cake->Html->tag('span', ucfirst($child), array('class'=>'menu-text')) . '<b class="arrow icon-angle-down"></b>', array('action' => 'index', 'controller' => $child), array('escape' => false, 'class'=>'dropdown-toggle'));

				echo '<ul class="submenu">';
					echo '<li'.((strpos($current['action'],'index')!==false && $isCurrent)?' class="active"':' ').'>';
							 
					echo $cake->Html->link($cake->Html->tag('i', '', array('class'=>'icon-th-list')) . 'Overview', array('action' => 'index', 'controller' => $child), array('escape' => false));
							
					echo '</li>';
					echo '<li'.((strpos($current['action'],'add')!==false && $isCurrent)?' class="active"':' ').'>';
							
					echo $cake->Html->link($cake->Html->tag('i', '', array('class'=>'icon-plus')) . 'Create', array('action' => 'add', 'controller' => $child), array('escape' => false));
							
					echo '</li>';
				echo '</ul>';

			echo '</li>';
		}
	}
/*
<?php foreach($nodes as $key => $child) : ?>
	<?php 
		$isCurrent = ($ == $currentController);
		$isExisting = false;
		$pluginRoot = '';
		foreach ($list_of_controller as $plugin => $c){
			// pr($c);
			if (strpos($c, $pClass. 'controller') !== false){
				$isExisting = true;
				// $pluginRoot = $plugin;
				// if($pluginRoot==$ROOT){
				// 	$pluginRoot = '';
				// }

				// $isCurrent = $isCurrent && ($currentPlugin==$pluginRoot);

				break;
			}
		}
	?>
	<?php if ($isExisting) : ?>
		<li <?php if($isCurrent && (strpos($action, 'index')!==false || strpos($action, 'add')!==false)) echo 'class="active open"'; else if($isCurrent) echo 'class="active"'; ?>>
			<?php 
				echo $this->Html->link($this->Html->tag('i', '', array('class'=>'icon-table')) . $this->Html->tag('span', ucfirst($table), array('class'=>'menu-text')) . '<b class="arrow icon-angle-down"></b>', array('action' => 'index', 'controller' => $pClass, 'plugin' => $pluginRoot), array('escape' => false, 'class'=>'dropdown-toggle'));
			 ?>

			 <ul class="submenu">
			 	<li <?php if(strpos($action,'index')!==false && $isCurrent) echo 'class="active"'; ?>>
					<?php 
						echo $this->Html->link($this->Html->tag('i', '', array('class'=>'icon-th-list')) . 'Overview', array('action' => 'index', 'controller' => $pClass, 'plugin'=>$pluginRoot), array('escape' => false));
					 ?>
				</li>
				<li <?php if(strpos($action,'add')!==false && $isCurrent) echo 'class="active"'; ?>>
					<?php 
						echo $this->Html->link($this->Html->tag('i', '', array('class'=>'icon-plus')) . 'Create New '. ucfirst($table), array('action' => 'add', 'controller' => $pClass, 'plugin'=>$pluginRoot), array('escape' => false));
					 ?>
				</li>
			</ul>
		</li>
	<?php endif; ?>
*/

}

// $db = ConnectionManager::getDataSource('default');

// $list_of_tables = $db->listSources();

$list_of_controller = array();
$list_of_controller[$ROOT] = strtolower(implode(',', App::objects('controller')));

// search for plugin controller
// $plugins = App::objects('plugin');

// foreach($plugins as $p){
// 	$list_of_controller[strtolower($p)] = strtolower(implode(',',App::objects("$p.controller")));
// }

// $currentPlugin = $this->params['plugin'];

$currentInfo = array(
	'controller'=>$this->params['controller'],
	'action'=>$this->params['action'],
	'plugin'=>$this->params['plugin'],
	);

?>

<div class="sidebar-shortcuts" id="sidebar-shortcuts">
	<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
		<button class="btn btn-success">
			<i class=""></i>
		</button>

		<button class="btn btn-info">
			<i class=""></i>
		</button>

		<button class="btn btn-warning">
			<i class=""></i>
		</button>

		<button class="btn btn-danger">
			<i class=""></i>
		</button>
	</div>

	<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
		<span class="btn btn-success"></span>

		<span class="btn btn-info"></span>

		<span class="btn btn-warning"></span>

		<span class="btn btn-danger"></span>
	</div>
</div><!-- #sidebar-shortcuts -->

<ul class="nav nav-list">

<?php nodesToHtml($nodes, $currentInfo, $this);


?>
    
    

</ul><!-- /.nav-list -->
