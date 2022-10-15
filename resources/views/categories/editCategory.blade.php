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
        <form method="post" action="{{ route('categories.update', $category->id) }}">
            @method('PATCH')
            @csrf
            <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Назва</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="title" value="{{ $category->name }}">
                </div>
            </div>
            <select class="form-select" aria-label="Default select example" name="lot_id">
                <option selected value="{{ $category->lot->id }}">{{$category->lot->name}}</option>
                @foreach($lots as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary mt-2">Оновити</button>
        </form>
    </div>
    <div class="lsb">
        <div class="button">
            <a type="button" class="btn btn-warning mt-1" href="{{ route('categories.index') }}">Усі категорії</a>
            <form method="post" action="{{ route('categories.destroy', $category->id) }}">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger mt-1">Видалити</button>
            </form>
        </div>

    </div>
@endsection
