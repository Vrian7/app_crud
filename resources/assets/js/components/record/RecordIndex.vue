<template>
  <div>       
    <!-- <button @click="showModal" >123123</button> -->
    <datatable v-bind="$data" @editItem="editItem">
      <!-- <button class="btn btn-default" @click="alertSelectedUids" :disabled="!selection.length">
        <i class="fa fa-commenting-o"></i>
        Alert selected uid(s)
      </button> -->
    </datatable>      
  </div>
</template>

<script>

import Vue from 'vue'
import axios from 'axios'
import Datatable from 'vue2-datatable-component'



Vue.use(Datatable)
import mockData from '../_mockData'
import components from '../datatable/'
export default {
  components,
  name: 'RecordsTable', 
  props: ['row'],
  data () {
    const amINestedComp = !!this.row
    return {
      supportBackup: true,
      supportNested: true,
      tblClass: 'table-bordered',
      tblStyle: 'color: #666',
      pageSizeOptions: [5, 10, 15, 20],
      columns: (() => {
        const cols = [
          { title: 'UUID', field: 'uuid', thComp: 'FilterTh', tdStyle: { fontStyle: 'italic' } },
          { title: 'Name', field: 'name', thComp: 'FilterTh', tdStyle: { fontStyle: 'italic' } },
          { title: 'Description', field: 'description', thComp: 'FilterTh', tdStyle: { fontStyle: 'italic' } },
          { title: 'Code', field: 'code', thComp: 'FilterTh', tdStyle: { fontStyle: 'italic' } },
                    
           { title: 'Operation', tdComp: 'Opt', visible: 'true' }
        ]
        const groupsDef = {
          Normal: ['Primer Nombre', 'Segundo Nombre', 'Apellido Paterno'],
          Sortable: ['ID'],
          Extra: []
        }
        return cols.map(col => {
          Object.keys(groupsDef).forEach(groupName => {
            if (groupsDef[groupName].includes(col.title)) {
              col.group = groupName
            }            
          })
          return col
        })
      })(),
      data: [],
      total: 0,
      selection: [],
      summary: {},                
      query: amINestedComp ? { uid: this.row.friends } : {},      
      xprops: {
        eventbus: new Vue()
      }
    }
  },
  watch: {
    query: {
      handler () {
        this.handleQueryChange()
      },
      deep: true
    }
  },
  methods: {
    handleQueryChange () {
      axios.get('/getIndexData',{
        params: this.query
      }).then((response)=> {
        this.data = response.data.records, 
        this.total = response.data.total        
      }).catch(function (error) {
        console.log(error)
      });
    },
    alertSelectedUids () {
      console.log(this.selection);
      alert(this.selection.map(({ id }) => id))
    },
    editItem (item) {
      console.log("here");
      this.editedIndex = this.desserts.indexOf(item)
      this.editedItem = Object.assign({}, item)
      console.log(item);
      //this.date = item.birth_date
      //this.dialog = true
    },
    showModal () {
      this.$refs.myModalRef.show()
    },
  }
}
</script>
<style>
.w-240 {
  width: 240px;
}
</style>
