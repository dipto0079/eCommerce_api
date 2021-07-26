@component('mail::message')

Hello {{$cus->customer_name}}

@component('mail::button',['url'=>URL::to('api/customer/verify-email/',$cus->email_verification_code)])
Click Here To Verify Your Mail
    <p><a href="{{route('verify_email',$cus->email_verification_code)}}">
            {{route('verify_email',$cus->email_verification_code)}}
        </a></p>
@endcomponent
Thanks
@endcomponent
