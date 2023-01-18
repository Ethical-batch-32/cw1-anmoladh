<?php

require('fpdf184/fpdf.php');
include "../db.php";

$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial', '', 12);

$pdf->Cell(200,20,'INVOICE',0 ,1,'C');

$pdf->Line(10, 30, 200, 30);

//get invoices data
if(isset($_GET['boo_id'])){
	$id = $_GET['boo_id'];
	$query = mysqli_query($con,"select * from bookings, user_details where bookings.boo_id = '$id' and bookings.u_email = user_details.c_email");
	// $query = mysqli_query($con,"select bookings.boo_id, user_details.username, user_details.c_email, user_details.c_address, user_details.c_mobile from bookings, user_details where boo_id.bookings = '$id' and u_email.bookings = c_email.user_details");
	$data = mysqli_fetch_array($query);

	$pdf->Cell(100, 10, 'CUSTOMER DETAILS:', 0, 0, 'L');
	$pdf->Cell(100, 10, 'AGENCY DETAILS:', 0, 1, 'L');
	$pdf->Cell(40, 5, 'Bill ID', 0, 0);
	$pdf->Cell(60, 5,  ': '.$data["boo_id"], 0, 0);
	$pdf->Cell(40, 5, 'Name', 0, 0);
	$pdf->Cell(60, 5, ': Tour and Travel', 0, 1);
	$pdf->Cell(40, 5, 'Name', 0, 0);
	$pdf->Cell(60, 5, ': '.$data["fname"].' '.$data["lname"], 0, 0);
	$pdf->Cell(40, 5, 'Address', 0, 0);
	$pdf->Cell(60, 5, ': Sitapaila, Kathmandu', 0, 1);
	$pdf->Cell(40, 5, 'Email', 0, 0);
	$pdf->Cell(60, 5, ': '.$data["u_email"], 0, 0);
	$pdf->Cell(40, 5, 'Mobile No.', 0, 0);
	$pdf->Cell(60, 5, ': 9813246534', 0, 1);
	$pdf->Cell(40, 5, 'Mobile No.', 0, 0);
	$pdf->Cell(60, 5, ': '.$data["c_mobile"], 0, 1);
	$pdf->Cell(40, 5, 'Address', 0, 0);
	$pdf->Cell(60, 5, ': '.$data["c_address"], 0, 1);
	$pdf->Cell(40, 5, 'Issue Date', 0, 0);
	$pdf->Cell(60, 5, ': '.$data["arrival_date"], 0, 1);
	$pdf->Cell(40, 5, 'Payment status', 0, 0);
	$pdf->Cell(60, 5, ': '.$data["payment-status"], 0, 1);

	$pdf->Ln(10);//Line break

	$pdf->Line(10, 80, 200, 80);

	$pdf->Cell(40, 5, 'Location', 0, 0);
	$pdf->Cell(60, 5, ': '.$data["blocation"], 0, 1);

	$pdf->Cell(40, 5, 'No. of member', 0, 0);
	$pdf->Cell(60, 5, ': '.$data["no_of_member"], 0, 1);

	$pdf->Cell(40, 5, 'Arrival date', 0, 0);
	$pdf->Cell(60, 5, ': '.$data["arrival_date"], 0, 1);

	$pdf->Cell(40, 5, 'Leaving date', 0, 0);
	$pdf->Cell(60, 5, ': '.$data["leaving_date"], 0, 1);

	$pdf->Cell(40, 5, 'Package type', 0, 0);
	$pdf->Cell(60, 5, ': '.$data["b_type"], 0, 1);

	$pdf->Cell(40, 5, 'Package price', 0, 0);
	$pdf->Cell(60, 5, ': '.$data["b_cost"], 0, 1);

	$pdf->Cell(40, 5, 'Total Amount', 0, 0);
	$pdf->Cell(60, 5, ': '.$data["total"], 0, 1);

	$pdf->Cell(40, 5, 'Paid by', 0, 0);
	$pdf->Cell(60, 5, ': '.$data["fname"].' '.$data["lname"], 0, 1);

	$pdf->Ln(10);//Line break

	$pdf->Line(155, 133, 195, 133);
	// $pdf->Ln(5);//Line break
	$pdf->Cell(140, 5, '', 0, 0);
	$pdf->Cell(55, 5, 'Signature', 0, 0, 'C');

	$pdf->Output();
}
?>