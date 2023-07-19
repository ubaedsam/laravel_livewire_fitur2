<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0 text-dark">Appointments</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="">Appointments</a></li>
                        <li class="breadcrumb-item active">Update</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form wire:submit.prevent="updateAppointment" autocomplete="off">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add New Appointment</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client">Client:</label>
                                            <select class="form-control @error('client_id') is-invalid @enderror" wire:model.defer="state.client_id">
                                                <option value="">Select Client</option>
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('client_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select Team Members</label>
                                            <div class="@error('members') is-invalid border border-danger rounded custom-error @enderror">
                                                <x-inputs.select2 id="members" placeholder="Select Members">
                                                    <option>One</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                </x-inputs.select2>
                                            </div>
                                            @error('members')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Color Picker -->
                                        {{--  <div class="form-group" wire:ignore.self>
                                            <label>Color picker:</label>
                                            <input wire:model.defer="state.color" type="text" class="form-control @error('color') is-invalid @enderror" id="colorPicker">
                                        </div>  --}}

                                        <!-- Color Picker -->
                                        <div class="form-group">
                                        <label>Color picker with addon:</label>

                                        <div class="input-group" id="colorPicker">
                                            <input type="text" wire:model.defer="state.color" name="color" class="form-control">

                                            <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-square"></i></span>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                        </div>
                                        @error('color')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client">Status:</label>
                                            <select class="form-control @error('status') is-invalid @enderror" wire:model.defer="state.status">
                                                <option value="">Select Status</option>
                                                <option value="SCHEDULED">Scheduled</option>
                                                <option value="CLOSED">Closed</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{--  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="appointmentStartTime">Appointment Start Time</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                </div>
                                                <x-timepicker wire:model.defer="state.appointment_start_time" id="appointmentStartTime"></x-timepicker>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="appointmentEndTime">Appointment End Time</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                </div>
                                                <x-datepicker wire:model.defer="state.appointment_end_time" id="appointmentEndTime"></x-datepicker>
                                            </div>
                                        </div>
                                    </div>
                                </div  --}}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="appointmentDate">Appointment Date</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                                <x-datepicker wire:model.defer="state.date" :error="'date'" id="appointmentDate"></x-datepicker>
                                                @error('date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="appointmentTime">Appointment Time</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                </div>
                                                <x-timepicker wire:model.defer="state.time" id="appointmentTime" :error="'time'" ></x-timepicker>
                                                @error('time')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{--  <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="appointmentEndTime">Appointment End Time</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                </div>
                                                <x-timepicker wire:model.defer="state.appointment_end_time" id="appointmentEndTime"></x-timepicker>
                                            </div>
                                        </div>
                                    </div>  --}}
                                </div>

                                {{--  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date:</label>
                                            <div wire:ignore class="input-group date" id="appointmentDate" data-target-input="nearest" data-appointmentdate="@this">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#appointmentDate" id="appointmentDateInput">
                                                <div class="input-group-append" data-target="#appointmentDate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Appointment Time:</label>
                                            <div wire:ignore class="input-group date" data-appointmenttime="@this" id="appointmentTime" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#appointmentTime" id="appointmentTimeInput">
                                                <div class="input-group-append" data-target="#appointmentTime" data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <i class="far fa-clock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Appointment End Time:</label>
                                            <div wire:ignore class="input-group date" data-appointmenttime="@this" id="appointmentTime" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#appointmentTime" id="appointmentTimeInput">
                                                <div class="input-group-append" data-target="#appointmentTime" data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <i class="far fa-clock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  --}}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div wire:ignore class="form-group">
                                            <label for="note">Note:</label>
                                            <textarea id="note" data-note="@this" wire:model.defer="state.note" class="form-control">{!! $state['note'] !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-secondary"><i class="fa fa-times mr-1"></i> Cancel</button>
                                <button type="submit" id="submit" class="btn btn-warning"><i class="fa fa-edit mr-1"></i> Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('livewire/admin/appointments/appointment-css')
@include('livewire/admin/appointments/appointment-js')