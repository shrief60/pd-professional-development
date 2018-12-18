
@extends('layouts.main')

@section('content')
    <div class="container">
       
        <div class="row">
            <form method="post"  enctype="multipart/form-data" action="{{url('/levels/update',[$level->id])}}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <label for="name">First Language Level Name:</label>
                    <input type="text" class="form-control" name="first_lang_level_name" value='{{$level->first_lang_level_name}}'} >
                </div>
                <div class="form-group">
                    <label for="longitude">Second Language Level Name:</label>
                    <input type="text"  class="form-control" name="second_lang_level_name" value='{{$level->second_lang_level_name}}' >
                </div>
                <div class="form-group">
                    <label for="longitude">Self Weight</label>
                    <input type="number"  class="form-control" name="self_weight"min="0.00000000000000001" step="0.00000000000000001" value='{{$level->self_weight}}' >
                </div>
                <div class="form-group">
                    <label for="longitude">Peer Weight</label>
                    <input type="number"  class="form-control" name="peer_weight" min="0.00000000000000001" step="0.00000000000000001" value='{{$level->peer_weight}}' >
                </div>
                <div class="form-group">
                    <label for="longitude">Mentor Weight</label>
                    <input type="number"  class="form-control" name="mentor_weight" min="0.00000000000000001" step="0.00000000000000001" value='{{$level->mentor_weight}}' >
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

    </div>
@endsection
