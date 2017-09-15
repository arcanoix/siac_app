import {Bar} from 'vue-chartjs'

export default Bar.extend({
  data(){
    return{
        data:[],
        listo:[]
    }
  },
  mounted () {
    axios.get('grafica').then(response => {
      console.log(response)
        this.data = response.data.EnProceso.map(data => data.estatus);
        this.listo = response.data.Listo.map(labels => labels.estatus);
          this.fillData();
    })

},
  methods:{
    fillData(){
      this.renderChart({
        labels: ['Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre'],
        datasets: [
          {
            label: 'En Proceso',
            backgroundColor: '#FC2525',
            data: this.data
          },
          {
            label: 'Listo',
            backgroundColor: '#05CBE1',
            data: this.listo
          }
        ]
      }, {responsive: true, maintainAspectRatio: false})
    },
    }

})
