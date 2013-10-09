<script type="text/javascript">
    $(document).ready(function() {
        // Data Tables
        $('#result').dataTable({
            "sScrollX": "100%",
            "sScrollXInner": "200%",
            "bScrollCollapse": true,
            "bJQueryUI": true,
            "bAutoWidth": false,
            "sPaginationType": "full_numbers"
        }); 
    });
</script>
<?php 
    if (isset($result)) {
        $items = $result;
    } elseif (isset($filter)) {
        $items = $filter;  
    }
?>

<?php    
    if (isset($items)) {;
?>
    <table id="result">
        <thead>
            <tr>
                <th>Organization</th>
                <th>Batch</th>
                <th>Grantee</th>
                <th>Funding</th>
                <!-- <th>Title</th> -->
                <th>Contact Person</th>
                <th>Designation</th>
                <th>District</th>
                <th>Telephone Number</th>
                <th>Email</th>
                <th>Tool</th>
                <th>Sector</th>
                <th>Theme</th>
                <th>Project Status</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item) { ?>
            <tr>
                <td><?= $item->Organization ?></td>
                <td><?= $item->Batch ?></td>
                <td><?= $item->Grantee ?></td>
                <td><?= $item->Funding ?></td>
                <!-- <td><?= $item->Title ?></td> -->
                <td><?= $item->Contact_Person ?></td>
                <td><?= $item->Designation ?></td>
                <td><?= $item->District ?></td>
                <td><?= $item->Telephone ?></td>
                <td><?= $item->Email ?></td>
                <td><?= $item->Tool ?></td>
                <td><?= $item->Sector ?></td>
                <td><?= $item->Theme ?></td>
                <td><?= $item->Project_Status ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php } ?>

<?php if (isset($error)) var_dump($error); ?>