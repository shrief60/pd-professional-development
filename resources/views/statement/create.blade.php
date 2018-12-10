
@extends('layouts.main')

@section('content')
    <div class="container">
       
        <div class="row">
            <form method="post"  enctype="multipart/form-data" action="{{url('/statements/create',[$objective_id])}}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <label for="name">First Language Statement:</label>
                    <textarea type="text" class="form-control" name="first_lang_statement"></textarea>
                </div>
                <div class="form-group">
                    <label for="longitude">Second Language Statement:</label>
                    <textarea type="text"  class="form-control" name="second_lang_statement" ></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden"  class="form-control" name="objective_id" value={{$objective_id}} >
                </div>


                <div class="form-group">
                    <label for="type"> Level : </label>
                    <select name="level_id" >
                        @foreach($levels as $key => $value)
                            <option value="{{$value->id}}">   {{$value->first_lang_level_name}} .... {{$value->second_lang_level_name}}   </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="type"> Prerequisite : </label>
                    @if (empty($statements)){
                <input type="hidden"  class="form-control" name="pre_requisite" value="-1" >       
                    }
                    
                    @else
                    <select name="pre_requisite" >
                    <option value="-1" >  No pre   </option>

                        @foreach($statements as $key => $value)
                        <option value={{$value->id}} >   {{$value->first_lang_statement}}    </option>
                        @endforeach
                    </select>
                    @endif
                    
                    
                </div>
                

                <div class="form-group">
                    <label for="longitude">Require Points</label>
                    <input type="number"  class="form-control" name="require_points" >
                </div>
                
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>

    </div>
@endsection
