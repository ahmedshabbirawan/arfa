<div class="row ">
    <div class="col-12 col-lg-12">
        @include('layout.alerts')
        <div class="card">



            <form method="post"
                  action="{{ isset($shop) ? route('shop.update', $shop->id) : route('shop.store') }}"
                  novalidate>
                @csrf
                <input type="hidden" name="id"
                       value="{{ old('id', isset($shop) ? $shop->id : '') }}">

                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">{{ isset($shop) ? 'Update Shop' : 'Create Shop' }}</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            {{-- Shop Name --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Shop Name</label>
                                    <input type="text"
                                           name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name', isset($shop) ? $shop->name : '') }}"
                                           placeholder="Shop Name">
                                </div>
                            </div>

                            {{-- NTN --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">NTN</label>
                                    <input type="text"
                                           name="ntn"
                                           class="form-control @error('ntn') is-invalid @enderror"
                                           value="{{ old('ntn', isset($shop) ? $shop->ntn : '') }}"
                                           placeholder="NTN">
                                </div>
                            </div>

                            {{-- Shop Manager --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Shop Manager</label>
                                    <select class="form-select" name="user_id">
                                        <option value="" hidden>Choose Manager</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ (isset($shop) && $shop->user_id == $user->id) ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger">Only one user assign to one shop</small>
                                </div>
                            </div>

                            {{-- Address --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea name="address"
                                              class="form-control @error('address') is-invalid @enderror"
                                              rows="2"
                                              placeholder="Address">{{ old('address', isset($shop) ? $shop->address : '') }}</textarea>
                                </div>
                            </div>

                            {{-- Country --}}
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Country</label>
                                    <select name="country_id" id="country_id" class="form-select">
                                        @foreach ($countries as $co_val => $co_title)
                                            <option value="{{ $co_val }}">
                                                {{ $co_title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Province --}}
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Province</label>
                                    <select name="province_id" id="province_id" class="form-select"></select>
                                </div>
                            </div>

                            {{-- City --}}
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">City</label>
                                    <select name="city_id" id="city_id" class="form-select"></select>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email"
                                           name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email', isset($shop) ? $shop->email : '') }}"
                                           placeholder="Email">
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text"
                                           name="phone"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ old('phone', isset($shop) ? $shop->phone : '') }}"
                                           placeholder="Phone">
                                </div>
                            </div>

                            {{-- Fax --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Fax</label>
                                    <input type="text"
                                           name="fax"
                                           class="form-control @error('fax') is-invalid @enderror"
                                           value="{{ old('fax', isset($shop) ? $shop->fax : '') }}"
                                           placeholder="Fax">
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    {!! \App\Util\Form::statusSelect(old('status', isset($shop) ? $shop->status : '')) !!}
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>


@section('script')
    <script>


        function getProvince(country_id) {
            var selected_id = "{{ old('province_id', (isset($shop))? $shop->province_id : '' ) }}";
            $.ajax({
                // dataType: 'json',
                type: 'get',
                url: "{{ url('ajax_view/get_province') }}?country_id=" + country_id + '&selected_id=' + selected_id,
                success: function (res) {
                    $('#province_id').html(res);
                    var province_id = $('#province_id').val();
                    getCity(province_id);
                }
            });
        }

        function getCity(province_id) {
            var selected_id = "{{ old('city_id', (isset($shop))? $shop->city_id : '') }}";
            $.ajax({
                // dataType: 'json',
                type: 'get',
                url: "{{ url('ajax_view/get_city') }}?province_id=" + province_id + '&selected_id=' + selected_id,
                success: function (res) {
                    $('#city_id').html(res);
                }
            });
        }

        $(document).ready(function () {

            var country_id = $('#country_id').val();
            getProvince(country_id);


            $('#country_id').on().change(function () {
                var country_id = $('#country_id').val();
                getProvince(country_id);
            });


            $('#province_id').on().change(function () {
                var province_id = $('#province_id').val();
                getCity(province_id);
            });


        });
    </script>
@endsection
