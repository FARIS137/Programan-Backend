<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ["kucing","ayam","ikan"];
   

    public function index()
    {
        echo "Menampilkan data animal";
        echo "<br/>";
        foreach ($this->animals as $animal){
            echo "-{$animal}";
            echo "<br/>";
        }
       
    }

    public function store(Request $request)
    {
        echo "Menambahkan data animals ";
        echo "<br/>";
        array_push($this->animals, $request->nama);
        return $this->index();
    }

    public function update(Request $request, $id)
    {
        echo "Mengubah data animal id $id ";
        echo "<br/>";
        $this->animals[$id] = $request->nama;
        return $this->index();

    }

    public function destroy($id)
    {
        echo "Menghapus data animal id $id";
        unset($this->animals [$id]);
        return $this->index();
    }
}