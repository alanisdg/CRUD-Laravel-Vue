<template>
  <div class="card">
    <div class="card-body">
      <form @submit.prevent="savep()">
        <div class="form-group">
          <label>Ahora estoy pensando en:</label>
          <input type="text" v-model="description" class="form-control" name="thought" />
        </div>
        <button class="btn btn-primary">Enviar pensamiento</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            description:''
        }
    },
    methods:{
        savep(){
            const pensamiento={
                 
                description:this.description
            }
            this.$emit('new',pensamiento)
            this.description = ''
            console.log('save')
        }
    }
};
</script>

<style>
</style>