{{-- @extends('admin.layouts.master') --}}
{{-- @section('admin') --}}
    @php
        $stat = App\Models\AbilityStat::first();
    @endphp
    <div class="mt-5">
        <h5 class="card-title">Ability Statistics</h5>
        <hr />
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        Create Statistics
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form action="{{ route('admin.ability-stat.store') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Statistic Title</label>
                                        <input type="text" name="statistic_title" class="form-control"
                                            value="{{ $stat->title }}">
                                        @error('statistic_title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Statistic
                                            Ability</label>
                                        <input type="text" name="statistic_ability" class="form-control"
                                            value="{{ $stat->value }}">
                                        @error('statistic_ability')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Statistic Title 1</label>
                                        <input type="text" name="statistic_title1" class="form-control"
                                            value="{{ $stat->title1 }}">
                                        @error('statistic_title1')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Statistic
                                            Ability 1</label>
                                        <input type="text" name="statistic_ability1" class="form-control"
                                            value="{{ $stat->value1 }}">
                                        @error('statistic_ability1')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Statistic Title 2</label>
                                        <input type="text" name="statistic_title2" class="form-control"
                                            value="{{ $stat->title2 }}">
                                        @error('statistic_title2')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Statistic
                                            Ability 2</label>
                                        <input type="text" name="statistic_ability2" class="form-control"
                                            value="{{ $stat->value2 }}">
                                        @error('statistic_ability2')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- @endsection --}}
