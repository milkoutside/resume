@extends('layouts.app')

@section('content')
    <div class="container login-body mt-5">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="userName">Введите логин:</label>
                <input type="text" name="userName" id="userName">
            </div>
            <div class="row mb-3">
                <label for="password">Введите пароль:</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="row">
                <button type="submit">Вход</button>
            </div>
            @if ($errors->any())
                <div class="row mt-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </form>
    </div>
@endsection
