@extends('admincp.index')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Category</h6>
    </div>

    <div class="bs-example4" data-example-id="simple-responsive-table">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                <tbody>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Active</th>
                    <th>Sản phẩm đã bán</th>
                    <th>Chỉnh sửa</th>
                </tr>
                </tbody>
                <tbody>
                @foreach($cateproduct as $key => $value)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->slug }}</td>
                        <td>
                            @if($value->active==1)
                                {{ "Hiển thị" }}
                            @else
                                {{ "Không hiển thị" }}
                            @endif
                        </td>
                        <td>{{ $value->total_product }}</td>
                        <td>
                            <a class="fa btn btn-default" title="{{ "Sửa ".$value->name }}" href="{{url('admincp/cateproduct/edit-cateproduct/'.$value->id)}}" type="button"><i class="fas fa-edit"></i></a>
                            <a class="fa btn btn-default" title="{{ "Xoá ".$value->name }}" href="{{url('admincp/cateproduct/delete-cateproduct/'.$value->id)}}" type="button"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pull-right">{{ $cateproduct->links() }}</div>
        </div><!-- /.table-responsive -->
    </div>
</div>
@endsection