<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DocumentFormFooterComponent extends Component
{
    public $status, $statusByAdmin, $statusBySuperAdmin, $rejectNote, $removedNote;
    public function __construct($status, $statusByAdmin, $statusBySuperAdmin, $rejectNote, $removedNote)
    {
        $this->status = $status;
        $this->statusByAdmin = $statusByAdmin;
        $this->statusBySuperAdmin = $statusBySuperAdmin;
        $this->rejectNote = $rejectNote;
        $this->removedNote = $removedNote;
    }

    public function render()
    {
        return view('components.document-form-footer-component');
    }
}
