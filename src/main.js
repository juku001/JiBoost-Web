import { createApp } from 'vue';
import App from './App.vue';
import router from './routers'
// Import Bootstrap & jQuery
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'jquery';


import '@/assets/css/style.css';  // Use @ to reference src folder





const app = createApp(App);

router.beforeEach((to, from, next) => {
    document.title = to.meta.title || 'JiBoost'; // Use a default title if none is specified
    next();
});

app.use(router).mount('#app');