@extends('layouts.app')
@section('content')
    <div class="header">Лот</div>
    <div style="width: 80%; float: right; padding: 30px">
        @if($errors->any())
            <div class="alert-danger alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('lots.store') }}">
            @csrf
            <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Назва</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="title" value="{{old('name')}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="text" class="col-sm-2 col-form-label">Опис</label>
                <div class="col-sm-10">
                    <input type="text" name="description" class="form-control" id="text" value="{{ old('description') }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>
    </div>
    <div class="lsb">
        <div class="button">
            <a type="button" class="btn btn-warning mt-1" href="{{ route('lots.index') }}">Усі лоти</a>

        </div>

    </div>
@endsection
