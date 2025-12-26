<x-layout>
  <main class="py-10">
    <h1>
      Faça login
    </h1>

    <section class="mt-10">
      <form action="/login" method="post">
        @csrf

        @error('email')
          <p class="text-red-500 text-xs mt-1">
            {{ $message }}
          </p>
        @enderror
        <input class="bg-white border-2 p-2 mb-4" placeholder="Email" name="email" type="email">

        <input class="bg-white border-2 p-2 mb-4" placeholder="******" name="password" type="password">
        
        <button type="submit" class="bg-white border-2 p-2">
          Entrar
        </button>
      </form>
    </section>
  </main>
</x-layout>
