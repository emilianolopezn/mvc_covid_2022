<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid19 variant list</title>
</head>
<body>
    <h1>Covid19 variant list</h1>
    @if(Session::has('success'))
        <p style="color: green;">{{Session::get('success')}}</p>
    @endif
    @if(Session::has('error'))
        <p style="color: red;">{{Session::get('error')}}</p>
    @endif
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
                <th>Actions</th>
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
                    <td>
                        <a href="{{route('variantes.edit',$variante->id)}}">Edit</a>
                        <form method="post" 
                            action="{{route('variantes.destroy',$variante->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>