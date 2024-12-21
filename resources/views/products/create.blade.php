@extends('admins.layout')

@section('title')
    افزودن محصول جدید

@endsection

@section('content')
    <div class="row mt-5">
        <div class="row">
            <div class="col">
                <h4>
                    افزودن محصول جدید
                </h4>
            </div>
        </div>
        <div class="col-8 my-3">
            <form action="{{route('product.store')}}" method="post" autocomplete="off">
                @csrf
                <div class="form-group my-2">
                    <div class="row">
                        <div class="col">
                            <label for=""> عنوان محصول</label>
                            <input type="text" name="title" id=""
                                   class="form-control @error('title') is-invalid @enderror" value="">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for=""> کد محصول</label>
                            <input type="text" name="code" id=""
                                   class="form-control @error('code') is-invalid @enderror" value="">
                            @error('code')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group my-2">
                    <div class="row">
                        <div class="col-4">
                            <label for="">گروه مرحله تولید</label>
                            <select name="phase_profile_id" id=""
                                    class="form-control @error('phase_profile_id') is-invalid @enderror">
                                <option value="{{null}}">انتخاب کنید</option>
                                @foreach($phase_profile  as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                            @error('phase_profile_id')
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
                            <button type="submit" class="btn btn-primary ">افزودن محصول جدید</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
