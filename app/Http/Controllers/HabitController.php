<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitRequest;
use App\Models\Habit;
use Illuminate\View\View;


class HabitController extends Controller
{

    public function create(): View
    {
        return view('habits.create');
    }

    public function index() {
        $habits = auth()->user()->habits;

        return view('dashboard', compact('habits'));
    }

    public function store(HabitRequest $request)
    {   
        $validated = $request->validated();

        auth()->user()->habits()->create($validated);

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
        return view('habits.edit', compact('habit'));
    }
    
    public function update(HabitRequest $request, Habit $habit)
    {
        if($habit->user_id !== auth()->user()->id) {
            abort(403, 'Esse hábito não é seu!');
        }

        $validated = $request->validated();

        $habit->update($validated);

        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito atualizado com sucesso!');
    }

    public function destroy(Habit $habit)
    {
        if($habit->user_id !== auth()->user()->id) {
            abort(403, 'Esse hábito não é seu!');
        }

        $habit->delete();

        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito removido com sucesso.');
    }

    public function settings() {
        $habits = auth()->user()->habits;

        return view('habits.settings', compact('habits'));
    }
}
