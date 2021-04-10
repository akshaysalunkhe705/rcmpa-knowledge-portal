<li class="sidebar-menu-item @if ($nav_status=='general-master' ) active open @endif">
    <a class="sidebar-menu-button js-sidebar-collapse" href="{{ url('admin/general-master') }}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
        CREATE MASTERS
    </a>
</li>

<li class="sidebar-menu-item @if ($nav_status=='general-master' ) active open @endif">
    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#general-master">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
        EDIT MASTERS
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse show sm-indent" id="general-master">
        <li class="sidebar-menu-item @if ($sub_nav_status=='location-index' ) active @endif">
            <a class="sidebar-menu-button" href="{{ url('admin/general_master/location/') }}">
                <span class="sidebar-menu-text">Edit Location</span>
            </a>
        </li>
        <li class="sidebar-menu-item @if ($sub_nav_status=='department-index' ) active @endif">
            <a class="sidebar-menu-button" href="{{ url('admin/general_master/department/') }}">
                <span class="sidebar-menu-text">Edit Department</span>
            </a>
        </li>
        <li class="sidebar-menu-item @if ($sub_nav_status=='form_master-index' ) active @endif">
            <a class="sidebar-menu-button" href="{{ url('admin/general_master/forms/') }}">
                <span class="sidebar-menu-text">Edit Forms</span>
            </a>
        </li>
        <li class="sidebar-menu-item @if ($sub_nav_status=='maindocumentname-index' ) active @endif">
            <a class="sidebar-menu-button" href="{{ url('admin/general_master/main_document_title/') }}">
                <span class="sidebar-menu-text">Edit Main Document</span>
            </a>
        </li>
        <li class="sidebar-menu-item @if ($sub_nav_status=='subdocumentname-index' ) active @endif">
            <a class="sidebar-menu-button" href="{{ url('admin/general_master/sub_document_title/') }}">
                <span class="sidebar-menu-text">Edit Sub Document</span>
            </a>
        </li>
        <li class="sidebar-menu-item @if ($sub_nav_status=='role-index' ) active @endif">
            <a class="sidebar-menu-button" href="{{ url('admin/general_master/role/') }}">
                <span class="sidebar-menu-text">Edit Role</span>
            </a>
        </li>
        <li class="sidebar-menu-item @if ($sub_nav_status=='general-master-fetch' ) active @endif">
            <a class="sidebar-menu-button" href="{{ url('admin/general_master/units/') }}">
                <span class="sidebar-menu-text">Edit Unit</span>
            </a>
        </li>
    </ul>
</li>


<li class="sidebar-menu-item @if ($nav_status=='user' ) active open @endif">
    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#user">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
        USER
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse show sm-indent" id="user">
        <li class="sidebar-menu-item @if ($sub_nav_status=='user-add' ) active @endif">
            <a class="sidebar-menu-button" href="{{ url('admin/user/add') }}">
                <span class="sidebar-menu-text">Add</span>
            </a>
        </li>
        <li class="sidebar-menu-item @if ($sub_nav_status=='user-fetch' ) active @endif">
            <a class="sidebar-menu-button" href="{{ url('admin/user/fetch') }}">
                <span class="sidebar-menu-text">List</span>
            </a>
        </li>
    </ul>
</li>

<li class="sidebar-menu-item @if ($nav_status=='pending-for-action' ) active open @endif">
    <a class="sidebar-menu-button js-sidebar-collapse" href="{{ url('admin/document_pending_for_action') }}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
        PENDING FOR ACTION
    </a>
</li>


<li class="sidebar-menu-item @if ($nav_status=='document_view') active open @endif">
    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#document_view">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
        VIEWS
        <span class="ml-auto sidebar-menu-toggle-icon"></span>
    </a>
    <ul class="sidebar-submenu collapse show sm-indent" id="document_view">
        <li class="sidebar-menu-item @if ($sub_nav_status=='document_view-active') active @endif">
            <a class="sidebar-menu-button" href="{{ url('admin/document_views/active_document') }}">
                <span class="sidebar-menu-text">ACTIVE DOCS</span>
            </a>
        </li>
        <li class="sidebar-menu-item @if ($sub_nav_status=='document_view-deactive') active @endif">
            <a class="sidebar-menu-button" href="{{ url('admin/document_views/deactive_document') }}">
                <span class="sidebar-menu-text">DEACTIVE DOCS</span>
            </a>
        </li>
        <li class="sidebar-menu-item @if ($sub_nav_status=='document_view-archived') active @endif">
            <a class="sidebar-menu-button" href="{{ url('admin/document_views/archived_document') }}">
                <span class="sidebar-menu-text">ARCHIVED DOCS</span>
            </a>
        </li>
    </ul>
</li>


<li class="sidebar-menu-item @if ($nav_status=='logs' ) active open @endif">
    <a class="sidebar-menu-button js-sidebar-collapse" href="{{ url('admin/logs') }}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
        LOGS
    </a>
</li>

{{-- <li class="sidebar-menu-item @if ($nav_status=='general-master' ) active open @endif">
    <a class="sidebar-menu-button js-sidebar-collapse" href="{{ url('admin/general-master') }}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
        CREATE MASTERS
    </a>
</li>
<li class="sidebar-menu-item @if ($nav_status=='general-master' ) active open @endif">
    <a class="sidebar-menu-button js-sidebar-collapse" href="{{ url('admin/processandflowcontrol/create') }}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
        PROCESS AND FLOW CONTROL
    </a>
</li>
<li class="sidebar-menu-item @if ($nav_status=='general-master' ) active open @endif">
    <a class="sidebar-menu-button js-sidebar-collapse" href="{{ url('admin/sop_production/create') }}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
       SOP PRODUCTION
    </a>
</li>
<li class="sidebar-menu-item @if ($nav_status=='general-master' ) active open @endif">
    <a class="sidebar-menu-button js-sidebar-collapse" href="{{ url('admin/sop_qc/create') }}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
       SOP QC
    </a>
</li>
<li class="sidebar-menu-item @if ($nav_status=='general-master' ) active open @endif">
    <a class="sidebar-menu-button js-sidebar-collapse" href="{{ url('admin/sop_maintenance/create') }}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
       SOP Maintenance
    </a>
</li>
<li class="sidebar-menu-item @if ($nav_status=='general-master' ) active open @endif">
    <a class="sidebar-menu-button js-sidebar-collapse" href="{{ url('admin/msds/create') }}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
      MSDS
    </a>
</li>
<li class="sidebar-menu-item @if ($nav_status=='general-master' ) active open @endif">
    <a class="sidebar-menu-button js-sidebar-collapse" href="{{ url('admin/sss/create') }}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
       SSS
    </a>
</li>
//////
<li class="sidebar-menu-item @if ($nav_status=='general-master' ) active open @endif">
    <a class="sidebar-menu-button js-sidebar-collapse" href="{{ url('admin/processandflowcontrol/') }}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
      Process & flow view
    </a>
</li>
<li class="sidebar-menu-item @if ($nav_status=='general-master' ) active open @endif">
    <a class="sidebar-menu-button js-sidebar-collapse" href="{{ url('admin/sop_production/') }}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
      sop production view
    </a>
</li>
////// --}}
