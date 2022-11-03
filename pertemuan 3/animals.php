<?php

# membuat class Animal
class Animal
{
    public $data_hewan;
   
    # method constructor - mengisi data awal
    # parameter: data hewan (array)
    public function __construct($data_hewan)
    {
        $this->data_hewan = $data_hewan;
        $data_hewan = ["ayam","ikan"];

    }

    # method index - menampilkan data animals
    public function index()
    {
        
        # gunakan foreach untuk menampilkan data animals (array)
        $data_hewan = ["ayam","Ikan"];
        foreach ($data_hewan as $animal) {
            echo $animal . '<br>';
        }
    }

    # method store - menambahkan hewan baru
    # parameter: hewan baru
    public function store($data_hewan)
    {
        # gunakan method array_push untuk menambahkan data baru
    $animal=array("ayam","Ikan");
    array_push($animal,"burung");
    print_r($animal);
    }

    # method update - mengupdate hewan
    # parameter: index dan hewan baru
    public function update($index, $data_hewan)
    {

        $animal1=array("ayam","Ikan","burung");
        $animal2=array("kucing anggora");
        print_r(array_replace($animal1,$animal2));
    }

    # method delete - menghapus hewan
    # parameter: index
    public function destroy($index)

    {
        # gunakan method unset atau array_splice untuk menghapus data array
    $animal=array("kucing anggora","Ikan","burung");
    unset($animal[1]);
    print_r($animal);
    
    }
}

# membuat object
# kirimkan data hewan (array) ke constructor
$animal = new Animal([]);

echo 'Index - Menampilkan seluruh hewan <br>';
$animal->index();
echo "<br>";

echo "Store - Menambahkan hewan baru (Burung) <br>";
$animal->store('burung');
echo "<br>";
$animal->index();
echo "<br>";

echo "Update - Mengupdate hewan <br>";
$animal->update(0, 'Kucing Anggora');
echo "<br>";
$animal->index();
echo "<br>";

echo "Destroy - Menghapus hewan <br>";
$animal->destroy(1);
echo "<br>";
$animal->index();
echo "<br>";