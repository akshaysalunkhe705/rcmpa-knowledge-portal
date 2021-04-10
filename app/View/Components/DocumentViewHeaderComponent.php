<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DocumentViewHeaderComponent extends Component
{
    public $documentNumber, $createdDate, $versionNo, $capaNumber, $revisionDate, $preparedBy, $approvedBy, $location, $department, $mainDocumentId, $subDocumentId;
    public function __construct($documentNumber, $createdDate, $versionNo, $capaNumber, $revisionDate, $preparedBy, $approvedBy, $location, $department, $mainDocumentId, $subDocumentId)
    {
        $this->documentNumber = $documentNumber;
        $this->createdDate = $createdDate;
        $this->versionNo = $versionNo;
        $this->capaNumber = $capaNumber;
        $this->revisionDate = $revisionDate;
        $this->preparedBy = $preparedBy;
        $this->approvedBy = $approvedBy;
        $this->location = $location;
        $this->department = $department;
        $this->mainDocumentId = $mainDocumentId;
        $this->subDocumentId = $subDocumentId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.document-view-header-component');
    }
}
