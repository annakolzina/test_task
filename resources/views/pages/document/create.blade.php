@php
    use App\Models\Document;
@endphp
@extends('layouts.app')
@section('title', 'Форма')
@section('content')
    <div class="container">
        <h1>Создание нового документа</h1>
        @include('panels.errors')
        <form method="post" action="{{route('document.store')}}" enctype="multipart/form-data">
            @csrf
            @include('pages.document.form')
            @include('panels.success', $value = ['Добавить'])
        </form>
    </div>
@endsection
