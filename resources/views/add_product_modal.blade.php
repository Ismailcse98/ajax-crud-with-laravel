<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <form action="" method="post" id="addProductForm">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="addModalLabel">Add Product</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="errMsgContainer">
                
            </div>
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group mt-2">
                <label for="">Product Price</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary add_product">Save product</button>
        </div>
        </div>
    </div>
  </form>
</div>