<?php 

class UserModel extends CI_Model{
     

        public function get_data(){
                $data = array();
                $result = $this->db->get('users');
                foreach($result->result_array() as $row){
                        $subArr = array();
                        $subArr[] = $row['id'];
                        $subArr[] = $row['name'];
                        $subArr[] = $row['email'];
                        $subArr[] = $row['date_added'];
                        $subArr[] = '   <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal'.$row['id'].'">Edit</button>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal'.$row['id'].'">Delete</button>   
                                      
                                        <div class="modal fade" id="editModal'.$row['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                        <div class="modal-content">
                                                                <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Update user</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                        <form method="POST">
                                                                                <div class="form-group mb-3">
                                                                                        <label>Name</label>
                                                                                        <input type="text" class="form-control" id="name'.$row['id'].'" value="'.$row['name'].'">
                                                                                </div>
                                                                                <div class="form-group mb-3">
                                                                                        <label>Email</label>
                                                                                        <input type="email"class="form-control" id="email'.$row['id'].'" value="'.$row['email'].'">
                                                                                </div>
                                                                        </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="button" data-id="'.$row['id'].'" class="btn btn-primary updateBtn">Update</button>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>


                                        <div class="modal fade" id="deleteModal'.$row['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                        <div class="modal-content">
                                                                <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Delete user</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                       Are you sure you want to delete this user?
                                                                </div>
                                                                <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="button" data-id="'.$row['id'].'" class="btn btn-danger deleteBtn">Delete</button>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                    ';
                        $data[] = $subArr;
                }
                return $data;
        }

        public function insert_entry($data){
                $this->db->insert('users', $data);
                return true;
        }

        public function update($ajaxData){
                $data = array(
                        'name' => $ajaxData['name'],
                        'email' => $ajaxData['email'],
                );
                
                $this->db->where('id', $ajaxData['id']);
                $this->db->update('users', $data);
                return true;
        }

        public function delete($ajaxData){
                $this->db->where('id', $ajaxData['id']);
                if($this->db->delete('users')){
                        return true;
                }
        }
}