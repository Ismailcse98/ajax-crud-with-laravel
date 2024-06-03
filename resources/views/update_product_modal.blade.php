<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <form action="" method="post" id="updateProductForm">
    @csrf
    <input type="hidden" id="up_id">

    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="updateModalLabel">Update Product</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="errMsgContainer">
                
            </div>
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" class="form-control" id="up_name" name="up_name">
            </div>
            <div class="form-group mt-2">
                <label for="">Product Price</label>
                <input type="number" class="form-control" id="up_price" name="up_price">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary update_product">Update product</button>
        </div>
        </div>
    </div>
  </form>
</div>