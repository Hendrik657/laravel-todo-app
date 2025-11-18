<?php

namespace App\Http\Controllers;

use App\Models\TodoModel;
use Exception;
use Illuminate\Http\Request;

class TodoController extends Controller
{
	/**
	 * Haalt alle todos op
	 */
    public function getTodos(){
		try {
			$todos = TodoModel::all();
		}
		catch (Exception $ex) {
			throw $ex;
		}

		return view('todo', compact('todos'));
	}

	/**
	 * Maakt een nieuwe todo aan
	 */
	public function createTodo(Request $request){
		//Valideren
		$validated = $request->validate([
			'titel' => 'required',
			'omschrijving' => 'required'
		]);

		//Todo aanmaken
		TodoModel::create([
			//db kolom => formulier name attribuut
			'title' => $validated['titel'],
			'description' => $validated['omschrijving'],
			'isCompleted' => false
		]);

		//Terugsturen
		return redirect('/todo')->with('succes', 'Todo succesvol aangemaakt');
	}

	/**
	 * Verwijdert de geselecteerde todo
	 */
	public function deleteTodo($id){
		//Todo opzoeken
		$todo = TodoModel::findOrFail($id);

		$todo->delete();

		return redirect('/todo')->with('succes', 'Todo succesvol verwijderd');
	}

	/**
	 * Wisselt de checkbox tussen geselecteerd en niet-geselecteerd
	 */
	public function toggleTodo($id){
		$todo = TodoModel::findOrFail($id);

		//Status omdraaien
		$todo->isCompleted = !$todo->isCompleted;

		$todo->save();

		return redirect('/todo')->with('succes', 'Todo succesvol bijgewerkt');
	}
}
