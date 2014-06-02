<?php
$this->start('script');
echo $this->Html->script('main');
$this->end();

echo $this->Html->script('jquery-1.9.1');
?>

<span id="u" data="<?php echo AuthComponent::user('id'); ?>"></span>

<div class="page_body">

    <div class="mid_nav_bar">
        <div class="mid_nav_bar3">

            <div class="nav_bar_item">

                <div class="item_icon">
                    <?php
                    echo $this->Html->link($this->Html->image('Version 2.0/icon_3 colors.png', array('height' => '30',
                                'width' => '50')) . '' . ('appedu&nbsp'), array('controller' => 'pages', 'action' => 'index'), array('escape' => false));
                    ?>
                </div>
            </div>

            <div class="nav_bar_item">

                <div class="item_icon">
                    <?php
                    echo $this->Html->link($this->Html->image('Version 2.0/icon_snapask.png', array('height' => '40',
                    'width' => '40')) . '' . ('Snapask&nbsp'), array('controller' => '', 'action' => ''), array('escape' => false));
                    ?>
                </div>
            </div>


            <div class="nav_bar_item">
                <?php if (AuthComponent::user('role') != ('TUTOR')) { ?>
                    <div class="item_icon">
                        <?php
                    echo $this->Html->link($this->Html->image('icon_vi.png', array('height' => '40',
                    'width' => '40', 'id'=>'jasper')) . '' . ('Illustrator&nbsp'), 
                    array('controller' => 'visessions', 'action' => 'call_tutor'), array('escape' => false));
                        ?>
                    </div>
                <?php } ?>             
            </div>

            <div class="nav_bar_item">

                <div class="item_icon">
                    <?php
                    echo $this->Html->link($this->Html->image('Version 2.0/icons_fb.png', array('height' => '40', 'width' => '40')) . '' . ('appedu daily&nbsp&nbsp&nbsp&nbsp'), 'http://facebook.com/appdaily', array('escape' => false));
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
                                        AuthComponent::user('username') . '&nbsp&nbsp&nbsp&nbsp'
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
                                $this->Html->tag('div', $this->Html->image('index_top_login.png', array('alt' => 'Archive', 'class' => 'appedu_button_img')) . '&nbsp' . 'login / register' . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' .
                                        $this->Html->tag
                                        , array('class' => 'appedu_button_div_last login_pop', 'escape' => false))
                                , array('controller' => 'users', 'action' => 'login'), array('escape' => false));
                    }
                    ?>
                </div>
            </div>
            <!--end of user-->
            <div class="nav_bar_item">
                <div class="item_icon">
                    <?php if (AuthComponent::user('role') != ('TUTOR')) { ?> 
                        <div>ready!&nbsp</div>
                    <?php } ?> 
                </div>
            </div>

            <div class="nav_bar_item">

                <div class="item_icon">
                    <?php
                    echo $this->Html->link($this->Html->image('button_on.png', array('height' => '30',
                    'width' => '55')), array('controller' => '', 'action' => ''), array('escape' => false));
                    ?>
                </div>
            </div>

            <div class="nav_bar_item">
                <?php if (AuthComponent::user('role') == 'ADMIN') { ?>
                    <div class="item_icon post_btn"><?php echo $this->Html->link($this->Html->image('btn_PostQ.png'), array('controller' => 'pages', 'action' => 'post'), array('escape' => false)); ?></div>
                <?php } ?>
            </div>

            <div class="nav_bar_item">
                <?php if (AuthComponent::user('username') != '') { ?>
                    <div class="item_dropdown">
                        <div class="btn-group">
                            <div class="dropdown-toggle" data-toggle="dropdown">
                                <div id='notification' class="item_icon" style="position: relative">
                                    <?php echo $this->Html->image('icon/icon_notification_black.png'); ?>
                                    <label id='notificationCount' class="badge alert-danger" style="position: absolute; right: -1px;">
                                        <?php echo $notificationCount; ?>
                                    </label>
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
            <div class="nav_bar_item">
                <div class="btn-group">
                    <div class="dropdown-toggle" data-toggle="dropdown">
                        <div class="item_icon"><?php echo $this->Html->image('icon/icon_settings_black.png'); ?></div>
                    </div>
                    <ul class="dropdown-menu" role="menu" id="group_menu">

                    </ul>
                </div>
            </div>
        </div><!--end of mid_nav_bar1-->
    </div> <!--end of mid_nav_bar-->
</div> <!--end if page_body-->

<!--<style>
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
</style>-->

<?php
echo "<br />";
echo $this->Form->create('Visession', array('class' => 'form','action' => 'http://localhost:8080/'));
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSubjects";
echo $this->Form->input('Subjects',array('label' => ' ','type'=>'select','options'=>$subjects2,'id' => 'subjectsList'));
//echo $this->Form->input('Subjects',array('label' => 'Subjects','type'=>'select','options'=>$subjects2,'id' => 'subjectsList'));
echo $this->Form->end('Call');
echo $this->Form->end();
?>

<div id="no_tutor_dialog" title="No available tutors"></div>
    <div id="call_tutor_dialog" title="Contact tutor">
        <span id="tutor" style="background-color:  #0FA74B"></span>
    </div>

    <script>

        //        window.open("http://localhost:8888/whiteboard/init"+sipAddress,'_blank');

        var subject_id = $('#subjectsList').val();

        $.ajax({
        type: 'post',
                url: '<?php echo $this->Html->url(array('action' => 'list_tutors', 'ext' => 'json')); ?>',
                data: {subjectId: subject_id},
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                },
                dataType: "text",
                success: function(response) {

                    var parsedData = JSON.parse(response);
                    if (parsedData.length != 0)
                    {
                        for (x = 0; x < parsedData.length; x++) {
                            tutorId = parsedData[x].Tutors.sip_address;
                            tutorName = parsedData[x].User.username;

                            if (tutorId)
                            {
                            }
                            else
                            {
                                console.info("empty");
                            }
                        }
                    }
                    else
                    {
                        $("#no_tutor_dialog").dialog("open");
                    }

                    if (response.error) {
                        alert(response.error);
                        console.log(response.error);
                    }

                    if (response.content) {
                    }

                },
                error: function(e) {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                }

        });
    </script>

    <div class="side_content"></div>


