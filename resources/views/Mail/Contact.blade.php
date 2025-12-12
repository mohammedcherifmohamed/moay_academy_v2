<h1>nouvelle inscription{{ $full_name }}</h1>

<p><strong>Full Name:</strong> {{ $full_name }}</p>
<p><strong>Email:</strong> {{ $email }}</p>
<p><strong>Phone:</strong> {{ $phone_number }}</p>

<p><strong>Date of Birth:</strong> {{ $date_of_birth }}</p>
@if(!empty($language_level))
<p><strong>Language Level:</strong> {{ $language_level }}</p>
@endif
<p><strong>Formation:</strong> {{ $formation }}</p>

<hr>
@if(!empty($usermessage))
<p><strong>Message:</strong></p>
<p>{{ $usermessage }}</p>
@endif