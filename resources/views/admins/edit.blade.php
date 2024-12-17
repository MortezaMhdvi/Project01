@extends('admins.layout')

@section('title')
    ویرایش کاربر

@endsection

@section('content')
    <div class="row mt-5">
        <div class="row">
            <div class="col">
                <h4>
                    ویرایش کاربر
                </h4>
            </div>
        </div>
        <div class="col-4 my-3">
            <form action="{{route('users.update',$user)}}" method="post" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="form-group my-2">
                    <div class="row">
                        <div class="col">
                            <label for=""> نام کاربری</label>
                            <input type="text" name="username" id=""
                                   class="form-control @error('username') is-invalid @enderror" value="{{$user->username}}">
                            @error('username')
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
                            <label for="">نام</label>
                            <input type="text" name="name" id=""
                                   class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}">
                            @error('name')
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
                            <label for="">نام خانوادگی</label>
                            <input type="text" name="family" id=""
                                   class="form-control @error('family') is-invalid @enderror" value="{{$user->family}}">
                            @error('family')
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
                            <label for="">رمز عبور</label>
                            <input type="password" name="password" id=""
                                   class="form-control @error('password') is-invalid @enderror"
                                    value="{{$user->password}}">
                            @error('password')
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
                            <select name="role_id" id="" class="form-control @error('role_id') is-invalid @enderror">
                                <option value="{{null}}">انتخاب کنید</option>
                                @foreach($role as $item)
                                    <option value="{{$item->id}}" {{$user->role_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
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
                            <button type="submit" class="btn btn-primary btn-sm">افزودن کاربر جدید</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
