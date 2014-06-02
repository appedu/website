<?php
$this->start('script');
echo $this->Html->script('http://s.phono.com/releases/1.1/jquery.phono.js');
echo $this->Html->script('tutor');
$this->end();
?>

<?php echo $this->Html->script('jquery-1.9.1'); ?>

<?php
echo $this->Form->create('Visession', array('class' => 'form'));

echo $this->Form->input('subject_id', array('id' => 'subjectsList'));

echo $this->Form->submit('Call', array('id' => 'callBtn'));

echo $this->Form->end();

echo $this->Form->button('List Subjects', array('id' => 'listBtn'));

echo $this->Html->div('tutors', 'available tutors', array('id' => 'listtutors'));


//name="data[Visession][subject_id]" id="VisessionSubjectId"
?>

<script>
    $("#listBtn").click(function() {
//        console.info($('#subjectsList').val());

        $.ajax({
            type: 'get',
            url: '<?php echo $this->Html->url(array('action' => 'list_tutors', 'ext' => 'json')); ?>',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            },
            dataType: "text",
            success: function(response) {

                var parsedData = JSON.parse(response);
                $('#listtutors').html(parsedData[0].Subject.abbr);

                if (response.error) {
                    alert(response.error);
                    console.log(response.error);
                }
                if (response.content) {

//                    $('#listtutors').html(response.content);
                    $('#listtutors').html("foo");
                }

            },
            error: function(e) {
                alert("An error occurred: " + e.responseText.message);
                console.log(e);
            }
        });
    });




</script>


<script>

    var phono_id
    $(document).ready(function() {
        var phono = $.phono({
            apiKey: "a8869d0a078999baf84b473ae77cccd0",
            onReady: function() {
                $("#call").attr("disabled", false).val("Call");
                $("#phoneNumber").val(this.sessionId);

            },
            phone: {
                onIncomingCall: function(event) {
                    var call = event.call;
                    console.info("Incoming call");
                }
            },
            messaging: {
                onMessage: function(event) {
                    // Get message from event and log it
                    var message = event.message;
                    console.info(message.from + " says '" + message.body + "'");

                    //message.reply("ACK");
                }
            }

        });

        $("#call").click(function() {
            $("#call").attr("disabled", true).val("Busy");
            phono.phone.dial($("#callNumber").val(), {
                onRing: function() {
                    $("#status").html("Ringing");
                },
                onAnswer: function() {
                    $("#status").html("Answered");

                },
                onHangup: function() {
                    $("#call").attr("disabled", false).val("Call");
                    $("#status").html("Hangup");
                }
            });
        });
    })
</script>

