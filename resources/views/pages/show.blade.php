@extends('layouts.app')
@section('title', 'Просмотр документа')
@section('content')
    <iframe src="{{'storage/'.$document->file}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
@endsection
