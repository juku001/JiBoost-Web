import { createRouter, createWebHistory } from 'vue-router';

import WelcomePage from "@/components/Welcome.vue";
import SignUp from "@/components/auth/SignUp.vue";
import SignIn from "@/components/auth/SignIn.vue";
import DashboardPage from "@/components/dashboard/Dashboard.vue";

// Import the components for the dashboard pages
import Home from "@/components/dashboard/DashHomeScreen.vue";
import ExamScreen from "@/components/dashboard/DashExamScreen.vue";
import ResultScreen from "@/components/dashboard/DashResultScreen.vue";
import PaymentScreen from "@/components/dashboard/DashPaymentScreen.vue";
// import PrivacyPolicy from './components/PrivacyPolicy.vue';
// import Logout from "@/components/dashboard/Logout.vue";

const routes = [
    {
        name: 'Home',
        component: WelcomePage,
        path: '/',
        meta: { title: 'Home | Jiboost' }
    },
    {
        name: 'SignUp',
        component: SignUp,
        path: '/signup',
        meta: { title: 'SignUp | Jiboost' }
    },
    {
        name: 'SignIn',
        component: SignIn,
        path: '/login',
        meta: { title: 'SignIn | Jiboost' }
    },
    {
        path: '/dashboard',
        component: DashboardPage,
        meta: { title: 'Dashboard | Jiboost' },
        children: [
            { path: 'home', name: 'DashboardHome', component: Home }, // Default to Home
            { path: 'exams', name: 'DashboardExams', component: ExamScreen },
            { path: 'results', name: 'DashboardResults', component: ResultScreen },
            { path: 'payments', name: 'DashboardPayments', component: PaymentScreen },
            // { path: 'logout', name: 'DashboardLogout', component: Logout }
        ]
    },
    // {
    //     path: '/privacy-policy',
    //     name: 'PrivacyPolicy',
    //     componet: PrivacyPolicy,
    //     meta: { title: 'Privacy Policy | JiBoost' }
    // }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
