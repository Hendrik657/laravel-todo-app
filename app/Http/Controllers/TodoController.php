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
		return redirect()->back()->with('succes', 'Todo succesvol aangemaakt');
	}

	public function deleteTodo($id){
		$todo = TodoModel::findOrFail($id);

		$todo->delete();

		return redirect('/todo')->with('succes', 'Todo succesvol verwijderd');
	}
}
