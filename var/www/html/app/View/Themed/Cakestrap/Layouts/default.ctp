<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<?php echo $this->Html->docType('html5'); ?> 
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php echo $title_for_layout; ?>
		</title>
		<?php
			echo $this->Html->meta('icon');
			
			echo $this->fetch('meta');

			echo $this->Html->css('bootstrap.min');
			echo $this->Html->css('font-awesome.min');
			//echo '<!--[if IE 7]>';
			//echo $this->Html->css('font-awesome-ie7.min');
			//echo '<![endif]-->';

			echo $this->Html->css('ace-fonts');
			echo $this->Html->css('ace.min');
			echo $this->Html->css('ace-rtl.min');
			echo $this->Html->css('ace-skins.min');
			// echo $this->Html->css('bootstrap-datetimepicker.min');

			//echo '<!--[if lte IE 8]>';
			//echo $this->Html->css('ace-ie.min');
			//echo '<![endif]-->';

			echo $this->Html->css('main');

			echo $this->fetch('css');
		?>
	</head>

	<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
			<?php echo $this->element('menu/admin_top_menu'); ?>
		</div>
		
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>
				
				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>
					
					<?php if(AuthComponent::user('role')=='ADMIN') echo $this->element('menu/admin_side_bar'); ?>
					
					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>
				
				<div class="main-content">
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php echo $this->Session->flash(); ?>
								<?php echo $this->fetch('content'); ?>
		
								<div class="container">
									<div class="well well-sm">
										<small>
											<?php echo $this->element('sql_dump'); ?>
										</small>
									</div><!-- /.well well-sm -->
								</div><!-- /.container -->
								<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
									<i class="icon-double-angle-up icon-only bigger-110"></i>
								</a>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
			</div>
		</div><!-- /#main-container -->

		<?php
			echo '<!--[if !IE]> -->';
			echo $this->Html->script('jquery-2.0.3.min');
			echo '<!-- <![endif]-->';

			//echo '<!--[if IE]>';
			//echo $this->Html->script('jquery-1.10.2.min');
			//echo '<![endif]-->';

			echo $this->Html->script('jquery.mobile.custom.min');
			echo $this->Html->script('bootstrap.min');
			echo $this->Html->script('typeahead-bs2.min');
			echo $this->Html->script('ace-elements.min');
			echo $this->Html->script('ace.min');
			echo $this->Html->script('ace-extra.min');
			// echo $this->Html->script('bootstrap-datetimepicker');

			//echo '<!--[if lt IE 9]>';
			//echo $this->Html->script('html5shiv');
			//echo $this->Html->script('respond.min');
			//echo '<![endif]-->';

			echo $this->fetch('script');
		?>
<script type="text/javascript">
$(document).ready(function(){
	$('.datetime').datetimepicker({
      language: 'en',
      pick12HourFormat: true
    });
});
</script>
	</body>
</html>
