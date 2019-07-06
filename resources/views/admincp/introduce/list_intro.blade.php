@extends('admincp.index')
@section('content')


<h1>
        Danh sách giới thiệu...
    </h1>
    <br>
    
    @if(session('thongbao'))
        <div class="alert alert-success">
            {{ session('thongbao') }}
        </div>
    @endif
    
    <div class="table-data__tool">
    <a class="btn btn-success" href="{{url('admincp/introduce/introduce')}}">Thêm Giới thiệu</a>
    </div>
    <br>
    <table class="dataTables_filter table table-bordered table-hover" id="dbtbl">
        <thead>
            <tr>
                <th class="col-md-3">Thông tin giới thiệu</th>
                <th class="col-md-3">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($introduce as $value)
                <tr>    
                    
                    <td>
                        <div class="ducbe">
                            {!!$value->content!!}    
                        </div> 
                    </td>
                    <td>
                        <a type="button" class="fa fa-edit btn btn-default btn btn-success" href="" title="Sửa"></a>
                        <a type="button" class="fa fa-trash btn btn-default btn btn-danger" href="" onclick="return confirmAction()" title="Xóa">Xóa</a>
                    </td>
                </tr>    
            @endforeach
            
        </tbody>
    
    </table>
    <script language="JavaScript">
        function confirmAction() {
            return confirm("Bạn có chắc chắn k ?")
        }
        
    
    </script>

    @endsection