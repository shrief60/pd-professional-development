@extends("layouts.main")

@section("content")
    <div class="container">
        <div class="row">
            <form method="post"  enctype="multipart/form-data" action="{{url('/credits/create',[$behavior_id,$teacher_id])}}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>


                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file"  class="form-control" name="image" multiple >
                </div>

                <div class="form-group">
                    <label for="imageDescreption">Image</label>
                    <input type="text"  class="form-control" name="imageDescreption"  id="image_URL" >
                </div>

                <div class="form-group">
                    <label for="video">Video</label>
                    <input type="file"  class="form-control" name="video" >
                </div>

                <div class="form-group">
                    <label for="videoDescreption">Video</label>
                    <input type="text"  class="form-control" name="videoDescreption" >
                </div>

                <div class="form-group">
                    <label for="pdf">PDF</label>
                    <input type="file"  class="form-control" name="pdf" >
                </div>
                <div class="form-group">
                    <label for="pdfDescreption">PDF</label>
                    <input type="text"  class="form-control" name="pdfDescreption" >
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
    
@endsection
