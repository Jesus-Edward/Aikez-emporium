@extends('admin.layouts.master')

@section('admin')
    		<!--start page wrapper -->
			<div class="page-content">
				<!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center my-3">
                    <div class="breadcrumb-title pe-3">FAQ Answer Management</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">All Answers</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group">
                                <a href="{{ route('admin.faq-answer.create') }}" class="btn btn-primary px-5">Add
                                    Answer</a>
                            </div>
                        </div>
			    </div>
				<!--end breadcrumb-->

				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Question</th>
										<th>Answer</th>
                                        <th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach ($faq_answer as $index => $answer)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $answer->faq->question }}</td>
                                            <td>{{ \Str::limit($answer->answer, 50) }}</td>
                                            <td><span class="badge bg-primary">{{ $answer->status === 1 ? 'Active' : 'Inactive' }}</span></td>
                                            <td>
                                                <a href="{{ route('admin.faq-answer.edit', $answer->id) }}" class="btn btn-warning"><i class='bx bxs-edit'></i></a>
                                                <a href="{{ route('admin.faq-answer.destroy', $answer->id) }}" class="btn btn-danger  delete-item"><i class='bx bxs-trash'></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		<!--end page wrapper -->

@endsection
