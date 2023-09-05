{{-- <form action="{{ route('set_language_locale', $lang) }}" method="POST">
    @csrf
    <button type="submit" class="nav-link"> 
        <span class="flag-icon flag-icon-{{ $nation }}"></span>
    </button>
</form> --}}

<form class="d-inline" action="{{route('setLocale', $lang)}}" method="post">
    @csrf
    <button type="submit" class="btn">
      <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="32" height ="32"/>
    </button>
  </form>