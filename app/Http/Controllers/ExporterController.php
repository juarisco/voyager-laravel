<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExporterController extends Controller
{
    protected $fillable = ['model', 'created_at'];

    public $timestamps = false;

    public function index()
    { }
}
