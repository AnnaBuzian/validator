@extends('admin.layouts.admin')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
    <style>
        input, th span {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <strong>{{trans('admin.roles')}} :</strong> &nbsp;
            <input type="radio" name="role" value="all" checked> {{trans('admin.All')}}
            <input type="radio" name="role" value="admin"> {{trans('admin.admin')}}
            <input type="radio" name="role" value="manager"> {{trans('admin.manager')}}
            <input type="radio" name="role" value="user"> {{trans('admin.user')}}&nbsp;<br>
            <div id="spinner" class="text-center"></div>
        </div>
        <div class="box-body table-responsive">
            <table id="users" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{trans('admin.name')}}<span id="name" class="fa fa-sort pull-right"
                                                      aria-hidden="true"></span></th>
                    <th>{{trans('admin.email')}}<span id="email" class="fa fa-sort pull-right"
                                                       aria-hidden="true"></span></th>
                    <th>{{trans('admin.role')}}<span id="role" class="fa fa-sort pull-right"
                                                      aria-hidden="true"></span></th>
                    <th>{{trans('admin.creation')}}<span id="created_at" class="fa fa-sort-desc pull-right"
                                                          aria-hidden="true"></span></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>{{trans('admin.name')}}</th>
                    <th>{{trans('admin.email')}}</th>
                    <th>{{trans('admin.role')}}</th>
                    <th>{{trans('admin.creation')}}</th>
                    <th></th>
                    <th></th>
                </tr>
                </tfoot>
                <tbody id="pannel">
                    @include('admin.users.table', compact('users'))
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div id="pagination" class="box-footer">
            {{ $users->links() }}
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ mix('js/admin.js') }}"></script>
    <script>

        var user = (function () {

            var url = '{{ route('users.index') }}'
            var swalTitle = '@lang('Really destroy user ?')'
            var confirmButtonText = '@lang('Yes')'
            var cancelButtonText = '@lang('No')'
            var errorAjax = '@lang('Looks like there is a server issue...')'

            var onReady = function () {
                $('#pagination').on('click', 'ul.pagination a', function (event) {
                    admin.pagination(event, $(this), errorAjax)
                })
                $('#pannel').on('change', ':checkbox[name="seen"]', function () {
                        admin.seen(url, $(this), errorAjax)
                    })
                    .on('click', 'td a.btn-danger', function (event) {
                        admin.destroy(event, $(this), url, swalTitle, confirmButtonText, cancelButtonText, errorAjax)
                    })
                $('th span').click(function () {
                    admin.ordering(url, $(this), errorAjax)
                })
                $('.box-header :radio, .box-header :checkbox').click(function () {
                    admin.filters(url, errorAjax)
                })
            }

            return {
                onReady: onReady
            }

        })()

        $(document).ready(user.onReady)

    </script>
@endsection