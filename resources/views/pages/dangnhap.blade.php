@extends('master-layout')
@section('content')
    <div class="container dangnhap">
        <form>
            <div class="form-group">
              <label for="Email">Tên đăng nhập</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="password">Mật khẩu</label>
              <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Nhớ mật khẩu</label>

            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
            hoặc <a href="{{ url('dangky') }}">Đăng ký </a>
          </form>
    </div>
@endsection
