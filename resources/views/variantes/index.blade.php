<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid19 variant list</title>
</head>
<body>
    <h1>Covid19 variant list</h1>
    <p>*Updated Juanuary 28th</p>
    <a href="{{route('variantes.create')}}">Add variant</a>
    <table>
        <thead>
            <tr>
                <th>Lineage</th>
                <th>Common countries</th>
                <th>Earliest date</th>
                <th>Designated number</th>
                <th>Assigned number</th>
                <th>Description</th>
                <th>WHO name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($variantes as $variante)
                <tr>
                    <td>{{$variante->lineage}}</td>
                    <td>{{$variante->common_countries}}</td>
                    <td>{{$variante->earliest_date}}</td>
                    <td>{{$variante->designated_number}}</td>
                    <td>{{$variante->assigned_number}}</td>
                    <td>{{$variante->description}}</td>
                    <td>{{$variante->who_name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>