<li class="sidebar-menu-item @if ($nav_status=='document_action' ) active open @endif">
    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#document_action">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
        DOCUMENTS
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse show sm-indent" id="document_action">
        <li class="sidebar-menu-item @if ($sub_nav_status=='document_action-create') active @endif">
            <a class="sidebar-menu-button" href="{{ url('hod/capa/create') }}">
                <span class="sidebar-menu-text">CREATE NEW</span>
            </a>
        </li>
        <li class="sidebar-menu-item @if ($sub_nav_status=='document_action-update') active @endif">
            <a class="sidebar-menu-button" href="{{ url('hod/capa/update') }}">
                <span class="sidebar-menu-text">UPDATE OLD</span>
            </a>
        </li>
        <li class="sidebar-menu-item @if ($sub_nav_status=='document_action-roll_back') active @endif">
            <a class="sidebar-menu-button" href="{{ url('hod/capa/roll_back') }}">
                <span class="sidebar-menu-text">ROLL BACK</span>
            </a>
        </li>
        <li class="sidebar-menu-item @if ($sub_nav_status=='document_action-deactivate') active @endif">
            <a class="sidebar-menu-button" href="{{ url('hod/capa/deactivate') }}">
                <span class="sidebar-menu-text">DEACTIVATE</span>
            </a>
        </li>
        <li class="sidebar-menu-item @if ($sub_nav_status=='document_action-reactivate') active @endif">
            <a class="sidebar-menu-button" href="{{ url('hod/capa/reactivate') }}">
                <span class="sidebar-menu-text">REACTIVATE</span>
            </a>
        </li>
    </ul>
</li>


<li class="sidebar-menu-item @if ($nav_status=='document_status') active open @endif">
    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#document_status">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
        DOCUMENT STATUS
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse show sm-indent" id="document_status">
        <li class="sidebar-menu-item @if ($sub_nav_status=='document_status-saved') active @endif">
            <a class="sidebar-menu-button" href="{{ url('hod/document_status/created_but_not_submitted') }}">
                <span class="sidebar-menu-text">CREATE BUT NOT SUBMITED</span>
            </a>
        </li>
        <li class="sidebar-menu-item @if ($sub_nav_status=='document_status-submited') active @endif">
            <a class="sidebar-menu-button" href="{{ url('hod/document_status/submitted_but_not_approved') }}">
                <span class="sidebar-menu-text">SUBMITTED BUT NOT APPROVED</span>
            </a>
        </li>
        <li class="sidebar-menu-item @if ($sub_nav_status=='document_status-rejected') active @endif">
            <a class="sidebar-menu-button" href="{{ url('hod/document_status/rejected_for_resubmission') }}">
                <span class="sidebar-menu-text">REJECTED FOR RESUBMITION</span>
            </a>
        </li>
        <li class="sidebar-menu-item @if ($sub_nav_status=='document_status-removed') active @endif">
            <a class="sidebar-menu-button" href="{{ url('hod/document_status/rejected_for_remove_from_capa') }}">
                <span class="sidebar-menu-text">REJECTED FOR REMOVAL FROM CAPA</span>
            </a>
        </li>
    </ul>
</li>



<li class="sidebar-menu-item @if ($nav_status=='document_view') active open @endif">
    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#document_view">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
        VIEWS
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse show sm-indent" id="document_view">
        <li class="sidebar-menu-item @if ($sub_nav_status=='document_view-active') active @endif">
            <a class="sidebar-menu-button" href="{{ url('hod/document_views/active_document') }}">
                <span class="sidebar-menu-text">ACTIVE DOCS</span>
            </a>
        </li>
        <li class="sidebar-menu-item @if ($sub_nav_status=='document_view-deactive') active @endif">
            <a class="sidebar-menu-button" href="{{ url('hod/document_views/deactive_document') }}">
                <span class="sidebar-menu-text">DEACTIVE DOCS</span>
            </a>
        </li>
        <li class="sidebar-menu-item @if ($sub_nav_status=='document_view-archived') active @endif">
            <a class="sidebar-menu-button" href="{{ url('hod/document_views/archived_document') }}">
                <span class="sidebar-menu-text">ARCHIVED DOCS</span>
            </a>
        </li>
    </ul>
</li>