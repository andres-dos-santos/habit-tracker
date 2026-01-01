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
      <h2 class="text-xl mt-8 mb-4 font-bold">Configurar Hábitos</h2>

      <ul class="flex flex-col gap-2">
        @forelse($habits as $item)
          <li class="habit-shadow-lg p-2 bg-[#ffdaac]">
            <div class="flex items-center gap-2">
              <input type="checkbox" class="w-5 h-5" {{ $item->is_completed ? 'checked' : '' }} disabled />
              <p class="font-bold text-lg">
                {{ $item->name }}
              </p>
                <span class="font-light text-md">
                  [{{ $item->habitLogs->count() }}]
                </span>
                <a href="{{ route('habits.edit', $item->id) }}" class="hover:opacity-50 p-1 bg-blue-500 cursor-pointer">
                  <x-icons.edit />
                </a> 
                
                <form action={{ route('habits.destroy', $item) }} method="post">
                  @csrf
                  @method('delete')

                  <button 
                    type="submit" 
                    class="hover:opacity-50 p-1 bg-red-500 cursor-pointer"
                  >
                    <x-icons.trash />
                  </button>
                </form>
              </div>
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