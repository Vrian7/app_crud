<?php

namespace App\Http\Controllers;

use App\Record;
use App\Http\Requests\RecordForm;
use Illuminate\Http\Request;

/** @resource Employee
 *
 * Resource to retrieve, store and edit Record data
 */
class RecordController extends Controller
{
    
    /**
     * Display Record's data.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return response()->json(Record::get());
    }

    /**
     * Select information from Records.
     *
     * @param  \Illuminate\Http\Request  $request     
     * @return \Illuminate\Http\Response
    */
    public function getIndexData(Request $request)
    {    	
    	$offset = $request->offset ?? 0;
        $limit = $request->limit ?? 10;
        $sort = $request->sort ?? 'id';
        $order = $request->order ?? 'asc';  
        $name = $request->name ?? '';
        $uuid = $request->uuid ?? 0;
        $description = $request->description ?? '';
        $code = $request->code ?? '';
        if($uuid) {
            $operator = '=';
        } else {
            $operator = '!=';
        }
         
        $total = Record::
              where('name','like',$name.'%')        
            ->where('code','like',$code.'%')        
            ->where('description','like',$description.'%')        
            ->where('uuid',$operator,$uuid)
            ->count();

        $records = Record::
              where('name','like',$name.'%')        
            ->where('code','like',$code.'%')        
            ->where('description','like',$description.'%')        
            ->where('uuid',$operator,$uuid)
			->skip($offset)
            ->take($limit)
            ->orderBy($sort,$order)
            ->get();

        return response()->json(
        [
            'records' => $records->toArray(),
            'total'=>$total,
        ]);
    }

    /**
     * Update the Records in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \App\Record
    */
    public function update(RecordForm $request, $id)
    {        
        $record = Record::findOrFail($id);
        $record->fill($request->all());
        $record->save();
        return $record;
    }
}
