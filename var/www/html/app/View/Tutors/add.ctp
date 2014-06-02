<h1>Add Tutor</h1>
<?php
echo $this->Form->create('Tutor');
echo $this->Form->input('id');
echo $this->Form->input('phono_id');
echo $this->Form->input('is_available');
echo $this->Form->input('last_available');
echo $this->Form->input('remarks');
echo $this->Form->end('Save Tutor');
?>


<?php
echo $this->Html->script('jquery-1.9.1');
?>
<script>

    $(document).ready(function() {
    });

</script>
