@extends('layouts.template')
@section('title', 'My Buddies')
@section('css')
    <style>
        table {
            margin: 2rem;
        }

        th {
            text-align: center
        }

        .table-avatar {
            height: 3rem;
        }

        col {
            width: 15rem;
        }
        tr td {
            text-align: center;
        }
        td.name {
            text-align: left;
        }

        col.id {
            width: 3rem;
        }

        col.avatar {
            width: 3rem;
        }

        col.name {
            width: 10rem;
        }

        col.discord {
            width: 5rem;
        }
    </style>
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
