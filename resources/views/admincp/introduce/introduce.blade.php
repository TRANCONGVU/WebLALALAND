@extends('admincp.index')
@section('content')



<h1>
        Giới thiệu...
    </h1>
    
    <br>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <div class="row">
        <div class="box-content"  >
            <div class="table-responsive" >
    
                <form name="create" action="{{url('admincp/introduce/introduce')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <textarea name="content"  rows="10" cols="80">{{ old('content')}}</textarea>


                    <div class="form-group">
                        <a class="btn btn-danger" href="{{url('admincp/introduce/listintroduce')}}" type="button" title="Cancel" value="">Quay lại</a>
                        <input name="submit" class="btn btn-primary" type="submit" value="Thêm">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'content' )
    </script>
    
@endsection