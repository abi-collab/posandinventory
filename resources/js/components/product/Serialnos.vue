<template>
    <section class="content">
        <div class="container">
             <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNew" aria-hidden="true" >
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                <div class="modal-header">
                   
                    <h5 class="modal-title">Edit Serial No.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       
                    </button>
                </div>

        
                    <div class="modal-body">
                      <b-form-group
                        label="SKU"
                        label-for="sku"
                        label-cols-sm="3"
                        label-align-sm="right"
                      >
                        <!-- <b-form-input id="sku" v-model="form.sku" name="sku"></b-form-input> -->
                           <b-form-select 
                                    v-model="form.sku" 
                                    :options="pro"
                                    value-field="sku"
                                    text-field="sku"
                                    required
                                ></b-form-select>  
                      </b-form-group>

                       <b-form-group
                        label="Serial No."
                        label-for="name"
                        label-cols-sm="3"
                        label-align-sm="right"
                      >
                        <b-form-input id="name" v-model="form.serialnumber" name="name"></b-form-input>
                              
                      </b-form-group>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" @click="submitUpdate()">Update</button>
                    </div>
               
                </div>
            </div>
        </div>

      <h1 class="display-4">Serial No. List</h1>
      <!-- <small class="text-muted">Add a Serial No. to a specific SKU(Stock Keeping Unit)</small> -->
           
                    <b-row>
                        <b-col>
                            <b-form-input placeholder="Search SKU" type="text" v-model="search"></b-form-input>
                        </b-col>
                        <b-col>
                            <b-form-input placeholder="Search Serial Number" v-model="searchSerial"></b-form-input>
                        </b-col>
                        <b-col cols="2">
                             <b-btn variant="outline-secondary" v-b-modal.filts><b-icon icon="plus"></b-icon> Add New</b-btn>
                        </b-col>
                    </b-row>

                    <b-modal id="filts" title="Add New Serial No." header-bg-variant="secondary" size="lg" hide-footer>
                        <b-container>
                          <b-row>
                            <b-col cols="5"> 
                                <label class="text-muted">Stock Keeping Unit(SKU)</label>
                                <b-form-select 
                                    v-model="selected" 
                                    :options="pro"
                                    value-field="data"
                                    text-field="sku"
                                    required
                                ></b-form-select>        
                            </b-col>
                            <b-col>
                              
                                      <label class="text-muted">Serial No</label>
                                    <b-form-input v-model="serialnum" placeholder="Enter Serial No." required></b-form-input>
                            
                            </b-col>
                          </b-row>
                            <br>
                          <b-row>
                              <b-col cols="8">
                                  <b-row>
                                        <b-col style="text-align:center">
                                            <br>
                                            <h3 style="letter-spacing:2px">{{selected.stock}}</h3>
                                            <h3 v-if="selected.stock == null" style="letter-spacing:2px">0</h3>
                                            <small>Total Items</small>
                                        </b-col>
                                        <b-col cols="1" style="text-align:center">
                                            <br>
                                            <h3>=</h3>
                                        </b-col>
                                        <b-col style="text-align:center">
                                            <br>
                                            <h3 v-if="selected.stock == null" style="letter-spacing:2px;color:red" >0</h3>
                                            <h3 v-else style="letter-spacing:2px;color:red">{{selected.stock - z}}</h3>
                                            <small>Items Without Serial No.</small>
                                        </b-col>
                                        <b-col cols="1" style="text-align:center">
                                            <br>
                                            <h3>+</h3>
                                        </b-col>
                                        <b-col style="text-align:center">
                                                <br>
                                                <h3 style="letter-spacing:2px;color:green;">{{z}}</h3>
                                                <small>Items With Serial No.</small>
                                        </b-col>
                                  </b-row>
                              </b-col>
                              <b-col>
                                  <br>
                                  <br>
                                  <b-btn @click="createSerialnum()" style="width:100%;height:50%;" >Save</b-btn>
                              </b-col>
                         
                          </b-row>
                          
                        </b-container>

                    </b-modal>
           
            <b-alert
                v-model="showyellow"
                class="m-0 rounded-0"
                style="z-index: 2000;"
                variant="danger"
                v-if="x - filteredRows.length > 0"
               
                >
                 <h5>{{x - filteredRows.length}}</h5>
                  Items without Serial No.
                
            </b-alert>

            <!-- <b-alert
                v-model="showyellow"
                class="m-0 rounded-0"
                style="z-index: 2000;"
                variant="success"
                v-else
               
                >
               
                 <h5>{{x - filteredRows.length}}</h5>
                  Items without Serial No.
                
            </b-alert> -->
             <br>
            <br>
  
