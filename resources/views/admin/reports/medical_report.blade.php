<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mainstream Biomedical Centre - Pathology Report</title>

	<!-- Bootstrap -->
	{{-- <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/> --}}

	<style>
		p, h1{
			margin: 0;
			padding: 0;
		}
		.text-center {
			text-align: center;
		}

		header {
			height: 100px;
			border-bottom: 2px solid black;
		}

		.left-side {
			height: 100px;
			width: 60%;
			/*background-color: red;*/
			float: left;
		}

		.left-text {
			margin-top: 55px;
			font-style: italic;
		}

		.right-side {
			height: 100px;
			width: 40%;
			/*background-color: green;*/
			float: right;
		}

		.right-text {
			font-size: 18px;
			margin-top: 15px;
			font-style: italic;
		}

		.heading {
			text-align: center;
			margin-top: 20px;
		}

		.patient {
			margin-top: 20px;
		}

		.content {
			margin: 8px 0px;
		}  

		.patient{
			font-size: 13px;
			font-style: italic;
		}

		table, td {
			/*border: 1px solid black;*/
			width: 100%;
			padding: 5px 0;
		}

		footer {
			position: relative;
			margin-top: 50px;
			border-top: 2px solid black;
			text-align: center;
		}

	</style>
</head>
<body>

	<div class="container">
		<header>
			<div class="left-side">
				<div class="left-text">
					<p>Plot 1 Portal Avenue, Span House Suite 303,</p>
					<p>P. O. Box 31460, Kampala - Uganda</p>
				</div>
			</div>
			<div class="right-side">
				<div class="right-text">
					<h1>Mainstream</h1>
					<h1>Biomedical Centre</h1>
				</div>
			</div>
		</header>

		<section class="heading">
			<p><strong>HISTOPATHOLOGY & CYTOLOGY SERVICE</strong></p>
			<p><strong>(Prof. Raphael Owor, MD FRCPath)</strong></p>
		</section>

		<section class="patient">
			<table>
				<tbody>
					<tr>
						<td><strong>NAME OF PATIENT:</strong></td>
						<td>{{ $patient->last_name }} {{ $patient->middle_name }} {{ $patient->first_name }}</td>
						<td><strong>NAME OF PHYSICIAN:</strong></td>
						<td>{{ Sentinel::getUser()->last_name }} {{ Sentinel::getUser()->first_name }}</td>
					</tr>
					<tr>
						<td>NAME OF HEALTH UNIT</td>
						<td></td>
						<td>CONTACT ADDRESS:</td>
						<td></td>
					</tr>
					<tr>
						<td>PATIENT’S I.D. NUMBER:</td>
						<td>{{ $patient->patient_code }}</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>AGE:</td>
						<td>{{ $patient->age() }}</td>
						<td>TELEPHONE:</td>
						<td>{{ $patient->phone }}</td>
					</tr>
					<tr>
						<td>GENDER:</td>
						<td>{{ ucfirst($patient->gender) }}</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>VILLAGE/ZONE:</td>
						<td>{{ $patient->village_zone }}</td>
						<td>NATURE OF SPECIMEN: </td>
						<td>{{ $treatment->nature_of_specimen }}</td>
					</tr>
					<tr>
						<td>PARISH:</td>
						<td>{{ $patient->parish }}</td>
						<td>NAME OF PHYSICIAN:</td>
						<td></td>
					</tr>
					<tr>
						<td>SUB-COUNTY</td>
						<td>{{ $patient->subcounty }}</td>
						<td>Date of Receipt:</td>
						<td></td>
					</tr>
					<tr>
						<td>DISTRICT:</td>
						<td>{{ $patient->district }}</td>
						<td><strong>BIOPSY NO:</strong></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</section>

		<h3 class="text-center">PATHOLOGY REPORT</h3>

		<p><strong>CLINICAL SUMMARY:</strong></p>
		<p class="content">{{ $treatment->clinical_summary }} </p>

		<p><strong>MACROSCOPIC APPEARANCE:</strong></p>
		<p class="content">{{ $treatment->macrosocopic_appearance }}</p>

		<p><strong>MICROSCOPIC APPEARANCE:</strong></p>
		<p class="content">{{ $treatment->microsocopic_appearance }}</p>

		<p><strong>CONCLUSION:</strong></p>
		<p class="content">{{ $treatment->conclusion }}</p>


		<footer>
			<p>Prof. Raphael Owor, MD FRCPath | Tel: +256 (0) 717 272156 /752690701</p>
		</footer>
	</div>



</body>
</html>