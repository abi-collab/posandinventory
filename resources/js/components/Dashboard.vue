<template>
    <section class="content">
        <div class="container-fluid">

            <div class="row filts">

                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3" v-b-toggle.daily>
                        <span class="info-box-icon bg-light elevation-1"><i class="fas fa-money-bill-wave"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b class="space">DAILY SALES</b></span>
                            <span class="info-box-number">
                                <h4>
                                    &#8369; {{totalSalesToday.toLocaleString()}}
                                </h4>
                            </span>
                        </div>
                    </div>
                      <b-collapse id="daily" :title="'Daily Sales : '+ dateToday" header-bg-variant="light">
                       <b-card>
                        <table class="table">
                                <thead>
                                    <th><small><b>Purchase ID</b></small></th>
                                    <th><small><b>Customer ID</b></small></th>
                                    <th><small><b>Amount Due</b></small></th>
                                </thead>
                                <tbody>

                                
                                <tr v-for="pur in salesToday" :key="pur.ID">
                                    <td><small>{{pur.ID}}</small></td>
                                    <!-- <td class="centerx">{{pur.customer_ID | truncate(8, '...')}}</td> -->
                                    <td class="centerx"><small>{{pur.customer_ID}}</small></td>
                                    <td><small>&#8369;&nbsp;{{pur.amount_due.toLocaleString()}}.00</small></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td><small>&#8369;&nbsp;{{totalSalesToday.toLocaleString()}}.00</small></td>
                                </tr>
                                
                                </tbody>
                        </table>
                       </b-card>
                    </b-collapse>
                </div>

                 <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3" v-b-toggle.stocks>
                        <span class="info-box-icon bg-light elevation-1"><i class="fas fa-box-open"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><b class="space">STOCK CATEGORY</b></span>
                            <!-- <span class="info-box-number" v-if="stocksPerCategory.length < categoryLength">{{categoryLength - 1}}</span> -->
                             <span class="info-box-number">
                                 <h4>
                                     {{stocksPerCategory.length}}
                                 </h4>
                            </span>  
                        </div>
                    </div>

                    <b-collapse id="stocks" title="Stocks" header-bg-variant="light">
                        <b-card>
                            <table class="table">
                                <thead>
                                    <th><small><b>Item Category</b></small></th>
                                    <th><small><b>Available</b></small></th>
                                </thead>
                                <tbody>
                                    <tr v-for="(a, index) in stocksPerCategory" :key="index">
                                        <td><small>{{a.item}}</small></td>
                                        <td><small>{{a.available}}</small></td>
                                    
                                    </tr>
                                </tbody>
                            </table>

                            <template #modal-footer>
                                <div class="w-100">
                            
                                <small class="float-left text-muted" v-if="stocksPerCategory.length < categoryLength">Theres an item category that is not use.</small>
                                <small class="float-left text-muted" v-if="stocksPerCategory.length < categoryLength">
                                    That is why theres {{categoryLength}} stocks indicated but only {{stocksPerCategory.length}} in the actual list.</small>
                                </div>
                            </template>
                        </b-card>
                    </b-collapse>

                </div>  

                 <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3" v-b-toggle.crit>
                        <span class="info-box-icon bg-light elevation-1"><i class="fas fa-cart-arrow-down"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b class="space">CRITICAL ITEMS</b></span>

                            <span class="info-box-number">
                                <h4>
                                    {{criticalItems.length}}
                                </h4>
                            </span>   
                        </div>  
                    </div>
                     <b-collapse id="crit" title="Critical Stocks" header-bg-variant="light">
                         <b-card>
                            <table class="table">
                                <thead>
                                    <th><small><b>Id</b></small></th>
                                    <th><small><b>item</b></small></th>
                                    <th class="centerx"><small><b>Stock Left</b></small></th>
                                    <th class="centerx"><small><b>Crit. Level</b></small></th>
                                </thead>
                                <tbody>
                                    <tr v-for="crit in criticalItems" :key="crit.id">
                                        <td><small>{{crit.id}}</small></td>
                                        <td><small>{{crit.name}}</small></td>
                                        <td class="crits"><small>{{crit.stocks}}</small></td>
                                        <td class="centerx"><small>{{crit.criticalLevel}}</small></td>
                                    </tr>
                                    <hr>
                                    
                                </tbody>
                            </table>
                            <template #modal-footer>
                                <div class="w-100">  
                                <small class="float-left text-muted">Get additional stocks supply for this listed items.</small>
                                </div>
                            </template>
                        </b-card>
                    </b-collapse>
                </div>
      
            </div>
            <div class="row filts">
                <!-- <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3" v-b-modal.totalItemSold>
                        <span class="info-box-icon bg-light elevation-1"><i class="fas fa-tags"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b class="space">ITEMS SOLD</b></span>

                            <span class="info-box-number">
                               <h4>{{itemSoldLength.length}}</h4>
                            </span>   
                        </div>  
                    </div>
                     <b-modal id="totalItemSold" title="Total Items Sold" header-bg-variant="light" size="xl" hide-footer hide-header>
                          <div class="info-box">
                                <span class="info-box-icon bg-light elevation-1"><i class="fas fa-tags"></i></span>
                                <div class="info-box-content">
                                    <br>
                                    <span class="info-box-text"><h3 class="space2">ITEMS SOLD</h3></span>
                                 
                                </div>   
                            </div>
                         <b-card>
                             <GChart
                                    id="Gchart"
                                    type="BarChart"
                                    :data="itemsSoldChart"
                                    :options="chartOptions" 
                                    v-if="onlineBa"
                                />
                                <table class="table" v-else>
                                    <thead>
                                        <th>ID</th>
                                        <th>Product</th>
                                        <th>Sold</th>
                                    </thead>
                                    <tbody>
                                        <template v-for="pro in itemSoldLength">
                                            <tr :key="pro.id">
                                                <td>{{pro.id}}</td>
                                                <td>{{pro.name}}</td>
                                                <td>{{pro.sold}}</td>
                                            </tr> 
                                        </template>
                                    </tbody>
                                </table>

                            <template #modal-footer>
                                <div class="w-100">  
                                <small class="float-left text-muted">Get additional stocks supply for this listed items.</small>
                                </div>
                            </template>
                        </b-card>
                    </b-modal>
                </div> -->
               
                 <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box" v-b-modal.productPurchase>
                        <span class="info-box-icon bg-light elevation-1"><i class="fas fa-calendar"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><b class="space">PURCHASED ITEMS</b></span>
                            <span class="info-box-number">
                                <h4>{{productSoldPerDate.length}}</h4>
                            </span>
                        </div>   
                    </div>
                     <b-modal id="productPurchase" size="xl" hide-footer hide-header>
                            <div class="info-box">
                                <span class="info-box-icon bg-light elevation-1"><i class="fas fa-calendar"></i></span>
                                <div class="info-box-content">
                                    <br>
                                    <span class="info-box-text"><h3 class="space2">PURCHASED ITEMS</h3></span>
                                 
                                </div>   
                            </div>
                        <b-card>
                             <b-row>
                                <b-col>
                                        <b-form-datepicker 
                                            id="from2" 
                                            v-model="fromDateValue2" 
                                            :max="toDateValue2" 
                                            placeholder="From" 
                                            menu-class="w-100"
                                            calendar-width="100%"
                                            size="lg"
                                        ></b-form-datepicker>    
                                </b-col>
                                <b-col>
                                        <b-form-datepicker 
                                            id="to2" 
                                            v-model="toDateValue2" 
                                            :max="max" 
                                            :min="fromDateValue2" 
                                            placeholder="To"
                                            menu-class="w-100"
                                             calendar-width="100%"
                                             size="lg"
                                        ></b-form-datepicker>
                                </b-col>  
                                <b-col cols="1">
                                     <b-btn @click="clearDate2()" variant="light" size="lg">X</b-btn>
                                </b-col>
                            </b-row>
                             <br>
                             <GChart
                                    id="Gchart"
                                    type="ColumnChart"
                                    :data="purchasedItemsChart"
                                    :options="chartOptions" 
                                    v-if="onlineBa"
                                />
                               
                       
                            <table class="table" v-else>
                                <thead>
                                    <th>Product</th>
                                    <th>Sold</th>
                                </thead>
                                <tbody>
                                    <template v-for="(pro, k) in productSoldPerDate">
                                    <tr :key="k">
                                        <td>{{pro.name}}</td>
                                        <td>{{pro.qty}}</td>
                                    </tr>
                                </template>
                                </tbody>
                            </table>
                               <template #modal-footer>
                                    <div class="w-100">  
                                    <small class="float-left text-muted">How many times a product is being purchase base on date range.</small>
                                    </div>
                                </template>
                         </b-card>
                    </b-modal>
                  
                </div>

                 <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box" v-b-modal.includedInPurchase>
                        <span class="info-box-icon bg-light elevation-1"><i class="fas fa-cart-plus"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><b class="space">PURCHASED SUMMARY</b></span>
                            <span class="info-box-number">
                                <h4>
                                    {{howManyTimesProductsArePurchased.length}}
                                </h4>
                            </span>
                        </div>   
                    </div>

                        <b-modal id="includedInPurchase" title="Purchase Summary" size="xl" hide-footer hide-header>
                              <div class="info-box">
                                    <span class="info-box-icon bg-light elevation-1"><i class="fas fa-cart-plus"></i></span>
                                    <div class="info-box-content">
                                        <br>
                                        <span class="info-box-text"><h3 class="space2">PURCHASED SUMMARY</h3></span>
                                    </div>   
                                </div>
                            <b-card>
                                <GChart
                                    id="Gchart"
                                    type="PieChart"
                                    :settings="{ packages: ['corechart'] }"
                                    :data="x"
                                    :options="chartOptions" 
                                    v-if="onlineBa"
                                />
                             
                                <table class="table" v-else>
                                    <thead>
                                        <th>Index</th>
                                        <th>Product</th>
                                        <th>Times Included in a Purchase</th>
                                    </thead>
                                    <tbody>
                                        <template v-for="(pro, index, k) in howManyTimesProductsArePurchased">
                                        <tr :key="k">
                                            <td>{{ index + 1 }}</td>
                                        
                                            <td>{{pro.item}}</td>
                                            <td>{{pro.soldTotal}}</td>
                                        </tr>
                                    </template>

                                    </tbody>
                                </table>

                                <template #modal-footer>
                                    <div class="w-100">  
                                        <small class="float-left text-muted">How many times a product included in a purchase.</small>
                                    </div>
                                </template>
                            </b-card>
                           
                        </b-modal>
                </div> 
                <div class="col-12 col-sm-6 col-md-4">
                    
                </div>
            </div>
    

            <div class="row">
         
                <div class="col-md-12">

                <div class="card">
                <div class="card-header" style="background-color:#f2f3f4;">
                   <b-row>
                       <b-col style="display:flex">
                            <b-form-input placeholder="search" v-model="search" size="lg"></b-form-input>
                             <span class="btn btn-tool" v-b-toggle.collapse-1><i class="fas fa-calendar-day fa-2x"></i></span>
                       </b-col>
                       <b-col cols="2" style="letter-spacing:5px;text-align:center">    
                            
                            <h2 v-if="filterData.length == 0">&#8369; {{filteredRowsTotal.toLocaleString()}}</h2>
                            <h2 v-else>&#8369; {{filterDataTotal.toLocaleString()}}</h2>
                      
                       </b-col>
                       <b-col cols=".5">
                             <div class="card-tools text-right pull-right" style="display:flex">
                                  <button class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button 
                                    class="btn btn-tool" 
                                    data-card-widget="maximize"
                                    ><i class="fas fa-expand fa-2x"></i>
                                </button>
                            </div>
                       </b-col>
                   </b-row>
                </div>
              
                <div class="card-body">
                     <b-collapse id="collapse-1" class="mt-2">
                         <b-row>
                             <b-col></b-col>
                             <b-col cols="1">
                                  <download-excel 
                                    :data="all"
                                    class="exports"
                                    :name="dateToday">
                                            <b-btn variant="outline-success" size="sm" class="exports"> 
                                            <!-- <b-icon icon="file-earmark-excel"></b-icon> -->
                                           <b-icon icon="file-earmark-excel"></b-icon> EXCEL
                                            </b-btn>
                                    </download-excel> 
                             </b-col>
                             <b-col cols="1">
                                  <download-excel
                                        :data="all"
                                        type="csv"
                                        :name="dateToday+'.xlsx'"
                                        class="exports"
                                        >
                                        <b-btn size="sm" variant="outline-info" class="exports">
                                            <!-- <b-icon icon="file-excel"></b-icon> -->
                                            <b-icon icon="file-excel"></b-icon> CSV
                                        </b-btn>
                                        </download-excel>
                             </b-col>
                         </b-row>

                        <div style="text-align:center;">
                             <h4 style="letter-spacing:10px;">DATE RANGE</h4>
                        </div>
                             <b-row id="dateFilterBox" align="center">
                                <b-col cols="1"></b-col>
                                <b-col>
                                      <!-- <label for="from">From</label> -->
                                        <b-form-datepicker 
                                            id="from" 
                                            v-model="fromDateValue" 
                                            :max="toDateValue" 
                                            placeholder="From" 
                                            menu-class="w-100"
                                            calendar-width="100%"
                                          size="lg"
                                        ></b-form-datepicker>
                                      
                                       
                                          
                                </b-col>
                                <b-col>
                                      <!-- <label for="to">To</label> -->
                                        <b-form-datepicker 
                                            id="to" 
                                            v-model="toDateValue" 
                                            :max="max" 
                                            :min="fromDateValue" 
                                            placeholder="To"
                                            menu-class="w-100"
                                             calendar-width="100%"
                                            size="lg"
                                        ></b-form-datepicker>
                                           
                                        
                                </b-col>   
                                <b-col cols="1">
                            
                                      <b-btn @click="clearDate()" variant="outline-secondary" style="width:100%;" size="lg">Clear</b-btn>
                                </b-col> 
                                <b-col cols="1"></b-col>
                            </b-row>

                              <br>

                    </b-collapse>
                  

   
        <table class="table">
        <thead>
            <th class="text-muted">Order No</th>
            <th class="text-muted">Transaction Date</th>
            <th class="text-muted">Customer ID</th>
            <th class="text-muted">Amount Due</th>
            <th class="text-muted">Served&nbsp;By</th>
         
        </thead>
        
        <!-- <tbody v-if="filterData.length == 0">

            <template v-for="(pur, index) in filteredRows">
                
          <tr :key="pur.ID" @click="toggle(pur.ID)" :class="{ opened: opened.includes(pur.ID) }" >
            <td v-html="highlightMatches(pur.ID)"></td>
            <td>{{pur.transaction_date}} : {{ pur.time | truncate(8, '...')}}</td>
            <td v-html="highlightMatches(pur.customer_ID)"></td>
            <td v-html="highlightMatches(pur.createdBy)"></td>
            <td v-html="highlightMatches(pur.amount_due.toLocaleString())"></td>
          </tr>

            <tr v-if="opened.includes(pur.ID)" :key="index" style="background-color:#f2f3f4;"> 
              <td colspan="5">
                   <b-card>
                        <table class="table">
                            <thead>
                                <th>Product ID</th>
                                <th>Item</th>
                                <th>Unit Price</th>
                                <th>Qty</th>
                                <th>Sub-Total</th>
                            </thead>
                            <tbody v-for="(x,index) in purchaseDetails" :key="x.ID" id="subTableVal">
                                <tr :key="index" v-if="pur.ID == x.order_id">
                                    
                                    <td class="subTableVals">{{x.product_ID}}</td>
                                    <td class="subTableVals">{{x.name}}</td>
                                    <td class="subTableVals">{{x.price.toLocaleString()}}</td>
                                    <td class="subTableVals">{{x.qty}}</td>
                                    <td class="subTableVals">{{x.price * x.qty}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </b-card>
              </td>
            </tr>
            </template>
        </tbody> -->
        <tbody v-if="filterData.length == 0" align="center">
            <br>
            <br>
            <tr>
                <td colspan="5">
                    <h3>No Purchase Transactions On date Selected</h3>
                </td>
            </tr>
        </tbody>
      
        <tbody v-else>
           <template v-for="(pur, index) in filterData">

          <tr :key="pur.ID" :class="{ opened: opened.includes(pur.ID) }">
            <td v-html="highlightMatches(pur.ID)" @click="toggle(pur.ID)"></td>
            <td @click="toggle(pur.ID)">{{pur.transaction_date}} : {{ pur.time | truncate(8, '')}}</td>
            <!-- <td>{{pur.transaction_date}} : {{ pur.time.toLocaleString()}}</td> -->
            <td v-html="highlightMatches(pur.customer_ID)" @click="toggle(pur.ID)"></td>
            <td @click="toggle(pur.ID)">&#8369; {{pur.amount_due.toLocaleString()}}.00</td>
            <td v-html="highlightMatches(pur.createdBy)" @click="toggle(pur.ID)"></td> 
            <!-- <td>
                <b-icon icon="receipt" @click="getDataToPrint(pur)"></b-icon>
            </td> -->
          </tr>

            <tr v-if="opened.includes(pur.ID)" :key="index" style="background-color:#f2f3f4;"> 
              
              <td colspan="6">
                   <b-card> 
                        <table class="table">
                            <thead>
                                <tr class="noHoverEffect">
                                    <!-- <th><small>CustomerID</small></th> --> 
                                    <th><small><b>QTY</b></small></th> 
                                    <th style="text-align:center;letter-spacing:2px;"><small><b>DETAILS</b></small></th>
                                    
                                </tr>
                            </thead>
                            <tbody v-for="(x, index) in naa2" :key="index" id="subTableVal">
                                <tr v-if="x.orderno != null && x.orderno == pur.ID" class="noHoverEffect">
                                    <!-- <td class="subTableVals">{{x.id}}</td> -->
                                    <!-- <td class="subTableVals">{{x.order_id}}</td> -->
                                    <!-- <td class="subTableVals">{{x.data.sku}}</td> -->
                                    <!-- <td>{{pur.customer_ID}}</td> -->
                                    <!-- <td class="subTableVals">
                                        <ul>
                                            <li v-for="(model, innerIndex) in models(x.orderno)" :key="innerIndex">
                                                {{ model }}
                                            </li>
                                        </ul>
                                    </td> -->
                                    <!-- <td class="subTableVals">{{x.data.price.toLocaleString()}}</td> -->
                                    <!-- <td>{{pur.createdBy}}</td> -->
                                    <!-- <td class="subTableVals">{{x.data.price * models(x.orderno).length}}</td> -->
                                    <td class="subTableVals">{{models(x.orderno).length}}</td>
                                    <td>
                                        <tr v-for="(i,index) in prodWithSerails" :key="index" class="noHoverEffect">
                                            <template v-for="(x,k) in models(x.orderno)">
                                                <table :key="k" width="100%">
                                                   
                                                    <tbody>
                                                        <tr v-if="i.serialnumber == x" :key="k">
                                                            <td>{{i.ssku}}</td>
                                                            <td>{{i.serialnumber}}</td>
                                                            <td>{{i.description}}</td>
                                                            <td class="text-right pull-right"> &#8369;&nbsp;{{i.price.toLocaleString()}}.00</td>
                                                            <td class="text-right pull-right"> 
                                                                <ul v-for="(a, index) in loadinvoiceimahe" :key="index">
                                                                    <template v-if="i.imageid == a.imgId">
                                                                        <b-badge @click="reprint(a.invoiceimg)" size="sm">Print Receipt</b-badge>
                                                                    
                                                                    </template>
                                                                    
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                      
                                                    </tbody>
                                                    
                                                </table>
                                            </template>
                                        </tr>

                                        <!-- <div v-for="(a, index) in loadinvoiceimahe" :key="index"> 
                                                        {{person.Name}}, {{ ((index == 0) || person.Team != people[index-1].Team) ? person.Team : '' }}
                                                    </div> -->
                                    </td>
                                     
                                </tr>
                            </tbody>
                        </table>
                    </b-card>

              </td>
            </tr>

            </template>
        </tbody>
      </table>


                </div>
                <!-- /.card-body -->
                </div>


                <div class="container" style="margin-top:1000px;" id="spacelang"></div>
                <div id="printMe">
                    <img :src="'images/invoiceImgs/' + theImage" alt="image lang" width="100%" height="100%"/> 
                </div>
                
              
            </div>
           
            </div>

        </div>

     
        <div>
           

        </div>

  


</section>
</template>

<script>

import { D3BarChart } from 'vue-d3-charts';
import { GChart } from 'vue-google-charts';

    export default {
       components: {
            D3BarChart,
            GChart,
         
        },
        data(){
            const now = new Date()
            const today = new Date(now.getFullYear(), now.getMonth(), now.getDate())
            const petsaNgayon = now.getDate()
            // 15th two months prior
            const minDate = new Date(today)
            minDate.setMonth(minDate.getMonth())
            minDate.setDate(petsaNgayon)
            // 15th in two months
            const maxDate = new Date(today)
            maxDate.setMonth(maxDate.getMonth())
            maxDate.setDate(petsaNgayon)
      
            return{
                value: '',
                min: minDate,
                max: maxDate,
                fromDateValue:null,
                toDateValue:null,

                fromDateValue2:null,
                toDateValue2:null,
              
                 purchase:{
                     data:[],
                    message:''
                 },
                 purchaseDetails:[],
                 all:[],

                opened: [],

                   form: new Form({
                    id : '',
                    category : '',
                    name: '',
                    description: '',
                    tags:  [],
                    photo: '',
                    category_id: '',
                    price: '',
                    photoUrl: '',
                    stocks:0
                }),

                products:{
                    data:[],
                    message:''
                  },

                  categories:{
                    data:[],
                    message:''
                  },

                  totalSalesToday:0,

                //   fromDateValue:'',
                //   toDateValue:'',
                    search:'',

                    customers:{
                        data:[],
                        message:''
                    },

                    purchaseDetailsList:null,
                    xxx:null,

                    // chart_title: 'Best Sellers',
                    // chart_source: 'No. of Times an Item Included in a Purchase',
                  
                    chartOptions: {
                        // chart: {
                        // title: 'Company Performance',
                        // subtitle: 'Best Seller',
                        // },
                        height: 850,
                        // legend : "none",
                        hAxis: { format:''},
                        pieHole: 0.5,
                         is3D: true,
                        // colors: ['#eee']
                        
                    },

                    prodWithSerails:[],

                    toPrint:{
                        orderno:'',
                        transaction_date:'',
                        customerId:'',
                        amountDue:'',
                        SKU:'',
                        serialnos:[],
                        unit_price:0,
                        quantity:0
                    },
                    haha:[],

                    loadinvoiceimahe:[],

                    toPrintImg:'',
              
    
            }
        },
      
        mounted() {
            console.log('Component mounted.')
        
        },
      
        methods:{
            reprint(pict){
                this.toPrintImg = pict;
               
                if(this.toPrintImg != ''){
                    setTimeout(() => {
                          window.print();
                    }, 1000);
                }

                
                
            },
            // printna(){
            //     window.print();
            // },
            clearDate(){
                this.fromDateValue = null;
                this.toDateValue = null;
                this.filterData.length == 0; 
            },
             clearDate2(){
                this.fromDateValue2 = null;
                this.toDateValue2 = null;
                this.filterData.length == 0;
            },

            toggle(id) {
            const index = this.opened.indexOf(id);
            if (index > -1) {
              this.opened.splice(index, 1)
            } else {
              this.opened.push(id)
            }
          },


       
           loadPurchases(){
               axios.get('api/dashboard')
                     .then((response)=>{
                       this.purchase.data = response.data;

                    console.log("List of Purchase:");
                      console.log(response.data);

                     }) 
          },

          loadPurchasesDetails(){
               axios.get('api/dashboardPurchaseDetails')
                     .then((response)=>{
                       this.purchaseDetails = response.data;

                    console.log("List of PurchaseDetails:");
                      console.log(response.data);

                     }) 
          },

          getAll(){
               axios.get('api/dashboardAll')
                     .then((response)=>{
                       this.all = response.data;

                    console.log("List of All combined:");
                      console.log(response.data);

                     }) 
          },

           loadProducts(){

            // if(this.$gate.isAdmin()){
              axios.get("api/dashboard2").then(({ data }) => (this.products.data = data.data.data));
            // }
          },

           loaCustomers(){
            // if(this.$gate.isAdmin()){
              axios.get("api/customers").then(({ data }) => (this.customers.data = data));
            // }
          },

          loadCategories(){

            // if(this.$gate.isAdmin()){
              axios.get("api/dashboardCategories").then(({ data }) => (this.categories.data = data.data));
            // }
          },

          loadserials(){

            // if(this.$gate.isAdmin()){
              axios.get("api/productsWithSerialNo").then(({ data }) => (this.prodWithSerails = data));
            // }
          },

          loadinvoiceimages(){
              axios.get("api/invoiceImgGet").then(({ data }) => (this.loadinvoiceimahe = data));
          },

          getDataToPrint(p){

              let a = null;

              for(let i=0; i < this.naa2.length; i++){
                  if(p.ID == this.naa2[i].orderno){
                      a = this.naa2[i];
                  }
              }

              let g = this.prodWithSerails
                    .filter(ser => ser.orderno === a.orderno)
                    .map(ser => ser.serialnumber);

              
                this.toPrint.orderno = p.ID,
                this.toPrint.transaction_date = p.transaction_date,
                this.toPrint.customerId = p.customer_ID,
                this.toPrint.amountDue = p.amount_due,
                this.toPrint.SKU = a.data.sku,
                this.toPrint.serialnos = g,
                this.toPrint.unit_price = a.data.price,
                this.toPrint.quantity = g.length
                  
                
            //   console.log(p);
            //   console.log(a);
            //   console.log('g here:');
            //   console.log(g);
              this.returnSersWithAdditionalData();

          },
           returnSersWithAdditionalData(){
                let allSerials = [];
                let withDetails = [];
                
                for(let x = 0; x < this.prodWithSerails.length; x++){
                     allSerials.push(this.prodWithSerails[x].serial);
                }

                for(let j = 0; j < this.prodWithSerails.length; j++){
                    if(allSerials.includes(this.toPrint.serialnos[j])){
                        withDetails.push({
                            sku:this.prodWithSerails[j].ssku,
                            serialnam:this.prodWithSerails[j].serialnumber,
                            name:this.prodWithSerails[j].name,
                            description:this.prodWithSerails[j].description,
                            price:this.prodWithSerails[j].price
                        }); 
                    }
                }

                
                return this.haha = withDetails;

                // console.log(this.prodWithSerails);
                // console.log(this.toPrint.serialnos);
            },

            printImage(i){
                alert(i);
            },


           highlightMatches(text) {
            const matchExists = text.toString().includes(this.search);
            if (!matchExists) return text;

            const re = new RegExp(this.search, 'ig');
            return text.toString().replace(re, matchedText => `<strong style="font-size:20px;">${matchedText}</strong>`);
          },

          models(x) {
                return this.prodWithSerails
                    .filter(ser => ser.orderno === x)
                    .map(ser => ser.serialnumber);
            }
         
            
        },
        created() {
            this.loadPurchases();
            this.loadProducts();
            this.loadPurchasesDetails();
            this.getAll();
            this.loadCategories();
            this.loaCustomers();
            this.loadserials();
            this.loadinvoiceimages();
        },

        computed: {
            theImage(){
                return this.toPrintImg;
            },
            
            itemsSoldChart(){
                  var t = [['item', 'sold']];
                    var output = this.itemSoldLength.map(function(obj) {
                    return Object.keys(obj).sort().map(function(key) { 
                        return obj[key];
                        });
                    });

                    for(let i = 0; i < output.length; i++){
                        t.push(output[i]);
                    }

                    return t;

            },

              onlineBa() {	
                if(navigator.onLine){
                    return true;
                }
                else{
                    return false;	
                }
              },
              purchasedItemsChart(){
                   var t = [['item', 'sold']];
                    var output = this.productSoldPerDate.map(function(obj) {
                    return Object.keys(obj).sort().map(function(key) { 
                        return obj[key];
                        });
                    });

                    for(let i = 0; i < output.length; i++){
                        t.push(output[i]);
                    }

                    return t;
              },
       
              x(){ 
                var t = [['item', 'sold']];
                var output = this.howManyTimesProductsArePurchased.map(function(obj) {
                return Object.keys(obj).sort().map(function(key) { 
                    return obj[key];
                    });
                });

                for(let i = 0; i < output.length; i++){
                      t.push(output[i]);
                }

                return t;

              },


             chart_config() {
                 let config = {
                      key: 'item',
                        values: ["soldTotal"],
                        // orientation:'horizontal',
                        axis: {
                        yTicks: 2
                        },
                       color: {current:'#eee'},
                    transition: {ease: 'easeBounceOut', duration: 1000}
                 }

                 return config;
                       
                    },

            filteredRowsTotal(){
                return this.filteredRows.reduce((item, cost) => item + Number(cost.amount_due), 0);
            },
            filterDataTotal(){
                return this.filterData.reduce((item, cost) => item + Number(cost.amount_due), 0);
            },
             criticalItems() {
                 return this.products.data.filter(p => p.stocks <= p.criticalLevel);   
            },

             stocksPerCategory() {
                var productList = this.products.data, count = {};
                var list = [];
                
               for(let i = 0; i < productList.length; i++){
                   list.push(productList[i].category.name);
               }

                list.forEach(function(a) {
                    count[a] = (count[a] || 0) + 1;
                });

                  let a = []
                for (let x in count) {
                    a.push({
                        item: x,
                        available: count[x]
                    })
                }
                return a;
                            
            },

            categoryLength(){
                return Object.keys(this.categories.data).length;          
            },

            categoryList(){
                 let a = []
                for (let x in this.categories.data) {
                    a.push({
                        id: x,
                        item: this.categories.data[x]
                    })
                }

                return a;
            },

            totalSales(){
                return this.purchase.data.reduce( (Sum, sales) => sales.amount_due + Sum  ,0);
              
            },

            salesToday(){
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();

                today = yyyy + '-' + mm + '-' + dd;

                const a = this.purchase.data;
                let list = [];
                var total = 0;

                for(let i = 0; i < a.length; i++){
                    if(a[i].transaction_date.includes(today)){   
                        list.push(a[i]);

                        total = total + list[i].amount_due;
                        this.totalSalesToday = total;
                    }else{
                        console.log("wala");
                    
                    }
                
            }
               return list;
         
            },

            dateToday(){
                 const current = new Date();
                const date = (current.getMonth()+1)+'/'+current.getDate()+"/"+current.getFullYear();

                return date;
                // return new Date().toLocaleString();
            },

             filteredRows() {
             const vm = this;
            return vm.purchase.data.filter(pur => {

              const ID = pur.ID.toString().toLowerCase();
            //   const transaction_date = pur.transaction_date.toString().toLowerCase();
              const customer_ID = pur.customer_ID.toString().toLowerCase();
              const amount_due = pur.amount_due.toString().toLowerCase();
              const createdBy = pur.createdBy.toLowerCase();
              
               const search = this.search.toLowerCase();
             
                  return ID.includes(search) || customer_ID.includes(search) || amount_due.includes(search) || createdBy.includes(search);   
            
            });
          },

           filterData(){
            
               var startDate = this.fromDateValue;
               var endDate = this.toDateValue;

               return  _.filter(this.filteredRows, (function (data) {
                   if((_.isNull(startDate) || _.isNull(endDate))){
                       return true;
                   } else {
                       var date = data.transaction_date;
                       return (date >= startDate && date <=endDate);
                   }
               }))

            
            },

           

             productSoldPerDate(){
           
            var startDate = this.fromDateValue2;
               var endDate = this.toDateValue2;

               var g =  _.filter(this.all, (function (data) {
                   if((_.isNull(startDate) && _.isNull(endDate))){
                       return true
                   } else {
                       var date = data.transaction_date;
                       return (date >= startDate && date <=endDate);
                   }
               }))

                let grouped = Array.from(
                    g.reduce((m, { name, qty }) => m.set(name, (m.get(name) || 0) + qty), new Map),
                    ([name, qty]) => ({ name, qty })
                );

            return grouped;
             
                  
               

            },
             productSoldPerDateStatic(){

                const current = new Date();
                const date = current.getFullYear() + "-" + (current.getMonth()+1)+'-'+current.getDate();

               var startDate = date;
               var endDate = date;

               var g =  _.filter(this.all, (function (data) {
                   if((_.isNull(startDate) && _.isNull(endDate))){
                       return true
                   } else {
                       var date = data.transaction_date;
                       return (date >= startDate && date <=endDate);
                   }
               }))

               const output = g.reduce((accumulator, item) => {
                let name = item.name;
                let found = accumulator.find(elem => elem.name === name)
                if (found) found.qty += item.qty;
                else accumulator.push(item);
                return accumulator;
                }, []);

                return output;
            },

            howManyTimesProductsArePurchased(){
                
                var productSold = this.all, count = {};
                var list = [];
                
               for(let i = 0; i < productSold.length; i++){
                   list.push(productSold[i].name);
               }

                list.forEach(function(a) {
                    count[a] = (count[a] || 0) + 1;
                });

                  let a = []
                for (let x in count) {
                    a.push({
                        item: x,
                        soldTotal: count[x]
                    })
                }
                return this.xxx = a;
            },

            //   PurchasedItemsByDate(){
                
            //     var PurchasedItems = this.prod, count = {};
            //     var list = [];
                
            //    for(let i = 0; i < PurchasedItems.length; i++){
            //        list.push(PurchasedItems[i].name);
            //    }

            //      const output = list.reduce((accumulator, item) => {
            //         let name = item.name;
            //         let found = accumulator.find(elem => elem.name === name)
            //         if (found) found.qty += item.qty;
            //         else accumulator.push(item);
            //         return accumulator;
            //         }, []);

            //         return output;

              
            // },

            itemSoldLength(){
                var x = this.products.data;
                var q = [];

                for(let i = 0; i < x.length; i++){
                    if(x[i].sold > 0 ){
                        q.push({
                            name:x[i].name,
                            sold:x[i].sold
                        });
                        
                    }
                }

                return q;
            },

            naa() {
                const meron = new Set();
                this.prodWithSerails.forEach(ser => meron.add({
                    orderno:ser.orderno,
                    data:{
                        sku:ser.ssku,
                        price:ser.price
                    }
                }
                ));
                return Array.from(meron); 
            },
            naa2(){
                const filteredArr = this.naa.reduce((acc, current) => {
                const x = acc.find(item => item.orderno === current.orderno);
                if (!x) {
                    return acc.concat([current]);
                } else {
                    return acc;
                }
                }, []);

                return filteredArr;
            },

            modelsLength() {
                    return this.models.length;
                }


        },

        watch:{
           productSoldPerDate(){
              console.log("changed");
           }

        },

        filters: {
            truncate: function (text, length, suffix) {
                return text.substring(0, length) + suffix;
            }
        }
       
    }
</script>
<style scoped>
tr:hover{
     cursor: pointer;
     /* background-color: whitesmoke; */
     box-shadow: 0px 0px 3px grey;
     color:black;
}
.details_row{
    width: 100%;
}
.details_row:hover{
    background-color: #eee;
}
.opened {
  /* box-shadow: 0px 0px 2px black; */
  
  /* color:whitesmoke; */
  background-color: #f2f3f4;
  /* font-weight: 700; */
 
}
.theads{
  background-color: white;
}
.table{
  font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

/* #subTable{
    border:solid red 1px;
}
#subTableVal{
    border:solid blue 1px;
}
.subTableVals{
    border: solid green 1px;
} */

.crits{
    color:#dc143c;
    text-align: center;
}
.centerx{
    text-align: center;
}
.fas{
    margin-top:13px;
}
#dateFilterBox{
    padding:20px;
}
/* .space{
    letter-spacing: 2px;
    font-family: Arial, Helvetica, sans-serif;
} */
.info-box{
    background-color:#f2f3f4;
    letter-spacing: 2px;
    font-family: Arial, Helvetica, sans-serif;
}
.info-box:hover{
    background-color:#eee;
}
thead{
    border: 1px solid white;
}
#Gchart{
    background-color: #f2f3f4;
}
#Gchart:hover{
    cursor: pointer;
}
.space2{
    letter-spacing: 3px;
}
#productPurchase{
    background-color:#f2f3f4;
    cursor: pointer;
}
.exports{
  width:100%;
}
/* .fontSizeAdjust{
    font-size: small;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    letter-spacing: 1px;;
} */

.noHoverEffect:hover{
     box-shadow: 0px 0px 3px white;
     color:black;
}
/* #printMe{
    bottom: 0;
} */
@media print {
    .noPrint {display: none;}
    .card {display: none;}
    .filts {display: none;}
    #printMe {display: block;}
     #spacelang {display: none;}

   
}

</style>
