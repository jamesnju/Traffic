<?php
    include("../connection.php");
    session_start();
    if (!isset($_SESSION['registration_username'])) {
      // Redirect to the login page
      header("Location: index.php");
      exit();
  }

?>


<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Action</th>
			<th>Fine ID</th>
            <th>Section of Act</th>
            <th>Provision</th>
            <th>Fine Amount</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Action</th>
			<th>Fine ID</th>
            <th>Section of Act</th>
            <th>Provision</th>
            <th>Fine Amount</th>
        </tr>
    </tfoot>
    <tbody>
		<?php //Read officer details from tpo table
		include "../connection.php";		
		$sql=mysqli_query($conn,"select * from fine_tickets");
		while($res=mysqli_fetch_assoc($sql))
		{		
		?>
		<tr>
		<td class="d-flex justify-content-around">
			<a href="#" data-toggle="tooltip" data-title="Edit"><span class="btn btn-success btn-sm"><i class="fas fa-pen"></i></span></a>
			<a href="#" data-toggle="tooltip" data-title="Delete"><span class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></span></a>

		</td>
		<td><?php echo $res['fine_tickets_id']; ?></td>
	    <td><?php echo $res['fine_tickets_section_of_act']; ?></td>
		<td><?php echo $res['fine_tickets_provision']; ?></td>
		<td><?php echo $res['fine_tickets_amount']; ?></td>
		</tr>
	    <?php 	
		}?>
	</tbody>
</table>

