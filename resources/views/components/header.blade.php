<header class="bg-white flex border-b-2 items-center justify-between p-4">
  <div>
    logo
  </div>
  <div class="flex items-center gap-2.5">
    <p>github</p>

    @auth
      <form action="{{ route('auth.logout') }}" method="post">
        @csrf

        <button type="submit" class="bg-white p-2 border-2">
          Sair
        </button>
      </form>
    @endauth

    @guest
      <a class="bg-white p-2 border-2" href="{{ route('site.login') }}">
        Login
      </a>
    @endguest
  </div>
</header>