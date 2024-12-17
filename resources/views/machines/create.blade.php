@extends('admins.layout')

@section('title')
    افزودن دستگاه جدید

@endsection

@section('content')
    <div class="row mt-5">
        <div class="row">
            <div class="col">
                <h4>
                    افزودن دستگاه جدید
                </h4>
            </div>
        </div>
        <div class="col-4 my-3">
            <form action="{{route('machine.store')}}" method="post" autocomplete="off">
                @csrf
                <div class="form-group my-2">
                    <div class="row">
                        <div class="col">
                            <label for=""> عنوان دستگاه</label>
                            <input type="text" name="title" id=""
                                   class="form-control @error('title') is-invalid @enderror" value="">
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
                            <label for="">ساعت شروع</label>
                            <input type="text" name="start_time"
                                   class="form-control @error('start_time') is-invalid @enderror">
                            @error('start_time')
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
                            <label for="">ساعت پایان</label>
                            <input type="text" name="end_time"
                                   class="form-control @error('end_time') is-invalid @enderror">
                            @error('end_time')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="">استفاده برای تولید</label>
                        <br><input type="radio" value=1 name="is_production" id="">فعال
                        <br><input type="radio" value=0 name="is_production" id="">غیرفعال

                </div>
                <div class="form-group my-3">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary ">افزودن دستگاه جدید</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
