@extends('admins.layout')

@section('title')
    ویرایش مرحله تولید

@endsection

@section('content')
    <div class="row mt-5">
        <div class="row">
            <div class="col">
                <h4>
                    ویرایش مرحله تولید
                </h4>
            </div>
        </div>
        <div class="col-4 my-3">
            <form action="{{route('buildPhase.update',$buildPhase)}}" method="post" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="form-group my-2">
                    <div class="row">
                        <div class="col">
                            <label for=""> عنوان</label>
                            <input type="text" name="title" id=""
                                   class="form-control @error('title') is-invalid @enderror" value="{{$buildPhase->title}}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label for="">ترتیب</label>
                            <input type="number" name="order" id="" min=0
                                   class="form-control @error('order') is-invalid @enderror" value="{{$buildPhase->order}}">
                            @error('order')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group my-3">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-sm">ویرایش مرحله تولید</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
