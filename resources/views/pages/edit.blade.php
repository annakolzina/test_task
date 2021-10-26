@extends('layouts.app')
@section('title', 'Редактирование документа')
@section('content')
    <div class="container">
        <div class="row">
            <div class="creditCardForm">
                <div class="heading">
                    <h1>Редактирование документа</h1>
                </div>
                @include('panels.errors')
                <div class="payment">
                    <form method="post" action="{{route('document.update', ['document' => $document])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label">{{ __('Название') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title"  autofocus value="{{old('title', $document->title)}}">
                            </div>
                        </div>
                        <div class="form-group owner">
                            <label for="file">Загрузить документ</label>
                            <input type="file" name="file">
                        </div>
                        <div class="form-group row">
                            <label for="is_visible" class="col-md-3 col-form-label ">Видимый</label><br/><br/>
                            <input type="checkbox" class="mt-2" name="is_visible" @if($document->is_visible) checked @endif>
                        </div>
                        <div class="form-group" >
                            <button type="submit" class="btn btn-success">Добавить</button>
                        </div>
                    </form>
                    <form method="POST" action={{route('document.destroy', ['document' => $document])}}>
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger" >Удалить</button>
                        </div>
                    </form>
                </div>
            </div>
@endsection
