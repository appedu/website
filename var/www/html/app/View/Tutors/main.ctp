<h1>Online Tutors</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Phono Id</th>
        <th>Remarks</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($tutors as $tutor): ?>
    <tr>
        <td><?php echo $tutor['Tutor']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($tutor['Tutor']['phono_id'],
array('controller' => 'tutors', 'action' => 'view', $tutor['Tutor']['phono_id'])); ?>
        </td>
        <td><?php echo $tutor['Tutor']['is_available']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($tutor); ?>
</table>
