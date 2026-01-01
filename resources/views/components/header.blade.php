<header class="bg-white flex border-b-2 items-center justify-between p-4">
  <div class="flex items-center gap-2">
    <a href="{{ route('habits.index') }}" class="habit-btn habit-shadow-lg px-2 py-1 bg-habit-orange">
      HT
    </a>

    <p>Habit Tracker</p>
  </div>

  <div class="flex items-center gap-2.5">
    @auth
      <form action="{{ route('auth.logout') }}" method="post">
        @csrf

        <button type="submit" class="p-2 habit-shadow-lg habit-btn">
          Sair
        </button>
      </form>
    @endauth

    @guest
      <div class="flex gap-2">
        <a class="p-2 habit-shadow-lg bg-habit-orange" href="{{ route('site.login') }}">
          Logar
        </a>
        <a class="p-2 habit-shadow-lg" href="{{ route('site.register') }}">
        Cadastrar
        </a>
      </div>
    @endguest
  </div>
</header>