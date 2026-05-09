@extends('layout.master')
@section('title','User Create')
@section('Title','User Management')
@section('URL',route("usermanagement.user.list"))
@section('PageName','User')
@section('content')

    <div class="pc-container">
        <div class="pc-content">

            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-lg-5 col-xxl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body position-relative">
                                    <div class="text-center mt-3">
                                        <div class="chat-avtar d-inline-flex mx-auto">
                                            <img
                                                class="rounded-circle img-fluid wid-90 img-thumbnail"
                                                src="../assets/images/user/avatar-1.jpg"
                                                alt="User image"
                                            />
                                            <i class="chat-badge bg-success me-2 mb-2"></i>
                                        </div>
                                        <h5 class="mb-0"> {{ $row->name }} </h5>
                                        <p class="text-muted text-sm">DM on <a href="#" class="link-primary"> @williambond </a> 😍</p>
                                        <ul class="list-inline mx-auto my-4">
                                            <li class="list-inline-item">
                                                <a href="#" class="avtar avtar-s text-white bg-dribbble">
                                                    <i class="ti ti-brand-dribbble f-24"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="avtar avtar-s text-white bg-amazon">
                                                    <i class="ti ti-brand-figma f-24"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="avtar avtar-s text-white bg-pinterest">
                                                    <i class="ti ti-brand-pinterest f-24"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="avtar avtar-s text-white bg-behance">
                                                    <i class="ti ti-brand-behance f-24"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="row g-3">
                                            <div class="col-4">
                                                <h5 class="mb-0">--</h5>
                                                <small class="text-muted">Products</small>
                                            </div>
                                            <div class="col-4 border border-top-0 border-bottom-0">
                                                <h5 class="mb-0">--</h5>
                                                <small class="text-muted">Staff</small>
                                            </div>
                                            <div class="col-4 border border-top-0 border-bottom-0">
                                                <h5 class="mb-0">--</h5>
                                                <small class="text-muted">Customers Visit</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="nav flex-column nav-pills list-group list-group-flush account-pills mb-0 border-top-0"
                                    id="user-set-tab"
                                    role="tablist"
                                    aria-orientation="vertical"
                                >
                                    <a
                                        class="nav-link list-group-item list-group-item-action active"
                                        id="user-set-profile-tab"
                                        data-bs-toggle="pill"
                                        href="#user-set-profile"
                                        role="tab"
                                        aria-controls="user-set-profile"
                                        aria-selected="true"
                                    >
                                        <span class="f-w-500"><i class="ph-duotone ph-user-circle m-r-10"></i>Profile Overview</span>
                                    </a>

                                    <a
                                        class="nav-link list-group-item list-group-item-action"
                                        id="user-set-password-tab"
                                        data-bs-toggle="pill"
                                        href="#user-set-password"
                                        role="tab"
                                        aria-controls="user-set-password"
                                        aria-selected="true"
                                    >
                                        <span class="f-w-500"><i class="ph-duotone ph-lock-key m-r-10"></i>Password</span>
                                    </a>

                                </div>
                            </div>


                        </div>
                        <div class="col-lg-7 col-xxl-9">
                            <div class="tab-content" id="user-set-tabContent">

                                <div class="tab-pane fade show active" id="user-set-profile" role="tabpanel" aria-labelledby="user-set-profile-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Profile Detail</h5>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0 pt-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Name</p>
                                                            <p class="mb-0"> {{ $row->name }} </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Username</p>
                                                            <p class="mb-0">{{ $row->userName }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Shop</p>
                                                            <p class="mb-0">{{ $row->manager_id }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Role</p>
                                                            <p class="mb-0">---</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Created</p>
                                                            <p class="mb-0">{{ $row->created_at }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Status</p>
                                                            <p class="mb-0">{{ $row->status }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0 pb-0">
                                                    <p class="mb-1 text-muted">Address</p>
                                                    <p class="mb-0">{{ $row->address }}</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!---- PASSWORD --->
                                <div class="tab-pane fade active" id="user-set-password" role="tabpanel" aria-labelledby="user-set-password-tab">
                                    <div class="card">
                                        <form method="POST" id="passwordForm" >
                                        <div class="card-header">
                                            <h5>Password</h5>
                                        </div>
                                        <div class="card-body">
                                            <div id="successMessage"></div>

                                                @csrf

                                            <div class="mb-3">
                                                <label class="form-label">Current Password</label>
                                                <input type="password" name="current_password" class="form-control">
                                                <div class="invalid-feedback" id="error_current_password"></div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">New Password</label>
                                                <input type="password" name="password" class="form-control">
                                                <div class="invalid-feedback" id="error_password"></div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Confirm Password</label>
                                                <input type="password" name="password_confirmation" class="form-control">
                                            </div>



                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Update Password</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>

@stop

@section('script')
    <script>
        $(document).ready(function () {

            $('#passwordForm').on('submit', function (e) {
                e.preventDefault();

                // Reset errors
                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback').text('');
                $('#successMessage').html('');

                $.ajax({
                    url: "{{ route('user_profile_password_update') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function (response) {

                        if (response.status) {
                            $('#successMessage').html(
                                '<div class="alert alert-success">' + response.message + '</div>'
                            );
                            $('#passwordForm')[0].reset();
                        }
                    },
                    error: function (xhr) {

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            $.each(errors, function (key, value) {
                                $('[name="' + key + '"]').addClass('is-invalid');
                                $('#error_' + key).text(value[0]);
                            });
                        }
                    }
                });
            });

        });
    </script>
@stop
