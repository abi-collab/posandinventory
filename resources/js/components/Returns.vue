<template>
  <section class="content">

      <div class="container">
        <br>
        <h1 class="display-4">Returns</h1>

    
    

    <br>
  
 
      <b-row>
        <b-col>
          <b-input type="text" placeholder="Search Serial No."></b-input>
        </b-col>
        <b-col cols="2">
            <b-btn v-b-modal.addReturn>Add Returns</b-btn>
        
            <b-modal id="addReturn" title="Add a return Item" hide-footer size="xl">
             
 

       <!-- <h1 v-if="cartx2.length > 1">{{cartx2.length}} Items</h1>
       <h1 v-else>{{cartx2.length}} Item</h1> -->
      <b-input placeholder="enter serial" v-model="serial" @keyup.enter="onEnter"></b-input>
      <br>

        <table class="table">
            <thead>
            <th>orderno</th>
            <th>petsa</th>
            <th>serial no</th>
            <th>sku</th>
          
            
            </thead>
            <tbody>
            <tr v-for="(j, index) in cartx2" :key="index">
                <td>{{j.orderno}}</td>
                <td>{{j.petsa}}</td>
                <td>{{j.serialnumber}}</td>
                <td>{{j.ssku}}</td>
                
               
            </tr>
            </tbody>
        </table>


        <b-btn @click="returnz()">Save</b-btn>

     
            </b-modal>
        </b-col>
      </b-row>
      <br>
    <table class="table">
            <thead>
                <th>id</th>
                <th>return no</th>
                <th>order No</th>
                <th>serial no</th>
                <th>Stock-In Date</th>
                <th>sku</th>
                <th>Remarks</th>
                <th></th>
            </thead>
            <tbody>
                <template v-for="(i, index) in ProductsWithSerialNos">
            <tr :key="index" v-if="i.returnno != null">
                <td>{{i.id}}</td>
                <td>{{i.returnno}}</td>
                <td>{{i.orderno}}</td>
                <td>{{i.serialnumber}}</td>
                <td>{{i.petsa}}</td>
                 <td>{{i.ssku}}</td>
                 <td>{{i.remarks}}</td>
                 <td>
               
                     <b-icon icon="pencil-square" v-b-modal="modalId(i.serialnumber)" class="aycons" @click="xyz(i.remarks)"></b-icon>
                    <b-modal :id="'modal' + i.serialnumber" :title="'Return Remarks for Serial No. ' + i.serialnumber"  size="lg" centered hide-footer>
                        <b-form-textarea
                        id="textarea"
                        v-model="remarkText"
                        placeholder="Enter something..."
                        rows="3"
                        max-rows="6"
                        ></b-form-textarea>
                        <b-btn @click="updateRemarks(i.id)">save</b-btn>
                    </b-modal>
                 </td>
            </tr>
                </template>
            </tbody>
        </table>


      
    </div>  
  </section>
</template>
<script>
export default {
  data(){
      return {
          serial:'',
          cartx2:[],
          ProductsWithSerialNos:[],    
          remarkText:''

      }
  },
  methods:{
       loadGetProductsWithSerialNos(){
            axios.get("api/getProductsWithSerialNos").then(({ data }) => (
                this.ProductsWithSerialNos = data
                ));
          },
           modalId(i) {
            return 'modal' + i;
            },
          
           onEnter(){

            let a = this.ProductsWithSerialNos;
            let b = [];
            let c = [];

            for(let j = 0; j < this.cartx2.length; j++){
              c.push(this.cartx2[j].serialnumber);
            }

            for(let i = 0; i < a.length; i++){
              b.push(a[i].serialnumber);
            }

           
                if(this.returnvalue.orderno == null){
                    Swal.fire("Item with Serial No. " + this.serial + " was not Purchased!");
                  }
      
                else if(c.includes(this.serial)){
                  Swal.fire("Item with Serial No. " + this.serial + " is already in Cart!");
                }
         
                else if(b.includes(this.serial)){

                   this.cartx2.push(this.returnvalue);
                  this.serial = '';

                }
  
                else{
                  Swal.fire("Serial No. does not Exist!");
                }
           
            console.log("c:" + c);
          
          },

           returnz(){
          
            let d = new Date(); 
            let year = d.getFullYear();
            let month = d.getMonth() + 1;
            let day = d.getDate();
            let time = d.getTime();
         
  

          let date = 'R' + month + 'T' + year + 'N' + day + time;


        let b = this.cartx2;

         for(let i=0; i < b.length; i++){

            axios.put("api/serialno/" + b[i].id, {
                returnno:date
            }).then((res)=>{

                this.loadGetProductsWithSerialNos();
                console.log(res);
                this.cartx2 = [];
            })

         }
            // console.log("api/serialno/" + this.form.id, this.form );
            //  $('#addNew').modal('hide');
            // this.loadserials(); 

            //  Toast.fire({
            //             icon: 'success',
            //             title: 'Successfully Updated!'
            //         });

        },
        xyz(remarks){
            this.remarkText = remarks;
        },
        updateRemarks(id){
           
                    axios.put("api/serialno/" + id, {
                        remarks:this.remarkText
                    }).then((res)=>{

                        this.loadGetProductsWithSerialNos();
                        console.log(res);
                        this.remarkText = '';
                    })

        }
  },
  created(){
      this.loadGetProductsWithSerialNos();
  },
  computed:{
       returnvalue(){
              let a = this.serial;
              let b = this.ProductsWithSerialNos;
              let c = {};

              for(let i = 0; i < b.length; i++){
                if(b[i].serialnumber == a){
                  c = b[i];
                }
              } 
                
              return c;

            },
  }
}
</script>
<style scoped>
.aycons:hover{
    cursor: pointer;
}
tr:hover{
    background-color: #eee;
    cursor: pointer;
}

</style>