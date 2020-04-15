@extends('layouts.app')

@section('content')

    <div id="td">
        <td>Product Name</td>
    </div>
    <div id="td">
        <td>Price</td>
    </div>
    <div id="td">
        <td>Quantity</td>
    </div>
    @foreach($name as $data)
        <script>
            function addTextNode({{ $data -> name }}) {
                var newtext = document.createTextNode({{ $data -> name }}),
                    p1 = document.getElementById("p1");

                p1.appendChild(newtext);
            }
        </script>
        <div>
            <p id = "p1">

            </p>
        </div>
    @endforeach
@endsection
