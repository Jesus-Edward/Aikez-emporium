<div class="mb-5 mt-2">
    <h5 class="card-title">Send Coupons</h5>
    <hr />
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Send Coupon to User(s)
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form action="{{ route('admin.send.coupon') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-4 mt-1 mb-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" name="email" value="{{ old('email') }}" multiple class="form-control">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 mt-1 mb-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Subject</label>
                                    <input type="text" name="subject" value="{{ old('subject') }}" class="form-control">
                                    @error('subject')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 mt-1 mb-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Coupon</label>
                                    <input type="text" name="coupon" value="{{ old('coupon') }}" class="form-control">
                                    @error('coupon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mt-1 mb-2">
                                <div class="form-group">
                                    <label for="" class="form-label">Message</label>
                                    <textarea name="message" class="form-control summernote" id="" cols="30" rows="10">
                                        {{ old('message') }}
                                    </textarea>
                                    @error('message')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-2">
                                <button class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
