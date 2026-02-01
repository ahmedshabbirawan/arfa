<div class="modal fade" id="create_customer_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Customer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" id="create_customer_form" action="{{ route('customer.store') }}" novalidate class="form-horizontal product_form">
                @csrf
                <div class="row">


                <div class="form-group required">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Customer Name *</label>
                <div class="col-sm-12">
                    <input type="text" class="col-xs-10 col-sm-5 form-control @error('name') is-invalid @enderror" value="{{old('name', (isset($customer))? $customer->name : '' )}}" name="name" id="name" placeholder="Name">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mobile *</label>
                <div class="col-sm-12">
                    <input type="text" class="col-xs-10 col-sm-5 form-control @error('mobile') is-invalid @enderror" value="{{old('mobile',(isset($customer))? $customer->mobile : '' )}}" name="mobile" id="mobile" placeholder="mobile">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> CNIC </label>
                <div class="col-sm-12">
                    <input type="text" class="col-xs-10 col-sm-5 form-control @error('cnic') is-invalid @enderror" value="{{old('cnic' , (isset($customer))? $customer->cnic : '' ) }}" name="cnic" id="cnic" placeholder="NTN">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address </label>
                <div class="col-sm-12">
                    <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" id="form-field-8" placeholder="Address">{{old('address', (isset($customer))? $customer->address : '' ) }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Info </label>
                <div class="col-sm-12">
                    <textarea name="info" id="info" class="form-control @error('info') is-invalid @enderror" id="form-field-8" placeholder="Address">{{old('info', (isset($customer))? $customer->info : '' ) }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>
                <div class="col-sm-12">
                    <input type="text" class="col-xs-10 col-sm-5 form-control @error('email') is-invalid @enderror" value="{{old('email',(isset($customer))? $customer->email : '' ) }}" name="email" id="email" placeholder="email">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>
                <div class="col-sm-12">
                {{ \App\Util\Form::statusSelect(old('status')) }}
                </div>
            </div>


                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="pos_app.saveCustomerForm();">Save Customer</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


