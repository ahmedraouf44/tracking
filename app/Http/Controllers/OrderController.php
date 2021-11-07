<?php

namespace App\Http\Controllers;


use App\Models\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Database;

class OrderController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index()
    {
        $orders=Order::with('client')->get();
//dd($orders[0]->client->name);
        return view('order.listOrders', compact('orders'));
    }


    public function tracking($id)
    {
        $order=Order::with('client')->where('id',$id)->first();
        return view('order.tracking', compact('order'));
    }

    public function updateLocation($id)
    {
        $order= Order::where('id', $id)->get()->first();
        return view('order.updateLocation', compact('order'));
    }

    public function create()
    {
        return view('order.createOrder');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'lat' => 'required|numeric',
            'long' => 'required|numeric',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

            $order = new Order();
            $order->client_id = $user->id;
            $order->name = $request->input('name');
            $order->address = $request->input('address');
            $order->lat = $request->input('lat');
            $order->long = $request->input('long');
            $order->save();

        return redirect()->route('home')->with('success', "The Order <strong>$order->name</strong> has successfully been created.");


    }

    public function delete($id)
    {
        $order= Order::where('id', $id)->delete();
        $deleteData = $this->database->getReference('location/'.$id);
        if ($deleteData){
            $deleteData->set(null);
        }
        return redirect('orders');
    }

}
