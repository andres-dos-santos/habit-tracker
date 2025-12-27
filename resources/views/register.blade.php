<x-layout>
  <main class="py-10 flex flex-1 items-center justify-center flex-col">
    <section class="bg-white p-5 border-2 mt-10 min-w-sm">
      <h1 class="text-xl font-bold mb-5">Registre-se</h1>

      <p class="mb-5">Preencha as informações para cadastrar seus hábitos.</p>

      <form action="{{ route('auth.register') }}" method="post" class="flex flex-col gap-4">
        @csrf

        <fieldset class="flex flex-col">
          <label for="" class="font-medium text-sm mb-1.5">Nome</label>
          <input
            class="bg-white border-2 p-2 @error ('name') border-red-500 @enderror" 
            placeholder="Seu nome" 
            name="name"
          />

          @error('name')
            <p class="text-red-500 text-xs">
              {{ $message }}
            </p>
          @enderror
        </fieldset>

        <fieldset class="flex flex-col">
          <label for="" class="font-medium text-sm mb-1.5">Email</label>
          <input
            class="bg-white border-2 p-2 @error ('email') border-red-500 @enderror" 
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
            class="bg-white border-2 p-2 @error ('password') border-red-500 @enderror"
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

        <fieldset class="flex flex-col">
          <label for="" class="font-medium text-sm mb-1.5">Confirmar senha</label>
          <input 
            class="bg-white border-2 p-2 @error ('password') border-red-500 @enderror"
            placeholder="******"
            name="password_confirmation"
            type="password"
          />
          @error('password')
            <p class="text-red-500 text-xs">
              {{ $message }}
            </p>
          @enderror
        </fieldset>

        <button type="submit" class="bg-white border-2 p-2 font-bold mt-5">
          Cadastrar
        </button>
        
        <a 
          class="mt-2" 
          href="{{ route('site.login') }}"
        >
          Já tem uma conta? <span class="underline hover:opacity-50">Faça login</span>
        </a>
      </form>
    </section>
  </main>
</x-layout>
