@extends('admins.layout')

@section('title')
    افزودن سفارش جدید

@endsection

@section('content')
    <div class="row mt-5">
        <div class="row">
            <div class="col">
                <h4>
                    افزودن سفارش جدید
                </h4>
            </div>
        </div>
        <div class="col-12 my-3">
            <form action="{{route('order.store')}}" method="post" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-2">
                        <div class="form-group my-2">
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
                    <div class="col-2">
                        <div class="form-group my-2">
                            <label for=""> کد سفارش</label>
                            <input type="text" name="code" id=""
                                   class="form-control @error('code') is-invalid @enderror" value="">
                            @error('code')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group my-2">
                            <label for=""> حجم سفارش</label>
                            <input type="text" name="value" id=""
                                   class="form-control @error('value') is-invalid @enderror" value="">
                            @error('value')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group my-2">
                            <label for=""> تاریخ تحویل</label>
                            <input type="text" name="date" id="datepicker"
                                   class="form-control @error('date') is-invalid @enderror" value="">
                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group my-2">
                            <label for=""> مشتری</label>
                            <select name="customer_id" id="" class="form-control">
                                <option value="{{null}}" selected disabled>انتخاب کنید</option>
                                @foreach($customer as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-2 order_content">
                        <div class="row">
                            <div class="col">
                                <div class="form-group my-2">
                                    <label for=""> عنوان قلم سفارش</label>
                                    <input type="text" name="order_title" id=""
                                           class="form-control @error('title_order') is-invalid @enderror order_title"
                                           value="">
                                    @error('title_order')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group my-2">
                                    <label for=""> محصول</label>
                                    <select name="product_id" id="" class="form-control">
                                        <option value="{{null}}" selected disabled>انتخاب کنید</option>
                                        @foreach($product as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group my-2">
                                    <label for="">مقدار</label>
                                    <input type="text" name="order_value" id="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group my-2">
                                    <button type="submit" class="btn btn-primary order-btn">ثبت</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group my-3">
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary send">افزودن سفارش
                                            جدید
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="hidden" value="">
                    </div>
                    <div class="col-6">
                        <table class="table table-border table-striped">
                            <thead>
                            <tr>
                                <th>شماره</th>
                                <th>قلم سفارش</th>
                                <th>محصول</th>
                                <th>مقدار</th>
                            </tr>
                            </thead>
                            <tbody class="body_order">

                            </tbody>
                        </table>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let i = 1;
        const data = Array();
        $('.order-btn').click(function (e) {
            e.preventDefault();
            $('.body_order').append(
                `<tr>
                    <td>${i}</td>
                    <td>${$('.order_title').val()}</td>
                    <td>${$('select[name="product_id"] option:selected').text() === 'انتخاب کنید' ? '' : $('select[name="product_id"] option:selected').text()}</td>
                    <td>${$('input[name="order_value"]').val()}</td>
                </tr>`
            );

            i++;
            const row = {
                title: $('.order_title').val(),
                product_id: $('select[name="product_id"] option:selected').val(),
                value: $('input[name="order_value"]').val()
            }
            data.push(row);

            $('.order_content').find('input').val('');
            $('.order_content').find('select').val('');
        });

        $('.send').click(function (e) {
            const jsonString = JSON.stringify(data);
            $('input[name="hidden"]').val(jsonString);
        });
    </script>
@endsection
