@extends('admin.layouts.master')

@section('content')
    <style>
        /* Compact client table: fit all columns on one screen without horizontal scroll */
        .clients-compact #zero_config {
            width: 100% !important;
            font-size: 11px;
            line-height: 1.3;
        }
        .clients-compact #zero_config th,
        .clients-compact #zero_config td {
            width: auto !important;
            padding: 4px 4px;
            vertical-align: middle;
            word-break: break-word;
        }
        .clients-compact #zero_config thead th,
        .clients-compact #zero_config tfoot th {
            font-size: 10.5px;
            font-weight: 600;
            white-space: normal;
        }
        /* DataTables reserves 30px per header for sort arrows - shrink it */
        .clients-compact table.dataTable thead > tr > th.sorting,
        .clients-compact table.dataTable thead > tr > th.sorting_asc,
        .clients-compact table.dataTable thead > tr > th.sorting_desc {
            padding-right: 13px;
        }
        .clients-compact table.dataTable thead .sorting:before,
        .clients-compact table.dataTable thead .sorting_asc:before,
        .clients-compact table.dataTable thead .sorting_desc:before {
            right: 6px;
            bottom: 4px;
            font-size: 9px;
        }
        .clients-compact table.dataTable thead .sorting:after,
        .clients-compact table.dataTable thead .sorting_asc:after,
        .clients-compact table.dataTable thead .sorting_desc:after {
            right: 1px;
            bottom: 4px;
            font-size: 9px;
        }
        .clients-compact #zero_config .badge {
            font-size: 10px;
            padding: 2px 5px;
        }
        .clients-compact #zero_config td.dt-time {
            white-space: nowrap;
        }
        /* Stack action buttons vertically so the column stays narrow */
        .clients-compact #zero_config td.actions-cell {
            white-space: nowrap;
        }
        .clients-compact .actions-cell .btn,
        .clients-compact .actions-cell form,
        .clients-compact .actions-cell .btn-group {
            display: block;
            width: 100%;
        }
        .clients-compact .actions-cell .btn {
            font-size: 10px;
            line-height: 1.2;
            padding: 2px 6px;
            margin-bottom: 2px;
        }
        .clients-compact .actions-cell .dropdown-item {
            font-size: 12px;
        }
    </style>
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Client List</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Clients</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Client List</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h4 class="card-title mb-0">
                                    @if(request('q'))
                                        Search results for: <strong>"{{ request('q') }}"</strong>
                                        <span class="badge badge-info ml-2">{{ count($users) }} found</span>
                                    @else
                                        All Clients
                                    @endif
                                </h4>
                                @if(request('q'))
                                    <a href="{{ route('admin.clients') }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="ti-close mr-1"></i> Clear Search
                                    </a>
                                @endif
                            </div>
                            <div class="table-responsive clients-compact">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>P-ID</th>
                                            <th>Phone</th>
                                            <th>Balance</th>
                                            <th>Available</th>
                                            <th>Orders</th>
                                            <th>Reward</th>
                                            <th>%</th>
                                            <th>PID Name</th>
                                            <th>Ref Code</th>
                                            <th>Membership</th>
                                            <th>Status</th>
                                            <th>Withdraw</th>
                                            <th>Registered</th>
                                            <th>Last Login</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user['user']->id }}</td>
                                                <td>{{ $user['user']->name }}</td>
                                                <td>{{ $user['user']->parent_id }}</td>
                                                <td>{{ $user['user']->phone }}</td>
                                                <td>{{ $user['balance'] }}</td>
                                                <td>{{ $user['available'] }}</td>
                                                <td>{{ $user['processed_orders_count'] }}</td>
                                                <td>{{ $user['daily_commission'] }}</td>
                                                <td>{{ $user['commission_percent'] }}%</td>
                                                <td>{{ $user['parent_name'] }}</td>
                                                <td>{{ $user['user']->reference_code }}</td>
                                                <td>{{ $user['membership_level']->level_name }}</td>
                                                <td>{{ $user['user']->status }}</td>
                                                <td>
                                                    @php $ws = ($user['user']->withdraw_status === 'deactive') ? 'deactive' : 'active'; @endphp
                                                    <span class="badge badge-{{ $ws === 'deactive' ? 'danger' : 'success' }}">{{ ucfirst($ws) }}</span>
                                                </td>
                                                <td class="dt-time">{{ $user['user']->created_at->format('Y-m-d') }}<br>{{ $user['user']->created_at->format('H:i:s') }}</td>
                                                <td class="dt-time">{{ $user['last_login']->format('Y-m-d') }}<br>{{ $user['last_login']->format('H:i:s') }}</td>
                                                <td class="actions-cell">
                                                    @if (Auth::user()->user_type == 1 || Auth::user()->id != $user['user']->parent_id)
                                                        {{-- Admin: full action set --}}
                                                        <a href="{{ route('admin.setup-orders', $user['user']->id) }}"
                                                            class="btn btn-primary btn-sm">Setup Orders</a>
                                                        <a href="{{ route('admin.funds.add', $user['user']->id) }}"
                                                            class="btn btn-warning btn-sm">Add Debit</a>
                                                        <form
                                                            action="{{ route('admin.reset-todays-orders', $user['user']->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Reset today\'s orders for this user?');">
                                                            @csrf
                                                            <button class="btn btn-danger btn-sm" type="submit">Reset Orders</button>
                                                        </form>
                                                        <div class="btn-group">
                                                            <button type="button"
                                                                class="btn btn-secondary btn-sm dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                More
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.edit-client', $user['user']->id) }}">Edit
                                                                    Client</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.wallet', $user['user']->id) }}">Wallet
                                                                    Information</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.funds.recharge', $user['user']->id) }}">Recharge
                                                                    History</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.funds.redemption', $user['user']->id) }}">Redemption
                                                                    History</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.clients.orders', $user['user']->id) }}">Journeys</a>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>P-ID</th>
                                            <th>Phone</th>
                                            <th>Balance</th>
                                            <th>Available</th>
                                            <th>Orders</th>
                                            <th>Reward</th>
                                            <th>%</th>
                                            <th>PID Name</th>
                                            <th>Ref Code</th>
                                            <th>Membership</th>
                                            <th>Status</th>
                                            <th>Withdraw</th>
                                            <th>Registered</th>
                                            <th>Last Login</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    @endsection
