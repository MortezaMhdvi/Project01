@extends('admins.layout')

@section('title')
    افزودن کاربر جدید

@endsection

@section('content')
    <div class="row mt-5">
        <div class="row">
            <div class="col">
                <h4>
                    افزودن بارکد جدید
                </h4>
            </div>
        </div>
    </div>
    <div class="col my-1 ">
        <form action="{{route('barcode.store')}}" method="post" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-4 form-group my-2">
                    <label for=""> عنوان</label>
                    <input type="text" name="title" id=""
                           class="form-control @error('title') is-invalid @enderror" value="">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="col-4 form-group my-2">
                    <label for=""> شناسه شروع</label>
                    <input type="text" name="prefix" id=""
                           class="form-control @error('prefix') is-invalid @enderror" value="">
                    @error('prefix')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <div class="col-4 form-group my-2">
                    <label for=""> تایپ مورد نظر</label>
                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                        <option value="{{null}}" disabled selected>انتخاب کنید</option>
                        <option value="outProduct">رسیده به تولید</option>
                        <option value="material">مواد</option>
                        <option value="wastage">ضایعات</option>
                    </select>
                    @error('type')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="col-12 form-group targetDiv" id="div0">
                        <div id="group1" class="fvrduplicate">
                            <div class="row entry mt-4">
                                <div class="col-xs-12 col-md-3">
                                    <div class="form-group">
                                        <select name="barcode_details" id="barcodeDetails"
                                                class="form-control form-control-sm">
                                            <option value="{{null}}">انتخاب کنید</option>
                                            @foreach($barcodeDetails as $item)
                                                <option data-type="{{$item->type}}"
                                                        value="{{$item->id}}">{{$item->value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <div class="form-group">
                                        <input class="form-control form-control-sm" name="barcode_details[][order]" type="number"
                                               placeholder="ترتیب" min="0">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-2">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <button type="button" class="btn btn-success btn-sm btn-add">
                                            <i class="fa fa-plus" aria-hidden="true">+</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="col form-group my-3">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary ">افزودن</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('script')
    <script>
        $('#type').change(function (e) {
            let type = $(this).val();
            $('#barcodeDetails option').each(function () {
                if ($(this).data("type") !== type) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        })

    </script>

@endsection
