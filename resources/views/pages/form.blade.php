@extends('layouts.app')
@section('title', 'Форма')
@section('content')
    <div class="container">
        <h1>Создание нового документа</h1>
        @include('panels.errors')
        <form method="post" action="{{route('document.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="title" class="col-md-2 col-form-label">{{ __('Название') }}</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="title">
                </div>
            </div>
            <div class="form-group row">
                <label for="file">Загрузить документ</label>
                <input type="file" name="file">
            </div>
            <div class="form-group row">
                <label for="visible" class="col-md-3 col-form-label ">Видимый</label><br/><br/>
                <input type="checkbox" class="mt-2" name="visible">
            </div>
            <div class="form-group row">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </form>
    </div>
@endsection
