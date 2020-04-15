@extends('layouts.app')

@section('content')
    <body>
        <div class="diva">
            <form class="formulaire" action="{{action('AdminController@add')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ Auth::user()->id }}" name="id">
                <label>Product Name</label><input class="ci" type="text" name="name"/><br>
                <label>Product Type</label><input class="ci" type="text" name="type"/><br>
                <label>Product Description</label><input class="ci" type="text" name="description"/><br>
                <label>Image</label><input class="ci" type="file" name="image"/><br>
                <label>Price</label><input class="ci" type="text" name="price"/><br>

                <input class="ci" type="submit" value="Submit">
            </form>
        </div>
    </body>
@endsection
