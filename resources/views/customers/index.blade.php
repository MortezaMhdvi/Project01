@extends('admins.layout')



@section('content')
{{--    @can('create-user')--}}
        <a href="{{route('customer.create')}}" class="btn btn-success btn-sm mt-4">add customer</a>
{{--    @endcan--}}
    <div class="row ">

        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped table-bordered mt-5">
                    <thead>
                    <tr>
                        <td></td>
                        <td>نام</td>
                        <td>تلفن همراه</td>
                        <td>کد</td>
                        <td>عملیات</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $item)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->mobile}}</td>
                            <td>{{$item->code}}</td>

                            <td class="d-flex">
{{--                                @can('edit-user')--}}
                                    <a href="{{route('customer.edit',$item)}}" class="btn btn-info btn-sm m-1">edit
                                        customer</a>
{{--                                @endcan--}}

{{--                                @can('delete-user')--}}
                                    <form action="{{route('customer.destroy',$item)}}" method="Post" id="{{$item->id}}">
                                        @csrf
                                        @method('delete')
                                        <a href="#" class="btn btn-danger btn-sm m-1"
                                           onclick="deleteUser({{$item->id}})">delete customer</a>
                                    </form>
{{--                                @endcan--}}
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
                text: "آیا از حذف این مشتری اطمینان دارید",
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
