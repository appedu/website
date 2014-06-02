

<h1>VI Session</h1>
<?php echo 'Now:       '.  date('Y-m-d H:i:s'); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Subject</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($visessions as $visession): ?>
    <tr>
        <td><?php echo $visession['Visession']['id']; ?></td>
        <td>
            <!--<?php echo $visession['VisessionSubject']['abbr']?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($visession); ?>
</table>
