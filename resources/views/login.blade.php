<x-layout>
  <main class="py-10 flex flex-1 items-center justify-center flex-col">
    <section class="bg-white p-5 habit-shadow-lg mt-10 min-w-sm">
      <h1 class="text-xl font-bold mb-5">Logue</h1>

      <p class="mb-5">Insira seus dados para acessar</p>

      <form 
        action="{{ route('auth.login') }}" 
        method="post" 
        class="flex flex-col gap-4"
      >
        @csrf

        <fieldset class="flex flex-col">
          <label for="" class="font-medium text-sm mb-1.5">Email</label>
          <input
            class="outline-0 bg-white habit-shadow p-2 @error ('email') border-red-500 @enderror" 
            placeholder="Email" 
            name="email"
            type="email"
          />

          @error('email')
            <p class="text-red-500 text-xs">
              {{ $message }}
            </p>
          @enderror
        </fieldset>

        <fieldset class="flex flex-col">
          <label for="" class="font-medium text-sm mb-1.5">Senha</label>
          <input
            class="outline-0 bg-white habit-shadow p-2 @error ('email') border-red-500 @enderror"
            placeholder="******"
            name="password" 
            type="password"
          />
          @error('password')
            <p class="text-red-500 text-xs">
              {{ $message }}
            </p>
          @enderror
        </fieldset>
        
        <button type="submit" class="p-2 font-bold mt-5 habit-shadow-lg bg-habit-orange habit-btn">
          Entrar
        </button>
        
        <a 
          class="mt-2" 
          href="{{ route('site.register') }}"
        >
          Ainda não tem conta? <span class="underline hover:opacity-50">Registre-se</span>
        </a>
      </form>
    </section>
  </main>
</x-layout>
