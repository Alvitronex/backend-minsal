<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class TareasController extends Controller
{
    public function index()
    {
        return response()->json(Tareas::latest()->get(), 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo'       => 'required|string|max:255',
            'descripcion'  => 'nullable|string',
            'prioridad'    => 'nullable|string',
            'fecha_limite' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error de validación',
                'errors'  => $validator->errors()
            ], 422);
        }

        $fechaLimite = Carbon::parse($request->fecha_limite)->startOfDay();
        $hoy = Carbon::today();

        if ($fechaLimite->lt($hoy)) {
            return response()->json([
                'message' => 'La fecha límite no puede ser anterior a la fecha actual.'
            ], 400);
        }

        $prioridad = $request->input('prioridad', 'Media');

        if (preg_match('/urgente/i', $request->titulo)) {
            $prioridad = 'Alta';
        }

        $tarea = Tareas::create([
            'titulo'       => $request->titulo,
            'descripcion'  => $request->descripcion,
            'prioridad'    => $prioridad,
            'fecha_limite' => $fechaLimite->toDateString(),
        ]);

        return response()->json($tarea, 201);
    }

    public function destroy(string $id)
    {
        $tarea = Tareas::find($id);

        if (!$tarea) {
            return response()->json(['message' => 'Tarea no encontrada'], 404);
        }

        $tarea->delete();

        return response()->json(['message' => 'Tarea eliminada exitosamente'], 200);
    }
}