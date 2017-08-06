<?php

namespace App\Http\Controllers\Api;

use App\Http\Service\PrinterOrderService;
use App\Models\DocumentModel;
use App\Models\DocumentTeamModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;
use Symfony\Component\Debug\Exception\FatalThrowableError;

class PrintOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
        $result = ['status' => 0, 'message' => ['notice' => '保存失败']];
        try{

            $teamId = $request->get('team_id');
            $printAmount = $request->get('print_amount');
            $printAmount = json_decode($printAmount, JSON_UNESCAPED_UNICODE);

            $teamModel = DocumentTeamModel::getByID($teamId);;
            $documentModelList = [];
            if(is_array($printAmount) && count($printAmount)) {
                foreach ($printAmount as $item){
                    $documentModel = DocumentModel::getByID($item['id']);
                    if(is_null($documentModel) || !$documentModel) {
                        $result['message'] = "文档不存在或已被删除";
                        break;
                    }
                    $documentModel->setAmount($item['amount']);
                    $documentModelList[] = $documentModel;
                }
            }

            $printService = new PrinterOrderService();

            $rs = $printService->create($teamModel, $documentModelList);

            if($rs){
                $result['status'] = 1;
                $result['message'] = '打印订单保存成功';
            }
        } catch (FatalThrowableError $e){
            $result['message'] = $e->getMessage();
        } catch (Exception $e){
            $result['message'] = $e->getMessage();
        }

        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
