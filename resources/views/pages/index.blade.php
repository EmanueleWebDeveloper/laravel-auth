@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">

    <div class="container py-5 ">
        <h1>Emanuele Luca Cali Portfolio</h1>

        <a class="btn btn-primary" href="{{ route('dashboard.project.create') }}">Aggiungi nuovo progetto</a>
<div class="d-flex py-3">

        @foreach ($project as $item )

        <div class="card " style="width: 18rem;">
            <img src="{{$item->cover}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$item->title}}</h5>
                <h6>{{$item->slug}}</h6>
                {{-- <p class="card-text">{{$item->content}}</p> --}}

                <form method="POST" action=" {{route( 'dashboard.project.destroy', $item->id) }}" >

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

                <div class="">
                    <a class="btn btn-warning" href="{{ route('dashboard.project.edit', $item->id) }}">Modfica progetto</a>
                </div>
            </div>
        </div>

        @endforeach
    </div>
    </div>
</div>


@endsection
