<?php

namespace App\Http\Controllers;

use App\Models\DocumentsModel;
use Illuminate\Http\Request;

class CapaDocumentController extends Controller
{
    public function create(Request $request, $id)
    {
        return $documentData = [
            'objective'=>$request->objective,
            'departmentandThirdPartyInvolvement'=> [
                $request->departmentandThirdPartyInvolvement_departmentAndThirdpartyName
            ]
        ];

        $model = DocumentsModel::find($id);
        $model->edit($request, $id);
    }

    public function update()
    {
        
    }
    
    public function roll_back()
    {
        
    }
    
    public function deactivate()
    {
        
    }
    
    public function reactivate()
    {
        
    }
}
