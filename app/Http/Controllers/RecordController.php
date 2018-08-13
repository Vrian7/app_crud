<?php

namespace App\Http\Controllers;

use App\Record;
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
        return response()->json(Employee::with('city_identity_card')
                ->with('insurance_company')
                ->with('management_entity')
                ->with('city_birth')
                ->get());
    }
    public function getIndexData(Request $request)
    {    	
    	$offset = $request->offset ?? 0;
        $limit = $request->limit ?? 10;
        $sort = $request->sort ?? 'id';
        $order = $request->order ?? 'asc';  
        $total = Record::count();
		$records = Record::
			skip($offset)
            ->take($limit)
            ->orderBy($sort,$order)
            ->get();

        return response()->json(
        	[
        	   'records' => $records->toArray(),
        	   'total'=>$total,
        	 ]);
    }
}
