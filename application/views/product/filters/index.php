<div class="row">
    <div class="col-12 filters">
        <h3>Filters <span class="pull-right clear-filter text-primary">clear filters</span></h3>
        <?php $this->load->view("product/filters/sort-filter"); ?>
        <?php $this->load->view("product/filters/categories-filter", array('categories', $categories)); ?>
    </div>
</div>