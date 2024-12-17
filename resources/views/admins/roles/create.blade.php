@extends('admins.layout')

@section('title')
    افزودن نقش جدید

@endsection

@section('content')
    <div class="row mt-5">
        <div class="row">
            <div class="col">
                <h4>
                    افزودن نقش جدید
                </h4>
            </div>
        </div>
        <div class="col-4 my-3">
            <form action="{{route('role.store')}}" method="post" autocomplete="off">
                @csrf
                <div class="form-group my-2">
                    <div class="row">
                        <div class="col">
                            <label for="">عنوان نقش </label>
                            <input type="text" name="roleName" id=""
                                   class="form-control @error('role') is-invalid @enderror" value="">
                            @error('role')
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
                            <label for="">نقش مورد نظر را انتخاب کنید</label>
                            <select name="permission_id[]" id="" class="form-control select2  @error('role_id') is-invalid @enderror" multiple="multiple">
{{--                                <option value="{{null}}" disabled>انتخاب کنید</option>--}}
                                @foreach($permission as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                            @error('role_id')
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
                            <button type="submit" class="btn btn-primary btn-sm">افزودن نقش جدید</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
