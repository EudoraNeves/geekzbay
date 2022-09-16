@extends('layouts.template')
@section('title', 'buddy')
@section('css')
    <link rel="stylesheet" href="css/buddy.css">
@endsection
@section('main')
    <div class="container">
        <section class="status">
            {{-- @if (session('success'))
                <span style="color: green">{{ session('success') }}</span>
            @elseif(session('error'))
                <span style="color: red">{{ session('error') }}</span>
            @endif --}}

        </section>
        <section class='findBuddy'>
            <div class="myProfile">
                <x-buddy-card username="Yan Crazy" quote="Kick Yan's asssssssssssss!" imgSrc="" imgAlt="Yan's ass" />
            </div>
            <div class="findBuddy_btn">
                <button type="button" class="btn btn-warning">Find Buddy</button>
            </div>
            <div class="buddyProfile">
                <x-buddy-card username="Amin Crazy" quote="Kick Amin's asssssssssssss!" imgSrc="" imgAlt="Amin's ass" />
            </div>
        </section>
    </div>
@endsection
