<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use App\Models\User;

class FirebaseController extends Controller
{

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function trackingData($id){
        $lastLocation = $this->database->getReference('location/'.$id)
            ->orderByKey()->limitToLast(1)->getSnapshot()->getValue();
        foreach ($lastLocation as $value){
            $data = $value;
        }
        return response()->json($data);
    }

    public function updateLocation(Request $request, $id){

        $this->validate($request, [
            'lat' => 'required|numeric',
            'long' => 'required|numeric',
        ]);

        $data = [
            'lat'=> $request->lat,
            'long'=> $request->long,
        ];

        $updateData = $this->database->getReference('location/'.$id)->push($data);
        if ($updateData){
            return redirect('updateLocation/'.$id);
        }else{
            $addNewOrderLocation = $this->database->getReference('location')->push($id);
            $update = $this->database->getReference('location/'.$id)->push($data);
            return redirect('updateLocation/'.$id);
        }



    }

}
