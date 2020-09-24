<div class="modal fade" id="cart-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
<!--      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Personal Details and Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>-->
      <div class="modal-body">
          <form id="user-details-form">
          <div>
              <h3>Personal Details</h3>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="firstname">First Name</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" name="firstname" aria-describedby="firstname" value="<?php echo $user['firstname']; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="lastname">Last Name</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" name="lastname" aria-describedby="lastname" value="<?php echo $user['lastname']; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="email">Email</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" name="email" aria-describedby="email" value="<?php echo $user['email']; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="phone_no">Phone No</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" name="phone_no" aria-describedby="phone_no" value="<?php echo $user['phone_no']; ?>">
            </div>
          </div>
          <div>
              <h3>Address Details</h3>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="number">House/Flat No.</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" name="number" aria-describedby="number" value="<?php echo $address['number']; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="street">Street</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" name="street" aria-describedby="street"  value="<?php echo $address['street']; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="city">City</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" name="city" aria-describedby="city"  value="<?php echo $address['city']; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="pincode">Pincode</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" name="pincode" aria-describedby="pincode"  value="<?php echo $address['pincode']; ?>">
            </div>
          </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary start-payment">Save and Continue</button>
      </div>
    </div>
  </div>
</div>