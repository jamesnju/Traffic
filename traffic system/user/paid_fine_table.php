<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Action</th>
            <th>Reference No</th>
            <th>Offense ID</th>
            <th>Vehicle No</th>
            <th>Issue Date</th>
            <th>Paid Date</th>
            <th>Amount Ksh</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Action</th>
            <th>Reference No</th>
            <th>Offense ID</th>
            <th>Vehicle No</th>
            <th>Issue Date</th>
            <th>Paid Date</th>
            <th>Amount Ksh</th>
        </tr>
    </tfoot>
    <tbody>
        <?php //Read details from issued_fine table
        include "../connection.php";
        $sql = mysqli_query($con, "SELECT * FROM issued_fines WHERE issued_fines_status='paid'");
        while ($res = mysqli_fetch_assoc($sql)) {
        ?>
            <tr>
                <td class="d-flex justify-content-start">
                    <button type="button" name="view" value="View" id="<?php echo $res["issued_fines_no"]; ?>" class="btn btn-info btn-xs view_data"><i class="fas fa-info-circle"></i></button>
                </td>
                <td><?php echo $res['issued_fines_no']; ?></td>
                <td><?php echo $res['issued_fines_provisions']; ?></td>
                <td><?php echo $res['issued_fines_vehicle_no']; ?></td>
                <td><?php echo $res['issued_fines_date']; ?></td>
                <td><?php echo $res['issued_fines_date']; ?></td>
                <td><?php echo $res['issued_fines_total_amount']; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
