@extends('layouts.app')
@section('title', $document->title)
@section('content')
    <div class="container">
        <table class="table table-hover table-bordered mt-4">
            <thead>
                <tr>
                    <th scope="col" colspan="3">Просмотр документа</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Название</th>
                    <td>{{$document->title}}</td>
                </tr>
                <tr>
                    <th>Файл</th>
                    <td>{{$document->file}}</td>
                </tr>
                <tr>
                    <th>Дата создания</th>
                    <td>{{$document->created_at}}</td>
                </tr>
                @cannot('update-document', $document)
                    <tr>
                        <th>Автор</th>
                        <td>{{$document->user->name}}</td>
                    </tr>
                @endcan
            </tbody>
        </table>
        @can('update-document', $document)
            <a class="btn btn-success" href="{{route('document.edit', ['document' => $document])}}" role="button">Редактировать</a>
        @endcan
        <a class="btn btn-primary" href="{{route('document.download', ['document' => $document])}}" role="button">Скачать</a>
    </div>
@endsection
