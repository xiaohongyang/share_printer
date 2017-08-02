<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentTeamModel extends BaseModel
{
    //
    protected $table = 'document_team';

    protected $fillable = [
        'name', 'user_id'
    ];


    /**
     * 保存到文档组表
     * @param array $data
     * @return $this|bool|Model|mixed
     */
    public function create($data){

        $validator = \Validator::make($data, [
            'name' => ['required'],
            'user_id' => ['required'],
        ]);
        $this->setCreateValidator($validator);
        $result = parent::create($data);
        return $result;
    }


    public function documents(){
        return $this->hasMany(DocumentModel::class, 'team_id', 'id');
    }
}
