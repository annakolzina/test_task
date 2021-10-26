@extends('layouts.app')
@section('title', 'Редактирование пользователя')
@section('content')
    <div class="container">
        <div class="row">
            <div class="creditCardForm">
                <div class="heading">
                    <h1>Редактирование пользователя</h1>
                </div>
                @include('panels.errors')
                    <form method="post" action="{{route('user.update', ['user' => $user])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Имя') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name"  autofocus value="{{old('name', $user->name)}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email"  autofocus value="{{old('email', $user->email)}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="visible" class="col-md-4 col-form-label text-md-right">Администратор</label><br/><br/>
                            <input type="checkbox" class="mt-2" name="role" @if($user->role == 1) checked @endif>
                        </div>
                        <div class="form-group row">
                            <button type="submit" class="btn btn-success offset-2">Добавить</button>
                        </div>
                    </form>
                    <form method="POST" action={{route('user.destroy', ['user' => $user])}}>
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger offset-2" >Удалить</button>
                        </div>
                    </form>
            </div>
@endsection
