<?php
use Illuminate\Support\Facades\DB;
function IsPurshased($id)
{
$Properties = DB::table('properties')->where('properties.id',$id)->join('transactions','properties.id','=','Property_ID')->get();
return $Properties->count();
}

