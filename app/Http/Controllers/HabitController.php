<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitRequest;
use App\Models\Habit;
use App\Models\HabitLog;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;



class HabitController extends Controller
{

    use AuthorizesRequests;

    public function index() {
        $habits = Auth::user()
            ->habits()
            ->with('habitLogs')
            ->get();

        return view('dashboard', compact('habits'));
    }

    public function create(): View {
        return view('habits.create');
    }

    public function store(HabitRequest $request)
    {   
        $validated = $request->validated();

        Auth::user()->habits()->create($validated);

        return redirect()
            ->route('habits.index')
            ->with('success',  'Hábito criado com sucesso.');
    }

    public function show(Habit $habit)
    {
        //
    }

    public function edit(Habit $habit)
    {
        $this->authorize('update', $habit);

        return view('habits.edit', compact('habit'));
    }
    
    public function update(HabitRequest $request, Habit $habit)
    {
        $this->authorize('update', $habit);

        $validated = $request->validated();

        $habit->update($validated);

        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito atualizado com sucesso!');
    }

    public function destroy(Habit $habit)
    {
        $this->authorize('delete', $habit);

        $habit->delete();

        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito removido com sucesso.');
    }

    public function settings() 
    {
        $habits = Auth::user()->habits;

        return view('habits.settings', compact('habits'));
    }

    public function toggle(Habit $habit) 
    {
        $this->authorize(ability: 'toggle', $habit);

        $today = Carbon::today()->toDateString();

        $log = HabitLog::query()
            ->where('habit_id', $habit->id)
            ->where('completed_at', $today)
            ->first();

        if ($log) {
            $log->delete();
            $message = 'Hábito desmarcado';
        } else {
            HabitLog::create([
                'habit_id' => $habit->id,
                'completed_at' => $today,
                'user_id' => Auth::user()->id
            ]);
            $message = 'Hábito concluído 👏';
        }

        return redirect()
            ->route('habits.index')
            ->with('success', $message);
    }
}
