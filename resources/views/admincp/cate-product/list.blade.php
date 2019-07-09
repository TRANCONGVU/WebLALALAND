@extends('admincp.index')
@section('title')
   Danh sách Danh Mục
@endsection
@section('content')
    <style>
        .inputadmin{
            background: white;
            border: none;
        }

    </style>
    <div class="card shadow mb-4">
        {{--<div class="card-header py-3">--}}
            {{--<h6 class="m-0 font-weight-bold text-primary">Category</h6>--}}
        {{--</div>--}}
        <div class="bs-example4" data-example-id="simple-responsive-table">
            <div class="table-responsive">
                @if(session('thongbao'))
                    <script>
                        alert('{{ session('thongbao') }}');

                    </script>
                @endif
                <table class="table table-bordered table-hover" id="dbtbl" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Active</th>
                        <th>Sản phẩm đã bán</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Active</th>
                        <th>Sản phẩm đã bán</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($cateproduct as $key => $value)
                        <tr>
                            <form action="" method="post">
                            <td>{{ $key+1 }}</td>
                            <td><input name="name" type="text" class="inputadmin" id="name{{$value->id}}" value="{{ $value->name }}" readonly/></td>
                            <td>{{ $value->slug }}</td>
                            <td>
                                @if($value->active==1) {{ "Hiển thị" }} @else {{ "Không hiển thị" }} @endif
                            </td>
                            <td>{{ $value->total_product }}</td>
                            <td>
                                {{--<a class="fa btn btn-default" title="{{ " Sửa ".$value->name }}" href="{{url('admincp/cateproduct/edit/'.$value->id)}}" type="button"><i class="fas fa-edit"></i></a>--}}
                               <button type="submit" class=" btn btn-success hide" id="submit{{ $value->id }}" title="Sửa Danh Mục"><i class="fas fa-pencil-alt"></i></button>
                                <a class="fa fa-edit  btn btn-primary" id="sua{{ $value->id }}"  onclick="sua({{ $value->id }})"></a>
                                <button type="reset"  class=" btn btn-danger hide"  id="reset{{ $value->id }}" onclick=" return huy({{ $value->id }})"><i class="fas fa-window-close"></i></button>
                                <button data-id="{{$value->id}}" title="{{ " Xoá ".$value->name }}" class="fa btn btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pull-right">{{ $cateproduct->links() }}</div>
            </div>
            <!-- /.table-responsive -->
        </div>
    </div>
    <script>
        function sua(id){
            var name = document.querySelector("#name"+id);
            var submit = document.querySelector("#submit"+id);
            var reset = document.querySelector("#reset"+id);
            var sua = document.querySelector("#sua"+id);


            name.removeAttribute('readonly');
            name.classList.remove('inputadmin');
            name.classList.add('form-control');
            reset.classList.remove('hide');
            submit.classList.remove('hide');
            sua.classList.add('hide');
        }
        function huy(id){
            var name = document.querySelector("#name"+id);
            var submit = document.querySelector("#submit"+id);
            var reset = document.querySelector("#reset"+id);
            var sua = document.querySelector("#sua"+id);

            $('#name'+id).prop('readonly', true);
            name.classList.add('inputadmin');
            name.classList.remove('form-control');
            reset.classList.add('hide');
            submit.classList.add('hide');
            sua.classList.remove('hide');
            return true;
        }
      /*  $('.btn-danger').click(function(){
            if(confirm('Bạn có muốn xoá danh mục sản phẩm ?')){
                var _this = $(this);
                var id = $(this).attr('data-id');
                $.ajax({
                    type: 'get',
                    url: "{{ route('destroy.cateproduct') }}",
                    data:{
                        _token : $('[name="_token"]').val(),
                        id:id //id trên nối với id request trong controller
                    },
                    success: function(response){
                        _this.parent().parent().remove();
                        // alert(response);
                    }
                })
            }
        });*/
    </script>
@endsection