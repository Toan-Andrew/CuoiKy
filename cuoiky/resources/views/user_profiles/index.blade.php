@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách người dùng</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Họ</th>
                <th>Tên</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày sinh</th>
                <th>Avatar</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userProfiles as $userProfile)
                <tr>
                    <td>{{ $userProfile->first_name }}</td>
                    <td>{{ $userProfile->last_name }}</td>
                    <td>{{ $userProfile->phone }}</td>
                    <td>{{ $userProfile->address }}</td>
                    <td>{{ $userProfile->dob }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$userProfile->avatar) }}" alt="Avatar" width="50" height="50">
                    </td>
                    <td>
                        <a href="{{ route('user_profiles.edit', $userProfile->id) }}" class="btn btn-primary">Sửa</a>
                        <form action="{{ route('user_profiles.destroy', $userProfile->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
