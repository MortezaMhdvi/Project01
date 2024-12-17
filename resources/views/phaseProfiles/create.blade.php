@extends('admins.layout')

@section('title')
    افزودن کاربر جدید

@endsection

@section('content')
    <div class="row mt-5">
        <div class="row">
            <div class="col">
                <h4>
                    افزودن گروه مرحله تولید جدید
                </h4>
            </div>
        </div>
        <div class="col-4 my-3">
            <form action="{{route('phaseProfile.store')}}" method="post" autocomplete="off">
                @csrf
                <div class="form-group my-2">
                    <div class="row">
                        <div class="col">
                            <label for=""> عنوان</label>
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
                            @foreach($buildPhase as $item)

                                <input type="checkbox" id="" name="buildPhase_id[]"
                                       value="{{$item->id}}">
                                <label for="buildPhase_id"> {{$item->title}}</label> <br>
                            @endforeach

                        </div>
                    </div>
                </div>


                <div class="form-group my-3">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary ">افزودن گروه مرحله تولید جدید</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
