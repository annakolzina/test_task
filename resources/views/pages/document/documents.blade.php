@extends('layouts.app')
@section('title', 'Мои документы')
@section('content')

    <div class="container">
        @include('panels.search', ['route' => ['document.search'], 'own' => $own = [$my]])
        @include('panels.sort', $own = [$my])
        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Название</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Файл</th>
                    @if($own[0] == 2)
                        <th scope="col">Автор</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach($documents as $document)
                <tr>
                    <th scope="row">{{$count}}</th>
                    @can('update-document', $document)
                        <td><a href="{{route('document.edit', ['document' => $document])}}">{{$document->title}}</a></td>
                    @else
                        <td><p>{{$document->title}}</p></td>
                    @endcan
                    <td>{{$document->created_at}}</td>
                    <td>
                        <a href="{{route('document.download', ['document' => $document])}}"><i class="bi-download"></i></a>
                    </td>
                    @if($my == 2)
                        <td>{{$document->user->name}}</td>
                    @endif
                </tr>
                @php
                    $count++;
                @endphp
                @endforeach
            </tbody>
        </table>
        {{$documents->links()}}
    </div>
@endsection
