<template>
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-12">
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
                     <button type="submit" @click.prevent="saveStudent" class="btn btn-primary offset-2 col-sm-2">Add Now</button>
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
            name : '',
            email : '',
            phone : ''
         }
      },
      mounted(){
         console.log('Component mounted.')
      },
      methods : {
         saveStudent(){
            // alert('text');
            axios.post('save_student', {
               name : this.name,
               email : this.email,
               phone : this.phone,
            }).then(response => console.log(response));
         }
      }
   }
</script>