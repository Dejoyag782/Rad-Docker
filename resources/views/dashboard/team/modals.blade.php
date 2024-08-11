<!-- Viewing and editing of team modal -->
<div class="modal fade" id="teamModal" tabindex="-1" aria-labelledby="teamModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark" style="color:#fed136;">
          <h5 class="modal-title" id="teamModalLabel"><b>Member Details</b></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editTeamForm" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <input id="id" name="id" hidden/>
          @csrf
            <div class="mb-4 d-flex justify-content-left" style="display: flex; justify-content:left !important; max-height: 200px!important; min-width:200px!important; max-width:250px!important; ">
                <div id="selectedImage" class="rounded-circle mx-auto" style="background-size: cover, auto; 
                no-repeat; min-height: 200px!important; min-width:200px!important; max-width:250px!important; max-height:250px!important; background-image: url({{ asset('welcome_assets/img/no-picture.svg')}});">
                </div>
            </div>
            <div class="d-flex justify-content-right">
              <div data-mdb-ripple-init class="btn btn-primary btn-rounded" >
                    <label class="form-label text-white m-1" for="customFile1">Choose Photo</label>
                    <input type="file" name="photo" class="form-control d-none"
                    type='file' accept=".png, .jpg, .jpeg," id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                </div>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="linked_in">Linked In</label>
                <input type="text" class="form-control" id="linked_in" name="linked_in">
            </div>
            <div class="form-group">
                <label for="edit_member_roles">Member Role/s</label>
                <select class="multiple-choices mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" name="member_roles[]" id="edit_member_roles" multiple>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                    @endforeach
                </select>
            </div>
            

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="submit-teamchange-btn">Save Changes</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>



  <!-- Adding of Team Modal -->
<div class="modal fade" id="addTeamModal" tabindex="-1" aria-labelledby="addTeamModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark" style="color:#fed136;">
          <h5 class="modal-title" id="addTeamModalLabel"><b>Add Member</b></h5>
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
    <form id="addTeamForm" method="POST" action="{{ route('team.store') }}" enctype="multipart/form-data">
        <div class="modal-body">
            @csrf
            <div class="mb-4 d-flex justify-content-left" style="display: flex; justify-content:left !important;
                        max-height: 200px!important; min-width:200px!important; max-width:250px!important; ">
                <div id="selectedImage2" class="rounded-circle mx-auto" style="background-size: cover, auto; 
                         no-repeat; min-height: 200px!important; min-width:200px!important; max-width:250px!important;
                         max-height:250px!important; background-image: url({{ asset('welcome_assets/img/no-picture.svg')}});">
                </div>
            </div>
            <div class="d-flex justify-content-right">
                <div data-mdb-ripple-init class="btn btn-primary btn-rounded" >
                    <label class="form-label text-white m-1" for="customFile2">Choose Photo</label>
                    <input type="file" name="photo" class="form-control d-none"
                    type='file' accept=".png, .jpg, .jpeg," id="customFile2" onchange="displaySelectedImage(event, 'selectedImage2')" />
                </div>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="linked_in">Linked In</label>
                <input type="text" class="form-control" id="linked_in" name="linked_in">
            </div>
            <div class="form-group">
                <label for="member_roles">Member Role/s</label>
                <select class="multiple-choices mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" name="member_roles[]" id="member_roles" multiple>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Team</button>
        </div>
    </form>
      </div>
    </div>
  </div>