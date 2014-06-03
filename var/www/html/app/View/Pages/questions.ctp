<?php
$this->start('script');
	echo $this->Html->script('profile');
$this->end();
// print_r($question);

$this->start('meta');
	echo $this->Html->meta(array('property' => 'og:title', 'content' => $question['Question']['title']));
	if (!empty($question['Attachment'])) {
		foreach ($question['Attachment'] as $attachment){
			if ($attachment['type'] == 0){
				echo $this->Html->meta(array('property' => 'og:image', 'content' => $this->Html->url('../' . $attachment['file_path'], true)));
				break;
			}
		}
	}else{
		echo $this->Html->meta(array('property' => 'og:image', 'content' => $this->Html->url('../img/xindex_top_logo.png', true)));
	}
	echo $this->Html->meta(array('property' => 'og:description', 'content' => $question['Question']['description']));
$this->end();
?>
<script>
	var _track = 'retention-answer-view';
	var followCount = <?php echo $followCount; ?>;
</script>

<div class='questions_top_nav row'>
	<div class='pull-left nav_left'>
		<?php 
                
                echo $this->Html->link('&lsaquo; ' . $this->Html->image('Version 2.0/icon_3 colors.png',array('height' => '30',
                                'width' => '50'), array('class' => 'question_icon')), '/', array('escape'=>false)); 
                
                echo $this->Html->link($this->Html->image('Logo_White.png',array('height' => '50',
                                'width' => '70'), array('class' => 'question_icon')) , '/', array('escape'=>false)); 
                
                ?>
	</div>
	<div class='pull-right nav_right'>
		<!-- <span class='item'><?php echo $this->Html->link($this->Html->image('icon/icon_flag_wbase.png', array('class' => 'question_icon')) . ' My Archive', array('controller'=>'myarchive', 'action'=>''), array('escape'=>false)); ?></span> -->
		<!-- <span class='item' style='color: white'><?php echo $this->Html->image('icon/icon_flag_wbase.png', array('class' => 'question_icon')) . ' My Archive'; ?></span>
		<span class='item'> -->
			<label>
				<div class='inputItem'>
					<?php echo $this->Html->image('icon/icon_circle_withbase.png', array('class' => 'question_icon inputLogo')) ?>
				</div>
				<div class='inputItem'>
					<span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
					<input type="text" placeholder="Group/People" class="form-control ui-autocomplete-input" id="group_search" autocomplete="off" />
				</div>
			</label>		
		
		<span class='item' style='display:none'>
			<!-- Single button -->
			<div class="btn-group inputLogo">
			  <div class="dropdown-toggle" data-toggle="dropdown">
			  	<div class="item_icon" style='display:inline'>
			  		<?php echo $this->Html->image('icon/icon_settings.png', array('class' => 'question_icon')) ?>
			  	</div><span class="caret"></span>
			  </div>
			  <ul class="dropdown-menu" role="menu">
			    <li><a href="#">Action</a></li>
			    <li><a href="#">Another action</a></li>
			    <li><a href="#">Something else here</a></li>
			    <li class="divider"></li>
			    <li><a href="#">Separated link</a></li>
			  </ul>
			</div>

		</span>
	</div>
</div>

<div class='row'>
	<div class='question_title row'>
		<div class='pull-left'>
			<?php echo $this->Html->image('icon/icon_'.strtolower(Inflector::slug($question['Topic']['Subject']['abbr'])).'.png', array('class' => 'question_icon')) ?>
			<span><?php echo $question['Question']['title'] ?></span>
		</div>
		<div class='pull-right'>
			<span class='item'>
				<?php echo $this->Html->image('icon/icon_'.strtolower(Inflector::slug($question['Topic']['abbr'])).'.png', array('class' => 'question_icon inputLogo')) ?>
				<?php echo $question['Topic']['abbr'] ?>
			</span>
			<span class='item'>
				<span class='inputItem followicon'>
					<?php echo $this->Html->image('icon') ?>
				</span>
			</span>	
