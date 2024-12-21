@extends('admins.layout')

@section('title')
    ویرایش دستگاه

@endsection

@section('content')
    <div class="row mt-5">
        <div class="row">
            <div class="col">
                <h4>
                    ویرایش لیبل
                </h4>
            </div>
        </div>
        <div class="col-4 my-3">
            <form action="{{route('label.update',$label)}}" method="post" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="form-group my-2">
                    <div class="row">
                        <div class="col">
                            <label for=""> عنوان لیبل</label>
                            <input type="text" name="title" id=""
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{$label->title}}">
                            @error('title')
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
                            <label for="">مرحله تولید</label>
                            <select name="build_phase_id" id="" class="form-control @error('build_phase_id') is-invalid @enderror">
                                <option value="{{null}}">انتخاب کنید</option>
                                @foreach($build_phase  as $item)
                                    <option value="{{$item->id}}" {{$item->id == $label->build_phase_id? 'selected' : ''}}>{{$item->title}}</option>
                                @endforeach
                            </select>
                            @error('build_phase_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="">بارکد</label>
                            <select name="barcode_id" id="" class="form-control @error('barcode_id') is-invalid @enderror">
                                <option value="{{null}}">انتخاب کنید</option>
                                @foreach($barcode  as $item)
                                    <option value="{{$item->id}}" {{$item->id == $label->barcode_id ? 'selected' : ''}}>{{$item->title}}</option>
                                @endforeach
                            </select>
                            @error('barcode_id')
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
                            <button type="submit" class="btn btn-primary ">ویرایش لیبل</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
