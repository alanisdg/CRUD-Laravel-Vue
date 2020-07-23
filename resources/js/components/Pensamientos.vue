.<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <Form @new="addPensamiento"></Form>
        <Pensamiento 
        v-for="(pensamiento, index) in pensamientos" 
        v-bind:key="pensamiento.id" 
        :pensamiento="pensamiento"
        @save="updatePensamiento(index,...arguments)"
        @delete="deletePensamiento(index)"
        >
        </Pensamiento>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            pensamientos : [
            ]
        }
    },
    mounted(){
        axios.get('/pensamientos').then((response)=>{
            console.log(response.data)
            this.pensamientos = response.data
            console.log(this.pensamientos)
        })
    },
    methods:{
        deletePensamiento(index){
            console.log(this.pensamientos.id)
            
            this.pensamientos.splice(index,1)
        },
        addPensamiento(Pensamiento){
            console.log(Pensamiento)
            axios.post('/savePensamiento',Pensamiento);
            this.pensamientos.push(Pensamiento)
        },
        updatePensamiento(index,pensamiento){
           
            pensamiento[index] = pensamiento
        }
    }
};
</script>

<style>
</style>