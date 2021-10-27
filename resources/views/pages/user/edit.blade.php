@extends('layouts.app')
@section('title', 'Редактирование пользователя')
@section('content')
    <div class="container">
        <div class="row">
            <div class="formEdit">
                <div class="heading">
                    <h1>Редактирование пользователя</h1>
                </div>
                @include('panels.errors')
                <form method="post" action="{{route('user.update', ['user' => $user])}}">
                    @csrf
                    @method('PATCH')
                    @include('pages.user.form', $user)
                    @include('panels.success', $value = ['Изменить'])
                </form>
                @include('panels.delete', [$values = ['user.destroy', 'user', $user]])
            </div>
        </div>
    </div>
@endsection
