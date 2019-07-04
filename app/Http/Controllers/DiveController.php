<?php

namespace App\Http\Controllers;

use App\Model\Dive;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\DiveResource;
use Carbon\Carbon;
use App\Http\Requests\DiveStoreRequest;

class DiveController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DiveResource::collection(auth()->user()->dives()->latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiveStoreRequest $request)
    {
        $input = $request->except('date');
        $input['time'] = Carbon::createFromTimestamp(strtotime( $request['date'] . $input['time'] . ":00"));

        $dive = auth()->user()->dives()->create($input);
    
        return response('Created', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Dive  $dive
     * @return \Illuminate\Http\Response
     */
    public function show(Dive $dive)
    {
        return new DiveResource($dive);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Dive  $dive
     * @return \Illuminate\Http\Response
     */
    public function edit(Dive $dive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Dive  $dive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dive $dive)
    {
        $dive->update($request->all());

        return response('Update', Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Dive  $dive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dive $dive)
    {
        $dive->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
