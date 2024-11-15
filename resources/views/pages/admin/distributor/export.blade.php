<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export Data Distributor</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th,
        td {
            border: 1px solid black;
            text-align: center;
            padding: 4px;
        }

        th {
            background-color: #f2f2f2;
        }

        .vertical-text {
            writing-mode: vertical-lr;
            transform: rotate(180deg);
        }

        .no-border {
            border: none;
        }

        .horizontal-span {
            text-align: center;
        }

        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>
    <h4 style="text-align: center;">DATA DISTRIBUTOR</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Distributor</th>
                <th>Lokasi</th>
                <th>Kontak</th>
                <th>Email</th>
            </tr>
        </thead>
        @php
            $no = 0;
        @endphp
        <tbody>
            @foreach ($distributors as $item)
                <tr>
                    <td>{{ $no += 1 }}</td>
                    <td>{{ $item->nama_distibutor }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>{{ $item->kontak }}</td>
                    <td>{{ $item->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>