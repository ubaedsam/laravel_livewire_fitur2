<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <div class="content">
        <div class="container-fluid">
          {{--  @if (session()->has('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><i class="fa fa-check-circle mr-1"></i> {{ session('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif  --}}
          <div class="row">
            <div class="col-lg-12">
              <div class="d-flex justify-content-between mb-2">
                <button wire:click.prevent="addNew" class="btn btn-primary"><i class="fa fa-plus-circle mr-2"></i> Add New User</button>
                <x-search-input wire:model="searchTerm"></x-search-input>
              </div>
              <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">
                              Name
                              <span wire:click="sortBy('name')" class="float-right text-sm" style="cursor: pointer;">
                                <i class="fa fa-arrow-up {{ $sortColumnName === 'name' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                <i class="fa fa-arrow-down {{ $sortColumnName === 'name' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                              </span>
                            </th>
                            <th scope="col">
                              Email
                              <span wire:click="sortBy('email')" class="float-right text-sm" style="cursor: pointer;">
                                <i class="fa fa-arrow-up {{ $sortColumnName === 'email' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                <i class="fa fa-arrow-down {{ $sortColumnName === 'email' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                              </span>
                            </th>
                            <th scope="col">Register Date</th>
                            <th scope="col">Role</th>
                            <th scope="col">Options</th>
                          </tr>
                        </thead>
                        <tbody wire:loading.class="text-muted">
                        @forelse ($users as $index => $user)
                        <tr>
                            <th scope="row">{{ $users->firstItem() + $index }}</th>
                            <td>
                              <img src="{{ $user->avatar_url }}" width="50px" class="img img-circle mr-1" alt="">
                              {{ $user->name }}
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                              @if($user->created_at)
                              {{ $user->created_at->toFormattedDate() }}
                              @else($user->created_at === '')
                              N/A
                              @endif
                            </td>
                            <td>
                              <select wire:change="changeRole({{ $user }}, $event.target.value)" class="form-control">
                                <option value="admin" {{ ($user->role === 'admin' ? 'selected' : '') }}>ADMIN</option>
                                <option value="user" {{ ($user->role === 'user' ? 'selected' : '') }}>USER</option>
                              </select>
                              @error('role')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </td>
                            <td>
                                <a href="#" wire:click.prevent="edit({{ $user }})">
                                    <i class="fa fa-edit text-warning"></i>
                                </a>

                                <a href="" wire:click.prevent="confirmUserRemoval({{ $user->id }})">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                            </td>
                          </tr>
                        @empty
                        <tr class="text-center">
                          <td colspan="5">
                            <img src="/found.png" alt="Data user tidak ditemukan" width="200px">
                            <p>Data user tidak ditemukan</p>
                          </td>
                        </tr>
                        @endforelse
                        </tbody>
                      </table>
                </div>
                <div class="card-footer d-flex justify-content-end">
                  {{ $users->links() }}
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <!-- Modal Add dan Edit -->
      <div class="modal fade" wire:ignore.self id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateUser' : 'createUser' }}">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                @if($showEditModal)
                <span>Edit User</span>
                @else
                <span>Add New User</span>
                @endif
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" wire:model.defer="state.name" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter FullName">
                      @error('name')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" wire:model.defer="state.email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter Email">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" wire:model.defer="state.password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                    @error('password')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label for="passwordConfirmation">Confirm Password</label>
                      <input type="password" wire:model.defer="state.password_confirmation" class="form-control" id="passwordConfirmation" placeholder="Confirm Password">
                  </div>
                  <div class="form-group">
                    <label for="costumFile">Profile Photo</label>
                    <div class="custom-file">
                      <div x-data="{isUploading: false, progress: 5}" 
                            x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false; progress = 5"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                      >
                        <input wire:model="photo" type="file" class="costum-file-input" id="costumFile">
                        <div x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
                          <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width:${progress}%`">
                            <span class="sr-only">40% Complete (success)</span>
                          </div>
                        </div>
                      </div>
                      <label class="costum-file-label" for="costum-file">
                        @if ($photo)
                            {{ $photo->getClientOriginalName() }}
                        @else
                            Choose Image
                        @endif
                      </label>
                    </div>

                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}" class="img d-block mt-2 w-100">
                    @else
                        <img src="{{ $state['avatar_url'] ?? '' }}" class="img d-block mt-2 w-100">
                    @endif
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-2"></i> Cancel</button>
              @if ($showEditModal)
              <button type="submit" class="btn btn-warning"><i class="fa fa-save mr-2"></i> Update</button>
              @else
              <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> Save</button>
              @endif
            </div>
          </div>
          </form>
        </div>
      </div>

      {{--  Modal Delete  --}}
      <div class="modal fade" wire:ignore.self id="confirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5>Delete User</h5>
            </div>
            <div class="modal-body">
              <h4>Apakah anda yakin ingin menghapus data user ini ?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-2"></i> Cancel</button>
              <button type="button" wire:click.prevent="deleteUser" class="btn btn-danger"><i class="fa fa-trash mr-2"></i> Delete User</button>
            </div>
          </div>
        </div>
      </div>
</div>
