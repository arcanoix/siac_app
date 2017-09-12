import {Bar} from 'vue-chartjs'

export default Bar.extend({
  mounted () {

    this.renderChart({
      labels: ['agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      datasets: [
        {
          label: 'En Proceso',
          backgroundColor: '#FC2525',
          data: [0, 6, 0, 0, 0]
        },
        {
          label: 'Listo',
          backgroundColor: '#05CBE1',
          data: [0, 2, 0, 0, 0]
        }

      ]
    }, {responsive: true, maintainAspectRatio: false})

  }


})
