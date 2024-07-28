<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cetak Hasil Diagnosa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            font-size: 12px;
        }

        .header h3,
        .header h4 {
            margin: 5px 0;
        }

        .header p {
            margin: 2px 0;
        }

        .table-borderless th,
        .table-borderless td {
            border: none;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid black !important;
        }

        .section-header {
            font-weight: bold;
        }

        .section {
            margin-bottom: 10px;
        }

        .text-end-center {
            text-align: center;
            float: right;
            width: 250px;
        }


    </style>

    <script>
        window.onload = function () {
            window.print();
        }
    </script>

    

</head>

<body class="border p-3">

    <div class="copy-right">
        <p class="text-start"  style="font-size: 6px">
            SPATIFOMO<br>
            Sistem Pakar Identifikasi Tingkat FoMO<br>
            Developed By Muhammad Teguh Adi Cahya<br>
        </p>
    </div>

    <div class="kop">
        <div class="header text-center mb-3">
            <h3>HASIL DIAGNOSIS</h3>
            <h4>DIAGNOSA PASIEN</h4>
        </div>
    </div>

    <div class="section mb-4">
        <h6 class="section-header mb-2">Biodata Pasien</h6>
        <table>
            <tr>
                <th width="150px">Nama</th>
                <td>: {{ $pasien->nama_pasien }}</td>
            </tr>
            <tr>
                <th>Umur</th>
                <td>: {{ $pasien->umur }}</td>
            </tr>
            <tr>
                <th>Instansi</th>
                <td>: {{ $pasien->instansi }}</td>
            </tr>
            <tr>
                <th>Waktu Tes</th>
                <td>: {{ \Carbon\Carbon::parse($pasien->created_at)->translatedFormat('l, j F Y H:i') }}</td>
            </tr>
            
        </table>
    </div>

    <div class="section">
    <h6 class="section-header mb-2">Nilai Akhir Kriteria</h6>
    @php
        $max_nilai = 0;
        $max_kriteria = '';
    @endphp
    <table class="table table-bordered">
        <thead>
            <tr>
                @foreach ($nilai_akhir_kriteria as $kriteria => $nilai_akhir)
                <th class="text-center">{{ $kriteria }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($nilai_akhir_kriteria as $kriteria => $nilai_akhir)
                <td class="text-center">{{ $nilai_akhir }}</td>
                @php
                    if ($nilai_akhir > $max_nilai) {
                        $max_nilai = $nilai_akhir;
                        $max_kriteria = $kriteria;
                    }
                @endphp
                @endforeach
            </tr>
        </tbody>
    </table>

    <div class="alert alert-info text-center mt-3">
        <strong>Kriteria dari Self-determination Terbesarmu adalah:</strong> {{ $max_kriteria }} (Nilai: {{ $max_nilai }})
    </div>
    <div class="alert alert-light">
        <strong>Deskripsi:</strong> {{ $deskripsi_kriteria[$max_kriteria] ?? 'Deskripsi tidak tersedia' }}
    </div>
    {{-- <div class="alert alert-warning text-center mt-4">
        <strong>Tingkat Self-determination :</strong> {{ $presentase }} % ({{ $presentase <= 33 ? 'Rendah' : ($presentase <= 66 ? 'Sedang' : 'Tinggi') }})
    </div>
    <div class="alert alert-light text-center mt-4">
        <strong>Kategori Hasil:</strong> {{ $kategori }}
    </div> --}}

    <div class="text-center">
            <h3>Tingkat Self-determination (Kedali Diri) Sebesar: </strong> {{ number_format($presentase, 2) }} % ({{ $presentase <= 33 ? 'Rendah' : ($presentase <= 66 ? 'Sedang' : 'Tinggi') }})</h3>
        </div>
        <div class="section">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th class="bg-light">Kategori Self-determination</th>
                        <th class="bg-light align-middle">Kategori FoMO dan Solusi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-2">{{ $pasien->solusi->kategori }}</td>
                        <td class="p-2">{{ $pasien->solusi->solusi }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>


    <div class="section text-end-center">
        <p class="m-0 p-0">Instrumen dan konten telah divalidasi oleh</p>
        <p class="mb-6"><b>Psikolog Pemeriksa,</b></p>
        <br>
        <br>
        <p class="m-0 p-0"><b>Muhammad Azka Maulana, M. Psi, Psikolog</b></p>
        <p class="m-0 p-0">SIPPK: 503/011-Dinkes/SIPPK/XII/2021</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>