
@extends('layouts.main')

@section('content')
    <div class="container">
       
        <div class="row">
            <form method="post"  enctype="multipart/form-data" action="{{url('/topics/update',[$topic->id])}}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <label for="name">First Language Major Name:</label>
                    <input type="text" class="form-control" name="first_lang_major_name" value='{{$topic->first_lang_major_name}}'} >
                </div>
                <div class="form-group">
                    <label for="longitude">Second Language Major Name:</label>
                    <input type="text"  class="form-control" name="second_lang_major_name" value='{{$topic->second_lang_major_name}}' >
                </div>
                <div class="form-group">
                    <label for="latitude">First Language Descreption :</label>
                    <textarea class="form-control" name="first_lang_desc" value='{{$topic->first_lang_desc}}' > {{$topic->first_lang_desc}} </textarea>
                </div>

                <div class="form-group">
                    <label for="address">Second Language Descreption:</label>
                    <textarea class="form-control" name="second_lang_desc" >{{$topic->second_lang_desc}} </textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

    </div>
@endsection
