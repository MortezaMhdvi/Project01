@extends('admins.layout')

@section('title')
    افزودن محصول جدید

@endsection

@section('content')
    <div class="row mt-5">
        <div class="row">
            <div class="col">
                <h4>
                    افزودن محصول جدید
                </h4>
            </div>
        </div>
        <div class="col-12 my-3">
            <form action="{{route('product.store')}}" method="post" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group my-2">
                            <div class="row">
                                <div class="col">
                                    <label for=""> عنوان محصول</label>
                                    <input type="text" name="title" id=""
                                           class="form-control @error('title') is-invalid @enderror" value="">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for=""> کد محصول</label>
                                    <input type="text" name="code" id=""
                                           class="form-control @error('code') is-invalid @enderror code" value="">
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group my-2">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">گروه مرحله تولید</label>
                                    <select name="phase_profile_id" id="phase_profile_id"
                                            class="form-control @error('phase_profile_id') is-invalid @enderror">
                                        <option value="{{null}}">انتخاب کنید</option>
                                        @foreach($phase_profile  as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('phase_profile_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">


                        <div id="tabs-container" class="mt-3" style="display: none;">
                            <ul id="tabs" class="nav nav-tabs"></ul>

                            <div id="tabs-content" class="tab-content">
                            </div>
                        </div>


                    </div>

                </div>
                <div class="form-group my-3">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary ">افزودن محصول جدید</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#phase_profile_id').change(function (e) {
            const profileId = $(this).val();
            if (profileId) {
                $.ajax({
                    url: '/build_phase/' + profileId,
                    type: 'GET',
                    success: function (data) {
                        $('#tabs').empty();
                        $('#tabs-content').empty();

                        if (data.phases.length > 0) {
                            $('#tabs-container').show();

                            data.phases.forEach((phase) => {
                                $('#tabs').append(
                                    `<li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#phase-${phase.id}">
                                    ${phase.title}
                                </a>
                            </li>`
                                );

                                $('#tabs-content').append(
                                    `<div id="phase-${phase.id}" class="tab-pane fade">
                                        <div class="form-group">
                                            <div class="row mt-3">
                                                <label class="col-2">فعال سازی:</label>
                                                <div class="col-10">
                                                    <input type="checkbox" name="tabs[${phase.id}][enable]" class="enable">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <label class="col-2">انتخاب دستگاه:</label>
                                                <div class="col-10">
                                                    <select name="tabs[${phase.id}][machine][]" class="form-control select2" multiple="multiple" disabled>
                                                        <option value="" disabled>دستگاه مورد نظر را انتخاب کنید</option>
                                                        @foreach($machine as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-2">انتخاب لیبل:</label>
                                <div class="col-5">
                                    <select class="form-control" name="tabs[${phase.id}][label]" disabled>
                                                    @foreach($label as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>`
                                );
                            });

                            $('.select2').select2({
                                placeholder: "انتخاب کنید",
                                allowClear: true,
                            });
                        } else {
                            $('#tabs-container').hide();
                        }
                    },
                    error: function () {
                        alert('خطا در دریافت داده‌ها');
                    }
                });
            }
        });
        $(document).on('change', '.enable', function () {
            let el = $(this).parent().parent().parent().parent();
            if ($(this).is(':checked')) {
                el.find("select").prop("disabled", false);
            } else {
                el.find("select").prop("disabled", true);
            }
        });

    </script>
@endsection
