@extends('admins.layout')



@section('content')
    @can('create-user')
        <a href="{{route('users.create')}}" class="btn btn-success btn-sm mt-4">add users</a>
    @endcan
    <div class="row ">
        @if(session('error'))
            <div class="alert alert-info alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <span>{{session('error')}}</span>
            </div>
        @endif
        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped table-bordered mt-5">
                    <thead>
                    <tr>
                        <td></td>
                        <td>نام کاربری</td>
                        <td>نام</td>
                        <td>نام خانوادگی</td>
                        <td>عملیات</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $item)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$item->username}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->family}}</td>

                            <td class="d-flex">
                                @can('edit-user')
                                    <a href="{{route('users.edit',$item)}}" class="btn btn-info btn-sm m-1">edit
                                        users</a>
                                @endcan

                                @can('delete-user')
                                    <form action="{{route('users.destroy',$item)}}" method="Post" id="{{$item->id}}">
                                        @csrf
                                        @method('delete')
                                        <a href="#" class="btn btn-danger btn-sm m-1"
                                           onclick="deleteUser({{$item->id}})">delete users</a>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function deleteUser(id) {
            Swal.fire({
                title: "",
                text: "آیا از حذف این کاربر اطمینان دارید",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "بله",
                cancelButtonText: "خیر"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(id).submit();
                }
            });
        }
    </script>

@endsection
