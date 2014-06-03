<?php
$this->start('script');
	echo $this->Html->script('profile');
$this->end();
?>

<span id="profile" ref="<?php echo (empty($me['file_profile']) ? 'img/icon/icon_user_default.png' : $me['file_profile']);?>"></span>
<span id="cover" ref="<?php echo 'img/index_top_cover.png'?>"></span>

<?php
$this->start('script');
echo $this->Html->script('main');
$this->end();

echo $this->Html->script('jquery-1.9.1');
//echo $this->Html->css('bootstrap.min');
?>

<?php echo $this->element('Users.Users/login_popup'); ?>

<script>
<?php
echo 'var target_group = ' . (isset($target_group) ? json_encode($target_group) : 'null') . ';';
echo 'var target_user = ' . (isset($target_user) ? json_encode($target_user) : 'null') . ';';
echo 'var my_archive = ' . (isset($myarchive) ? 'true' : 'false') . ';';
if (AuthComponent::user('id') != '')
    echo 'var _track = "retention-landing"';
else
    echo 'var _track = "acquisition"';
?>
</script>

<span id="u" data="<?php echo AuthComponent::user('id'); ?>"></span>

<div class="page_body">

    <div class="mid_nav_bar">
        <div class="mid_nav_bar1">

            <div class="nav_bar_item">

                <div class="item_icon">
                    <?php
                    echo $this->Html->link($this->Html->image('Version 2.0/icon_3 colors.png', array('height' => '30',
                                'width' => '50')), '/', array('escape' => false));

                    echo $this->Html->link($this->Html->image('Logo_Dark.png', array('height' => '30',
                                'width' => '50')), '/', array('escape' => false));
                    ?>
                </div>
            </div>

            <div class="nav_bar_item">

                <div class="item_icon">
                    <?php
                    echo $this->Html->link($this->Html->image('Version 2.0/icon_snapask.png', array('height' => '40',
                                'width' => '40')) . '' . ('Snapask'), array('controller' => '', 'action' => ''), array('escape' => false));
                    ?>
                </div>
            </div>


            <div class="nav_bar_item">
                <?php if (AuthComponent::user('role') != ('TUTOR')) { ?>
                    <div class="item_icon">
                        <?php
                        echo $this->Html->link($this->Html->image('icon_vi.png', array('height' => '40',
                                    'width' => '40')) . '' . ('Illustrator'), array('controller' => '', 'action' => ''), array('escape' => false));
                        ?>
                    </div>
                <?php } ?>             
            </div>

            <div class="nav_bar_item">

                <div class="item_icon">
                    <?php
                    echo $this->Html->link($this->Html->image('Version 2.0/icons_fb.png', array('height' => '40', 'width' => '40')) . '' . ('appedu daily'), 'http://facebook.com/appdaily', array('escape' => false));
                    ?>
                </div>
            </div>

            <!--user-->
            <div class="nav_bar_item">
                <div class="item_icon">
                    <?php
                    if (AuthComponent::user('username') != '') {
                        echo $this->Html->tag('div', $this->Html->tag('div', $this->Html->tag('div', $this->Html->image('icon/icon_user_default.png', array('height' => '40',
                                                    'width' => '40'))
                                                , array('class' => 'item_icon', 'escape' => false)) .
                                        AuthComponent::user('username') 
                                        , array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown", 'escape' => false)) .
                                $this->Html->tag('ul', $this->Html->tag('li', $this->Html->link('Profile', array('controller' => 'pages', 'action' => 'profile')), array('escape' => false)) .
                                        $this->Html->tag('li', $this->Html->link('My Archive', array('controller' => 'myarchive')), array('escape' => false)) .
                                        ((AuthComponent::user('role') == 'ADMIN') ?
                                                (
                                                $this->Html->tag('li', '', array('escape' => false, 'class' => 'divider')) .
                                                $this->Html->tag('li', $this->Html->link('Create Group', array('controller' => 'pages', 'action' => 'group_create')), array('escape' => false))) : '') .
                                        $this->Html->tag('li', '', array('escape' => false, 'class' => 'divider')) .
                                        $this->Html->tag('li', $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')), array('escape' => false))
                                        , array('class' => 'dropdown-menu', 'role' => 'menu', 'escape' => false))
                                , array('class' => 'btn-group appedu_button_div_last', 'escape' => false)
                        );
                    } else {
                        echo $this->Html->link(
                                $this->Html->tag('div', $this->Html->image('index_top_login.png', array('height' => '36',
                                            'width' => '36'), array('alt' => 'Archive', 'class' => 'appedu_button_img')).'&nbsp&nbsp&nbsp'.'login / register' . 
                                        $this->Html->tag
                                        , array('class' => 'appedu_button_div_last login_pop', 'escape' => false))
                                , array('controller' => 'users', 'action' => 'login'), array('escape' => false));
                    }
                    ?>
                </div>
            </div>
            
            <div class="nav_bar_item">

                <div class="item_icon">
                    <?php if (AuthComponent::user('role') == ('STUDENT')) { ?> 
                        <?php
                        echo $this->Html->link($this->Html->image('call.jpg', array('height' => '40',
                                    'width' => '120')), array('controller' => '', 'action' => ''), array('escape' => false));
                        ?>
                    <?php } ?> 
                </div>
            </div>

            <div class="nav_bar_item">

                <div class="item_icon">
                    <?php if (AuthComponent::user('role') == ('TUTOR')) { ?> 
                        <?php
                        echo $this->Html->link($this->Html->image('ready.jpg', array('height' => '40',
                                    'width' => '120')), array('controller' => '', 'action' => ''), array('escape' => false));
                        ?>
                    <?php } ?> 
                </div>
            </div>

            <div class="nav_bar_item">

                <div class="item_icon">
                    <?php if (AuthComponent::user('role') == ('ADMIN')) { ?> 
                        <?php
                        echo $this->Html->link($this->Html->image('admin_ready.jpg', array('height' => '40',
                                    'width' => '120')), array('controller' => '', 'action' => ''), array('escape' => false));
                        ?>
                    <?php } ?> 
                </div>
            </div>

            <div class="nav_bar_item">
                <?php if (AuthComponent::user('role') == 'ADMIN') { ?>
                    <div class="item_icon post_btn"><?php echo $this->Html->link($this->Html->image('btn_PostQ.png'), array('controller' => 'pages', 'action' => 'post'), array('escape' => false)); ?></div>
                <?php } ?>
            </div>

            <div class="nav_bar_item">
                <div class="item_dropdown">
                <div class="btn-group">
                    <div class="dropdown-toggle" data-toggle="dropdown">
                        <div class="item_icon">
                            <?php echo $this->Html->image('icon/icon_settings_gray.png', array('height' => '36', 'width' => '36')); ?></div>
                    </div>
                    <ul class="dropdown-menu" role="menu" id="group_menu">

                    </ul>
                </div>
                    </div>

                <?php if (AuthComponent::user('username') != '') { ?>
                    <div class="item_dropdown">
                        <div class="btn-group">
                            <div class="dropdown-toggle" data-toggle="dropdown">
                                <div id='notification' class="item_icon" style="position: relative">
                                    <label id='notificationCount' class="badge alert-danger" style="position: absolute; right: -1px;">
                                        <?php echo $notificationCount; ?>
                                    </label>
                                    <?php echo $this->Html->image('icon/icon_notification_gray.png', array('height' => '36',
                                        'width' => '36'));
                                    ?>
                                </div>

                            </div>
                            <ul class="dropdown-menu" role="menu" id="notification_menu">
                                <?php
                                if (sizeof($notifications) == 0)
                                    echo '<li><a>You do not have any notification at the moment.</a></li>';

                                foreach ($notifications as $notification) {
                                    $liClass = '';
                                    if (!$notification['Notification']['isChecked'])
                                        $liClass = 'new';

                                    $href = '';
                                    if ($notification['Notification']['type'] == 0) {
                                        $href = 'questions/' . $notification['Question']['slug_id'];
                                    } else if ($notification['Notification']['type'] == 1) {
                                        $href = 'groupadmin/' . $notification['Group']['slug'];
                                    } else if ($notification['Notification']['type'] == 2) {
                                        $href = 'user/' . $notification['InitUser']['slug'];
                                    }
                                    echo '<li class="' . $liClass . '"><a href="' . $href . '">' . $notification['Notification']['description'] . '</a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>	
                <?php } ?>
            </div>
        </div><!--end of mid_nav_bar1-->
        </div> <!--end of mid_nav_bar-->
</div> <!--end if page_body-->

<div class="nav_header"></div>

<div class="users index">
	<fieldset>
		<form class="form">
			<div class="form_content">
				<h2>Profile</h2>
				
				<p class="divider"></p>
				<div class="input title required">
					<h3>Username</h3>
					<p class="form-control-static"><?php echo $me['username']; ?></p>
				</div>
				
				<p></p>
				<div class="input required">
					<h3>Gender</h3>
					<p class="form-control-static"><?php echo $me['gender']; ?></p>
				</div>

				<p></p>
				<div class="input title required">
					<h3>Form and Class</h3>
					<p class="form-control-static"><?php echo $me['form_and_class']; ?></p>
				</div>

				<p></p>
				<div class="input title required">
					<h3>Date of Birth</h3>
					<p class="form-control-static"><?php echo $me['dob']; ?></p>
				</div>

			</div>
			
	</fieldset>
</div>
