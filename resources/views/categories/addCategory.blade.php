@extends('layouts.app')
@section('content')
    <div class="header">Категорія</div>
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
        <form method="post" action="{{ route('categories.store') }}">
            @csrf
            <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Назва</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="title" value="{{ old('name') }}">
                </div>
            </div>
            <select class="form-select" aria-label="Default select example" name="lot_id">
                <option selected>Вибір лота</option>
                @foreach($lots as $lot)
                    <option value="{{ $lot->id }}">{{ $lot->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary mt-2">Зберегти</button>
        </form>
    </div>
    <div class="lsb">
        <div class="button">
            <a type="button" class="btn btn-warning mt-1" href="{{ route('categories.index') }}">Усі категорії</a>

        </div>

    </div>
@endsection
