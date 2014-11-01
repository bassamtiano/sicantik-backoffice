
<html>
<head>
	<title></title>
	<?php $index = 1; ?>

	{{ HTML::style('assets/css/document.css') }}
	<style>


	</style>


</head>
<body>

	<div class="print-page">

		<div class="header-surat">
			<table>
				<tr>
					<td class="header-logo">

						{{ HTML::image($logo, 'logo') }}

					</td>
					<td class="header-title">

						<div class="title-nama">
							<h3> {{ $title_nama }} </h3>
							<p> {{ $title_kabupaten}} </p>
						</div>
						<div class="title-alamat">
							<p class="alamat-jalan"> {{ $title_alamat . ' - ' . $title_kabupaten}} </p>
							<p  class="alamat-telp"> Telp. {{ $title_tlp }} Fax {{ $title_fax }} </p>
						</div>

					</td>
				<tr>
			</table>
		</div>

		<div class="isi-surat">

			<div class="surat-title">
				<h3>{{ $surat_title }}</h3>
			</div>

			<div class="surat-item">

				<table>

					<tr>
						<th class="c_no">No</th>
						<th class="c_jenis_pelayanan_perizinan">Jenis Pelayanan Perizinan</th>
						<th class="c_target_anggaran">Target Anggaran</th>
						<th class="c_realisasi_pendapatan">Realisasi Pendapatan</th>
					</tr>

				@foreach( $result as $r )

					
					<tr>
						<td class="c_no">{{ $index++ }}</td>
						<td class="c_jenis_pelayanan_perizinan">{{ $r['n_perizinan']; }}</td>
						<td class="c_target_anggaran">{{ $r['target_anggaran']; }}</td>
						<td class="c_realisasi_pendapatan">{{ $r['realisasi_pendapatan']; }}</td>
					</tr>

				@endforeach()

				</table>

			</div>

		</div>

	</div>

</body>
</html>



