<div class="container">
    <div>
        <form action="{{action ([App\Http\Controllers\FileUpload::class,'store'])}}" method="post" enctype="multipart/form-data">
        @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
    
            <div class = "form-group">
                <label>EMAIL</label>
                <input type ="text" name="email" class="form-control" placeholder="name@name.com">
            </div>
            <br>
            <div class="form-group">
                <label for="clinic_file">Clinic_File:</label>
                <input type="clinic_file" class="form-control-file" id="clinic_file" name="clinic_file">
            </div>
            <br>

            <div class = "form-group">
                <button type="submit"  class="btn btn-primary btn-block mt-4">
                Update Info
                </button>

            <div>
        </form>
        <br>
 




    </div>
</div>
