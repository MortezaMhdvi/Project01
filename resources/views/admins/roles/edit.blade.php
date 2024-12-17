@extends('admins.layout')

@section('title')
    ویرایش نقش

@endsection

@section('content')
    <div class="row mt-5">
        <div class="row">
            <div class="col">
                <h4>
                    ویرایش نقش
                </h4>
            </div>
        </div>
        <div class="col-4 my-3">
            <form action="{{route('role.update',$role)}}" method="post" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="form-group my-2">
                    <div class="row">
                        <div class="col">
                            <label for="">عنوان نقش </label>
                            <input type="text" name="roleName" id=""
                                   class="form-control @error('role') is-invalid @enderror" value="{{$role->name}}">
                            @error('role')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            @foreach($permission as $item)
                                <input type="checkbox" id="" name="permission_id[]"
                                       value="{{$item->id}}" {{$role->permissions->contains($item->id) ? 'checked' : ''}}
                                ">
                                <label for="permission_id"> {{$item->name}}</label><br>
                            @endforeach
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
