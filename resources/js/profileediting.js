console.log('bla');
function disabling(el) {
    console.log('disabling');
    $("#test *").attr("disabled", "disabled").off('click');

}
const app = new Vue({
    el: '#app',
    data: {
        check: 'off',
    },
    methods: {
        disableimagecontainer: function () {
            disabling(document.getElementById('imagecontainer'));
            console.log('fuck you all');
        }
    }
});
