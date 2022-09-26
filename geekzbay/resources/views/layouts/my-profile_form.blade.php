@extends('layouts.template')
@section('title', 'Edit Profile')
@section('css')
    <link rel="stylesheet" href="/css/pages/my_profile_form.css">
@endsection
@section('main')
    <div class="  my-profile d-flex flex-column justify-content-center flex-wrap align-items-center">
        <div class="all">
            <form action="{{ route('my-profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="profilePicture ">
                    <h1>Profile Picture: </h1>
                    {{-- upload profile photo --}}
                    <div>
                        <div id="preview">
                            <img id="output" src="data:image/png;base64, {{ $user->profilePicture }}">
                        </div>
                        <div>
                            <input type="file" id="loadfile" name="profilePicture" accept="image"
                                onchange="loadFile(event)">
                        </div>
                    </div>
                </div>
                {{-- name, email, birth date, desc --}}
                <div class="info">
                    <div class="name">
                        <span><b>Name: </b></span><span>{{ $user->name }}</span>
                    </div>
                    <div class="email">
                        <span><b>Email: </b></span><span>{{ $user->email }}</span>
                    </div>
                    <div class="birthDate">
                        <label for="birthDate"><b>Birth Date: </b></label>
                        <input type="date" name="birthDate" id="" value="{{ $user->birthDate }}">
                    </div>
                    <div class="desc">
                        <b><label for="desc">Desc:</label></b>
                    </div>
                    <textarea name="desc" id="" cols="30" rows="5">{{ $user->desc }}</textarea>
                </div>
                <div><input type="submit" value="submit"></div>
            </form>
        </div>
    </div>


@endsection
<script>
    //photo preview before submiting
    var loadFile = function(event) {
        var output = document.getElementById('output')
        output.src = URL.createObjectURL(event.target.files[0])
        output.onload = function() {
            URL.revokeObjectURL(preview.src)
        }
    }
</script>
