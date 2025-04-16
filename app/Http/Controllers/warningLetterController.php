<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\warning_letters;

class WarningLetterController extends Controller
{
    public function index()
    {
        $letters = warning_letters::with('employee')->latest()->get();
        return view('warning-letters.index', compact('letters'));
    }

    public function create()
    {
        $employees = warning_letters::all();
        $types = ['SP1', 'SP2', 'Teguran Tertulis', 'SP3'];
        return view('warning-letters.create', compact('employees', 'types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'type' => 'required|in:SP1,SP2,Teguran Tertulis,SP3',
            'date' => 'required|date',
            'violation' => 'required|string',
            'consequences' => 'required|string',
            'improvement_plan' => 'nullable|string',
            'issued_by' => 'required|string',
        ]);

        warning_letters::create($validated);

        return redirect()->route('warning-letters.index')
                         ->with('success', 'Surat Peringatan berhasil dibuat');
    }

    public function show(warning_letters $warningLetter)
    {
        return view('warning-letters.show', compact('warningLetter'));
    }

    public function acknowledge(Request $request, warning_letters $warningLetter)
    {
        $warningLetter->update([
            'acknowledged' => true,
            'acknowledged_at' => now()
        ]);

        return back()->with('success', 'Surat Peringatan telah diakui');
    }
}

