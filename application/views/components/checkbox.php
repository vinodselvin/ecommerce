<div class="custom-control custom-checkbox <?php echo isset($checkbox_control) ? $checkbox_control : ""; ?>">
    <input type="checkbox" class="custom-control-input" id="<?php echo isset($id) ? $id : ""; ?>" <?php echo $disabled ? "disabled='".$disabled."'" : ""; ?> <?php echo $checked ? "checked='".$checked."'" : ""; ?>>
    <label class="custom-control-label" for="<?php echo isset($id) ? $id : ""; ?>"><?php echo isset($label) ? $label : ""; ?></label>
</div>