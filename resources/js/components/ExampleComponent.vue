<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> <h2>{{title}}</h2></div>

                    <div class="card-body">
                   
                        <div class='form-group'>
                           <label for="name">Name</label>
                            <input type=text
                            id='name'
                            v-model="item.name"
                            placeholder='Name'
                            class='form-control'
                            >
                        </div>
                        <div class='form-group'>
                           <label for="name">Phone</label>
                            <input type=text
                            id='phone'
                            v-model="item.phone"
                            placeholder='Phone'
                            class='form-control'
                            >
                        </div>
                        
                        <button class="btn btn-success" @click="saveItem()">
                            {{isEdit ? 'Update' : 'Save'}}
                        </button>
                        <a class="btn btn-primary float-right" href="api/exportData">Export CSV</a>
                        <div class="col-md-12">
                            <h2 class="text-center">Contact List</h2>
                            <div class="row text-uppercase font-weight-bold">
                                <div class="col-md-5 pl-5">Name</div>
                                <div class="col-md-5">Contact</div>
                                <div class="col-md-2 pull-right">Action</div>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item" 
                                v-for="item in lists" :key="item.id">
                                    <div class="row">
                                        <div class="col-md-4"> {{item.name}}</div>
                                        <div class="col-md-4"> {{item.phone}}</div>
                                        <div class="col-md-4"> 
                                            <span class="float-right">
                                                <button @click="editItem(item)" class="btn btn-warning btn-sm mr-2">Edit</button>
                                                <button @click="deleteItem(item.id)" class="btn btn-danger btn-sm mr-2">Delete</button>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       
       data (){
           return {
                title: "ToDo Application",
                lists:[],
                item:{
                    name:'',
                    phone:'',
                },
                temp_id: null,
                isEdit: false

           }
       },
        mounted() {
            this.getItems()
        },
        methods:{
            getItems(){
                this.lists = axios.get('api/tel')
                .then(res=> this.lists = res.data)
               
            },
            saveItem() {
                let method =  axios.post;

                let url = 'api/tel'

                if(this.isEdit){
                    method = axios.put;
                    url = 'api/tel/'+this.temp_id;
                }
              try{
                 method(url, this.item)
                  .then(res=>{
                        this.getItems()
                        this.item = {
                          name:'',
                          phone:'',
                        };
                        this.temp_id = null;
                        this.isEdit =  false;

                  })  
              }catch(err){
                  console.log(err)
              }
              
            },
            editItem(tel){
              this.item = {
                  name : tel.name,
                  phone: tel.phone
              }
              this.temp_id = tel.id;
              this.isEdit = true;
            },
            deleteItem(id){
                try{
                    axios.delete('api/tel/'+id)
                    .then(res => this.getItems())
                }catch(err){
                    console.log(err)
                }
                
            }


        }

    }
</script>
