<h1>IPT APP</h1>

<p>
  Welcome {{$user->name}},
</p>
<p>
  Thank you for your participation. Please click the link below to verify your account.
</p>
<p>
  <a href="{{url('/verification/' . $user->id . '/' . $user->remember_token)}}">
    Verify Account
  </a>
</p>
