<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Laporan Denda</title>

<style>

body{

    font-family: DejaVu Sans,sans-serif;

    font-size:12px;

}

h2{

    text-align:center;

    margin-bottom:0;

}

p{

    text-align:center;

    margin-top:5px;

    margin-bottom:20px;

}

table{

    width:100%;

    border-collapse:collapse;

}

table th{

    background:#343a40;

    color:white;

    border:1px solid #000;

    padding:8px;

}

table td{

    border:1px solid #000;

    padding:7px;

}

.text-center{

    text-align:center;

}

.footer{

    margin-top:25px;

    text-align:right;

    font-size:11px;

}

</style>

</head>

<body>

<h2>

HOGWARTS LIBRARY

</h2>

<p>

Laporan Data Denda

</p>

<table>

<thead>

<tr>

<th>No</th>

<th>Nama Anggota</th>

<th>Jumlah Denda</th>

<th>Status Pembayaran</th>

</tr>

</thead>

<tbody>

@foreach($fines as $fine)

<tr>

<td class="text-center">

{{ $loop->iteration }}

</td>

<td>

{{ $fine->borrowing->member->nama }}

</td>

<td>

Rp {{ number_format($fine->jumlah_denda,0,',','.') }}

</td>

<td class="text-center">

{{ $fine->status_bayar }}

</td>

</tr>

@endforeach

</tbody>

</table>

<div class="footer">

Dicetak pada :

{{ now()->format('d-m-Y H:i') }}

</div>

</body>

</html>