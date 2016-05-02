<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('location:login.php');
}

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>PHP Login Form</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/main.css">


</head>
<!-- NAVBAR
================================================== -->

<body>

<?php 
	require_once"connect.php";

	$contacts = array();

	$all_contacts = "select * from contacts where contact_status = '1'";

	$sql_all_contacts = $conn->query($all_contacts);

	$total_contacts = $sql_all_contacts->num_rows;

	while ($row = mysqli_fetch_assoc($sql_all_contacts)) {
		$contacts[] = $row;
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<?php include"includes/head.inc"; ?>
</head>

<body>
	<div class="wrapper">

		<!-- header section -->
		<?php include"includes/header.inc"; ?>

		<!-- content section -->
		<div class="content">
			<div class="floatl"><h1><?php echo $total_contacts ?> Contact Entries</h1></div>

			<a class="floatr" href="insert_contact.php"><input class="cancel_contact_button" type="button" value="New Contact"></a>

			<a class="floatr" href="logout.php"><input class="cancel_contact_button  exit_btn" type="button" value="Exit"></a>
			




			<div class="clear"></div>

				<hr class="pageTitle">
				<table id="contactsTable" class="display">
					<thead>
						<tr align="left">
							<th>Name:</th>
							<th class="hidden_col">Nickname:</th>
							<th>Mobile Phone:</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					 	<?php foreach ($contacts as $contact) {?>
						<tr>
							<td><a class="visited-contact" href="contact.php?id=<?php echo $contact["contact_id"]; ?>"><?php echo $contact["contact_fname"] . " " . $contact["contact_lname"]; ?></a></td>
							<td class="hidden_col"><?php echo $contact["contact_nickname"]; ?></td>
							<td><?php echo $contact["contact_cphone"]; ?></td>
							<td><a href="update_contact.php?id=<?php echo $contact["contact_id"]; ?>"><i class="fa fa-pencil"></i></a> | <a href="delete_contact.php?id=<?php echo $contact["contact_id"] ?>"><i class="fa fa-trash-o"></i></a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
		</div>
	</div>	
</body>
</html>		