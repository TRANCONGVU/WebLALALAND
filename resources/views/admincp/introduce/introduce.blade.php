@extends('admincp.index')
@section('content')



<h1>
        Giới thiệu...
    </h1>
    
    <br>
    
    <div class="row">
        <div class="box-content"  >
            <div class="table-responsive" >
    
                <form name="create" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <textarea name="ducbe"  rows="10" cols="80">This is my textarea to be replaced with CKEditor.</textarea>

                    <div class="form-group">
                        <a class="btn btn-danger" href="" type="button" title="Cancel" value="">Quay lại</a>
                        <input name="submit" class="btn btn-primary" type="submit" value="Thêm">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'ducbe' )
    </script>
    
@endsection