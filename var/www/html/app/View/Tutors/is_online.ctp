<?php echo __('Tutor'); ?>

<div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
    <label class="onoffswitch-label" for="myonoffswitch">
        <div class="onoffswitch-inner"></div>
        <div class="onoffswitch-switch"></div>
    </label>
</div> 



<?php
echo $this->Html->script('jquery-1.9.1');
echo $this->Html->css('onoffswitch');
?>
<script>

    var isChecked = $('#myonoffswitch').is(':checked');

    if (isChecked) {

    }
    else {

    }


    $(document).ready(function() {
        $("*[type='checkbox']").change(function() {
            alert($(this).is(':checked')); //alert($(this).attr('value'));             

        });
    });

</script>


<script>

    var isChecked = $('#myonoffswitch').is(':checked');

    console.info(isChecked);

        $(document).ready(function() {
            $("*[type='checkbox']").change(function() {
                // alert($(this).is(':checked')); //alert($(this).attr('value'));             

            });
        });

</script>

