<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Laporan Peminjaman</title>

    <style>

        body{

            font-family: DejaVu Sans, sans-serif;

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

    Laporan Data Peminjaman Buku

</p>

<table>

    <thead>

        <tr>

            <th>No</th>

            <th>Nama Anggota</th>

            <th>Buku</th>

            <th>Tanggal Pinjam</th>

            <th>Tanggal Kembali</th>

            <th>Status</th>

        </tr>

    </thead>

    <tbody>

    @foreach($borrowings as $item)

        <tr>

            <td class="text-center">

                {{ $loop->iteration }}

            </td>

            <td>

                {{ $item->member->nama }}

            </td>

            <td>

                @foreach($item->books as $book)

                    {{ $book->judul }}

                    @if(!$loop->last)

                        ,

                    @endif

                @endforeach

            </td>

            <td class="text-center">

                {{ $item->tanggal_pinjam }}

            </td>

            <td class="text-center">

                {{ $item->tanggal_kembali }}

            </td>

            <td class="text-center">

                {{ $item->status }}

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