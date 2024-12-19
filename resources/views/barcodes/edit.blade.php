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
                           class="form-control @error('title') is-invalid @enderror" value="{{$barcode->title}}">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="col-4 form-group my-2">
                    <label for=""> شناسه شروع</label>
                    <input type="text" name="prefix" id=""
                           class="form-control @error('prefix') is-invalid @enderror" value="{{$barcode->prefix}}">
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
                        <option value="outProduct" {{$barcode->type == 'outProduct' ? 'selected' : ''}}>رسیده به تولید</option>
                        <option value="material" {{$barcode->type == 'material' ? 'selected' : ''}}>مواد</option>
                        <option value="wastage" {{$barcode->type == 'wastage' ? 'selected' : ''}}>ضایعات</option>
                    </select>
                    @error('type')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <!-- تغییر در این قسمت برای دکمه و تکرارکننده‌ها -->
                <div class="repeater">
                        <div data-repeater-list="barcode_details">
                            @foreach($barcodeDetails as $i)

                            <div data-repeater-item>
                                <div class="row entry mt-4">
                                    <div class="col-xs-12 col">
                                        <div class="form-group">
                                            <select name="barcode_detail_id"
                                                    class="form-control form-control-sm barcodeDetails">
                                                <option value="">انتخاب کنید</option>
                                                @foreach($details as $item)
                                                    <option data-type="{{ $item->type }}" {{$item->id == $i->id ? "selected" : ""}}
                                                            value="{{ $item->id }}">{{ $item->value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col">
                                        <div class="form-group">
                                            <input class="form-control form-control-sm order" name="order" type="number"
                                                   placeholder="ترتیب" min="1" value="{{$i->pivot->order}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col">
                                        <div class="form-group">
                                            <button data-repeater-delete type="button" class="btn btn-danger btn-sm">حذف
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                        </div>

                    <!-- دکمه اضافه کردن ردیف جدید -->
                    <input data-repeater-create type="button" value="Add" class="btn btn-success btn-sm"/>
                </div>

                <!-- دکمه ارسال فرم -->
                <div class="col form-group my-3">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">افزودن</button>
                        </div>
                    </div>
                </div>

        </form>
    </div>

@endsection

@section('script')
    <script>
        function setBarcodeDetails(el, type) {
            el.children("option").each(function () {
                if ($(this).data("type") !== type) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        }

        //
        $('#type').change(function (e) {
            let type = $(this).val();
            setBarcodeDetails($(".barcodeDetails"), type)
        });

        $(document).ready(function () {
            $('.repeater').repeater({
                show: function () {
                    $(this).slideDown()

                    let type = $("[name=type]").val()
                    setBarcodeDetails($(this).find(".barcodeDetails"), type)

                    let maxOrder = 0;
                    $('.order').each(function () {
                        let orderValue = parseInt($(this).val()) || 0;
                        maxOrder = Math.max(maxOrder, orderValue);
                    });
                    $(this).find('.order').val(maxOrder + 1);

                },

                repeaters: [{
                    // selector: '.inner-repeater'
                }]
            });
        });

    </script>
@endsection
