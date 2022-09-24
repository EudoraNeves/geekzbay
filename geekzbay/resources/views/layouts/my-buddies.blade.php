@extends('layouts.template')
@section('title', 'My Buddies')
@section('css')
    <link rel="stylesheet" href="/css/pages/my-buddies.css">
@endsection
@section('main')
    <table>
        <thead>
            <colgroup>
                <col class='id'>
                <col class='avatar'>
                <col class='name'>
                <col class="discord">
            </colgroup>
        </thead>
        <tbody>
            <tr class='titles'>
                <th>ID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Discord</th>
            </tr>
            @foreach ($myBuddies as $myBuddy)
                <tr>
                    <td class="id">{{ $myBuddy->id }}</td>
                    <td>
                        <img class="table-avatar" src="data:image/png;base64,{{ $myBuddy->profilePicture }}" alt="">
                    </td>
                    <td class="name">
                        <span>{{ $myBuddy->name }}</span>
                    </td>
                    <td>
                        <a href="{{ "https://discord.com/users/$myBuddy->discord_id" }}">
                            <img class="discord_icon" src="discord-icon.svg" alt="discord">
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
