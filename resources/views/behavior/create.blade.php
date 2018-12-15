
@extends('layouts.main')

@section('content')
    <div class="container">
       
        <div class="row">
            <form method="post"  enctype="multipart/form-data" action="{{url('/behaviors/create',[$statement_id])}}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <label for="name">First Language behavior:</label>
                    <textarea type="text" class="form-control" name="first_lang_behavior"></textarea>
                </div>
                <div class="form-group">
                    <label for="longitude">Second Language behavior:</label>
                    <textarea type="text"  class="form-control" name="second_lang_behavior" ></textarea>
                </div>


                <div class="form-group">
                    <label for="longitude">Max Self</label>
                    <input type="number"  class="form-control" name="max_self" >
                </div>

                <div class="form-group">
                    <label for="longitude">Max Peer</label>
                    <input type="number"  class="form-control" name="max_peer" >
                </div>

                <div class="form-group">
                    <label for="longitude">Max Mentor</label>
                    <input type="number"  class="form-control" name="max_mentor" >
                </div>
                
                <div class="form-group">
                    <input type="hidden"  class="form-control" name="statement_id" value={{$statement_id}} >
                </div>
                
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>

    </div>
@endsection
