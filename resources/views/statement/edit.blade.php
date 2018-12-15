
@extends('layouts.main')

@section('content')
    <div class="container">
       
        <div class="row">
            <form method="post"  enctype="multipart/form-data" action="{{url('/statements/update',[$statement->objective_id,$statement->id])}}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <label for="name">First Language Statement:</label>
                    <textarea type="text" class="form-control" name="first_lang_statement">{{$statement->first_lang_statement}}</textarea>
                </div>
                <div class="form-group">
                    <label for="longitude">Second Language Statement:</label>
                    <textarea type="text" class="form-control" name="second_lang_statement">{{$statement->second_lang_statement}}</textarea>
                </div>

                <div class="form-group">
                    <input type="hidden"  class="form-control" name="objective_id" value='{{$statement->objective_id}}' >
                </div>
                
                <div class="form-group">
                    <label for="type"> Level : </label>
                    <select name="level_id" >
                        @foreach($levels as $key => $value)
                            <option value="{{$value->id}}" {{ $statement->level_id == $value->id ? 'selected': ''}}>   {{$value->first_lang_level_name}} .... {{$value->second_lang_level_name}}   </option>
                        @endforeach
                    </select>
                </div>


         <div class="form-group">
                    <label for="type"> Prerequisite : </label>

                    <select name="pre_requisite" >
                    @if ($statement->pre_requisite==-1){
                    <option value="-1" >  No pre   </option>
                    @foreach($statements as $key => $value)
                        <option value= "{{$value->id}}" >   {{$value->first_lang_statement}}    </option>
                        @endforeach
                    }
                    @else 
                    <option value="-1" >  No pre   </option>
                    @foreach($statements as $key => $value)
                        <option value="{{$value->id}}" {{ $statement->pre_requisite == $value->id ? 'selected': ''}} >   {{$value->first_lang_statement}}    </option>
                        @endforeach

                    @endif  

                       
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="longitude">Require Points</label>
                    <input type="number"  class="form-control" name="require_points" value="{{$statement->require_points}}" min="0.00000000000000001" step="0.00000000000000001">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

    </div>
@endsection
