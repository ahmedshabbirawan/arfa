@extends('layout.master')
@section('title')
    Shop Detail
@endsection
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
                                        <span class="f-w-500"><i class="ph-duotone ph-user-circle m-r-10"></i>Shop Overview</span>
                                    </a>
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-7 col-xxl-9">
                            <div class="tab-content" id="user-set-tabContent">
                                <div class="tab-pane fade show active" id="user-set-profile" role="tabpanel" aria-labelledby="user-set-profile-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Shop Details</h5>
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
                                                            <p class="mb-1 text-muted">Code</p>
                                                            <p class="mb-0">{{ $row->code }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Manager</p>
                                                            <p class="mb-0">{{ $row->manager_id }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Phone</p>
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

                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>

        <!--- delete confirmation modal --->
        <div class="modal" tabindex="-1" role="dialog" id="deletePopup">
            <div class="modal-dialog" role="document">
                <div class="modal-content">


                    <form action="#" method="post" id="delete_form">
                        <input type="hidden" name="_method" value="delete"/>

                        <div class="modal-header">
                            <h5 class="modal-title">confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Do you really want to delete ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Confirm</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!--- delete confirmation modal end --->
        @endsection

        @section('javascript')
            <script>
                function deleteConfirmation(objID) {
                    $('#delete_form').attr('action', '{{ $adminURL }}/' + objID);
                    $('#deletePopup').modal('show');
                }

                $(document).ready(function () {
                    //   update_all_account_balance();
                });
            </script>
@endsection
