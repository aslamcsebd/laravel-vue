<template>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <div class="card">
               <div class="card-header bg-primary text-light py-2">Create new student</div>
               <div class="card-body">
                  <form>
                     <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <input type="text" v-model="name" class="form-control col-sm-10" id="name" aria-describedby="emailHelp" placeholder="Name">
                     </div>
                     <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <input type="email" v-model="email" class="form-control col-sm-10" id="email" aria-describedby="emailHelp" placeholder="Email">
                     </div>
                     <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <input type="text" v-model="phone" class="form-control col-sm-10" id="phone" placeholder="Phone">
                     </div>
                     <button type="submit" @click.prevent="saveStudent" class="btn btn-primary offset-2 col-sm-auto">Add Now</button>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="card">
               <div class="card-header bg-success text-light py-2">All students</div>
               <div class="card-body p-1">
                  <table class="table table-bordered table-striped">
                     <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                      </tr>
                     </thead>
                     <tbody>
                      <tr v-for="(student,index) in students.data" :key="student.id">
                        <th scope="row">{{index+1}}</th>
                        <td>{{student.name}}</td>
                        <td>{{student.email}}</td>
                        <td>{{student.phone}}</td>
                        <td>
                           <div class="btn-group" role="group" aria-label="Basic example">
                             <button type="button" @click="editStudent(student.id)" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit">Edit</button>
                             <button type="button" @click="deleteStudent(student.id)" class="btn btn-sm btn-danger">Delete</button>
                           </div>
                        </td>
                      </tr>
                     </tbody>
                  </table>
                  <pagination :data="students" @pagination-change-page="getResults"></pagination>
               </div>
            </div>
         </div>
      </div>

      <!-- Edit -->
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header bg-success py-2 text-light">
                  <h5 class="modal-title" id="exampleModalLabel">Edit student</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form>
                     <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <input type="text" v-model="editname" class="form-control col-sm-10" id="name" aria-describedby="emailHelp" placeholder="Name">
                     </div>
                     <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <input type="email" v-model="editemail" class="form-control col-sm-10" id="email" aria-describedby="emailHelp" placeholder="Email">
                     </div>
                     <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <input type="text" v-model="editphone" class="form-control col-sm-10" id="phone" placeholder="Phone">
                     </div>
                     <div class="btn-group float-right">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" @click.prevent="updateStudent" data-dismiss="modal" class="btn btn-sm btn-primary">Update Now</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>

   </div>
</template>

<script>
   export default{
      
      data(){
         return{
            students : {}, //pagination
            name : '',
            email : '',
            phone : '',

            editname : '',
            editemail : '',
            editphone : ''
         }
      },

      mounted(){
         this.getResults();
      },

      methods : {

         saveStudent(){
            axios.post('save_student', {
               name : this.name,
               email : this.email,
               phone : this.phone,
            })
            .then(response => {
               this.name = '';
               this.email = '';
               this.phone = '';
               this.getResults();
            });
         },

         getResults(page = 1){  //pagination
            axios.get('all_students?page=' + page)
            .then(response => {
               this.students = response.data;
            });
         },

         editStudent(id){
            axios.get('edit_student/'+id)
            .then(response =>{
               this.id = response.data.id;
               this.editname = response.data.name;
               this.editemail = response.data.email;
               this.editphone = response.data.phone;
            });
         },

         updateStudent(){
            axios.put('update_student/', {
               id : this.id,
               name : this.editname,
               email : this.editemail,
               phone : this.editphone
            })
            .then(response=> {
               this.getResults();
            });
         },

         deleteStudent(id){
            // alert(id);
            axios.delete('delete_student/'+id)
            .then(response => {
               this.getResults();
            });
         }
      }
   }
</script>
