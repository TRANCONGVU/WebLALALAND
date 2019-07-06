@extends('admincp.index')
@section('content')



<h1>
        Sửa Giới thiệu...
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
    
                @foreach ($introduce as $value)
                <form name="create" action="{{url('admincp/introduce/editIntro').'/'.$value->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                <textarea name="content"  rows="10" cols="80">{{$value->content}}{{ old('content')}}</textarea>


                    <div class="form-group">
                        <a class="btn btn-danger" href="{{url('admincp/introduce/listintroduce')}}" type="button" title="Cancel" value="">Hủy</a>
                        <input name="submit" class="btn btn-primary" type="submit" value="Lưu">
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'content' )
    </script>
    
@endsection