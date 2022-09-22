@extends('layouts.template')
@section('title', 'Edit Profile')
@section('css')
    <link rel="stylesheet" href="/css/my_profile_form.css">

@endsection
@section('main')
    <div class="  my-profile d-flex flex-column justify-content-center flex-wrap align-items-center">
        <div class="all">
            <form action="{{ route('my-profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="profilePicture">
                    <label for="profilePicture">
                        <h1>Profile Picture: </h1>
                    </label>

                    <div>
                        <div class="preview">
                            <img src="data:image/png;base64, {{ $user->profilePicture }}">
                        </div>
                        <br>
                        <div>
                            <input type="file" id="profilePicture" name="profilePicture" accept="image/*"
                                onchange="loadFile(event)">
                        </div>
                    </div>
                </div>

                <br>
                <br>
                <br>
                <br>
                <br>

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

                    <span><input type="submit" value="submit"></span>
                </div>

            </form>
        </div>
    </div>


@endsection
<script>
    var loadFile = function(event) {
        var output = document.getElementById('preview')
        output.src = URL.createObjectURL(event.target.files[0])
        output.onload = function() {
            URL.revokeObjectURL(preview.src)
        }
    }
</script>
