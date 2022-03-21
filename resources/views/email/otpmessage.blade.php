<h1>Agent Account Setup</h1>

<h4>Dear {{$data->firstname}},</h4>
<p>Thank you for your interest to join 1Block Ghana Listing platform. We will review your information provided and share the registration form with you.</p>

<p>Kindly click on the link below to complete your account setup</p>
<a href="{{ route('reset.password.get', $token) }}"><button>Setup Account</button></a>


<p>Best Regards,<br>
1BlockGhana
</p>