<!-- 			<span class=''>
				<?php echo $this->Html->image('icon/icon_tag.png', array('class' => 'question_icon inputLogo')) ?>
				<?php 
					foreach ($question['Tag'] as $tag)
						echo $tag['name'] . (($tag === end($question['Tag'])) ? '' : ' | ');
				?>
			</span> -->
		</div>
	</div>

	<div class='question_gallery row'>
		<?php if (!empty($question['Attachment'])) { ?>
		<div class='main'>
			<div class='left'>
				<?php 
					echo $this->Html->image('bg_overlay.png', array('class' => 'gallery hide'));
					echo $this->Html->media(array('init.mp4'), array('id' => 'videojs', 'tag' => 'video', 'class' => 'hide video-js vjs-default-skin video-js vjs-big-play-centered', 'controls' => 'controls', 'preload' => 'auto', 'width' => '755', 'height' => '500')); 
				?>
			</div>
			<div class='right'>
				<?php 
					foreach ($question['Attachment'] as $attachment){
						if ($attachment['type'] == 0)
							echo $this->Html->image('../' . $attachment['file_path'], array('class' => 'thumbnail', 'data-type' => '0'));
						else 
							echo $this->Html->image('video_thumbnail.png', array('class' => 'thumbnail', 'data-type' => '1', 'data-src' => '../../' . $attachment['file_path'], 'data-mine' => $attachment['file_ext']));
					}
				?>
			</div>
		</div>
		<?php } ?>
	</div>

	<div class='question_function row'>
		<div class="postinfo">
			<div class="posticon info_col">
				<?php echo $this->Html->image('icon/icon_appedupoints.png') ?>
			</div>
			<div class="info_col text_content">
				<div><?php echo $question['Question']['score']; ?></div>
			</div>
			<div class="posticon info_col">
				<?php echo $this->Html->image('icon/icon_answer.png') ?>
			</div>
			<div class="info_col text_content">
				<div class="ans_way"><p><?php echo count($question['Answer']); ?> way</p></div>
			</div>
			<div class="posticon icon_with_text info_col letmeanswer_item" data-toggle="modal" data-target="#modal_answer">
				<?php echo $this->Html->image('icon/icon_raisehand.png') ?><p>Let me answer</p>
			</div>
			<div class="posticon icon_with_text info_col">
				<!-- <?php //echo $this->Html->image('icon/icon_flag.png') ?><p>archive flag</p> -->
			</div>
			<div class="posticon icon_with_text info_col">
				<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" target="_blank">
					<?php echo $this->Html->image('icon/icon_fb.png') ?><p>fb share</p>
				</a>
			</div>
			<div title="Drag to link circle to share" class="posticon icon_with_text info_col link_share ui-draggable">
				<?php echo $this->Html->image('icon/icon_circle.png') ?><p>link circle</p></div><div class="clear">
			</div>
		</div>
	</div>

	<div class='question_description postdesc row'>
		<div class="info_col posticon">
			<?php 
				if($question['Question']['isAnonymous']=='0'){
					//echo '<a href="'.$this->Html->url(array('controller'=>'user', 'action'=>$question['User']['slug'])).'">';
					if (isset($question['User']) && isset($question['User']['file_profile']) && $question['User']['file_profile'] != '')
						echo $this->Html->image('../' . $question['User']['file_profile'], array('class' => 'profilepic')); 
					else { 
						echo $this->Html->image('icon/icon_user_default.png', array('class' => 'profilepic')); 
						echo $question['User']['username'];
					}

					//echo '</a>';
				}else{
					echo $this->Html->image('icon/icon_user_default.png', array('class' => 'profilepic')); 
				}
			?>
		</div>
		<div class="info_col desc_text"><p><?php echo nl2br(h($question['Question']['description'])) ?></p></div>
		<div class="clear"></div>
	</div>
</div>

<hr />

<?php 

// if(AuthComponent::user('id')!=''){

