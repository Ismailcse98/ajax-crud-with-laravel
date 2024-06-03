<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function(){
        // console.log(location.href+' .table-data');

        //Add product
        $(document).on('click','.add_product', function(e){
            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();
            // console.log(name);
            $.ajax({
                url:"{{ route('add.product') }}",
                method:'post',
                data:{name:name, price:price},
                success:function(res){
                    if (res.status == 'success') {
                        $('#addModal').modal('hide');
                        $('#addProductForm')[0].reset();
                        $('.table-data').load(location.href+' .table-data');
                    }
                    console.log(res);
                },
                error:function(err){
                   let errRes = err.responseJSON;

                   $.each(errRes.errors, function(index, value){
                    console.log(value);
                    $('.errMsgContainer').append('<span class="text-danger">'+value+'</span> </br>')
                   })
                }
            });
        });

        //Show product
        $(document).on('click','.update_product_form', function(e){
            let id = $(this).data('id');
            let name = $(this).data('name');
            let price = $(this).data('price');
            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_price').val(price);
        });

        //Update product
        $(document).on('click','.update_product', function(e){
            e.preventDefault();
            let id = $('#up_id').val();
            let name = $('#up_name').val();
            let price = $('#up_price').val();
            // console.log(name);
            $.ajax({
                url:"{{ route('update.product') }}",
                method:'post',
                data:{id:id, name:name, price:price},
                success:function(res){
                    if (res.status == 'success') {
                        $('#updateModal').modal('hide');
                        $('#updateProductForm')[0].reset();
                        $('.table-data').load(location.href+' .table-data');
                    }
                    console.log(res);
                },
                error:function(err){
                   let errRes = err.responseJSON;

                   $.each(errRes.errors, function(index, value){
                    console.log(value);
                    $('.errMsgContainer').append('<span class="text-danger">'+value+'</span> </br>')
                   })
                }
            });
        });

        //Delete product
        $(document).on('click','.delete_product', function(e){
            e.preventDefault();
            let product_id = $(this).data('id');

            if(confirm('Are you sure to delete product??')){
                $.ajax({
                url:"{{ route('delete.product') }}",
                method:'post',
                data:{id:product_id},
                success:function(res){
                    if (res.status == 'success') {
                        $('.table-data').load(location.href+' .table-data');
                        Command: toastr["success"]("Product deleted succsfully")
                            toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                    }
                    console.log(res);
                },
            });
            }
           
        });

        //Pagination product
        $(document).on('click','.pagination a', function(e){
            e.preventDefault()
            let page = $(this).attr('href').split('page=')[1];
            product(page);
        });

        function product(page){
            $.ajax({
                url:"/pagination/paginate-data?page="+page,
                success:function(res){
                    $('.table-data').html(res)
                }
            })
        }

        //Live search product
        $(document).on('keyup', function(e){
            e.preventDefault();
            let search_string = $('#search').val();
            $.ajax({
                url:"{{route('search.product')}}",
                method:'GET',
                data:{search_string:search_string},
                success:function(res){
                    $('.table-data').html(res);
                    if(res.status == 'Data not found'){
                        $('.table-data').html('<span>Data not found</span>');
                    }
                },
                error:function(err){
                    console.log('err', err);
                }
            })
        });
    })
</script>