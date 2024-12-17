@extends('admins.layout')



@section('content')
    {{--    @can('create-user')--}}
    <a href="{{route('parameterOptions.create',$parameter_id)}}" class="btn btn-success btn-sm mt-4">add
        parameterOption</a>
    {{--    @endcan--}}
    <h3 class="mt-2"></h3>
    <div class="row ">

        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped table-bordered mt-5">
                    <thead>
                    <tr>
                        <td></td>
                        <td>عنوان</td>
                        <td>عملیات</td>
                    </tr>
                    </thead>
                    <tbody>
{{--                    {{dd($parameterOptions[0]->title)}}--}}
                    @foreach($parameterOptions as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td class="d-flex">
                                <a href="{{ route('parameterOptions.edit', ['parameter_id' => $parameter_id, 'parameterOption' => $item->id]) }}" class="btn btn-info btn-sm m-1">
                                    Edit
                                </a>


                                <form action="{{ route('parameterOptions.destroy', ['parameter_id' => $parameter_id, 'parameterOption' => $item->id]) }}"
                                      method="POST"
                                      id="{{$item->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" class="btn btn-danger btn-sm m-1"
                                    onclick="deleteUser({{$item->id}})">delete </a>
                                </form>

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
                text: "آیا از حذف این آپشن پارامتر اطمینان دارید",
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
