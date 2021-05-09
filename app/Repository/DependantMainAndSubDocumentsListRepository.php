<?php

namespace App\Repository;

use App\Models\DepartmentModel;

class DependantMainAndSubDocumentsListRepository{

    public function findListDepartmentsByUsingLocationId($locationId){
        return DepartmentModel::where('location_id',$locationId)->get();
    }

    public function findListMainDocsByUsingDepartmentAndFormId($departmentId, $formId){
        // return DepartmentModel::where('department_id',$departmentId)->where('form_id',$formId)->get();
        return DepartmentModel::when($departmentId, function($query, $departmentId){
            return $query->where('department_id',$departmentId);
        })
        ->when($formId, function($query, $formId){
            return $query->where('form_id',$formId);
        })
        ->get();
    }

    public function findListSubMainDocsByUsingDepartmentAndFormAndMainDocId($departmentId, $formId, $mainDocumentId){
        // return DepartmentModel::where('department_id',$departmentId)->where('form_id',$formId)->get();
        return DepartmentModel::when($departmentId, function($query, $departmentId){
            return $query->where('department_id',$departmentId);
        })
        ->when($formId, function($query, $formId){
            return $query->where('department_id',$formId);
        })
        ->when($mainDocumentId, function($query, $mainDocumentId){
            return $query->where('department_id',$mainDocumentId);
        })
        ->get();
    }
}