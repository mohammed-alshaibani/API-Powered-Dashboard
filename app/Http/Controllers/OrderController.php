<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
     
    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('dashboard.Admin.Order.Index', compact('orders'));
    }

    /**
     * Show the form for creating a new order.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Additional code logic for creating a new order if necessary
        return view('dashboard.Admin.Order.Create');
    }

    /**
     * Store a newly created order in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the input data from the form
        $validatedData = $request->validate([
            'customer_name' => 'required',
            'product_name' => 'required',
            'quantity' => 'required|numeric|min:1',
            
        ]);

        // Create a new order instance with the validated data
        $order = new Order();
        $order->customer_name = $request->input('customer_name');
        $order->product_name = $request->input('product_name');
        $order->quantity = $request->input('quantity');
        // Set other properties as needed

        // Save the order to the database
        $order->save();

        // Redirect to the index page with a success message
        return redirect()->route('Order.Index')->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('dashboard.Admin.Order.Edit');
    }

    /**
     * Show the form for editing the specified order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('dashboard.Admin.Order.Edit', compact('order'));
    }

    /**
     * Update the specified order in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        // Validate the input data from the form
        $validatedData = $request->validate([
            'customer_name' => 'required',
            'product_name' => 'required',
            'quantity' => 'required|numeric|min:1',
            // Add more validation rules as needed
        ]);

        // Update the order with the validated data
        $order->customer_name = $request->input('customer_name');
        $order->product_name = $request->input('product_name');
        $order->quantity = $request->input('quantity');
        // Update other properties as needed

        // Save the updated order to the database
        $order->save();

        // Redirect to the index page with a success message
        return redirect()->route('Order.Index')->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified order from the database.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // Delete the order from the database
        $order->delete();

        // Redirect to the index page with a success message
        return redirect()->route('Order.Index')->with('success', 'Order deleted successfully.');
    }
}

