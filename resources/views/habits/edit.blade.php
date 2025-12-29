<x-layout>
  <main class="py-10">
    <p>Editar hábito</p>

    <section class="bg-white max-w-[600px] mx-auto p-10 pb-6 border-2 mt-4">
      <form action={{ route('habit.update', $habit->id) }} method="post" class="flex flex-col">
        @csrf
        @method('PUT')

        <fieldset class="flex flex-col">
          <label for="name" class="font-medium text-sm mb-1.5">Nome do hábito</label>
          <input
            class="bg-white border-2 p-2 @error ('email') border-red-500 @enderror" 
            placeholder="Nome do hábito"
            name="name"
            value="{{ $habit->name }}"
          />

          @error('name')
            <p class="text-red-500 text-xs">
              {{ $message }}
            </p>
          @enderror
        </fieldset>

        <button type="submit" class="bg-white border-2 p-2 font-bold mt-5">
          Editar
        </button>
      </form>
    </section>
  </main>
</x-layout>