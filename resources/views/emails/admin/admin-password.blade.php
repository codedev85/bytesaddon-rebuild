@component('mail::message')
<h3>Account Information</h3>

<p>Below are your Login credentials. </p>

<p><b>Email :</b> {{ $data['email'] }}</p>
<p><b>Password : </b> {{ $data[0] }}</p>

<p>Welcome on board.</p>

@component('mail::button', ['url' => ''])
GO HOME
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
