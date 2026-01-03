<x-layout>
  <main class="py-10 min-h-[calc(100vh-160px)] px-4">
    <x-navbar />
    
    @session('success')
      <div class="flex">
        <p class="bg-green-100 border rounded-md p-3 block border-green-500 mt-4 max-w-[200px]">
          {{ session('success') }}
        </p>
      </div>
    @endsession

    <div>
      <h2 class="text-xl font-bold mt-8 mb-4">{{ date('d/m/Y') }}</h2>

      <ul class="flex flex-col gap-2">
        @forelse($habits as $item)
          <li class="habit-shadow-lg p-2 bg-[#ffdaac]">
            <form 
              action="{{ route('habits.toggle', $item->id) }}"
              method="post"
              class="flex items-center gap-2"
              id="form-{{ $item->id }}"
            >
              @csrf
              <input
                {{ $item->wasCompletedToday() ? 'checked' : '' }} 
                type="checkbox" 
                class="w-5 h-5"
                onchange="document.getElementById('form-{{ $item->id }}').submit()"
              />
              <p class="font-bold text-lg">
                {{ $item->name }}
              </p>
            </form>
          </li>
        @empty
          <p>Nenhum hábito registrado.</p>
          <a href="/habito/cadastrar" class="bg-white p-2 border-2 flex">
            Cadastre um novo hábito agora.
          </a>
        @endforelse
      </ul>
    </div>
  </main>
</x-layout>