@extends('layouts.template')
@section('title', 'Edit Profile')
@section('css')
    <link rel="stylesheet" href="css/my-profile_form.css">
    <style>
        .my-profile {
            box-shadow: 5px 10px 20px gold inset;
        }
        form {
            width: 30%;
            margin: 0 auto;
            padding: 3rem;
        }

        .profilePicture {
            display: flex;
            gap: 1rem;
        }

        textarea {
            color: black;
            vertical-align: top;
        }

        img {
            width: 10rem;
        }
    </style>
@endsection
@section('main')
    <div class="my-profile">
        <form action="{{ route('my-profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="profilePicture">
                <label for="profilePicture"><b>Profile Picture: </b></label>
                <div>
                    <div>
                        <img id="preview" src="data:image/png;base64, {{ $user->profilePicture }}" alt="">
                    </div>
                    <div>
                        <input type="file" id="profilePicture" name="profilePicture" accept="image/*"
                            onchange="loadFile(event)">
                    </div>
                </div>
            </div>
            <div class="name">
                <span><b>Name: </b></span><span>{{ $user->name }}</span>
            </div>
            <div class="email">
                <span><b>Email: </b></span><span>{{ $user->email }}</span>
            </div>
            <div class="desc">
                <label for="desc"><b>Desc: </b></label>
                <textarea name="desc" id="" cols="30" rows="10">{{ $user->desc }}</textarea>
            </div>
            <div class="birthDate">
                <label for="birthDate"><b>Birth Date: </b></label>
                <input type="date" name="birthDate" id="" value="{{ $user->birthDate }}">
            </div>
            <input type="submit" value="submit">
        </form>
    </div>

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('preview')
            output.src = URL.createObjectURL(event.target.files[0])
            output.onload = function() {
                URL.revokeObjectURL(preview.src)
            }
        }
    </script>
@endsection
