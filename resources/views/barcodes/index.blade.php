@extends('admins.layout')



@section('content')
{{--    @can('create-user')--}}
        <a href="{{route('barcode.create')}}" class="btn btn-success btn-sm mt-4">add barcode</a>
{{--    @endcan--}}
<h3 class="mt-2"> مرحله تولید</h3>
    <div class="row ">
        @if(session('error'))
            <div class="alert alert-info alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
               <span>{{session('error')}}</span>
            </div>
        @endif

{{--            @if(session()->has('error'))--}}
{{--                <div class="alert alert-warning alert-dismissible fade show" role="alert">--}}
{{--                    {{ session()->error }}--}}
{{--                    <button type="button" class="close" data-dismiss="alert">&times;</button>--}}
{{--                </div>--}}
{{--            @endif--}}

            <div class="col">
            <div class="table-responsive">
                <table class="table table-striped table-bordered mt-5">
                    <thead>
                    <tr>
                        <td></td>
                        <td>عنوان</td>
                        <td>ترتیب</td>
                        <td>عملیات</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($barcode as $item)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->order}}</td>
                            <td class="d-flex">
                                {{--                                @can('edit-user')--}}
                                <a href="{{route('barcode.edit',$item)}}" class="btn btn-info btn-sm m-1">edit
                                    phase profile</a>
                                {{--                                @endcan--}}

                                {{--                                @can('delete-user')--}}
                                <form action="{{route('barcode.destroy',$item)}}" method="Post" id="{{$item->id}}">
                                    @csrf
                                    @method('delete')
                                    <a href="#" class="btn btn-danger btn-sm m-1"
                                       onclick="deleteUser({{$item->id}})">delete phase profile</a>
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
                text: "آیا از حذف این مرحله تولید دارید",
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
