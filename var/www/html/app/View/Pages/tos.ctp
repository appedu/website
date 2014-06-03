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

<b>Terms of Service</b><br>
LAST UPDATED: 7 May 2014<br>
 <br>
1. We are Apprendre Education Limited and we own and operate the Appedu Circle and Snapask ('Appedu Products').<br>
2. Your use of the Appedu Products is subject to these Terms of Service. By using the Appedu Products, you will be deemed to have accepted and agreed to be bound by these Terms of Service. We may make changes to these Terms of Service from time to time. We may notify you of such changes by any reasonable means, including by posting the revised version of these Terms of Service on the Appedu Products. You can determine when we last changed these Terms of Service by referring to the 'LAST UPDATED' statement above. Your use of the Appedu Products following changes to these Terms of Service will constitute your acceptance of those changes.<br>
3. You are responsible for all access to the Appedu Products using your Internet connection, even if the access is by another person.<br>
4. We reserve the right to restrict your access to the Appedu Products or part of it. Access to restricted areas of the Appedu Products may be subject to registration and other conditions. If we grant you permission to access a restricted area, we may withdraw that permission at any time (including where you breach any of these Terms of Service). Your conducts in accessing the restricted area are bound by the Rules of Use of Appedu Products. You can view a copy of the Rules by clicking here (<a href="http://appedu.co/tos">http://appedu.co/tos</a>).<br>
5. We will use reasonable efforts to ensure that the Appedu Products is available at all times. However, we cannot guarantee that the Appedu Products or any individual function or feature of the Appedu Products will always be available and/or error free. In particular, the Appedu Products may be unavailable during periods when we are implementing upgrades to or carrying out essential maintenance on the Appedu Products.<br>
6. The intellectual property rights in the Appedu Products and all of the text, pictures, videos and other content made available on it are owned by us and our licensors. You may not print or otherwise make copies of any such content without our express prior permission.<br>
7. We provide the Appedu Products on an 'as is' basis and make no representations as to the quality, completeness or accuracy of any content made available on the Appedu Products. To the maximum extent permitted by law, we expressly exclude:<br>
all conditions, warranties and other terms that might otherwise be implied by law into these Terms of Service; and<br>
any and all liability to you, whether arising under these Terms of Service or otherwise in connection with your use of the Appedu Products. <br>
The foregoing is a comprehensive limitation of liability that applies to all damages of any kind, including (without limitation) compensatory, direct, indirect or consequential damages, loss of data, income or profit, loss of or damage to property and claims of third parties. Notwithstanding the foregoing, nothing in these Terms of Service is intended to exclude or limit any liability that may not by law be excluded or limited, and in particular none of the exclusions and limitations in this clause are intended to limit any rights you may have as a consumer under local law or other statutory rights which may not be excluded, nor in any way to exclude or limit (Appedu Products owners) liability to you for death or personal injury resulting from our negligence or that of our employees or agents.<br>
8. Your permission to use the Appedu Products is personal to you and non-transferable, and you may not use the Appedu Products for commercial purposes. Your use of the Appedu Products is conditional on your compliance with the rules of conduct set forth in these Terms of Service and you agree that you will not:<br>
use the Appedu Products for any fraudulent or unlawful purpose; <br>
use the Appedu Products to defame, abuse, harass, stalk, threaten or otherwise violate the rights of others, including without limitation others' privacy rights or rights of publicity; <br>
impersonate any person or entity, falsely state or otherwise misrepresent your affiliation with any person or entity in connection with the Appedu Products; or express or imply that we endorse any statement you make; <br>
interfere with or disrupt the operation of the Appedu Products or the servers or networks used to make the Appedu Products available; or violate any requirements, procedures, policies or regulations of such networks; <br>
transmit or otherwise make available in connection with the Appedu Products any virus, worm, Trojan horse or other computer code that is harmful or invasive or may or is intended to damage the operation of, or to monitor the use of, any hardware, software, or equipment;<br>
reproduce, duplicate, copy, sell, resell, or otherwise exploit for any commercial purposes, any portion of, use of, or access to the Appedu Products; <br>
modify, adapt, translate, reverse engineer, decompile or disassemble any portion of the Appedu Products. If you wish to reverse engineer any part of the Appedu Products to create an interoperable program you must contact us and we may provide interface data subject to verification of your identity and other information; <br>
remove any copyright, trade mark or other proprietary rights notice from the Appedu Products or materials originating from the Appedu Products; <br>
frame or mirror any part of the Appedu Products without our express prior written consent; <br>
create a database by systematically downloading and storing Appedu Products content; <br>
use any manual or automatic device in any way to gather Appedu Products content or reproduce or circumvent the navigational structure or presentation of the Appedu Products without our express prior written consent. Notwithstanding the foregoing, we grant the operators of public online search engines limited permission to use search retrieval applications to reproduce materials from the Appedu Products for the sole purpose of and solely to the extent necessary for creating publicly available searchable indices of such materials solely in connection with each operator's public online search service. <br>
We reserve the right to revoke these exceptions either generally or in specific instances.<br>
 <br>
9. The Appedu Products may provide links to other websites and online resources. We are not responsible for and do not endorse such external websites or resources. Your use of third party websites and resources is at your own risk.<br>
10. You may create a link to this Appedu Products, provided that:<br>
the link is fair and legal and is not presented in a way that is: <br>
misleading or could suggest any type of association, approval or endorsement by us that does not exist, or <br>
harmful to our reputation or the reputation of any of our affiliates; <br>
you retain the legal right and technical ability to immediately remove the link at any time, following a request by us to do so; <br>
11. We may collect and use information about you in accordance with our privacy policy. You can view a copy of this policy by clicking here (<a href="http://appedu.co/privacy">http://appedu.co/privacy</a>).<br>
12. These Terms of Service are effective until terminated. We may, at any time and for any reason, terminate your access to or use of the Appedu Products. If we terminate your access to the Appedu Products you will not have the right to bring claims against us or our affiliates with respect to such termination. We and our affiliates shall not be liable for any termination of your access to the Appedu Products.<br>
13. These Terms of Service will be governed by and construed in accordance with the laws of Hong Kong, and the courts of Hong Kong will have non-exclusive jurisdiction over any claim or dispute arising under or in connection with these Terms of Service.
<br>
<br>
<b>Rules of Use of Appedu Products</b><br>
 <br>
These rules, the Terms of Service, together with our Privacy Policy govern all activities in Appedu Circle and Snapask (“Appedu Products”) and on this site generally. In using Appedu Products, you agree to be bound by them.<br>
 <br>
1  Your registration obligations<br>
In consideration of your use of Appedu Products, you agree to:<br>
provide true, accurate, current and complete information about yourself when filling out our registration form; and <br>
maintain and promptly update your registration information to keep it true, accurate, current and complete. If we have reasonable grounds to suspect that any information is untrue, inaccurate, not current or incomplete, we have the right to suspend or terminate your registration. <br>
Your screen name will be used to identify you in online content exchange areas. Have fun with your screen name but note that vulgar or offensive names will constitute a breach of these rules.<br>
If you are offended by another user's screen name, please email us at enquiry@appedu.hk immediately. Similarly if you are unsure about whether a screen name you would like to use may breach these rules, email enquiry@appedu.hk for advice.<br>
We are concerned about the safety and privacy of all our users, particularly children. Please remember that our content exchange areas are designed to appeal to a broad audience. Accordingly, it is your responsibility to determine whether any use of the content exchange areas and our site is appropriate for a child.<br>
2  Privacy policy<br>
Details provided by you and certain other information about you is subject to our Privacy Policy (<a href="http://appedu.co/privacy">http://appedu.co/privacy</a>).<br>
 <br>
3  Online conduct<br>
You understand that all data, text, software, music, sound, photographs, graphics, video, messages or other materials ('content'), whether publicly posted or privately transmitted, are the sole responsibility of the person from whom the content originated. This means that you, and not Apprendre Education Limited, are entirely responsible for all content that you upload, post or email via our content exchange areas and our site. We do not control the content posted via any content exchange area and therefore do not guarantee the accuracy, integrity or quality of the content.<br>
Under no circumstances will we be liable in any way for any content, including (without limitation) any errors or omissions in any content, or for any loss or damage of any kind incurred as a result of your use of any content. You agree that you must evaluate and bear all risks associated with the use of any content including any reliance on its accuracy or completeness. You also understand that by using our content exchange areas and our site, you may be exposed to content that is offensive, indecent or objectionable.<br>
You agree that you will not use any content exchange area or any part of our site to:<br>
upload, post or email any content that is unlawful, harmful, threatening, abusive, harassing, tortious, defamatory, vulgar, obscene, libellous, invasive of another's privacy, hateful or racially, ethnically or otherwise objectionable; <br>
harm minors in any way; <br>
impersonate any person or entity, falsely state or otherwise misrepresent your affiliation with a person or entity or disguise the origin of any content; <br>
'stalk' or otherwise harass another;<br>
collect or store personal data about other users; <br>
upload, post or email any content that you do not have a right to transmit under any law or under contractual or fiduciary relationships; <br>
upload, post or email any content that infringes any intellectual property rights of any party; <br>
upload, post or email any unsolicited or unauthorised advertising, promotional materials, 'junk mail', 'spam', 'chain letters' or any other form of solicitation; <br>
upload, post or email any content that contains computer viruses or any other computer code, files or programs designed to interrupt, destroy or limit the functionality of any computer software, hardware or telecommunications equipment; <br>
disrupt the normal flow of dialogue, cause a screen to 'scroll' faster than other users of the content exchange areas are able to type, or otherwise act in a manner that negatively affects other users' ability to engage in real time exchanges; or <br>
violate any applicable national or international laws or regulations. <br>
You acknowledge that we do not pre-screen content but that we shall have the right (though not the obligation) in our sole discretion to move, modify or remove any content that is available on or via any content exchange area or our site generally.<br>
 <br>
4  Licence<br>
You grant to us a worldwide, royalty-free, irrevocable, non-exclusive licence (including the right to sub-license) to use, reproduce, modify, adapt, publish, translate, create derivative works from, distribute, perform or display any content (in whole or part) you upload, post or email and/or to incorporate such content in other works in any form, media or technology now known or developed.<br>
 <br>
5  Indemnity<br>
You agree to indemnify and hold us and our subsidiaries, affiliates, employees, officers, agents or partners harmless from and against any direct or indirect loss or damage (including consequential loss and loss of profits, goodwill or business opportunities) arising from any third party claim in relation to any content you upload, post or email on or through our content exchange areas or our site, your use of the content exchange areas and our site, or your breach of the provisions of these rules.<br>
 <br>
6  Sanctions<br>
As soon as we are made aware of activities that breach these rules, our terms and conditions, the Terms of Service or our Privacy Policy, prompt action will be taken. If you witness such breaches in the content exchange areas or anywhere else in our site, please notify enquiry@appedu.hk immediately.<br>
On being made aware of any such breaches, we may ban, delete or prohibit any content that relates to those breaches or that we judge harmful to individuals or the rights of Apprendre Education Limited or any of our affiliates, licensors or partners.<br>
We reserve the right to take whatever action we deem necessary to prevent such breaches including the following:<br>
breaches we deem minor may result simply in receipt of a warning from enquiry@appedu.hk; or<br>
breaches we deem serious may result in your automatic ban from our content exchange areas and our site generally. <br>
All incidents will be logged and our decision is final in all such cases.<br>
Any breaches may lead to us reporting your activities to your Internet service provider, your employer, relevant authorities, or to legal action being taken against you, or both.<br>
In addition we may at any time move, modify or remove any content or take further legal action as a result of breaches or suspected breaches of these rules, the Terms of Service, our Privacy Policy, any applicable laws or regulations, or where our rights or third party rights are threatened or infringed.
