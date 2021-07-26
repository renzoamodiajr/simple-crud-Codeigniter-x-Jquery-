<div class="row">
  <div class="col-md-12 mt-5">
    <h1 class="text-center">Codeigniter Ajax Crud Tutorial</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-12 mt-5">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">
      Add Records
    </button>

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Records</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="addForm" method="POST">
              <div class="form-group mb-3">
                <label>Name</label>
                <input type="text" id="name" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" id="email" class="form-control">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="submitBtn" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 mt-3">
        <table class="table" id="usersTable">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Date Added</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>


<div class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>