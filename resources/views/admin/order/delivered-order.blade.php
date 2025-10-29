@extends('admin.layouts.master')

@section('admin')
   <div class="page-content">
        <div class="row">
            <div class="col-12">
                <h6 class="mb-0 text-uppercase">Delivered Order Section</h6>
                <hr />
                <div class="card">
                    <div class="card-header-wrapper">

                        <div class="card-header-action" style="">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">
                                Back
                            </a>
                        </div>
                        {{-- <div class="card-header-action">
                            <a href="{{ route('admin.brand.create') }}" class="btn btn-primary">
                                Create Brand
                            </a>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        {{ $dataTable->table(['class' => 'table table-striped w-100']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
  </button> --}}

  <!-- Modal -->
  <div class="modal fade" id="order_modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Order Status</h5>
          <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span style="font-size: 32px" aria-hidden="true">&times;</span>
          </span>
        </div>
        <div class="modal-body">
            <form action="" method="POST" class="order_status_form">
                @csrf
                @method('PUT')
                <div class="form-group mb-2">
                    <label for="">Payment Status</label>
                    <select class="form-control payment_status" name="payment_status" id="" value="payment_status">
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                        <option value="failed">Failed</option>
                    </select>
                </div>

                <div class="form-group mb-2">
                    <label for="">Order Status</label>
                    <select class="form-control order_status" name="order_status" id="" value="order_status">
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="delivered">Delivered</option>
                        <option value="declined">Declined</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submit_btn">Save changes</button>
                  </div>
            </form>
        </div>

      </div>
    </div>
  </div>
@endsection

@push('script')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function(){
            var orderId = '';
            $(document).on("click", ".ordering_status", function(){
                let id = $(this).data('id');
                orderId = id;
                let paymentStatus = $(".payment_status option");
                let orderStatus = $(".order_status option");

                $.ajax({
                    method: 'GET',
                    url: '{{ route("admin.orders.status.get", ":id") }}'.replace(":id", id),
                    beforeSend: function(){
                        $(".submit_btn").prop("disable", true);
                    },
                    success: function(response){
                        paymentStatus.each(function(){
                            if($(this).val() == response.payment_status){
                                $(this).attr('selected', 'selected');
                            }
                        });

                        orderStatus.each(function(){
                            if($(this).val() == response.order_status){
                                $(this).attr('selected', 'selected');
                            }
                        });

                        $(".submit_btn").prop("disable", false);
                    },
                    error: function(xhr, status, error){

                    },
                });

                $(".order_status_form").on("submit", function(e){
                    e.preventDefault();
                    let formContents = $(this).serialize();
                   $.ajax({
                        method: 'POST',
                        url: '{{ route("admin.orders.status.update", ":orderId") }}'.replace(":orderId", orderId),
                        data: formContents,
                        success: function(response){
                            $("#order_modal").modal('hide');
                            $("#order-table").DataTable().draw();
                            toastr.success(response.message);
                        },
                        error: function(xhr, status, error){
                            toastr.error(xhr.responseJSON.message);
                        },
                   })
                })
            })
        })
    </script>
@endpush
