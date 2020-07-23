<template>
  <div class="card">
    <div class="card-header">Pensamiento Component {{ pensamiento.date}}</div>
    <div class="card-body">
        
      <p v-if="editMode" >{{ pensamiento.description}}</p>
      <input  v-else="" v-model="pensamiento.description" type="text">
    </div>
    <div class="card-footer">
      <button v-if="editMode" @click="editPensamiento()" class="btn btn-info">Editar pensamiento</button>
      <button v-else="" @click="savePensamiento()" class="btn btn-warning">Guardar pensamiento</button>
      <button @click="deletepensamiento()" class="btn btn-danger">Eliminar pensamiento</button>
    </div>
  </div>
</template>

<script>
export default {
    props:['pensamiento'],
    data(){
        return{
            editMode:true
        }
    },
    methods:{
        deletepensamiento(){
          axios.post('/deletePensamiento/'+this.pensamiento.id);
            this.$emit('delete')
        },
        editPensamiento(){
        this.editMode=false 
        },
        savePensamiento(){
        this.editMode=true
        const params = {
          description : this.pensamiento.description,
          id : this.pensamiento.id
        } 
         axios.post('/updatePensamiento',params);
        this.$emit('save',this.pensamiento)
        console.log('editar')
        }
    }
    
};
</script>

<style>
</style>