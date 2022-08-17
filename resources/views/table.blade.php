<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NetPositive TEST</title>
    <link rel="stylesheet" href="/css/custom.css">
</head>

<body>
    <div id="title">
        <a href="/list">
            <h3>RESET</h3>
        </a>
    </div>

    <div class="middle">
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Level</th>
                <th>Net</th>
                <th>Count</th>
                <th>Vat (%)</th>
                <th>SUM Gross value</th>
            </tr>
            @foreach ($collection as $i => $row)
                <tr>
                    <td>{{ $row[0] }}</td>
                    <td>{{ $row[1] }}</td>
                    {{-- <td class="content"><a href="list/{{$row[2]}}">{{ $row[2] }}</a></td> --}}
                    <td class="content"><a href="{{ url('list/' . $row[2]) }}">{{ $row[2] }}</a></td>
                    <td class="content">{{ $row[3] }}</td>
                    <td class="content">{{ $row[4] }}</td>
                    <td class="content">{{ $row[5] }}</td>
                    <td class="content">{{ number_format($sumGV[$i], 3) }}</td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>SUM Gross value:</td>
                {{-- <td class="content">{{ $GV }}</td> --}}
                <td class="content">{{ number_format($GV, 3) }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
