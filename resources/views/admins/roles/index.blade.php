@extends('admins.layout')



@section('content')
    @can('create-role')
        <a href="{{route('role.create')}}" class="btn btn-success btn-sm mt-4">add role</a>
    @endcan

    @if(session('error'))
        <div class="alert alert-info alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <span>{{session('error')}}</span>
        </div>
    @endif

    <div class="row ">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped table-bordered mt-5">
                    <thead>
                    <tr>
                        <td></td>
                        <td>سطح دسترسی</td>
                        <td>عملیات</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $item)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$item->name}}</td>
                            <td class="d-flex">
                                @can('edit-role')
                                    <a href="{{route('role.edit',$item)}}" class="btn btn-info btn-sm m-1">edit
                                        role</a>
                                @endcan

                                @can('delete-role')
                                    <form action="{{route('role.destroy',$item)}}" method="Post" id="{{$item->id}}">
                                        @csrf
                                        @method('delete')
                                        <a href="#" class="btn btn-danger btn-sm m-1"
                                           onclick="deleteUser({{$item->id}})">delete role</a>
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
                text: "آیا از حذف این نقش اطمینان دارید",
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
