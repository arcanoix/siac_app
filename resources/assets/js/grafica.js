// CommitChart.js
import { Line } from 'vue-chartjs'

export default Line.extend({
  data() {
    return {
      statOrderstatus: [
        {
          "key": 'Fornyet ikke lastet ned',
          "doc_count": 7793
        },
        {
          "key": 'Bekreftet levert til mobil',
          "doc_count": 5239
        },
        {
          "key": 'Betaling kansellert',
          "doc_count": 1035
        }
      ]
    }
  },
  mounted () {
    this.renderChart({
    labels: this.orderStatusChartKeys,
      datasets: [
        {
          label: 'Ticketstatus',
          backgroundColor: '#f87979',
          data: this.orderStatusChartData
        }
      ]
    })

  },
  computed: {
    orderStatusChartData () {
      let chartData = []
      this.statOrderstatus.forEach(function(orderStatus) {
          chartData.push(orderStatus.doc_count)
      })
      return chartData
    },
    orderStatusChartKeys () {
      let chartKeys = []
      this.statOrderstatus.forEach(function(orderStatus) {
        chartKeys.push(orderStatus.key)
      })
      return chartKeys
    }
  }
})
