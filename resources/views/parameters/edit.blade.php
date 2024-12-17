@extends('admins.layout')

@section('title')
    ویرایش پارامتر

@endsection

@section('content')
    <div class="row mt-5">
        <div class="row">
            <div class="col">
                <h4>
                    ویرایش پارامتر
                </h4>
            </div>
        </div>
        <div class="col-4 my-3">
            <form action="{{route('parameter.update',$parameter)}}" method="post" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="form-group my-2">
                    <div class="row">
                        <div class="col">
                            <label for=""> عنوان</label>
                            <input type="text" name="title" id=""
                                   class="form-control @error('title') is-invalid @enderror" value="{{$parameter->title}}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
{{--                <div class="form-group ">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col">--}}
{{--                           --}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="form-group my-3">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-sm">ویرایش پارامتر</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
