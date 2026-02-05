<meta name="csrf-token" content="{{ csrf_token() }}"/>
<?php

$categoryID = $subCategoryID = $productCategoryID = $name = $productID = $uomID = $qty = $attributeStr = '';
$actionURL = route('simple_product.store');

if (isset($product)) {
    $categoryID = $categories['category']['id'];
    $subCategoryID = $categories['sub_category']['id'];
    $productCategoryID = $categories['product_category']['id'];
    $name = $product->name;
    $actionURL = route('simple_product.update', $product->id);
    $productID = $product->id;
    $uomID = $product->uom_id;
    $qty = $product->threshold_qty;

    $attributeStr = implode(',', $attributeIDs);
}
?>
<div class="row ">
    <div class="col-12 col-lg-12" style="margin-top:20px; width:100%">
        @include('layout.alerts')
        <div class="card">
            <form method="post" id="product_form"
                  action="{{ isset($product) ? route('simple_product.update', $product->id) : route('simple_product.store') }}"
                  novalidate class="form-horizontal product_form">
                @csrf
                <input type="hidden" name="id" value="{{ $productID }}">
                <div class="card-header">
                    <h4 class="widget-title">{{ isset($product) ? 'Update Product' : 'Add Product' }}</h4>
                </div>
                <div class="card-body" style="display: block;">

                    <div class="widget-main">


                        <div class="col-lg-12 col-sm-12 mb-3">
                            <label for="name" class="form-label" > Product Name: </label>
                                <input type="text" required
                                       class="form-control @error('name') is-invalid @enderror"
                                       value="{{old('name', (isset($product))? $product->name : '' )}}"
                                       name="name" id="name" placeholder="Name">
                        </div>

                        <div class="col-lg-12 col-sm-12 mb-3">
                            <label for="description" class="form-label"> Description/Specification: </label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                              id="form-field-8" placeholder="Description">{{old('description', (isset($product))? $product->description : '' ) }}</textarea>
                        </div>
                        <!----------------------------------->
                        <div class="row mb-3">
                            <div class="col-lg-4 col-sm-4">
                                <label class="form-label" for="price"> Sale Price:</label>
                                    <input type="text"
                                           class="col-xs-10 col-sm-5 form-control @error('price') is-invalid @enderror"
                                           value="{{ old('price',(isset($product->price))? $product->price : '') }}"
                                           name="price" id="price" placeholder="Price">
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <label class="form-label" for="form-field-1"> UOM</label>
                                <select name="uom_id" class="col-xs-10 col-sm-5 form-control">
                                    @foreach($uoms as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <label class="form-label" for="form-field-1"> Status </label>
                                {{ \App\Util\Form::statusSelect(old('status')) }}
                            </div>
                            <div class="col-lg-2 col-sm-4">

                            </div>
                        </div>
                        <!----------------------------------->


                        <div class="col-lg-4">
                            <label style="font-size:11px;">Product Image</label>
                            <input type="file" class="form-control" name="product_image" id="file_2"/>
                        </div>

                        <div class="col-lg-4 col-sm-4">

                        </div>


                        <div class="col-lg-4 col-sm-4">


                        </div>





                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" onclick="checkValidation();" type="button">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Submit
                        </button>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>


@section('script')
    <script>
        let validator;

        function checkValidation() {

            $(".btn-info").LoadingOverlay("show");
            // const formElement = document.querySelector("#product_form");
            let myform = document.getElementById("product_form");
            let fdata = new FormData(myform);
            $.ajax({
                data: fdata,
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ $actionURL }}",
                success: function (res, textStatus, jqXHR) {
                    $(".btn-info").LoadingOverlay("hide");
                    // console.log('=======>>>>> ',res);
                    if (jqXHR.status == 200) {
                        if (typeof res.data.product !== 'undefined') {
                            $.confirm({
                                title: 'Success',
                                content: res.message,
                                buttons: {
                                    yes: {
                                        text: 'OK',
                                        action: function () {
                                            window.location = "{{ route('simple_product.create') }}";
                                        }
                                    }
                                }
                            });
                        }
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $(".btn-info").LoadingOverlay("hide");
                    // console.log(textStatus,jqXHR, errorThrown);
                    if (jqXHR.status != 200) {
                        if (typeof jqXHR.responseJSON !== 'undefined') {
                            $.confirm({
                                title: 'Error',
                                content: jqXHR.responseJSON.message
                            });
                        }
                    }
                }
            }).done(function () {
                $(".btn-info").LoadingOverlay("hide");
            });
        }


        $(document).ready(function () {


            $('#file_2').ace_file_input({
                no_file: 'No File ...',
                btn_choose: 'Choose',
                btn_change: 'Change',
                droppable: false,
                onchange: null,
                thumbnail: false //| true | large
                //whitelist:'gif|png|jpg|jpeg'
                //blacklist:'exe|php'
                //onchange:''
                //
            });


            $('.chosen-select').chosen({
                allow_single_deselect: true
            });


            $(".chosen-select").chosen().change(function () {
                validator.checkAll();
            });

            $(window)
                .off('resize.chosen')
                .on('resize.chosen', function () {
                    $('.chosen-select').each(function () {
                        var $this = $(this);
                        $this.next().css({
                            'width': $this.parent().width()
                        });
                    })
                }).trigger('resize.chosen');
            //resize chosen on sidebar collapse/expand
            $(document).on('settings.ace.chosen', function (e, event_name, event_val) {
                if (event_name != 'sidebar_collapsed') return;
                $('.chosen-select').each(function () {
                    var $this = $(this);
                    $this.next().css({
                        'width': $this.parent().width()
                    });
                })
            });


            $('.select21').chosen({
                allow_single_deselect: true
            });


        });
    </script>
@endsection
