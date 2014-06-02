<?php
$this->start('script');
echo $this->Html->script('post');
$this->end();
?>

<script>
    var _track = "retention-question-pre-create";
</script>

<div class="users index">
    <fieldset>
        <form class="form" action="<?php echo $this->Html->url(array('controller' => 'Visessions', 'action' => 'call')); ?>" id="PostForm" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="form_content">
                <p>Call tutor</p>

                <?php
                echo $this->Form->input('subject_id');
                ?>

                <p></p>
            </div>
            <div class="controls"><div class="option_btn col-xs-12" id="submitBtn">Call</div></div></form>
    </fieldset>
</div>
