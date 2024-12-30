@extends('admins.layout')

@section('title')
    ویرایش سفارش

@endsection

@section('content')
    <div class="row mt-5">
        <div class="row">
            <div class="col">
                <h4>
                    ویراش سفارش
                </h4>
            </div>
        </div>
        <div class="col-12 my-3">
            <form action="{{route('order.update',$order)}}" method="post" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-2">
                        <div class="form-group my-2">
                            <label for=""> عنوان</label>
                            <input type="text" name="title" id=""
                                   class="form-control @error('title') is-invalid @enderror" value="{{$order->title}}">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group my-2">
                            <label for=""> کد سفارش</label>
                            <input type="text" name="code" id=""
                                   class="form-control @error('code') is-invalid @enderror" value="{{$order->code}}">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group my-2">
                            <label for=""> حجم سفارش</label>
                            <input type="text" name="value" id=""
                                   class="form-control @error('value') is-invalid @enderror" value="{{$order->value}}">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group my-2">
                            <label for=""> تاریخ تحویل</label>
                            <input type="text" name="date" id="datepicker"
                                   class="form-control @error('date') is-invalid @enderror" value="{{$order->date}}">
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
                                    <button class="btn btn-primary send-btn">ثبت</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group my-3">
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary send">ویراش سفارش
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
                                <th>رديف</th>
                                <th>قلم سفارش</th>
                                <th>محصول</th>
                                <th>مقدار</th>
                                <th>عمليات</th>
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

        let i = 0;
        let data = Array();
        let edit_index = 0;
        let order_contents = @json($order_content);

        //------------------ document ready ---------------------
        $(document).ready(function (e) {
            order_contents.forEach(content => {
                $(".body_order").append(
                    `<tr data-index="${++i}">
                     <td>${i}</td>
                     <td>${content.title}</td>
                     <td>${content.product.title}</td>
                     <td>${content.value}</td>
                     <td>
                        <button class="btn btn-info btn-sm m-1 edit-btn">edit</button>
                        <button class="btn btn-danger btn-sm m-1 delete-btn">delete</button>
                     </td>
                 </tr>`
                );
                const row = {
                    index: i,
                    deleted: false,
                    id: content.id,
                    title: content.title,
                    product_id: content.product_id,
                    value: content.value,
                }
                data.push(row);
            });
        });


        //------------------ click edit-btn ---------------------
        $(".body_order").on('click', '.edit-btn', function (e) {
            e.preventDefault();

            let parent_btn = $(this).parent().parent();
            const product = parent_btn.find('td:eq(2)').text();
            const value = parent_btn.find('td:eq(3)').text();
            edit_index = parent_btn.find('td:eq(0)').text();

            $('input[name="order_title"]').val(product);
            $('input[name="order_value"]').val(value);
            $('select[name="product_id"] option').each(function () {
                if ($(this).text() === product) {
                    $(this).prop('selected', true);
                }
            });
            $('.send-btn').addClass('edit');
            $('.edit').text('ویرایش');
        });


        //------------------ click send-btn( ثبت ) --------------
        $(".send-btn").click(function (e) {
            e.preventDefault();
            if ($(".send-btn").hasClass('edit')) {
                data = data.map(item => {
                    if (item.index == edit_index) {
                        item.title = $('select[name="product_id"] option:selected').text();
                        item.product_id = $('select[name="product_id"] option:selected').text() === 'انتخاب کنید' ? '' : $('select[name="product_id"] option:selected').val();
                        item.value = $('input[name="order_value"]').val();
                    }
                    return item;
                });
                const row = $('.body_order').find(`[data-index="${edit_index}"]`);
                row.find('td:eq(1)').text($('select[name="product_id"] option:selected').text());
                row.find('td:eq(2)').text($('select[name="product_id"] option:selected').text());
                row.find('td:eq(3)').text($('input[name="order_value"]').val());

                $(".send-btn").removeClass('edit').text('ثبت');
            } else {
                e.preventDefault();
                $(".body_order").append(
                    `<tr data-index="${++i}">
                         <td>${i}</td>
                         <td>${$('.order_title').val()}</td>
                         <td>${$('select[name="product_id"] option:selected').text() === 'انتخاب کنید' ? '' : $('select[name="product_id"] option:selected').text()}</td>
                         <td>${$('input[name="order_value"]').val()}</td>
                         <td>
                            <button class="btn btn-info btn-sm m-1 edit-btn">edit</button>
                            <button class="btn btn-danger btn-sm m-1">delete</button>
                        </td>
                    </tr>`
                );

                const row = {
                    index: i,
                    id: null,
                    deleted: false,
                    title: $(".order_title").val(),
                    product_id: $('select[name="product_id"] option:selected').val(),
                    value: $("input[name='order_value']").val()
                }
                data.push(row);
            }
            $(".order_content").find('input').val('');
            $(".order_content").find('select').val('');
        });


        //------------------ click delete-btn -------------------
        $(".body_order").on('click', '.delete-btn', function (e) {
            e.preventDefault();
            edit_index = $(this).parent().parent().find('td:eq(0)').text();
            data = data.map(item => {
                if (item.index == edit_index) {
                    item.deleted = true;
                }
                return item;
            });

            $('.body_order').find(`[data-index = "${edit_index}"]`).remove()
        });


        //------------------ click send-btn(ویرایش سفارش) -------
        $('.send').click(function (e) {
            const jsonString = JSON.stringify(data);
            $('input[name="hidden"]').val(jsonString);
        });

    </script>
@endsection
