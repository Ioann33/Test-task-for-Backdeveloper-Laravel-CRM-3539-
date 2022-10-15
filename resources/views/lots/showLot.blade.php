@extends('layouts.app')
@section('content')
    <div class="header">Лот</div>

    <div class="main">

        @if(!empty($lot->categories))
            @foreach($lot->categories as $category)
                <div class="card lot" style="width: 18rem;">
                    <img src="https://rau.ua/wp-content/uploads/2018/11/Nielsen-810x540.jpg" class="card-img-top" alt="фото с категориями">
                    <div class="card-body">
                        <h5 class="card-text">{{$category->name}}</h5>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="lsb">
        <div class="button">

            <a type="button" class="btn btn-primary" href="{{ route('lots.edit', $lot->id) }}">Редагувати лот</a>
            <a type="button" class="btn btn-warning mt-1" href="{{ route('lots.index') }}">Всі лоти</a>

            <form method="post" action="{{ route('lots.destroy', $lot->id) }}">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger mt-1">Видалити</button>
            </form>
            <div style="float: right; text-align: center; font-size: x-large;">{{ $lot->name }}</div>
            <div style="float: right; font-size: x-large; word-wrap: break-word;">{{ $lot->description }}</div>
        </div>

    </div>
@endsection
