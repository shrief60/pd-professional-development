
@extends('layouts.main')

@section('content')
    <div class="container">
       
        <div class="row">
            <form method="post"  enctype="multipart/form-data" action="{{url('/objectives/update',[$objective->id,$objective->topic_id])}}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <label for="name">First Language objective:</label>
                    <textarea type="text" class="form-control" name="first_lang_objective">{{$objective->first_lang_objective}}</textarea>
                </div>
                <div class="form-group">
                    <label for="longitude">Second Language objective:</label>
                    <textarea type="text" class="form-control" name="second_lang_objective">{{$objective->second_lang_objective}}</textarea>
                </div>

                <div class="form-group">
                    <input type="hidden"  class="form-control" name="topic_id" value='{{$objective->topic_id}}' >
                </div>
                

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

    </div>
@endsection
