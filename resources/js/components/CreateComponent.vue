<template>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <div class="card">
               <div class="card-header bg-primary text-light">Create new student</div>
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
                     <button type="submit" @click.prevent="saveStudent" class="btn btn-primary offset-2 col-sm-4">Add Now</button>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="card">
               <div class="card-header bg-success text-light">All students</div>
               <div class="card-body">
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
                             <button type="button" class="btn btn-sm btn-success">Edit</button>
                             <button type="button" class="btn btn-sm btn-danger">Delete</button>
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
   </div>
</template>

<script>
   export default{
      data(){
         return{
            students : {},
            name : '',
            email : '',
            phone : ''
         }
      },
      mounted(){
         this.getResults();
      },
      methods : {
         saveStudent(){
            // alert('text');
            axios.post('save_student', {
               name : this.name,
               email : this.email,
               phone : this.phone,
            }).then(response => console.log(response));
         },
         getResults(page = 1){
         axios.get('all_students?page=' + page)
            .then(response => {
               console.log(response)
               this.students = response.data;
            });
         }
      }
   }
</script>