<h4 class="text-muted">{{filteredRows.length}} Items</h4>

<table class="table">
    <thead>
        <!-- <th>#</th> -->
        <th>SKU</th>
        <th>Serial No</th>
        <th>Date-In</th>
        <th>Order No.</th>
        <th>Return No.</th>
        <th>Customer Id</th>
        <th>ImageId</th>
        <th>Option</th>
    </thead>
    <tbody>
        <tr v-for="(i,index) in filteredRows.slice().reverse()" :key="index">
            <!-- <td>{{index + 1}}</td> -->
            <td v-html="highlightMatches(i.ssku)" class="text-muted"></td>
            <td v-html="highlightMatches2(i.serialnumber)"></td>
            <td>{{i.petsa}}</td>
            <td>{{i.orderno}}</td>
            <td>{{i.returnno}}</td>
            <td>{{i.customerid}}</td>
            <td>{{i.imageid}}</td>
            <td>
                <span @click="editModal(i)" class="optionBtn">
                    <b-icon icon="pencil-square"></b-icon>
                </span>
                |
                <span @click="deleteSerial(i.id)" class="optionBtn">
                    <b-icon icon="trash"></b-icon>
             </span>
          </td>
        </tr>
    </tbody>
</table>

     </div>

    </section>
</template>
<script>
    export default {
        data(){
            return {
                selected:{},
                products: {
                  data:[],
                  message:''
                },
                pro:[],

                form:{
                    id:'',
                    sku:'',
                    serialnumber:''
                },

                serialnum:'',
                serials:[],
                search:'',
                searchSerial:'',


                 showyellow: false,
              

                

            }
        },
        methods: {
          editModal(data){
              $('#addNew').modal('show'); 
              this.form.id = data.id,
              this.form.sku = data.ssku;
              this.form.serialnumber = data.serialnumber;
          },
           submitUpdate(){
            axios.put("api/serialno/" + this.form.id, {
                ssku:this.form.sku,
                serialnumber:this.form.serialnumber
            }).then((res)=>{
                console.log(res);
            })

            // console.log("api/serialno/" + this.form.id, this.form );
             $('#addNew').modal('hide');
            this.loadserials(); 

             Toast.fire({
                        icon: 'success',
                        title: 'Successfully Updated!'
                    });

          },
          deleteSerial(id){
              Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  showCancelButton: true,
                  confirmButtonColor: '#d33',
                  cancelButtonColor: '#3085d6',
                  confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {

                      // Send request to the server
                        if (result.value) {
                              axios.delete('api/serialno/'+ id).then(()=>{
                                      Swal.fire(
                                      'Deleted!',
                                      'Your file has been deleted.',
                                      'success'
                                      );
                                  this.loadserials();
                              }).catch((data)=> {
                                  Swal.fire("Failed!", data.message, "warning");
                              });
                        }
                  })
          },

          loadProducts(){
              axios.get("api/product").then(({ data }) => (this.products = data.data));
          },
          loadprod2(){
                axios.get("api/product").then(({ data }) => {
                    let x = data.data.data;
                    console.log(x);
              let prod = [];
              for (let i = 0; i < x.length; i++){ // storing every objects original content to it's new declared object property(data)
                x[i] = {
                     sku:x[i].id,
                     name:x[i].name,
                     data:{
                         sku:x[i].id,
                         stock:x[i].stocks,
                    }
                };
                delete x[i].stocks;
                delete x[i].id;
                prod.push(x[i]);  
              }
              this.pro = prod;  
            });
          },

          loadserials(){
              axios.get("api/serialno").then(({ data }) => (this.serials = data));
          },
          createSerialnum(){

              var sers = [];
               var serials = this.serials;

               for(let i = 0; i < serials.length; i++){
                   sers.push(serials[i].serialnumber);
               }
                if(this.selected.sku == null || this.serialnum == ''){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Both Fields must not be empty',
                    })
                }
                else if(this.selected.stock == this.z){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Cannot Add this Serial No. for SKU '+ this.selected.sku,
                        footer: 'This SKU has only a quantity of '+ this.selected.stock
                    })

                }
                else if(sers.includes(this.serialnum)){
                   Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'This Serial No. is already in Use',
                        footer: 'Enter "wmic bios get serialnumber" to CMD to get the Device`s Serail No.'
                    })
                }
                else{
                     var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();

                var hour = today.getHours();
                var minute = today.getMinutes();
                var seconds = today.getSeconds();

                var time = hour + ':' + minute + ':' + seconds;
                
                today = mm + '/' + dd + '/' + yyyy + " - " + time;


              axios.post('api/serialno',{
                  sku:this.selected.sku,
                  serialno:this.serialnum,
                  petsa:today
            //   }).then(response => console.log(response));
            }).then((data)=>{
                    console.log(data.status);
                    this.loadserials();
                    this.selected = {};
                    this.serialnum = '';
                    
                    if(data.status == 201){
                  $('#addNew').modal('hide');

                  Toast.fire({
                        icon: 'success',
                        title: 'Serial No. Successfully Added!'
                    });

                } else {
                  Toast.fire({
                      icon: 'error',
                      title: 'Some error occured! Please try again'
                  });

                
                    }
                
              })
              .catch(()=>{

                  Toast.fire({
                      icon: 'error',
                      title: 'Some error occured! Please try again'
                  });
              })
            }
          },

          highlightMatches(text) {
            const matchExists = text.toString().includes(this.search);
            if (!matchExists) return text;

            const re = new RegExp(this.search, 'ig');
            return text.toString().replace(re, matchedText => `<strong>${matchedText}</strong>`);
          },
           highlightMatches2(text) {
            const matchExists = text.toString().includes(this.searchSerial);
            if (!matchExists) return text;

            const re = new RegExp(this.searchSerial, 'ig');
            return text.toString().replace(re, matchedText => `<strong>${matchedText}</strong>`);
          }
       
        },
         created() {
            this.loadProducts();
            this.loadprod2();
            this.loadserials();
           
        },
        computed:{
            prodId(){
                var c = [];
                let b = this.products.data;
                for(let i = 0; i < b.length; i++){
                      c.push({
                          sku:b[i].id,
                          stock:b[i].stocks
                      })
                    }
                return c;
            },

            filteredRows() {
            const vm = this;
            return vm.serials.filter(ser => {

              const sku = ser.ssku.toString().toLowerCase();
              const serialnum = ser.serialnumber.toLowerCase();
             
                const search = this.search.toLowerCase();
                const searchSerial = this.searchSerial.toLowerCase();

                  return sku.includes(search) && serialnum.includes(searchSerial);
            
            });
  
          },

          x(){
            var b = this.pro;
            let stox = null;
            for(let i = 0;i < b.length; i++){
                if(b[i].data.sku == this.search){
                    stox = b[i].data.stock;
                }   
            } 
            if(this.search == ''){
                this.showyellow = false;
                return false;
            }
            else if(this.filteredRows.length < stox  , this.form.sku = this.search){
                this.showyellow = true;
                return stox;
            }
          },
         
          z() {
            let skuList = [];
             var sers = this.serials;

              for(let i = 0; i < sers.length; i++){
                  skuList.push(sers[i].ssku);
              }

              console.log(skuList);

                return skuList.filter((v) => (v === this.selected.sku)).length;
            }
        }
    }
</script>
<style scoped>
tr:hover{
    background-color: #eee;
    cursor: pointer;
}
</style>
