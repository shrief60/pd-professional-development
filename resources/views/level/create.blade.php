
@extends('layouts.main')

@section('content')
    <div class="container">
       
        <div class="row">
            <form method="post"  enctype="multipart/form-data" action="{{url('/levels/create')}}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <label for="name">First Language Level Name:</label>
                    <input type="text" class="form-control" name="first_lang_level_name"/>
                </div>
                <div class="form-group">
                    <label for="longitude">Second Language Level Name:</label>
                    <input type="text"  class="form-control" name="second_lang_level_name" >
                </div>
                
                <div class="form-group">
                    <label for="longitude">Self Weight</label>
                    <input type="number"  class="form-control" name="self_weight"  step="0.00000000000000001" >
                </div>
                <div class="form-group">
                    <label for="longitude">Peer Weight</label>
                    <input type="number"  class="form-control" name="peer_weight"  step="0.00000000000000001" >
                </div>
                <div class="form-group">
                    <label for="longitude">Mentor Weight</label>
                    <input type="number"  class="form-control" name="mentor_weight"  step="0.00000000000000001" >
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>

    </div>
@endsection
