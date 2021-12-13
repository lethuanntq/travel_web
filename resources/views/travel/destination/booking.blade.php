<div class="modal fade" id="booking-tour" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
     aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <form id="form-booking-tour" method="post" action="#">
                <div class="modal-header">
                    <h3 class="text-primary font-weight-600 w-50">
                        <div class="d-inline"><i class="mdi mdi-booking-mail m"></i></div>
                        <div class="d-inline"><span>Đặt tour du lịch</span>
                            @if(isset($tour->type) && $tour->type == \App\Models\Tour::TYPE_DISCOUNT )
                                <span class="badge badge-danger fs-12 font-weight-bold">
                            Khuyến Mại
                            </span>
                            @endif</div>
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="border">
                        <div class="ml-3">
                            <div class="mt-3">
                                <b>Thông tin tour :</b>
                            </div>
                            <p>Tên tour : {{ $tour->destination_name ?? null}}</p>
                            @if(isset($tour->type) && $tour->type == \App\Models\Tour::TYPE_DISCOUNT )
                                <p>Giá tour khuyến mãi
                                    : {{ ($tour->price_promotion ? number_format($tour->price_promotion) : 0) .\App\Models\Setting::CURRENCY}}</p>
                            @else
                                <p>Giá tour
                                    : {{ (isset($tour->price) ? number_format($tour->price) : 0) .\App\Models\Setting::CURRENCY}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="mt-5 container">
                        <input name="booking[tour_id]" value="{{$tour->id ?? null}}" hidden>
                        <div>
                            <label class="mb-2">Họ tên người đặt tour(*)</label>
                            <input class="form-control" id="booking-name" name="booking[name]" type="text"
                                   value="{{ old('booking.name') }}">
                            <div class="invalid-feedback d-block" id="error-name"></div>
                        </div>
                        <div>
                            <label class="mb-2">Số điện thoại(*)</label>
                            <input class="form-control" id="booking-phone" name="booking[phone]" type="text"
                                   value="{{ old('booking.phone') }}">
                            <div class="invalid-feedback d-block" id="error-phone"></div>
                        </div>
                        <div class="mt-3">
                            <div>
                                <label>Số lượng người lớn</label>
                                <input class="form-control" id="booking-email" name="booking[adult]" type="number"
                                       value="{{ old('booking.adult') }}">
                            </div>
                            <div class="invalid-feedback d-block" id="error-adult"></div>
                        </div>
                        <div class="mt-3">
                            <div>
                                <label>Số lượng trẻ em</label>
                                <input class="form-control" id="booking-email" name="booking[child]" type="number"
                                       value="{{ old('booking.child') }}">
                            </div>
                            <div class="invalid-feedback d-block" id="error-child"></div>
                        </div>
                        <div class="mt-3 row form-group">
                            <div class="col-md-5">
                                <label>Thời gian bắt đầu</label>
                                <input class="form-control" id="booking-start_date" name="booking[start_date]"
                                       type="datetime-local">
                                <div
                                    class="invalid-feedback d-block" id="error-start_date"></div>
                            </div>
                            <span class="text-center" style="margin-top: 3%">~</span>
                            <div class="col-md-5">
                                <label>Thời gian kết thúc</label>
                                <input class="form-control" id="booking-end_date" name="booking[end_date]"
                                       type="datetime-local">
                                <div class="invalid-feedback d-block" id="error-end_date"></div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="">Note</label>
                            <textarea class="form-control" rows="5" id="booking-note"
                                      name="booking[note]"
                                      type="text"></textarea>
                        </div>
                        <div class="mt-3" style="color: red">
                            * Chúng tôi cam kết bảo mật thông tin tuyệt đối cho bạn
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <b href="#" style="background-color: #3490dc" class="btn btn-primary" id="submit-booking-tour">Đặt
                        tour
                    </b>
                </div>
            </form>
        </div>
    </div>
</div>
