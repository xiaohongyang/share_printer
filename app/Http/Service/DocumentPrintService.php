<?php
namespace App\Http\Service;
use App\Models\DocumentModel;
use App\Models\DocumentTeamModel;
use App\Models\PrintOrderModel;
use Mockery\Exception;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: admin_
 * Date: 2017/8/1
 * Time: 21:23
 */
class DocumentPrintService extends BaseService
{

    private $printModel;

    public function __construct()
    {
        $this->printModel = new PrintOrderModel();
    }

    public function create( DocumentTeamModel $teamModel, $documentModelList ) {
        $result = false;
        DB::beginTransaction();
        try{

            $this->printModel->createParam($teamModel->id, $teamModel->user_id);
            $itemService = new DocumentPrintItemService();
            $rs = $itemService->create($this->printModel, $documentModelList);
            if($rs){
                DB::commit();
                $result = true;
            } else {
                DB::rollBack();
            }
        } catch (Exception $e) {
            DB::rollBack();
        }



        return $result;
    }

}