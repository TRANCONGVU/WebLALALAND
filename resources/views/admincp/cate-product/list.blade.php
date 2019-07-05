@extends('admincp.index')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Category</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Active</th>
                    <th>Sản phẩm đã bán</th>
                    <th></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Chỉnh sửa</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($category as $key => $value)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->slug }}</td>
                        <td>
                            @if($value->status==1)
                                {{ "Hiển thị" }}
                            @else
                                {{ "Không hiển thị" }}
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-primary edit" title="{{ "Sửa ".$value->name }}" data-toggle="modal" data-target="#edit" onclick="showItems({{$value->id}})" type="button" ><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger delete" title="{{ "Xoá ".$value->name }}" data-toggle="modal" data-target="#delete" type="button" data-id="{{ $value->id }}"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pull-right">{{ $category->links() }}</div>
        </div>
    </div>
</div>
@endsection