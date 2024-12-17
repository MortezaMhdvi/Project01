@extends('admins.layout')



@section('content')
{{--    @can('create-user')--}}
        <a href="{{route('machine.create')}}" class="btn btn-success btn-sm mt-4">add machine</a>
{{--    @endcan--}}
<h3 class="mt-2">ماشین‌آلات</h3>
    <div class="row ">

        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped table-bordered mt-5">
                    <thead>
                    <tr>
                        <td></td>
                        <td>عنوان</td>
                        <td>ساعت شروع</td>
                        <td>ساعت پایان</td>
                        <td>استفاده برای تولید</td>
                        <td>عملیات</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($machines as $item)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->start_time}}</td>
                            <td>{{$item->end_time}}</td>
                            <td>{{$item->is_production == 1 ? 'فعال' : 'غیرفعال' }}</td>
                            <td class="d-flex">
                                {{--                                @can('edit-user')--}}
                                <a href="{{route('machine.edit',$item)}}" class="btn btn-info btn-sm m-1">edit
                                    machine</a>
                                {{--                                @endcan--}}

                                {{--                                @can('delete-user')--}}
                                <form action="{{route('machine.destroy',$item)}}" method="Post" id="{{$item->id}}">
                                    @csrf
                                    @method('delete')
                                    <a href="#" class="btn btn-danger btn-sm m-1"
                                       onclick="deleteUser({{$item->id}})">delete machine</a>
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
                text: "آیا از حذف این دستگاه اطمینان دارید",
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
