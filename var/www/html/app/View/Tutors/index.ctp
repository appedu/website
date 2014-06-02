<?php echo __('Tutor'); ?>


<div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
    <label class="onoffswitch-label" for="myonoffswitch">
        <div id="onoffswitch-inner" class="onoffswitch-inner"></div>
        <div id="onoffswitch-switch" class="onoffswitch-switch"></div>
    </label> 
</div> 

<?php
echo $this->Html->link(
    'online',
    array(
        'controller' => 'tutors',
        'action' => 'set_online',
        'full_base' => true
    )
);

    
echo $this->Html->link(
    'offline',
    array(
        'controller' => 'tutors',
        'action' => 'set_offline',
        'full_base' => true
    )
);


?>
<?php
echo $this->Html->script('jquery-1.9.1');
echo $this->Html->css('onoffswitch');
?>

<?php
$this->Js->get('#myonoffswitch');
$this->Js->event('change', 'alert("whoa!");', false);

?>


<script>


    $(document).ready(function() {
        $("*[type='checkbox']").change(function() {
//            alert($(this).is(':checked')); //alert($(this).attr('value'));     
console.info($(this).is(':checked'));

        });
    });


</script>
