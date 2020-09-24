<?php if(!empty($categories)){ ?>
<div class="categories_filter e-filter">
    <h5>Categories</h5>
    <div>
        <?php
        foreach ($categories as $key => $category) {
            $this->load->view('components/checkbox', array(
                'id' => $key,
                'label' => $category,
                'checkbox_control' => 'categ-container',
                'disabled' => !isset($key) ? true : false,
                'checked' => !isset($key) ? true : false,
            ));
        }
        ?>
    </div>
</div>
<?php } ?>