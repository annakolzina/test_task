@extends('layouts.app')
@section('title', 'Пользователи')
@section('content')
    <div class="container">
        @include('panels.search', ['route' => ['user.search'], 'own' => [null]])
        <a href="{{route('user.create')}}">Добавить нового пользователя</a>
        <table class="table table-hover mt-4">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Имя</th>
                <th scope="col">email</th>
                <th scope="col">роль</th>
                <th scope="col">просмотр</th>
            </tr>
            </thead>
            <tbody>
            @php
                $count = 1;
            @endphp
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$count}}</th>
                    <td><a href="{{route('user.edit', ['user' => $user])}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{($user->role==1) ? 'администратор' : 'пользователь'}}</td>
                    <td>
                        <a href="{{route('user.show', ['user' => $user])}}"><i class="bi-eye"></i></a>
                    </td>
                </tr>
                @php
                    $count++;
                @endphp
            @endforeach
            </tbody>
        </table>
        {{$users->links()}}
    </div>
@endsection
