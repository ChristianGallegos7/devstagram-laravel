@extends('layouts.app')


@section('titulo')
    Tu cuenta
@endsection


@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/login.jpg') }}" alt="login image">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <p class="text-gray-800 text-2xl">{{auth()->user()->username}}☄</p>
            </div>
        </div>
    </div>
@endsection
