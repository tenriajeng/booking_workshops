<table class="table table-separate table-head-custom collapsed" id="kt_datatable">
    <thead>
        <tr>
            <th>NO</th>
            <th>IMAGE</th>
            <th>USERNAME</th>
            <th>EMAIL</th>
            <th>ROLE</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($data as $user)
            @foreach (App\Models\User::find($user->id)->getRoleNames() as $role)
                @if ($role == 'admin' || $role == 'pimpinan')
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <div class="symbol symbol-50 symbol-light mr-2">
                                <span class="symbol-label">
                                    <img src="{{ $user->avatar_url ?? '' }}" style="height: 20px;"
                                        class="h-50 align-self-center" alt="">
                                </span>
                            </div>
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="label label-outline-info label-inline mr-2">{{ $role }}
                            </span>
                        </td>
                        <td>
                            <div class="dropdown dropdown-inline">
                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                                    <i class="la la-cog"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="nav nav-hoverable flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="/pimpinan/edit/{{ $user->id }}">
                                                <i class="nav-icon la la-edit"></i>
                                                <span class="nav-text">Edit</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link deleteButton"
                                                onclick="deleteFunction({{ $user->id }})">
                                                <i class="nav-icon la la-trash"></i>
                                                <span class="nav-text">Delete</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>NO</th>
            <th>IMAGE</th>
            <th>USERNAME</th>
            <th>EMAIL</th>
            <th>ROLE</th>
            <th>ACTION</th>
        </tr>
    </tfoot>
</table>
