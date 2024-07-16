<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cetak Hasil Identifikasi</title>

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

        .copy-right {
            font-size: 6px;
        }
    </style>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>

</head>

<body class="border p-3">
    <div class="copy-right">
        <p class="text-start fs-6">
            SPATIFOMO<br>
            Sistem Pakar Identifikasi Tingkat FoMO<br>
            Developed By Muhammad Teguh Adi Cahya<br>
        </p>
    </div>

    <div class="kop">
        <div class="header text-center mb-3">
            <h3>HASIL IDENTIFIKASI</h3>
            <h4>TINGKAT FEAR OF MISSING OUT</h4>
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
                <th>Usia</th>
                <td>: {{ $pasien->umur }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>: {{ $pasien->instansi }}</td>
            </tr>
            <tr>
                <th>Waktu Diagnosa</th>
                <td>: {{ \Carbon\Carbon::parse($pasien->created_at)->translatedFormat('l, j F Y H:i') }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <table class="table table-bordered">
            <thead>
                <tr>
                    @foreach ($hasil_tes as $index => $hasil)
                        <th class="text-center bg-danger bg-light">{{ $hasil['kriteria'] }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($hasil_tes as $index => $hasil)
                        <td class="text-center">{{ $hasil['presentasi'] }}%</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="text-center mb-3">
            <h3>Kriteria Terbesar <b>{{ $pasien->kriteria->nama }}</b> Sebesar
                <b>{{ $pasien->hasil_tes }}</b>
            </h3>
            <div class="section">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th class="bg-light">Kategori Self-determination</th>
                            <th class="bg-light align-middle">Penanganan Untuk {{ $pasien->kriteria->nama }}</th>
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
        <div class="text-center">
            <h3>Tingkat Self-determination (Kedali Diri) Sebesar: <b>{{ $pasien->presentasi }}%</b></h3>
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
