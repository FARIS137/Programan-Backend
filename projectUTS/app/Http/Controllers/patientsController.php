<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patients;
use Illuminate\Support\Facades\DB;


class PatientsController extends Controller
{

    # get all resource
    public function index()
    {
        # menggunakan model patients untuk select data
        $patients = patients::all();

        if($patients){
            $data = [
                'message' => 'get all Patients',
                'data' => $patients,
            ];

            # menggunakan response json laravel
            # otomatis set header content type json
            # otomatis mengubah data array ke JSON
            # mengatur status code
            return response()->json($data, 200);
        } else {
        
            $data = [
                'message' => 'Data Patients is empty'
            ];
    
            return response()->json($data, 204);
        }

    }


    # menambahkan resource Patients
    # membuat method store
    public function store(request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'numeric|required',
            'status' => 'required',
            'address' => 'required',
            
        ]);
        $patients = patients::create($validatedData);
        
        $data = [
            'message' => 'Patients is created successfully',
            'data' => $patients
        ];

        # mengembalikan data (json) status code 201
        return response()->json($data, 201);
    }

    # mendapatkan detail resource patients
    # membuat method show
    public function show($id) {

        # cari data Patients
        $patients = patients::find($id);

        if ($patients) {
            $data = [
                'message' => "Get detail patients",
                'data' => $patients
            ];

             # mengembalikan data json status code 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'patients not found'
            ];
            
            # mengembalikan data json status code 404
            return response()->json($data, 404);
        }
    }


     # mengupdate resource patients
    # membuat method update
    public function update(request $request, $id){
        
        # mencari data patients yang ingin diupdate
        $patients = patients::find($id);

        if($patients) {

            # mendapatkan data request
            $input = [
                'name' => $request->input('name') ?? $student->name,
                'phone' => $request->input('phone') ?? $student->phone,
                'address' => $request->input('address') ?? $student->address,
                'status' => $request->input('status') ?? $student->status
            ];

            # mengupdate data
            $patients->update($input);
            
            $data = [
                'message' => 'Patients is updated',
                'data' => $patients
            ];

            # mengirimkan respon json dgn status code 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'patients not found'
            ];

            # mengembalikan respon json dgn status code 404
            return response()->json($data, 404);
        }
    }

    # cari data patients yg ingin dihapus
    public function destroy($id) {

        $patients = patients::find($id);

        if ($patients) {
             # hapus data patients
            $patients->delete();

            $data = [
                'message' => 'patiends is deleted successfully',
                'data' => $patients
            ];

            # mengembalikan data json status code 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'patients not found'
            ];

             # mengembalikan data json status code 404
            return response()->json($data, 404);
        }
    }

    # mencari data patients yang diinginkan  dengan nama
    public function search($name) {
        # mencari data di table patients
        $patients = DB::table('patients')
                    ->where('name', '=', $name)
                    ->orWhere('name', 'LIKE', '%' . $name . '%')
                    ->get();

        if ($patients) {

            $data = [
                'message' => ' patients Get  search resource',
                'data' => $patients,
            ];

             # mengirimkan respon data json status dgn code 200
            return response()->json($data, 200);
        } else {

            $data = [
                'message' => 'Data patients is empty'
             ];

             # mengembalikan data json status code 404
            return response()->json($data, 404);
        }
    }

    # mencari data patients yang berstatus positive
    public function positive() {

        # mencari data di table patients
        $patients = DB::table('patients')
                    ->where('status', '=', 'positive')
                    ->get();

        if ($patients) {

            $data = [
                'message' => 'patients Get positive resource',
                'data' => $patients,
            ];

            # mengirimkan respon data json status dgn code 200
            return response()->json($data, 200);
        } else {

            $data = [
                'message' => 'Data Patients is empty'
            ];

            # mengembalikan data json status code 200
            return response()->json($data, 200);
        }
    }

    # Get Recovered Resource
    public function recovered() {

        $patients = DB::table('patients')
                    ->where('status', '=', 'recovered')
                    ->get();

        if ($patients) {

            $data = [
                'message' => 'Patients Get recovered resource',
                'data' => $patients,
            ];

            return response()->json($data, 200);
        } else {

            $data = [
                'message' => 'Data patients is empty'
            ];

            return response()->json($data, 200);
        }
    }

    # Get Dead Resource
    public function dead() {

        $patients = DB::table('patients')
                    ->where('status', '=', 'dead')
                    ->get();

        if ($patients) {

            $data = [
                'message' => 'Patients Get dead resource',
                'data' => $patients,
            ];

            return response()->json($data, 200);
        } else {

            $data = [
                'message' => 'Data patients is empty'
            ];
            
            return response()->json($data, 200);
        }
    }
        }
    

