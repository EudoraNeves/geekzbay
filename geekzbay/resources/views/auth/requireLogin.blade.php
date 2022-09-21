@extends('layouts.template')
@section('title', 'Login Required')
@section('css')
<style>
    .requireLogin {
        display: flex;
        justify-content: center;
    }
    p {
        font-size: 2rem;
    }
</style>
@endsection
@section('main')
    <div class="requireLogin">
        <p>Whoops! Please go log in first :)</p>
    </div>
@endSection
