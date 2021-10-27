@extends('layouts.app')
@section('title', 'Редактирование документа')
@section('content')
    <div class="container">
        <div class="row">
            <div class="formEdit">
                <div class="heading">
                    <h1>Редактирование документа</h1>
                </div>
                @include('panels.errors')
                <form method="post" action="{{route('document.update', ['document' => $document])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @include('pages.document.form', $document)
                    @include('panels.success', $value = ['Изменить'])
                </form>
                @include('panels.delete', [$values = ['document.destroy', 'document', $document]])
            </div>
        </div>
    </div>

@endsection
