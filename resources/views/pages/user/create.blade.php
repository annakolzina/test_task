@php
  use App\Models\User;
@endphp
@extends('layouts.app')
@section('title', 'Создание пользователя')
@section('content')
    <div class="container">
        <div class="row">
            <div class="creditCardForm">
                <div class="heading">
                    <h1>Создание пользователя</h1>
                </div>
                @include('panels.errors')
                <form method="post" action="{{route('user.store')}}">
                    @csrf
                    @include('pages.user.form', $user = new User())
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('password') }}</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    @include('panels.success', $value = ['Создать'])
                </form>
            </div>
@endsection
