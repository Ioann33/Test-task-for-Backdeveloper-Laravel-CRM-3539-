@extends('layouts.app')
@section('content')
    <div class="header">Категорії</div>
    <div class="main">
        @if(isset($categories))
            @foreach($categories as $category)
                <a class="card lot" style="width: 18rem;" href="{{ route('categories.edit',$category->id) }}">
                    <img src="https://rau.ua/wp-content/uploads/2018/11/Nielsen-810x540.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-text">{{$category->name}}</h5>
                    </div>
                </a>
            @endforeach
        @endif
    </div>
    <div class="lsb">
        <div class="button">
            <a type="button" class="btn btn-primary mt-1" href="{{ route('lots.index') }}">Лоти</a>
            <a type="button" class="btn btn-warning mt-1" href="{{ route('categories.create') }}">Додати категорію</a>
        </div>
    </div>
@endsection
