console.log('bla');
function disabling(el) {
    try {
        el.disabled = el.disabled ? false : true;
    } catch (E) { }
    if (el.childNodes && el.childNodes.length > 0) {
        for (var x = 0; x < el.childNodes.length; x++) {
            disabling(el.childNodes[x]);
        }
    }
}
const app = new Vue({
    el: '#app2',
    data: {
        check: 'on',
    },
    methods: {
        disableimagecontainer: function () {
            disabling(document.getElementById('imagecontainer'));
        }
    }
});
