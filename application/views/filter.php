<?php 
    if (isset($result)) {
        $items = $result;
    } elseif (isset($filter)) {
        $items = $filter;  
    }

    // Check for items
    if (isset($items)) { ;
?>
    <table id="result">
        <thead>
            <tr>
                <th>Organization</th>
                <th>Batch</th>
                <th>Grantee</th>
                <th>Funding</th>
                <th>District</th>
                <th>Tool</th>
                <th>Sector</th>
                <th>Theme</th>
                <th>Contact Person</th>
                <th>Gender</th>
                <th>Ethnicity</th>
                <th>Designation</th>
                <th>Telephone Number</th>
                <th>Email</th>
                <th>Project Status</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach ($items as $item) { 
                if (preg_match("*SAP*", $item->Designation) || preg_match("*SA Practitioner*", $item->Designation)) {
                $pattern = array('/SA Practitioner/', '/SAP/');
        ?>
            <tr>
                <td><?= $item->Organization ?></td>
                <td><?= $item->Batch ?></td>
                <td><?= $item->Grantee ?></td>
                <td><?= $item->Funding ?></td>
                <td><?= $item->District ?></td>
                <td><?= $item->Tool ?></td>
                <td><?= $item->Sector ?></td>
                <td><?= $item->Theme ?></td>
                <td><?= $item->Contact_Person ?></td>
                <td><?= (preg_match("/\bMr\b/i", $item->Title) ? "Male" : "Female") ?></td>
                <td><?= $item->Ethnicity ?></td>
                <td><?= preg_replace($pattern, 'Social Accountability Practitioner', $item->Designation) ?></td>
                <td><?= $item->Telephone ?></td>
                <td><?= $item->Email ?></td>
                <td><?= $item->Project_Status ?></td>
            </tr>
        <?php   
                } 
            }
        ?>
        </tbody>
    </table>
    <script type="text/javascript">
        $(document).ready(function() {
            // Data Tables
            $('#result').dataTable({
                "sScrollX": "100%",
                //"sScrollXInner": "10%",
                "bScrollCollapse": true,
                "bJQueryUI": true,
                "bAutoWidth": false,
                "iDisplayLength": 5,
                "aLengthMenu": [5, 10, 15, 25, 50, 100],
                "bDestroy": true,
                "sPaginationType": "full_numbers"
            });
        });
    </script>
<?php } elseif (isset($error)) { ?>
    <p style="text-align: center; color: red; font-weight: bold"><?php echo $error; ?></p>
<?php } else { ?>
   <p style="text-align: center; color: red; font-weight: bold">No Results Found!</p>
<?php } ?>