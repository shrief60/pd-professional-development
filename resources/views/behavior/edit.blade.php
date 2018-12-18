
@extends('layouts.main')

@section('content')
    <div class="container">
       
        <div class="row">
            <form method="post"  enctype="multipart/form-data" action="{{url('/behaviors/update',[$behavior->id,$behavior->statement_id])}}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <label for="name">First Language behavior:</label>
                    <textarea type="text" class="form-control" name="first_lang_behavior">{{$behavior->first_lang_behavior}}</textarea>
                </div>
                <div class="form-group">
                    <label for="longitude">Second Language behavior:</label>
                    <textarea type="text" class="form-control" name="second_lang_behavior">{{$behavior->second_lang_behavior}}</textarea>
                </div>

                <div class="form-group">
                    <label for="name">Max Self:</label>
                    <input type="number"  class="form-control" name="max_self" value='{{$behavior->max_self}}' >
                </div>
                <div class="form-group">
                    <label for="name">Max Peer:</label>

                    <input type="number"  class="form-control" name="max_peer" value='{{$behavior->max_peer}}' >
                </div>
                <div class="form-group">
                    <label for="name">Max Mentor:</label>
                    <input type="number"  class="form-control" name="max_mentor" value='{{$behavior->max_mentor}}' >
                </div>
                <div class="form-group">
                    <input type="hidden"  class="form-control" name="statement_id" value='{{$behavior->statement_id}}' >
                </div>
                

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

    </div>
@endsection
