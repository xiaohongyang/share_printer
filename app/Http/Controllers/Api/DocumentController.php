<?php

namespace App\Http\Controllers\Api;

use App\Models\DocumentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class DocumentController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo 'index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, DocumentModel $model)
    {
        //

        $request->merge(['user_id' => \Auth::guard('api')->id()]);
        $data = $request->all();
        try{
            $rs = $model->create($data);
            if(!$rs){
                $this->setJsonResult(null, $model->message);
            } else {
                $this->setJsonResult(null, null, $model->id);
            }
        } catch (Exception $e){
            $this->setJsonResult(null, "出现异常,请与管理员联系");
        }

        return $this->getJsonResult();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocumentModel  $documentModel
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentModel $documentModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocumentModel  $documentModel
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentModel $documentModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DocumentModel  $documentModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentModel $documentModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocumentModel  $documentModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentModel $documentModel)
    {
        //
    }
}
