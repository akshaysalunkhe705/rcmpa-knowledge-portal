<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModelInterface;

use App\Models\MainDocumentTitleModel;

class FormsModel extends Model implements BaseModelInterface
{
    use HasFactory, SoftDeletes;
    protected $table = "forms";
    protected $fillable = ['sequence', 'form_name'];

    public function add($request)
    {
        $model = $this->create([
            'sequence' => $request->get('sequence'),
            'form_name' => $request->get('form_name'),
        ]);
        return $model->save();
    }
    public function edit($request, $id)
    {
        $model1 = FormsModel::find($id);
        $model1->sequence = $request->get('sequence');
        $model1->form_name = $request->get('form_name');
        return $model1->save();
    }
    public function fetch_single($id)
    {
    }
    public function fetch_all()
    {
    }
    public function remove($id)
    {
    }
}
