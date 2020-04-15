@extends('layouts.app')

@section('content')


    <section>
    <!-- article 1 -->
        @foreach($name as $data)
            <article>


                <a href="/produit" >
                    <div class="div_down">
                        <p>
                            {{ $data -> name }}
                        </p>
                    </div>
                    </a>
                    <a href="/produit" >
                        <div class="div">
                            <img src="../img/{{ $data -> image }}" class="image" id="phone_0">
                        </div>
                    </a>

                    <a href="/produit" >
                        <div class="div_up">
                            <h1>Achat direct</h1>
                        </div>
                    </a>
            </article>
        @endforeach
    </section>

@endsection