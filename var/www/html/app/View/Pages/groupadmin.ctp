<?php
$this->start('script');
	echo $this->Html->script('groupadmin');
$this->end();
?>

<span id="group_id" ref="<?php echo $group_info['Group']['id']; ?>"></span>
<span id="profile" ref="<?php echo $group_info['Group']['file_profile'];?>"></span>
<span id="cover" ref="<?php echo $group_info['Group']['file_cover'];?>"></span>

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
		<form class="form" id="ProfileForm" method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?php echo $this->Html->url(array('controller'=>'Groups', 'action'=>'edit', 'plugin'=>'Api', 'ext'=>'json')); ?>">
			<div class="form_content">
				<h3>Group Profile</h3>
				<input type='hidden' value="<?php echo $group_info['Group']['id']; ?>" name="data[Group][id]" />
				<input type='hidden' value="<?php echo $group_info['Group']['slug']; ?>" name="data[Group][slug]" />
				<input type='hidden' value="<?php echo $group_info['Group']['file_cover']; ?>" name="data[Group][file_cover]" />
				<input type='hidden' value="<?php echo $group_info['Group']['file_profile']; ?>" name="data[Group][file_profile]" />
				<div class="input title required">
					<label for="name">Group name</label>
					<input placeholder="Group name" id="name" required="required" class="form-control" type="text" name="data[Group][name]" value="<?php echo $group_info['Group']['name']; ?>">
				</div>
				<p class="divider"></p>
				<div class="input required">
					<label for="oldpassword">Description</label>
					<input placeholder="Description" type="text" id="description" required="required" class="form-control" name="data[Group][description]" value="<?php echo $group_info['Group']['description']; ?>" />
				</div>

				<p></p>
				<div class="input required">
					<label for="newpassword">Focus</label>
					<select name="data[Group][focus_id]" class="form-control">
						<?php
							foreach ($focus as $f ) {
								echo '<option value="'.$f['Focus']['id'].'" '.($f['Focus']['id']==$group_info['Group']['focus_id']?'selected="selected"':'').'>'.$f['Focus']['abbr'].'</option>';
							}
						?>
					</select>
				</div>

				<p></p>
				<div class="input required">
					<div for="type">Type</div>
					<!-- <select id="type" required="required" class="form-control" name="data[Group][type]">
						<option value="0">Public</option>
						<option value="1">Private</option>
					</select> -->
					<div>&nbsp;</div>

					<div class="col-xs-6">
					<input type="radio" name="data[Group][type]" id="ispublic" class="custom" <?php echo ($group_info['Group']['type']=='0')?'checked="checked"':''; ?> value="0"><label for="ispublic"><span>Public</span></label></div>
					<div class="col-xs-6">
					<input type="radio" name="data[Group][type]" id="isprivate" class="custom" <?php echo ($group_info['Group']['type']=='1')?'checked="checked"':''; ?> value="1"><label for="isprivate"><span>Private</span></label></div>
				</div>

				<div>&nbsp;</div>
				<p class="divider"></p>
				<div class="input required">
					<label for="type">Cover Image(1024x341)</label>
					<input type="file" name="data[file_cover]" class="form-control" />
				</div>

				<p></p>
				<div class="input required">
					<label for="type">Group Icon(180x180)</label>
					<input type="file" name="data[file_profile]" class="form-control" />
				</div>

			</div>
			<div class="controls"><div class="option_btn col-xs-12" id="submitBtn">Update Group</div></div></form>
	</fieldset>
	<hr />
	<h2>Group members</h2>
	<?php
		foreach ($group_info['GroupsUser'] as $group_user) {
			$map_user = null;
			foreach ($group_info['User'] as $user) {
				if($group_user['user_id'] == $user['id']){
					$map_user = $user;
					break;
				}
			}
			echo '<div class="group_admin_user" uid="'.$group_user['user_id'].'">';
			echo '<div class="user_info">'.$map_user['username'].' (<span class="user_role">'.$group_user['status'].'</span>)</div>';
			echo '<div class="user_controls">';

			if($group_user['status']=='PENDING'){
				echo '<button class="btn btn-danger btn-xs reject"><span class="ion-close-round"></span> Reject</button> ';
				echo '<button class="btn btn-success btn-xs accept"><span class="ion-checkmark-round"></span> Accept</button> ';
			}else if($group_user['status']=='JOINED'){
				echo '<button class="btn btn-danger btn-xs reject"><span class="ion-close-round"></span> Kick out</button> ';
				echo '<button class="btn btn-info btn-xs admin"><span class="ion-person-add"></span> Make admin</button>';
			}
			echo '</div>';
			echo '<div class="clear"></div>';
			echo '</div>';
		}
	?>
</div>
