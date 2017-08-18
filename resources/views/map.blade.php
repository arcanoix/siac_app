<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.17/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.6.1/lodash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-google-maps/0.1.21/vue-google-maps.js"></script>

</head>
<body>

<google-map style="width: 100%; height: 100%; position: absolute; left:0; top:0"
    :center="{lat: 1.38, lng: 103.8}"
    :zoom="12"
>

</google-map>

<script>
VueGoogleMap.load({
    'key': 'AIzaSyCEyxtNeLPsOWjABwIKLWrA4gDnm0sRUv0',
})
Vue.component('google-map', VueGoogleMap.Map);
new Vue({
    el: 'body',
});

</script>

</body>
</html>