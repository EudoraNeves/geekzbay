@extends('layouts.template')
@section('title', 'My Buddies')
@section('css')
    <style>
        .table-avatar {
            width: 2rem;
            height: 2rem;
        }
    </style>
@endsection
@section('main')
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($myBuddies as $myBuddy)
                <tr>
                    <td>{{ $myBuddy->id }}</td>
                    <td>
                        <img class="table-avatar" src="data:image/png;base64,{{ $myBuddy->profilePicture }}" alt="">
                        <span>{{ $myBuddy->name }}</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
