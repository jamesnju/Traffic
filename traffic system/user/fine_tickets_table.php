<?php
 if (!isset($_SESSION['registration_username'])) {
   // Redirect to the login page
   header("Location: login.php");
   exit();
 }?>


<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
			<th>Fine ID</th>
            <th>Section of Act</th>
            <th>Provision</th>
            <th>Fine Amount</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
			<th>Fine ID</th>
            <th>Section of Act</th>
            <th>Provision</th>
            <th>Fine Amount</th>
        </tr>
    </tfoot>
    <tbody>
		<?php //get data from fine_tickets table
		include "../connection.php";		
		$sql=mysqli_query($con,"select * from fine_tickets");
		while($res=mysqli_fetch_assoc($sql))
		{		
		?>
		<tr>
		<td><?php echo $res['fine_tickets_id']; ?></td>
	    <td><?php echo $res['fine_tickets_section_of_act']; ?></td>
		<td><?php echo $res['fine_tickets_provision']; ?></td>
		<td><?php echo $res['fine_tickets_amount']; ?></td>
		</tr>
	    <?php 	
		}?>
	</tbody>
</table>



