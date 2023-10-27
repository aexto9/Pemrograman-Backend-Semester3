<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    private $animals = ["Kucing", "Ayam", "Ikan", "Kambing", "Sapi"];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //method get
        // echo "menampilkan data animals";
        foreach ($this->animals as $id => $animal) 
        {
            echo "ID: {$id} - {$animal} <br>";
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //method post
        // echo "nama hewan : $request->nama";
        // echo "<br>";
        // echo "menambahkan data hewan";
        array_push($this->animals, $request->name);
        
        $this->index(); // show all animals
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //method put
        // echo "nama hewan : $request->nama";
        // echo "<br>";
        // echo "mengupdate data hewan id $id";
        if (!isset($this->animals[$id])) {
            echo "ID {$id} not found";
            return;
        }

        $this->animals[$id] = $request->name;
        echo "Success Updating {$request->name} on id {$id}". "<br>";

        $this->index(); // show all animals
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //metode delete
        if (!isset($this->animals[$id])) {
            echo "ID {$id} not found";
            return;
        }

        unset($this->animals[$id]);

        $this->index(); // show all animal
    }
}
