@foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @if($user->isAdmin())
                {{trans('admin.admin')}}
            @elseif($user->isManager())
                {{trans('admin.manager')}}
            @else
                {{trans('admin.user')}}
            @endif
        </td>
        <td>{{ $user->created_at->formatLocalized('%c') }}</td>
        <td><a class="btn btn-warning btn-xs btn-block" href="{{ route('users.edit', [$user->id]) }}" role="button" title="@lang('Edit')"><span class="fa fa-edit"></span></a></td>
        <td><a class="btn btn-danger btn-xs btn-block" href="{{ route('users.destroy', [$user->id]) }}" role="button" title="@lang('Destroy')"><span class="fa fa-remove"></span></a></td>
    </tr>
@endforeach

