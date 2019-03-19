<div class="col-xs-6 col-sm-2 col-md-4 col-lg-3 sidebar-offcanvas" id="sidebarLeft" role="navigation">
    <div class="well sidebar-nav">
    <ul class="nav">
        <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="{{trans('admin.controlUser')}}">
            <a class="nav-link {{ request()->route()->named('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}">
                <i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;
                <span class="nav-link-text">{{trans('admin.controlUser')}}</span>
            </a>
        </li>

        <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="{{trans('admin.uploadFile')}}">
            <a class="nav-link {{ request()->route()->named('file.index') ? 'active' : '' }}" href="{{ route('file.index') }}">
                <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
                <span class="nav-link-text">{{trans('admin.uploadFile')}}</span>
            </a>
        </li>

        <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="{{trans('admin.controlCategory')}}">
            <a class="nav-link {{ request()->route()->named('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}">
                <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;
                <span class="nav-link-text">{{trans('admin.controlCategory')}}</span>
            </a>
        </li>

        <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="{{trans('admin.controlQuestion')}}">
            <a class="nav-link {{ request()->route()->named('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}">
                <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;
                <span class="nav-link-text">{{trans('admin.controlQuestion')}}</span>
            </a>
        </li>
    </ul>
</div>
</div>