$i_answer_count = 0;
foreach ($question['Answer'] as $answer){
?>	

	<div class='answers'>
		<div class='answer'>
			<div class='answer_title row'>
				<?php
				    if ($i_answer_count == 0)
						echo $this->Html->image('icon/icon_raisehand.png') . "<span>Top Answer</span>";
					else 
						echo $this->Html->image('icon/icon_raisehand.png') . "<span>Answer " . $i_answer_count . "</span>";
				?>
			</div>
			<div class='answer_main row'>
				<div class='pull-left'>
					<?php 
						if (!empty($answer['Attachment']))
						  if ($answer['Attachment'][0]['type'] == 0)
						  	echo $this->Html->image('../' . $answer['Attachment'][0]['file_path']);
						  else 
						  	echo $this->Html->media(array(array('src' => '../' . $answer['Attachment'][0]['file_path'], 'type' => 'video/'.$answer['Attachment'][0]['file_ext'])), array('id' => 'videojs_answer_' . $answer['id'], 'tag' => 'video', 'class' => 'video_answer video-js vjs-default-skin vjs-big-play-centered', 'controls' => 'controls', 'preload' => 'auto')); 
				    ?>
				</div>
				<div class='pull-right'>
					<div class='user_info row'>
						<!-- <a class='username' href='<?php echo $server_root . 'user/'. $answer['User']['username'];?>'> -->
						<?php 
							if (isset($answer['User']) && isset($answer['User']['file_profile']) && $answer['User']['file_profile'] != '')
								echo $this->Html->image('../' . $answer['User']['file_profile'], array('class' => 'profilepic')); 
							else 
								echo $this->Html->image('../img/icon/icon_user_default.png', array('class' => 'profilepic')); 

							if (isset($answer['User']))
								echo $answer['User']['username'];
						?>
						<!-- </a> -->
					</div>
					<hr />
					<div class='answer_description row'>
						<span><?php echo nl2br(h($answer['description'])); ?></span>
					</div>
					<hr />
					<div class='answers_comments row'>
						<div class='pull-left'>
							<?php echo $this->Html->image('icon/icon_thumbsup.png', array('data-answerId' => $answer['id'], 'data-type' => '1')) ?>
							<br /><br />
							<?php echo $this->Html->image('icon/icon_thumbsdown.png', array('data-answerId' => $answer['id'], 'data-type' => '0')) ?>
							<div class='answer_score'><?php echo $answer['score'] ?></div>
						</div>
						<div class='pull-right'>
							<form action="<?php echo $this->Html->url(array('controller'=>'Questions', 'action'=>'postComment', 'plugin'=>'Api', 'ext'=>'json')); ?>" method="POST">
								<input type='hidden' name='data[Comment][answer_id]' value='<?php echo $answer['id'] ?>' />
								<input type='hidden' name='data[Question][slug]' value='<?php echo $question['Question']['slug']; ?>' />
								<input type='hidden' name='data[Question][slug_id]' value='<?php echo $question['Question']['slug_id']; ?>' />
								<textarea name='data[Comment][description]'></textarea>
								<div class='row buttons'>
									<input type='button' class='btn btn-primary' value='Send' />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class='comments'>
		<hr />
		<?php foreach ($answer['Comment'] as $comment){ ?>
			<div class='comment row'>
				<div class='pull-left'>
					<?php 
						if (isset($comment['User']) && isset($comment['User']['file_profile']) && $comment['User']['file_profile'] != '')
							echo $this->Html->image('../' . $comment['User']['file_profile'], array('class' => 'profilepic')); 

						if (isset($comment['User']))
							echo $comment['User']['username'];
					?>					
				</div>
				<div class='pull-right'>
					<?php echo nl2br(h($comment['description'])); ?>
				</div>
			</div>	
		<?php } ?>
	</div>
	<hr />
<?php
$i_answer_count++;
}
?>

<div id='modal_answer' class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      	Your Illustration
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
     	<form id='answer_form' action="<?php echo $this->Html->url(array('controller'=>'Questions', 'action'=>'postAnswer', 'plugin'=>'Api', 'ext'=>'json')); ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
			<div class="input required">
				<label for="ta_answer">Answer:</label>
				<textarea placeholder="Your Illustration" id="ta_answer" required="required" class="form-control" name="data[Answer][description]"></textarea>
			</div>
			<div class="input required">
				<label for="file">Attachment:</label>
				<input id="file" type='file' required="required" class="form-control" name='data[attachment]' />
			</div>
			<input type='hidden' name='data[Answer][question_id]' value='<?php echo $question['Question']['id']; ?>' />
			<input type='hidden' name='data[Question][slug]' value='<?php echo $question['Question']['slug']; ?>' />
			<input type='hidden' name='data[Question][slug_id]' value='<?php echo $question['Question']['slug_id']; ?>' />
      	</form>
      </div>
      <div class="modal-footer">
        <button id='answer_btn_submit' type="button" class="btn btn-primary">Post</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php
// }
?>
