<?php

namespace App\Http\Controllers;
use App\Models\OrderGlobal;
use Illuminate\Http\Request;

class OrderGlobalController extends Controller
{
     //
     public function index()
     {
       //  $orders = OrderGlobal::all();
         return view('dashboard.Admin.OrderGlobal.Index');
     }
 }
 
