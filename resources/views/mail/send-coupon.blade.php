<h6># 🎉 Special Offer Just for You!
</h6>
<p>
    {{ $mailMessage }}
</p>

<h4>Your coupon code is: <span> {{ $coupon->code }} </span> </h4>
<h4>Value:
    @if($coupon->discount_type === 'percent')
        <span> {{ $coupon->discount }}% off </span>
    @elseif($coupon->discount_type === 'amount')
        <span> ₦{{ number_format($coupon->discount, 2) }} off </span>
    @endif
</h4>



<h4>Expires: <span>{{ $coupon->expired_date }}</span></h4>

<p>
    <a href="{{ url('/') }}" style="background: #007bff;color:#fff;padding:10px 20px;text-decoration:none;border-radius:4px;">
        Shop Now
    </a>
</p>

<p>Thanks, <br>{{ config('settings.site_name') }}</p>
