<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentModel extends BaseModel implements ModelBean
{
    //

    protected $table = 'document';

    protected $fillable = [
        'id','name','file_name','file_ext','file_size','user_id','created_at','updated_at'
    ];

    public function create($data){

        $validator = \Validator::make($data, [
            'team_id' => ['required'],
            'file_name' => ['required'],
            'file_ext' => ['required'],
            'file_size' => ['required'],
            'user_id' => ['required'],
        ]);
        $this->setCreateValidator($validator);
        return parent::create($data);
    }

    public function edit($data)
    {
        // TODO: Implement edit() method.
    }
}
