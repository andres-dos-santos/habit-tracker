<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitRequest;
use App\Models\Habit;
use App\Models\HabitLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class HabitController extends Controller
{

    public function create(): View
    {
        return view('habits.create');
    }

    public function index() {
        $habits = Auth::user()->habits;

        return view('dashboard', compact('habits'));
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
        return view('habits.edit', compact('habit'));
    }
    
    public function update(HabitRequest $request, Habit $habit)
    {
        if($habit->user_id !== Auth::user()->id) {
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
        if($habit->user_id !== Auth::user()->id) {
            abort(403, 'Esse hábito não é seu!');
        }

        $habit->delete();

        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito removido com sucesso.');
    }

    public function settings() {
        $habits = Auth::user()->habits;

        return view('habits.settings', compact('habits'));
    }

    public function toggle(Habit $habit) {
        if($habit->user_id !== Auth::user()->id) {
            abort(403, 'Esse hábito não é seu!');
        }

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
