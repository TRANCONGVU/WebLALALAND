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
    <table class=" table table-bordered table-hover" id="dbtbl">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Birthday</th>
                <th>Avatar</th>
                <th>Gender</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($users as $key => $value)
                <tr>    
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{date("d/m/Y", strtotime($value->birth))}}</td>
                    <td><img src="{{ asset('images/avatar/'.$value->avatar) }}" width="50px"></td>
                    <td>
                        @if($value->gender==0)
                            {{ 'Nam' }}
                        @else
                            {{ 'Nữ' }}
                        @endif
                    </td>
                    <td>
                        @if($value->status==1)
                            {{ 'Active' }}
                        @else
                            {{ 'unactive' }}
                        @endif
                    </td>
                    <td>
                        <a type="button" class="fa fa-edit btn btn-default btn btn-success" href="" title="Sửa"></a>
                        <a type="button" class="fa fa-trash btn btn-default btn btn-danger" href="" onclick="return confirmAction()" title="Xóa">Xóa</a>
                        <a type="button" class="fa fa-trash btn btn-default btn btn-success" href="" onclick="" title="Xóa">Active</a>
                    </td>
                </tr>    
             @endforeach
            
        </tbody>
    
    </table>
    <script language="JavaScript">
        function confirmAction() {
            return confirm("Bạn có chắc chắn không ?")
        }
        
    
    </script>

    @endsection