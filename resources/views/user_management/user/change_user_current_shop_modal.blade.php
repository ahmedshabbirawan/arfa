<div class="modal fade" id="change_user_current_shop_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Choose Shop</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" id="change_shop_form" action="{{ route('usermanagement.user_role.change_user_current_shop_save') }}" novalidate class="form-horizontal product_form">
                @csrf
                <div class="row">
                <div class="form-group required">

                <div class="col-sm-12">
                    <label class="form-label" for="shop_id"> Shop</label>
                    <input type="hidden" class="col-xs-10 col-sm-5 form-control @error('name') is-invalid @enderror" value="{{old('name', (isset($customer))? $customer->name : '' )}}" name="name" id="name" placeholder="Name">
                    <select name="shop_id" class="form-control form-control-sm">
                        <option value="">No Shop</option>
                        @foreach($shops as $shop)
                            <option value="{{ $shop->shop_id }}">{{ $shop->shop->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="pos_app.saveChangeShopForm();">Confirm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close" >Close</button>
      </div>
    </div>
  </div>
</div>


