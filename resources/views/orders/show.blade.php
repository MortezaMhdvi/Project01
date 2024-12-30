@extends('admins.layout')

@section('content')
    <h3 class="mt-4">قلم سفارش</h3>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped table-bordered mt-5">
                    <thead>
                    <tr>
                        <th></th>
                        <th>عنوان قلم سفارش</th>
                        <th>محصول</th>
                        <th>حجم قلم سفارش</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order_content as $item)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->product->title}}</td>
                            <td>{{$item->value}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
