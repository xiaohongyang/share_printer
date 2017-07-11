<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentModel extends BaseModel
{
    //

    protected $table = 'document';

    protected $fillable = [
        'id','name','file_name','file_ext','file_size','user_id','created_at','updated_at'
    ];

    public function create($data){

        $result = false;
        $validator = \Validator::make($data, [
            'name' => ['required'],
            'file_name' => ['required'],
            'file_ext' => ['required'],
            'file_size' => ['required'],
            'user_id' => ['required'],
        ]);
        if ($validator->fails()) {
            $this->message = $validator->messages()->getMessageBag();
        } else {
            $this->fill($data);
            $result = $this->save() ? $this->id : false;
        }
        return $result;
    }

}
