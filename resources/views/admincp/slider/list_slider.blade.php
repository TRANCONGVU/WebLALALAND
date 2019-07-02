@extends('admincp.index')
@section('content')


<h1>
        Danh sách slider...
    </h1>
    <br>
    @if(session('thongbao'))
        <script>
            alert('{{ session('thongbao') }}');
    
        </script>
    @endif
    <div class="table-data__tool">
    <a class="btn btn-success" href="{{url('admincp/addslider')}}">Thêm slider</a>
    </div>
    <br>
    <table class="dataTables_filter table table-bordered table-hover" id="dbtbl">
        <thead>
            <tr>
                <th>Ảnh slider</th>
                <th>Logo</th>
                <th>Tiêu đề</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($listSlider as $value) --}}
                <tr>    
                    <td>
                        <img width="250px" height="120px" src=""> 
                    </td>
                    <td>
                        <img width="250px" height="120px" src=""> 
                    </td>
                    <td>title</td>
                    <td>
                        <a type="button" class="fa fa-edit btn btn-default btn btn-success" href="" title="Sửa"></a>
                        <a type="button" class="fa fa-trash btn btn-default btn btn-danger" href="" onclick="return confirmAction()" title="Xóa"></a>
                    </td>
                </tr>    
            {{-- @endforeach --}}
            
        </tbody>
    
    </table>
    <script language="JavaScript">
        function confirmAction() {
            return confirm("Bạn có chắc chắn k ?")
        }
        
    
    </script>

    @endsection