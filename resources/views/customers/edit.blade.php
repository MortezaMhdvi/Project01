@extends('admins.layout')

@section('title')
    ویرایش مشتری

@endsection

@section('content')
    <div class="row mt-5">
        <div class="row">
            <div class="col">
                <h4>
                    ویرایش مشتری
                </h4>
            </div>
        </div>
        <div class="col-4 my-3">
            <form action="{{route('customer.update',$customer)}}" method="post" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="form-group ">
                    <div class="row">
                        <div class="col">
                            <label for="">نام</label>
                            <input type="text" name="name" id=""
                                   class="form-control @error('name') is-invalid @enderror" value="{{$customer->name}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group  my-2">
                    <div class="row">
                        <div class="col">
                            <label for="">تلفن همراه</label>
                            <input type="text" name="mobile" id=""
                                   class="form-control @error('mobile') is-invalid @enderror"
                                   value="{{$customer->mobile}}">
                            @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group my-2">
                    <div class="row">
                        <div class="col">
                            <label for="">کد</label>
                            <input type="text" name="code" id=""
                                   class="form-control @error('code') is-invalid @enderror" value="{{$customer->code}}">
                            @error('code')
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
                            <button type="submit" class="btn btn-primary btn-sm">ویرایش مشتری</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
