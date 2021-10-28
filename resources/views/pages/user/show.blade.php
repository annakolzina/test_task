@extends('layouts.app')
@section('title', $user->name)
@section('content')
    <div class="container">
        <table class="table table-hover table-bordered mt-4">
            <thead>
                <tr>
                    <th scope="col" colspan="3">Просмотр информации о пользователе</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Имя</th>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <th>Почта</th>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <th>Роль</th>
                    <td>{{($user->role == 1) ? 'администратор' : 'пользователь'}}</td>
                </tr>
            </tbody>
        </table>
        <a class="btn btn-success" href="{{route('user.edit', ['user' => $user])}}" role="button">Редактировать</a>
    </div>
@endsection
