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

			$this->start('css');
			echo $this->Html->css('index');
			echo $this->Html->css('bootstrap_ios7.min');
			echo $this->Html->css('hot-sneaks/jquery-ui-1.10.3.custom.css');

			// echo $this->Html->css('bootstrap.min');
			// echo $this->Html->css('bootstrap-theme');
			//echo '<!--[if IE 7]>';
			//echo $this->Html->css('font-awesome-ie7.min');
			//echo '<![endif]-->';

			// echo $this->Html->css('ace-fonts');
			// echo $this->Html->css('ace.min');
			// echo $this->Html->css('ace-rtl.min');
			// echo $this->Html->css('ace-skins.min');

			//echo '<!--[if lte IE 8]>';
			//echo $this->Html->css('ace-ie.min');
			//echo '<![endif]-->';

			echo $this->Html->css('main');
			$this->end();

			echo $this->fetch('css');
		?>
		<link href="//vjs.zencdn.net/4.3/video-js.css" rel="stylesheet">
		<script src="//vjs.zencdn.net/4.3/video.js"></script>
		<script>
		var APP_ROOT = '<?php echo $server_root?>';
		</script>
<!-- start Mixpanel --><script type="text/javascript">(function(e,b){if(!b.__SV){var a,f,i,g;window.mixpanel=b;a=e.createElement("script");a.type="text/javascript";a.async=!0;a.src=("https:"===e.location.protocol?"https:":"http:")+'//cdn.mxpnl.com/libs/mixpanel-2.2.min.js';f=e.getElementsByTagName("script")[0];f.parentNode.insertBefore(a,f);b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==
typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");for(g=0;g<i.length;g++)f(c,i[g]);
b._i.push([a,e,d])};b.__SV=1.2}})(document,window.mixpanel||[]);
mixpanel.init("10bd0e6a9771e1f4ab9778bff8ce92ee");</script><!-- end Mixpanel -->
	</head>

	<body>
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<div class="main-content">
					<div class="container">
						<!-- PAGE CONTENT BEGINS -->
						<div class="page_body">
							<?php echo $this->Session->flash(); ?>
						</div>
						<?php echo $this->fetch('content'); ?>
		
						<div class="row">
							<div class="well well-sm">
								<small>
									<?php echo $this->element('sql_dump'); ?>
								</small>
							</div><!-- /.well well-sm -->
						</div><!-- /.container -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
			</div>
		</div><!-- /#main-container -->

		<?php
			//echo '<!--[if lt IE 9]>';
			//echo $this->Html->script('html5shiv');
			//echo $this->Html->script('respond.min');
			//echo '<![endif]-->';

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
			echo $this->Html->script('config');
			echo $this->Html->script('jquery-ui-1.10.3.custom.js');
			echo $this->Html->script('common.js');
			echo $this->Html->script('jquery.form.min.js');
			echo $this->Html->script('question.js');

			echo $this->fetch('script');
		?>
		<script>
//                        $(document).ready(function(){
//                                if (mixpanel != undefined && _track != undefined){
//                                        mixpanel.track(_track);
//                                }
//                        });
                </script>

	</body>
</html>
