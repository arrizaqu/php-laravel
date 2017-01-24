<?php 

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Yajra\Datatables\Facades\Datatables;

 class Customer{
	 
	 public function getIndex(){
		return view('layouts.index');
	 }
	 
	 public function anyData(){
		 return Datatables::queryBuilder(DB::table('customers'))->make(true);
	 }
 }